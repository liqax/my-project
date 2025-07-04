<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;


class OrderController extends Controller
{
     public function place(Request $request)
    {
        // 1. Validation ข้อมูลที่ได้รับ
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.size' => 'nullable|string|max:255',
            'payment_method' => 'required|in:bank_transfer,cod',
            'shipping_address_id' => 'required|exists:shipping_addresses,id', // ต้องส่ง ID ที่อยู่มาด้วย
        ]);

        $user = Auth::user();

        // 2. ดึงข้อมูลที่อยู่จัดส่งจากฐานข้อมูล (ต้องเป็นของ user คนนี้เท่านั้น)
        $shippingAddress = $user->shippingAddress()->where('id', $request->shipping_address_id)->first();
        if (!$shippingAddress) {
            return redirect()->back()->with('error', 'ที่อยู่จัดส่งไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง');
        }

        // 3. คำนวณยอดรวมใน Backend เพื่อความถูกต้องและป้องกันการปลอมแปลงราคา
        $subtotal = 0;
        $orderItemsData = [];
        $productIds = collect($request->items)->pluck('id')->unique()->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        foreach ($request->items as $itemData) {
            $product = $products->get($itemData['id']);

            if (!$product) {
                return redirect()->back()->with('error', 'สินค้าบางรายการไม่พบ กรุณาลองใหม่อีกครั้ง');
            }

            // ตรวจสอบสต็อกสินค้า (สำคัญมาก!)
            if ($product->stock < $itemData['qty']) {
                return redirect()->back()->with('error', "สินค้า {$product->title} มีจำนวนไม่เพียงพอในสต็อก (เหลือ {$product->stock} ชิ้น)");
            }

            $itemPrice = $product->price; // ดึงราคาปัจจุบันจากฐานข้อมูล
            $itemTotal = $itemPrice * $itemData['qty'];
            $subtotal += $itemTotal;

            $orderItemsData[] = [
                'product_id' => $product->id,
                'quantity' => $itemData['qty'],
                'price' => $itemPrice,
                'size' => $itemData['size'] ?? null,
                'total' => $itemTotal,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // คำนวณค่าจัดส่ง (สามารถปรับ logic ได้ตามนโยบายร้าน)
        $shippingCost = 50.00; // หรือคำนวณตามน้ำหนัก/ราคา
        // คำนวณ VAT
        $vatRate = 0.07;
        $vatAmount = ($subtotal + $shippingCost) * $vatRate;
        $grandTotal = $subtotal + $shippingCost + $vatAmount;

        // 4. สร้าง Order และ Order Items ในฐานข้อมูล (ใช้ Transaction เพื่อความปลอดภัยของข้อมูล)
        try {
            \DB::beginTransaction(); // เริ่ม Transaction

            $order = Order::create([
                'user_id' => $user->id,
                'shipping_address_id' => $shippingAddress->id,
                'subtotal' => $subtotal,
                'shipping_cost' => $shippingCost,
                'vat_amount' => $vatAmount,
                'grand_total' => $grandTotal,
                'payment_method' => $request->payment_method,
                'status' => 'pending', // สถานะเริ่มต้น
                'order_number' => 'ORD-' . time() . '-' . uniqid(), // สร้างเลขที่ออเดอร์ง่ายๆ
            ]);

            // บันทึก Order Items
            $order->orderItems()->insert($orderItemsData); // ใช้ insert เพื่อประสิทธิภาพที่ดีกว่าเมื่อมีหลายรายการ

            // ลดสต็อกสินค้าและเพิ่มยอดขาย
            foreach ($request->items as $itemData) {
                $product = Product::find($itemData['id']);
                $product->decrement('stock', $itemData['qty']);
                // คุณอาจเพิ่มยอดขายใน product ด้วย: $product->increment('sold_count', $itemData['qty']);
            }

            // ล้างตะกร้าสินค้าใน Session (ถ้าคุณจัดการตะกร้าใน Session)
            // หรือใน Database ถ้าคุณใช้ Database Cart
            $this->clearCartSession($request->items); // เรียกใช้ฟังก์ชัน clearCartSession เพื่อลบสินค้าที่สั่งซื้อออกจากตะกร้า

            \DB::commit(); // ยืนยัน Transaction

            // 5. เปลี่ยนเส้นทางไปยังหน้ายืนยันคำสั่งซื้อ
            return redirect()->route('order.confirmation', $order->id)->with('success', 'คำสั่งซื้อของคุณได้รับการยืนยันแล้ว!');

        } catch (\Exception $e) {
            \DB::rollBack(); // ยกเลิก Transaction หากเกิดข้อผิดพลาด
            \Log::error('Order placement failed: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการสร้างคำสั่งซื้อ: ' . $e->getMessage());
        }
    }

    // ฟังก์ชันสำหรับล้างสินค้าที่ถูกสั่งซื้อออกจากตะกร้าใน Session
    protected function clearCartSession($orderedItems)
    {
        $cart = session()->get('cart', []);
        foreach ($orderedItems as $orderedItem) {
            $id = $orderedItem['id'];
            $size = $orderedItem['size'] ?? null;
            $cartKey = $id . ($size ? '_' . $size : '');

            if (isset($cart[$cartKey])) {
                unset($cart[$cartKey]);
            }
        }
        session()->put('cart', $cart);
    }


    // แสดงหน้ายืนยันคำสั่งซื้อ
    public function confirmation(Order $order)
    {
        // ตรวจสอบว่าเป็นคำสั่งซื้อของผู้ใช้คนปัจจุบันหรือไม่ (ป้องกันการเข้าถึงข้อมูลของผู้อื่น)
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('order.confirmation', compact('order'));
    }

    // แสดงรายละเอียดคำสั่งซื้อ (สำหรับดูย้อนหลัง)
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('order.show', compact('order')); // คุณอาจจะสร้าง view 'order.show' เพื่อแสดงรายละเอียด
    }
    
    /**
     * แสดงประวัติคำสั่งซื้อ
     * รองรับการกรองด้วย 'status' และ 'month' (เป็นเลขเดือน 1–12)
     */
     public function history(Request $request)
    {
        // สร้างข้อมูลตัวอย่าง $orders เป็น Collection ของ Array แต่ละคำสั่งซื้อ
        $orders = collect([
            // id, ชื่อสินค้า, จำนวน, ราคา/หน่วย, สถานะ, วันที่สั่งซื้อ (YYYY-MM-DD)
            [
                'id'     => 1,
                'product'=> 'หนังสือคณิตศาสตร์ ป.6',
                'qty'    => 2,
                'price'  => 120.00,
                'status' => 'shipped',       // shipped, processing, cancelled เป็นต้น
                'date'   => '2024-06-01',
            ],
            [
                'id'     => 2,
                'product'=> 'โดรน GEN2',
                'qty'    => 1,
                'price'  => 12000.00,
                'status' => 'processing',
                'date'   => '2024-06-02',
            ],
            [
                'id'     => 3,
                'product'=> 'สารละลายเมทิลเรด',
                'qty'    => 3,
                'price'  => 75.00,
                'status' => 'cancelled',
                'date'   => '2024-05-28',
            ],
            
          
        ]);

        // กรองตาม status ถ้ามี parameter 'status' ส่งมา (เช่น ?status=shipped)
        if ($request->has('status') && $request->status !== 'all') {
            $orders = $orders->where('status', $request->status);
        }

        // กรองตาม month ถ้ามี parameter 'month' ส่งมา (เช่น ?month=6 หมายถึงเดือนมิถุนายน)
        if ($request->has('month') && is_numeric($request->month)) {
            $orders = $orders->filter(function ($o) use ($request) {
                // date-stamp เป็น 'YYYY-MM-DD' → ใช้ date('n') ดึงเลขเดือน
                return intval(date('n', strtotime($o['date']))) === intval($request->month);
            });
        }

        // แปลงให้เป็น Collection ใหม่ (ไม่ใช่า Lazy Collection)
        $orders = $orders->values();

        // ส่งตัวแปร $orders เข้า Blade
        return view('orders.history', [
            'orders'      => $orders,
            // สำหรับ select box สถานะ
            'statusList'  => [
                'all'        => 'ทั้งหมด',
                'processing' => 'กำลังดำเนินการ',
                'shipped'    => 'จัดส่งแล้ว',
                'cancelled'  => 'ยกเลิกแล้ว',
            ],
            // สำหรับ select box เดือน
            'monthList'   => [
                ''  => '-- ทุกเดือน --',
                '1' => 'มกราคม',
                '2' => 'กุมภาพันธ์',
                '3' => 'มีนาคม',
                '4' => 'เมษายน',
                '5' => 'พฤษภาคม',
                '6' => 'มิถุนายน',
                '7' => 'กรกฎาคม',
                '8' => 'สิงหาคม',
                '9' => 'กันยายน',
                '10'=> 'ตุลาคม',
                '11'=> 'พฤศจิกายน',
                '12'=> 'ธันวาคม',
            ],
            // เก็บค่าที่กรองมาแล้ว กลับไปแสดงใน select
            'filterStatus' => $request->status ?? 'all',
            'filterMonth'  => $request->month  ?? '',
        ]);
       }

    public function viewOrders()
    {
    $orders = Order::with('items.product')->where('user_id', auth()->id())->get();

    return view('order.index', compact('orders'));
}

  public function showCheckoutPage()
    {
        $cart = session('cart', []);
        return view('checkout', compact('cart'));
    }

    public function submitOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) return redirect()->route('cart.show')->with('error', 'ไม่มีสินค้าในตะกร้า');

        $order = new Order();
        $order->user_id = Auth::id();
        $order->total = $request->input('total');
        $order->shipping_address = $request->input('address');
        $order->payment_method = $request->input('payment');
        $order->status = 'รอดำเนินการ';
        $order->items = json_encode($cart);
        $order->save();

        Session::forget('cart');
        return redirect()->route('order.status')->with('success', 'สั่งซื้อสำเร็จ');
    }

    public function orderStatus()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('order-status', compact('orders'));
    }

    public function store(Request $request)
{
    // ตัวอย่าง: บันทึกคำสั่งซื้อ
    $order = new \App\Models\Order();
    $order->user_id = auth()->id();
    $order->total = $request->input('total');
    $order->payment_method = $request->input('payment_method');
    $order->save();

    // ตัวอย่าง: Redirect หลังบันทึก
    return redirect()->route('orders.status')->with('success', 'ทำรายการสั่งซื้อเรียบร้อยแล้ว');

       

}
 public function placeOrder(Request $request)
    {
        // 1. ตรวจสอบข้อมูลที่ส่งมา
        $request->validate([
            'selected_items' => 'required|array|min:1',
            'payment_method' => 'required|string',
        ]);

        // 2. ดึงข้อมูลตะกร้าจาก Session
        $cart = Session::get('cart', []);
        $selectedItemIds = $request->input('selected_items');

        // 3. กรองเอาเฉพาะสินค้าที่ผู้ใช้เลือกจริงๆ
        $itemsToOrder = array_filter($cart, function($id) use ($selectedItemIds) {
            return in_array($id, $selectedItemIds);
        }, ARRAY_FILTER_USE_KEY);

        if (empty($itemsToOrder)) {
            return redirect()->back()->with('error', 'กรุณาเลือกสินค้าที่ต้องการสั่งซื้อ');
        }

        // 4. คำนวณยอดรวมฝั่ง Server อีกครั้ง (เพื่อความปลอดภัย)
        $subtotal = 0;
        foreach ($itemsToOrder as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }
        $shippingCost = 50; // ควรมาจากฐานข้อมูลหรือ config
        $vatAmount = $subtotal * 0.07;
        $grandTotal = $subtotal + $shippingCost + $vatAmount;

        // 5. ดึงที่อยู่จัดส่งของผู้ใช้
        $user = Auth::user();
        $shippingAddress = $user->shippingAddress; // สมมติว่าคุณมี relationship นี้

        if (!$shippingAddress) {
             return redirect()->route('cart.index')->with('error', 'ไม่พบที่อยู่จัดส่ง');
        }

        // 6. บันทึกข้อมูลการสั่งซื้อลงฐานข้อมูล (ตัวอย่าง)
        // DB::transaction(function() use ($user, $shippingAddress, $itemsToOrder, $grandTotal, $request) {
        //     $order = Order::create([
        //         'user_id' => $user->id,
        //         'shipping_address_id' => $shippingAddress->id,
        //         'total_amount' => $grandTotal,
        //         'payment_method' => $request->input('payment_method'),
        //         'status' => 'pending', // สถานะเริ่มต้น
        //     ]);
        //
        //     foreach ($itemsToOrder as $id => $item) {
        //         OrderItem::create([
        //             'order_id' => $order->id,
        //             'product_id' => $id, // หรือ $item['product_id']
        //             'quantity' => $item['qty'],
        //             'price' => $item['price'],
        //             'size' => $item['size'] ?? null,
        //         ]);
        //     }
        // });

        // 7. ลบสินค้าที่สั่งซื้อแล้วออกจากตะกร้า
        $newCart = array_diff_key($cart, $itemsToOrder);
        Session::put('cart', $newCart);

        // 8. Redirect ไปยังหน้าขอบคุณ หรือหน้าสถานะคำสั่งซื้อ
        return redirect()->route('order.success')->with('success', 'ได้รับคำสั่งซื้อของคุณเรียบร้อยแล้ว!');
    }
    }



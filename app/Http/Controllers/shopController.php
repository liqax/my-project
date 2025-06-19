<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    /**
     * แสดงรายการสินค้า (หน้าหลัก /products)
     */
    public function index()
    {
       $products = Product::all()->keyBy('id');


        return view('shop.index', compact('products'));
    }

    /**
     * แสดงรายละเอียดสินค้า (หน้า /products/{id})
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

       $product = Product::find($id);
        $product['id'] = $id;

        // ตัวอย่าง gallery
        $product['images'] = [
            $product['image'],
            'img/sample-2.jpg',
            'img/sample-2.jpg',
            'img/sample-2.jpg',
        ];

        // สินค้าที่เกี่ยวข้อง 3–4 ชิ้น
       $related = Product::where('category', $product->category)
                 ->where('id', '!=', $product->id)
                ->take(4)
                ->get();

        return view('shop.show', compact('product','related'));
    }

    /**
     * แสดงหน้า Cart (ตะกร้าสินค้า) (/cart)
     */
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * เพิ่มสินค้าในตะกร้า (POST /cart/add)
     */
    public function addToCart(Request $request)
{
    $cart = session()->get('cart', []);

    $id    = $request->input('id');
    $title = $request->input('title');
    $price = $request->input('price');
    $qty   = (int)$request->input('qty', 1);
    $size  = $request->input('size', null);
    $original_price = $request->input('original_price', $price);
    $img   = $request->input('img', 'img/default-product.jpg');

    // ถ้ามีอยู่แล้ว ➜ เพิ่มจำนวน
    if (isset($cart[$id])) {
        $cart[$id]['qty'] += $qty;
    } else {
        // ถ้ายังไม่มี ➜ สร้างใหม่
        $cart[$id] = [
            'title'          => $title,
            'price'          => $price,
            'qty'            => $qty,
            'size'           => $size,
            'original_price' => $original_price,
            'img'            => $img,
        ];
    }

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'เพิ่มสินค้าในตะกร้าแล้ว');
}
    /**
     * อัปเดตจำนวน/ขนาดสินค้าในตะกร้า (POST /cart/update)
     */
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $id   = $request->input('id');
        $qty  = max(1, (int)$request->input('qty', 1));
        $size = $request->input('size', null);

        if (isset($cart[$id])) {
            $cart[$id]['qty']  = $qty;
            $cart[$id]['size'] = $size;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'อัปเดตตะกร้าแล้ว');
    }

    /**
     * ลบสินค้าออกจากตะกร้า (POST /cart/remove)
     */
    public function removeFromCart(Request $request)
    {
        $id   = $request->input('id');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'ลบสินค้าออกจากตะกร้าแล้ว');
    }

    // ==========  Wishlist ==========

    /**
     * เพิ่มสินค้าเข้า Wishlist (POST /wishlist/add)
     */
    public function addToWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $wishlist  = session()->get('wishlist', []);

        if (!in_array($productId, $wishlist)) {
            $wishlist[] = $productId;
            session()->put('wishlist', $wishlist);
        }

        return back()->with('success', 'เพิ่มเข้ารายการโปรดเรียบร้อยแล้ว');
    }

    /**
     * ลบสินค้าออกจาก Wishlist (POST /wishlist/remove)
     */
    public function removeFromWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $wishlist  = session()->get('wishlist', []);

        $new = array_filter($wishlist, fn($i) => $i != $productId);
        session()->put('wishlist', array_values($new));

        return back()->with('success', 'ลบออกจากรายการโปรดเรียบร้อยแล้ว');
    }

    /**
     * แสดงหน้ารายการ Wishlist ทั้งหมด (GET /wishlist)
     */
    public function viewWishlist()
    {
        $ids         = session()->get('wishlist', []);
       $allProducts = Product::whereIn('id', $ids)->get()->keyBy('id');

        $items = collect($ids)
            ->map(fn($i) => 
                $allProducts->has($i)
                   ? array_merge($allProducts->get($i)->toArray(), ['id' => $i])
                    : null
            )
            ->filter()
            ->all();

        return view('wishlist.index', compact('items'));
    }

    }


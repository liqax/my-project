<?php
// app/Http/Controllers/ShopController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller


   {
    /**
     * แสดงรายการสินค้า
     */
    public function index()
    {
        $products = $this->products();
        return view('shop.index', compact('products'));
    }

    /**
     * แสดงรายละเอียดสินค้า
     */
    public function show($id)
    {
        $all = $this->products();
        if (! $all->has($id)) {
            abort(404);
        }

        $product = $all->get($id);
        $product['id'] = $id;

        // ตัวอย่าง gallery
        $product['images'] = [
            $product['img'],
            'img/sample-2.jpg',
            'img/sample-2.jpg',
            'img/sample-2.jpg',
        ];

        // สินค้าที่เกี่ยวข้อง 3 ชิ้น
        $related = $all
            ->filter(fn($p, $key) => $p['category'] === $product['category'] && $key !== $id)
            ->take(4);

        return view('shop.show', compact('product','related'));
    }

    /**
     * เพิ่มสินค้าเข้าตะกร้า
     */
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $id   = $request->post('id');
        $qty  = max(1, (int)$request->post('qty', 1));
        $cart[$id] = ($cart[$id] ?? 0) + $qty;
        session(['cart' => $cart]);

        return back()->with('success','เพิ่มสินค้าแล้ว');
    }

    /**
     * ประวัติคำสั่งซื้อ
     */
    public function history()
    {
        $cart    = session()->get('cart', []);
        $all     = $this->products();
        $orders  = [];

        foreach ($cart as $id => $qty) {
            $p = $all->get($id);
            $orders[] = [
                'title' => $p['title'],
                'price' => $p['price'],
                'qty'   => $qty,
                'total' => $p['price'] * $qty,
            ];
        }

        return view('shop.history', compact('orders'));
    }


    protected function products()
    {
        return collect([
            
                 1 => [
                         'img' => 'img/books/book1.jpg',
                         'title' => "หนังสือวิทยาศาสตร์และเทคโนโลยี\nเล่ม 1 ม.3",
                         'price' => 110.0,
                         'size'=>'1.2 kg',
                         'category' => 'books',
                         'class' => 'book-item'],
          2 =>      [
                         'img' => 'img/books/book2.jpg',
                         'title' => " หนังสือกุญชาญาณ เพื่อส่งเสริม\nอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก",
                         'price' => 140.0,
                         'size'=>'1.2 kg',
                         'category' => 'books',
                         'class' => 'book-item'
                     ],
             3 =>   [
                         'img' => 'img/books/book3.jpg',
                         'title' => ' หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย',
                         'price' => 180.0,
                         'size'=>'1.2 kg',
                         'category' => 'books',
                         'class' => 'book-item'
                     ],
              4 =>       [
                         'img' => 'img/books/book4.jpg',
                         'title' => 'หนังสือเมฆน้อยสีเทา',
                         'price' => 100.0,
                         'size'=>'1.2 kg',
                         'category' => 'books',
                         'class' => 'book-item'
                     ],
              5 =>     [
                         'img' => 'img/books/book5.jpg',
                         'title' => ' หนังสือเราเป็นเพื่อนที่ต่อกัน',
                         'price' => 120.0,
                         'size'=>'1.2 kg',
                         'category' => 'books',
                         'class' => 'book-item'
                     ],
             6 =>       [
                         'img' => 'img/books/book6.jpg',
                         'title' => ' หนังสือพี่ชายที่แสนดี',
                         'price' => 110.0,
                         'size'=>'1.2 kg',
                         'category' => 'books',
                         'class' => 'book-item'
                     ],
              7 =>        [
                         'img' => 'img/science/1.jpg',
                         'title' => 'แก้วบีกเกอร์',
                         'price' => 250.0,
                         'size'=>'1.2 kg',
                         'category' => 'kits',
                         'class' => 'sci-item'
                     ],
              8 =>     [
                         'img' => 'img/science/2.jpg',
                         'title' => ' ขวดทดลอง',
                         'price' => 100.0,
                         'size'=>'1.2 kg',
                         'category' => 'kits',
                         'class' => 'sci-item'
                     ],
             9 =>     [
                         'img' => 'img/science/3.jpg',
                         'title' => ' หลอดทดลอง',
                         'price' => 475.0,
                         'size'=>'1.2 kg',
                         'category' => 'kits',
                         'class' => 'sci-item'
                     ],
             10 =>    [
                         'img' => 'img/science/4.jpg',
                         'title' => 'ถาดหลุม',
                         'price' => 50.0,
                         'size'=>'1.2 kg',
                         'category' => 'kits',
                         'class' => 'sci-item'
                     ],
            11 =>     [
                         'img' => 'img/science/5.jpg',
                         'title' => ' กรวยแก้ว',
                         'price' => 85.0,
                         'size'=>'1.2 kg',
                         'category' => 'kits',
                         'class' => 'sci-item'
                     ],
           12 =>      [
                         'img' => 'img/science/6.jpg',
                         'title' => 'ถ้วยแก้ว',
                         'price' => 70.0,
                         'size'=>'1.2 kg',
                         'category' => 'kits',
                         'class' => 'sci-item'
                     ],
               13 =>     [
                        'img' => 'img/chemistry/1.jpg',
                         'title' => 'Hydrochloric Acid (HCl)',
                         'price' => 65.0,
                         'size'=>'1.2 kg',
                         'category' => 'chemecals',
                         'class' => 'che-item'
                     ],
              14 =>    [
                         'img' => 'img/chemistry/2.jpg',
                         'title' => ' Sodium Hydroxide (NaOH)',
                         'price' => 80.0,
                         'size'=>'1.2 kg',
                         'category' => 'chemecals',
                         'class' => 'che-item'
                     ],
                  15 =>    [
                         'img' => 'img/chemistry/3.jpg',
                         'title' => ' sulfuric acid',
                         'price' => 80.0,
                         'size'=>'1.2 kg',
                         'category' => 'chemecals',
                         'class' => 'che-item'
                     ],
                  16 =>    [
                         'img' => 'img/chemistry/4.jpg',
                         'title' => 'สารละลายเมทิลเรด',
                         'price' => 75.0,
                         'size'=>'1.2 kg',
                         'category' => 'chemecals',
                         'class' => 'che-item'
                     ],
                 17 =>     [
                         'img' => 'img/chemistry/5.jpg',
                         'title' => 'สารละลายยูนิเวอร์ซัล',
                         'price' => 75.0,
                         'size'=>'1.2 kg',
                         'category' => 'chemecals',
                         'class' => 'che-item'
                     ],
                  18 =>    [
                         'img' => 'img/chemistry/6.jpg',
                         'title' => 'กรดไนตริก เจือจาง 2โมล',
                         'price' => 85.0,
                         'size'=>'1.2 kg',
                         'category' => 'chemecals',
                         'class' => 'che-item'
                     ],
                19 =>      [
                         'img' => 'img/drone/1.jpg',
                         'title' => 'โดรน GEN1',
                         'price' => 10000.0,
                         'size'=>'1.2 kg',
                         'category' => 'drone',
                         'class' => 'drone-item'
                     ],
               20 =>       [
                         'img' => 'img/drone/2.jpg',
                         'title' => ' โดรน GEN2',
                         'price' => 12000.0,
                         'size'=>'1.2 kg',
                         'category' => 'drone',
                         'class' => 'drone-item'
                     ],
              21 =>       [
                         'img' => 'img/drone/3.jpg',
                         'title' => ' โดรน GEN2 LT',
                         'price' => 15000.0,
                         'size'=>'1.2 kg',
                         'category' => 'drone',
                         'class' => 'drone-item'
                     ],
        ]);
    }

}


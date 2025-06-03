<?php
// app/Http/Controllers/ShopController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * แสดงรายการสินค้า (หน้าหลัก /products)
     */
    public function index()
    {
        $products = $this->products();
        return view('shop.index', compact('products'));
    }

    /**
     * แสดงรายละเอียดสินค้า (หน้า /products/{id})
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

        // สินค้าที่เกี่ยวข้อง 3–4 ชิ้น
        $related = $all
            ->filter(fn($p, $key) => $p['category'] === $product['category'] && $key !== $id)
            ->take(4);

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
        $qty   = $request->input('qty', 1);
        $size  = $request->input('size', null); 

        // สมมติให้มี original_price เพื่อแสดงราคาเดิมก่อนลด
        $original_price = $request->input('original_price', $price);

        // รูปสินค้า (ใช้ตามที่ส่งมา หรือ fallback default)
        $img = $request->input('img', 'img/default-product.jpg');

        // เก็บข้อมูลลง session
        $cart[$id] = [
            'title'          => $title,
            'price'          => $price,
            'qty'            => $qty,
            'size'           => $size,
            'original_price' => $original_price,
            'img'            => $img,
        ];

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

    // ========== ต่อไปเป็นฟังก์ชันเกี่ยวกับ Wishlist ==========

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
        $allProducts = $this->products();

        $items = collect($ids)
            ->map(fn($i) => 
                $allProducts->has($i)
                    ? array_merge($allProducts->get($i), ['id' => $i])
                    : null
            )
            ->filter()
            ->all();

        return view('wishlist.index', compact('items'));
    }

    // ========== เมทอด products() คงไว้เหมือนเดิม ==========

    /**
     * คืน Collection ของสินค้าทั้งหมด (key = id)
     */
    public function products()
    {
        return collect([
            1 => [
                'img'      => 'img/books/book1.jpg',
                'title'    => "หนังสือวิทยาศาสตร์และเทคโนโลยี\nเล่ม 1 ม.3",
                'price'    => 110.0,
                'size'     => '1.2 kg',
                'category' => 'books',
                'class'    => 'book-item',
            ],
            2 => [
                'img'      => 'img/books/book2.jpg',
                'title'    => "หนังสือกุญชาญาณ เพื่อส่งเสริม\nอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก",
                'price'    => 140.0,
                'size'     => '1.2 kg',
                'category' => 'books',
                'class'    => 'book-item',
            ],
            3 => [
                'img'      => 'img/books/book3.jpg',
                'title'    => 'หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย',
                'price'    => 180.0,
                'size'     => '1.2 kg',
                'category' => 'books',
                'class'    => 'book-item',
            ],
            4 => [
                'img'      => 'img/books/book4.jpg',
                'title'    => 'หนังสือเมฆน้อยสีเทา',
                'price'    => 100.0,
                'size'     => '1.2 kg',
                'category' => 'books',
                'class'    => 'book-item',
            ],
            5 => [
                'img'      => 'img/books/book5.jpg',
                'title'    => 'หนังสือเราเป็นเพื่อนที่ต่อกัน',
                'price'    => 120.0,
                'size'     => '1.2 kg',
                'category' => 'books',
                'class'    => 'book-item',
            ],
            6 => [
                'img'      => 'img/books/book6.jpg',
                'title'    => 'หนังสือพี่ชายที่แสนดี',
                'price'    => 110.0,
                'size'     => '1.2 kg',
                'category' => 'books',
                'class'    => 'book-item',
            ],
            7 => [
                'img'      => 'img/science/1.jpg',
                'title'    => 'แก้วบีกเกอร์',
                'price'    => 250.0,
                'size'     => '1.2 kg',
                'category' => 'kits',
                'class'    => 'sci-item',
            ],
            8 => [
                'img'      => 'img/science/2.jpg',
                'title'    => 'ขวดทดลอง',
                'price'    => 100.0,
                'size'     => '1.2 kg',
                'category' => 'kits',
                'class'    => 'sci-item',
            ],
            9 => [
                'img'      => 'img/science/3.jpg',
                'title'    => 'หลอดทดลอง',
                'price'    => 475.0,
                'size'     => '1.2 kg',
                'category' => 'kits',
                'class'    => 'sci-item',
            ],
            10 => [
                'img'      => 'img/science/4.jpg',
                'title'    => 'ถาดหลุม',
                'price'    => 50.0,
                'size'     => '1.2 kg',
                'category' => 'kits',
                'class'    => 'sci-item',
            ],
            11 => [
                'img'      => 'img/science/5.jpg',
                'title'    => 'กรวยแก้ว',
                'price'    => 85.0,
                'size'     => '1.2 kg',
                'category' => 'kits',
                'class'    => 'sci-item',
            ],
            12 => [
                'img'      => 'img/science/6.jpg',
                'title'    => 'ถ้วยแก้ว',
                'price'    => 70.0,
                'size'     => '1.2 kg',
                'category' => 'kits',
                'class'    => 'sci-item',
            ],
            13 => [
                'img'      => 'img/chemistry/1.jpg',
                'title'    => 'Hydrochloric Acid (HCl)',
                'price'    => 65.0,
                'size'     => '1.2 kg',
                'category' => 'chemecals',
                'class'    => 'che-item',
            ],
            14 => [
                'img'      => 'img/chemistry/2.jpg',
                'title'    => 'Sodium Hydroxide (NaOH)',
                'price'    => 80.0,
                'size'     => '1.2 kg',
                'category' => 'chemecals',
                'class'    => 'che-item',
            ],
            15 => [
                'img'      => 'img/chemistry/3.jpg',
                'title'    => 'Sulfuric Acid',
                'price'    => 80.0,
                'size'     => '1.2 kg',
                'category' => 'chemecals',
                'class'    => 'che-item',
            ],
            16 => [
                'img'      => 'img/chemistry/4.jpg',
                'title'    => 'สารละลายเมทิลเรด',
                'price'    => 75.0,
                'size'     => '1.2 kg',
                'category' => 'chemecals',
                'class'    => 'che-item',
            ],
            17 => [
                'img'      => 'img/chemistry/5.jpg',
                'title'    => 'สารละลายยูนิเวอร์ซัล',
                'price'    => 75.0,
                'size'     => '1.2 kg',
                'category' => 'chemecals',
                'class'    => 'che-item',
            ],
            18 => [
                'img'      => 'img/chemistry/6.jpg',
                'title'    => 'กรดไนตริก เจือจาง 2 โมล',
                'price'    => 85.0,
                'size'     => '1.2 kg',
                'category' => 'chemecals',
                'class'    => 'che-item',
            ],
            19 => [
                'img'      => 'img/drone/1.jpg',
                'title'    => 'โดรน GEN1',
                'price'    => 10000.0,
                'size'     => '1.2 kg',
                'category' => 'drone',
                'class'    => 'drone-item',
            ],
            20 => [
                'img'      => 'img/drone/2.jpg',
                'title'    => 'โดรน GEN2',
                'price'    => 12000.0,
                'size'     => '1.2 kg',
                'category' => 'drone',
                'class'    => 'drone-item',
            ],
            21 => [
                'img'      => 'img/drone/3.jpg',
                'title'    => 'โดรน GEN2 LT',
                'price'    => 15000.0,
                'size'     => '1.2 kg',
                'category' => 'drone',
                'class'    => 'drone-item',
            ],
        ]);
    }
}

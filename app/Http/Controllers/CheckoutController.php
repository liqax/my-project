<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\ShippingAddress;

class CheckoutController extends Controller
{
    // แสดงหน้า checkout
    public function show()
    {
        // ดึงข้อมูลจากตะกร้า (ตาม user ที่ล็อกอิน)
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        return view('checkout', compact('cartItems'));
    }

    // ประมวลผลการชำระเงิน
    public function process(Request $request)
    {
        // Validate ข้อมูล, คำนวณยอดรวม, สร้าง order, ล้าง cart
        // ตรงนี้สามารถเขียนต่อหรือ mock ก่อนก็ได้
        return redirect()->route('home')->with('success', 'ชำระเงินสำเร็จ');
    }

   public function checkout()
{
    $address = ShippingAddress::where('user_id', auth()->id())->latest()->first();

    $cart = session('cart', []); // ถ้ามีตะกร้า

    return view('checkout', compact('address', 'cart'));
}
}
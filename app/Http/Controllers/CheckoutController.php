<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShippingAddress; // สมมติว่าคุณมี Model สำหรับที่อยู่จัดส่ง

class CheckoutController extends Controller
{
    public function showCheckoutPage()
    {
        // ดึงที่อยู่จัดส่งของ user ที่ login อยู่
        $address = Auth::user()->shippingAddress; // สมมติว่า user มี one-to-one relationship กับ shippingAddress

        // คุณอาจจะต้องดึงข้อมูลตะกร้าสินค้าจาก session หรือ database อีกครั้ง
        // เพื่อให้หน้า checkout มีข้อมูลล่าสุด ในกรณีที่ผู้ใช้เปิดหน้า checkout โดยตรง
        // แต่ในตัวอย่างนี้ เราจะใช้ข้อมูลที่ส่งมาจาก localStorage ใน JavaScript

        return view('checkout', compact('address'));
    }
}
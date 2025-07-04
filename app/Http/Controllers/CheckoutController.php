<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * แสดงหน้าชำระเงิน
     */
    public function show()
    {
        // ดึงที่อยู่ล่าสุดของผู้ใช้
        $address = Auth::user()->shippingAddresses()->latest()->first();
        
        // ส่งข้อมูลที่อยู่ไปยัง View 'checkout'
        return view('checkout', ['address' => $address]);
    }
}
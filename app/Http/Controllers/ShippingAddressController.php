<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddress; // สร้าง Model นี้ขึ้นมา
use Auth;

class ShippingAddressController extends Controller
{
    // แสดงฟอร์มเพิ่ม/แก้ไขที่อยู่
    public function create()
    {
        $address = Auth::user()->shippingAddress()->first(); // ดึงที่อยู่หลักของผู้ใช้
        return view('shipping.create', compact('address')); // สมมติว่ามี view สำหรับเพิ่ม/แก้ไขที่อยู่โดยเฉพาะ
    }

    // บันทึกหรืออัปเดตที่อยู่
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'zipcode' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'sub_district' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:2',
            'company' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $address = $user->shippingAddress()->first(); // ดึงที่อยู่หลัก (ถ้ามี)

        if ($address) {
            $address->update($request->all());
            $message = 'ที่อยู่จัดส่งของคุณได้รับการอัปเดตเรียบร้อยแล้ว!';
        } else {
            $address = $user->shippingAddress()->create($request->all());
            $message = 'ที่อยู่จัดส่งของคุณถูกบันทึกเรียบร้อยแล้ว!';
        }

        // เมื่อบันทึกสำเร็จ Redirect กลับไปหน้า checkout พร้อมข้อมูล address และข้อความ success
        return redirect()->route('checkout.show')->with(['success' => $message, 'address' => $address]);
    }
}
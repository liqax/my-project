<?php
// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function saveAddress(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'zipcode' => 'required',
            'address' => 'required',
            'sub_district' => 'required',
            'district' => 'required',
            'province' => 'required',
            'country' => 'required',
        ]);

        ShippingAddress::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->company,
            'phone' => $request->phone,
            'zipcode' => $request->zipcode,
            'address' => $request->address,
            'sub_district' => $request->sub_district,
            'district' => $request->district,
            'province' => $request->province,
            'country' => $request->country,
        ]);

        return redirect()->back()->with('message', 'บันทึกที่อยู่เรียบร้อยแล้ว');
    }
}

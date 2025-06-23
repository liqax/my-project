<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;

class ShippingAddressController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'company' => 'nullable|string|max:150',
            'phone' => 'required|string|max:20',
            'zipcode' => 'required|string|max:10',
            'address' => 'required|string',
            'sub_district' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'country' => 'required|string|max:2',
        ]);

        ShippingAddress::create($validated);

        return redirect()->back()->with('success', 'บันทึกที่อยู่จัดส่งเรียบร้อยแล้ว');
    }
}

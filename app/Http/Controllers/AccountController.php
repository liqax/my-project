<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller{



public function showAccountPage()
{
    $user = Auth::user(); // ดึงข้อมูลผู้ใช้ที่ login
    return view('customer.account', compact('user')); // ส่ง $user ไปที่ view
}
}
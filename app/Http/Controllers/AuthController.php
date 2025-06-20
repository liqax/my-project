<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required',
            'gender' => 'required',
            'occupation' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'occupation' => $request->occupation,
        ]);

        Auth::login($user);
        return redirect()->back();
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->back();
        }

        return back()->withErrors(['email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

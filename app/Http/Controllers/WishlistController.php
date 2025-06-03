<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add(Request $request, $book)
    {
        session()->push('wishlist', $book);
        return back()->with('success', 'เพิ่มเข้ารายการโปรดแล้ว');
    }

    public function index()
    {
        $wishlist = session('wishlist', []);
        return view('wishlist.index', compact('wishlist'));
    }
}

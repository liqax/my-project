<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function bestSellers()
{
    $products = \App\Models\Product::where('is_best_seller', true)->take(6)->get();
    return view('components.best_sellers', compact('products'));
}

}

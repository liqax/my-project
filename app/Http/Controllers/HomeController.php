<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Slide;
use App\Models\BrandCarousel;
use App\Models\NewProduct;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {

        //bestsell
        $products = Product::where('is_best_seller', true)->take(6)->get();

        // 1) mainSlider
        $mainSlides = Slide::where('type','main')
                           ->orderBy('slide_index')
                           ->orderBy('position')
                           ->get();

        // 2) productCarousel แบ่งกลุ่ม slide_index
        $productSlides = Slide::where('type','product')
                              ->orderBy('slide_index')
                              ->orderBy('position')
                              ->get()
                              ->groupBy('slide_index');

        //3) Cate
        $categories = Category::orderBy('id')->get();
        //4) bestsell
        $brandSlides = BrandCarousel::orderBy('slide_index')
                                ->orderBy('position')
                                ->get()
                                ->groupBy('slide_index');

        //5)new prod
        $newProducts = NewProduct::latest()->take(6)->get();

        //6)product
        $books = Product::where('category', 'books')->get();
         $science = Product::where('category', 'kits')->get();
         $chemistry = Product::where('category', 'chemecals')->get();
        $drones = Product::where('category', 'drone')->get();
     
        


        return view('home', compact('mainSlides','productSlides','categories','brandSlides','newProducts','books', 'science', 'chemistry', 'drones','products'));
    }
}

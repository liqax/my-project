<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function terms()
    {
        return view('pages.terms'); 
    }

    public function policy()
    {
        return view('pages.policy'); 
    }

    public function faq()
    {
        return view('pages.faq'); 
    }
}
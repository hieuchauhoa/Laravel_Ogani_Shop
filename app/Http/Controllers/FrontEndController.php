<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('frontend.pages.index');
    }
    public function cart(){
        return view('frontend.pages.shop-cart');
    }
    public function product(){
        return view('frontend.pages.shop-product');
    }
    public function product_detail(){
        return view('frontend.pages.shop-product-detail');
    }
    public function contact(){
        return view('frontend.pages.shop-contact');
    }
}

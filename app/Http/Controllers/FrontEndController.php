<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('FrontEnd.pages.index');
    }
    public function cart(){
        return view('FrontEnd.pages.shop-cart');
    }
    public function product(){
        return view('FrontEnd.pages.shop-product');
    }
    public function product_detail(){
        return view('FrontEnd.pages.shop-product-detail');
    }
    public function contact(){
        return view('FrontEnd.pages.shop-contact');
    }
}
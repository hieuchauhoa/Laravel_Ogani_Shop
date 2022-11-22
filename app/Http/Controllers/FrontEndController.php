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
    public function product(Request $request){
        if($request->keyword)
        {
            return view('frontend.pages.shop-product',['keyWord'=>$request->keyword,'cateID'=>'']);
        }
        if($request->cateID)
        {
            return view('frontend.pages.shop-product',['keyWord'=>'','cateID'=>$request->cateID]);
        }
        return view('frontend.pages.shop-product',['keyWord'=>'','cateID'=>'']);

    }
    public function product_detail($idProduct){
        //$product=Product::find($idProduct);
        return view('frontend.pages.shop-product-detail',['productID'=>$idProduct]);
    }
    public function contact(){
        return view('frontend.pages.shop-contact');
    }
}

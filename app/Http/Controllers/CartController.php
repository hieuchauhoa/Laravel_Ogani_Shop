<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){
        $productid=$request->productid_hidden;
        $quantity=$request->qty;

        $product_infor = DB::table('products')->where('id',$productid)->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $product_infor->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_infor->name;
        $data['weight'] = $product_infor->price;
        if($product_infor->price_sale!=null){
            $data['price'] = $product_infor->price_sale;
        }
        else{
            $data['price'] = $product_infor->price;
        }
        $data['options']['image']= $product_infor->images;
        Cart::add($data);
        //Cart::destroy();
        return Redirect::to('showcart');
    }

    public function update_cart_qty(Request $request){
        $rowId=$request->rowId_cart;
        $quantity=$request->quantity_cart;
        // if($quantity==0){
        //     Cart::update($rowId,0);
        //     return Redirect::to('showcart');
        // }
        Cart::update($rowId, $quantity);
        return Redirect::to('showcart');
    }

    public function show_cart(){
        return view('frontend.pages.shop-cart');
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return view('frontend.pages.shop-cart');
    }
}

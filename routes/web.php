<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\Admin\CategoryProduct;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\OrderController;
use \App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserControllerFE;
use App\Http\Controllers\CartController;


#FE
Route::prefix('/')->group(function (){
    Route::get('',[FrontEndController::class,'index'])->name('index');
    Route::get('cart',[FrontEndController::class,'cart'])->name('cart');
    Route::get('product/{idcate?}/{keyword?}',[FrontEndController::class,'product'])->name('product');
    Route::prefix('product-detail')->group(function (){
        Route::get('{product_id}',[FrontEndController::class,'product_detail']);
       // Route::get('',[FrontEndController::class,'product_detail']);
    });
    Route::get('contact',[FrontEndController::class,'contact'])->name('contact');
    //cart
    Route::post('saveCart',[CartController::class,'save_cart']);
    Route::get('showcart',[CartController::class,'show_cart']);
    Route::get('delete-to-cart/{rowId}',[CartController::class,'delete_to_cart']);
    Route::post('updateQty',[CartController::class,'update_cart_qty']);

});
#Trí
Route::get('/profile',[ProfileController::class,'profile'])->name(("profile"));
Route::post('login',[UserControllerFE::class,'Login'])->name(('loginUser'));
Route::get('showlogin',[UserControllerFE::class,'showLogin'])->name(("showlogin"));
Route::post('register',[UserControllerFE::class,'register'])->name(('register'));
Route::get('showregister',[UserControllerFE::class,'showRegister'])->name(("ShowRegister"));
Route::get('logout',[UserControllerFE::class,'logout'])->name(("logout"));
Route::get('/home',[UserControllerFE::class,'Dashboard'])->middleware('isLoggedIn');



    ##Admin
    Route::get('/admin/login',[LoginController::class,'index'])->name('login');
    Route::post('/admin/admin_login',[LoginController::class, 'store']);

    Route::middleware('auth')->group(function (){
        Route::prefix('admin')->group(function (){
            Route::get('main', [MainController::class, 'index'])->name('admin');
            Route::get('home',[AdminController::class, 'index']);

            #Category
            Route::get('cate_add',[CategoryProduct::class, 'create']);
            Route::get('cate_list',[CategoryProduct::class, 'index']);
            Route::post('save_category',[CategoryProduct::class, 'store']);
            Route::DELETE('cate_destroy',[CategoryProduct::class, 'destroy']);
            Route::get('cate_edit/{category}',[CategoryProduct::class, 'show']);
            Route::post('cate_edit/{category}',[CategoryProduct::class, 'update']);


            #Product
            Route::get('product_add',[ProductController::class, 'create']);
            Route::get('product_list',[ProductController::class, 'index']);
            /*Route::post('/admin/save_product',[ProductController::class, 'save_category']);*/
            Route::post('save_product',[ProductController::class, 'store']);
            Route::get('product_edit/{product}',[ProductController::class, 'show']);
            Route::post('product_edit/{product}',[ProductController::class, 'update']);
            Route::DELETE('product_destroy',[ProductController::class, 'destroy']);


            #Upload
            Route::post('upload', [UploadController::class, 'store']);

            #Order
            Route::get('order_list',[OrderController::class, 'index']);
            /*Route::post('/admin/save_product',[ProductController::class, 'save_category']);*/
            Route::get('order_cancel',[OrderController::class, 'index']);
            Route::get('order_detail/{order}',[OrderController::class, 'show']);

            #User
            Route::get('user_add',[UserController::class, 'create']);
            Route::get('user_list',[UserController::class, 'index']);
            Route::post('save_user',[UserController::class, 'store']);
            Route::get('user_edit/{user}',[UserController::class, 'show']);
            Route::post('user_edit/{user}',[UserController::class, 'update']);
            Route::DELETE('user_destroy',[UserController::class, 'destroy']);

            #Slider
            Route::get('slider_add',[UserController::class, 'create']);
            Route::get('slider_list',[UserController::class, 'index']);
            Route::post('save_slider',[UserController::class, 'store']);
            Route::get('slider_edit/{slider}',[UserController::class, 'show']);
            Route::post('slider_edit/{slider}',[UserController::class, 'update']);
            Route::DELETE('slider_destroy',[UserController::class, 'destroy']);
        });
    });


    //Route::get('/admin/home',[AdminController::class, 'adminlayout']);

    //Route::get('/admin/dashboard',[AdminController::class,'showdashboard']);
    //Route::post('/admin/adminlayout',[AdminController::class, 'log_in']);

    //Route::get('/admin/adminlayout',[AdminController::class, 'adminlayout']);
    //Route::get('/admin/log_out',[AdminController::class, 'log_out']);

    /*Category Product*/






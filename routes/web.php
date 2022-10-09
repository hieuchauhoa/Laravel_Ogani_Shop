<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\Admin\CategoryProduct;
use \App\Http\Controllers\Admin\ProductController;


Route::get('/', function () {
    return view('welcome');
});

    Route::get('/admin/login',[LoginController::class,'index'])->name('login');
    Route::post('/admin/admin_login',[LoginController::class, 'store']);

    Route::middleware('auth')->group(function (){
        Route::prefix('admin')->group(function (){
            Route::get('main', [MainController::class, 'index'])->name('admin');
            Route::get('home',[AdminController::class, 'index']);
            Route::get('cate_add',[CategoryProduct::class, 'create']);
            Route::get('cate_list',[CategoryProduct::class, 'index']);
            Route::post('save_category',[CategoryProduct::class, 'store']);
            Route::DELETE('cate_destroy',[CategoryProduct::class, 'destroy']);
            Route::get('cate_edit/{category}',[CategoryProduct::class, 'show']);
            Route::post('cate_edit/{category}',[CategoryProduct::class, 'update']);


            /*Product*/
            //Route::get('/admin/product_add',[ProductController::class, 'create']);
            //Route::get('/admin/product_list',[ProductController::class, 'index']);
            /*Route::post('/admin/save_product',[ProductController::class, 'save_category']);*/
            //Route::post('/admin/save_product',[ProductController::class, 'store']);


            #Category
            Route::prefix('category')->group(function(){

            });

        });
    });


    Route::get('/admin/home',[AdminController::class, 'adminlayout']);

    //Route::get('/admin/dashboard',[AdminController::class,'showdashboard']);
    //Route::post('/admin/adminlayout',[AdminController::class, 'log_in']);

    //Route::get('/admin/adminlayout',[AdminController::class, 'adminlayout']);
    //Route::get('/admin/log_out',[AdminController::class, 'log_out']);

    /*Category Product*/






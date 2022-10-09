<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\Admin\CategoryProduct;
use \App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*Route for Admin*/
    Route::get('admin',[AdminController::class,'index']);
    Route::get('admin/login',[LoginController::class,'index'])->name('login');
    Route::post('admin/admin_login',[LoginController::class, 'store']);

    Route::middleware(['auth'])->group(function (){
        Route::get('admin/main', [MainController::class, 'index'])->name('admin');
        Route::get('admin',[MainController::class,'index']);
    });

    Route::get('/admin/home',[AdminController::class, 'adminlayout']);

    Route::get('/admin/dashboard',[AdminController::class,'showdashboard']);
    //Route::post('/admin/adminlayout',[AdminController::class, 'log_in']);

    Route::get('/admin/adminlayout',[AdminController::class, 'adminlayout']);
    Route::get('/admin/log_out',[AdminController::class, 'log_out']);

    /*Category Product*/
        Route::get('/admin/cate_add',[CategoryProduct::class, 'create']);
        Route::get('/admin/cate_list',[CategoryProduct::class, 'index']);
        /*Route::post('/admin/save_category',[CategoryProduct::class, 'save_category']);*/
        Route::post('/admin/save_category',[CategoryProduct::class, 'store']);
        Route::DELETE('/admin/cate_destroy',[CategoryProduct::class, 'destroy']);
        Route::get('/admin/cate_edit/{category}',[CategoryProduct::class, 'show']);
        Route::post('/admin/cate_edit/{category}',[CategoryProduct::class, 'update']);


    /*Product*/
        Route::get('/admin/product_add',[ProductController::class, 'create']);
        Route::get('/admin/product_list',[ProductController::class, 'index']);
        /*Route::post('/admin/save_product',[ProductController::class, 'save_category']);*/
        Route::post('/admin/save_product',[ProductController::class, 'store']);







?>



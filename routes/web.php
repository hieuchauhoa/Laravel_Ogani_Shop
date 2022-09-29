<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\Admin\CategoryProduct;

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
    Route::get('/admin',[AdminController::class,'showdashboard']);
    Route::get('/admin/login',[LoginController::class,'index']);
    Route::get('/admin/dashboard',[AdminController::class,'showdashboard']);
    Route::post('/admin/adminlayout',[AdminController::class, 'log_in']);
    Route::get('/admin/adminlayout',[AdminController::class, 'adminlayout']);
    Route::get('/admin/log_out',[AdminController::class, 'log_out']);

    /*Route for Category Product*/
        Route::get('/admin/cate_add',[CategoryProduct::class, 'add']);
        Route::get('/admin/cate_all',[CategoryProduct::class, 'all']);



    

?>



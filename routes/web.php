<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\AdminController;

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
Route::post('/admin/login/store',[LoginController::class,'store']);
Route::get('/admin/dashboard',[AdminController::class,'showdashboard']);
/*Route::get('/admin/dashboard', [MainController::class, 'index']) -> name('admin');*/



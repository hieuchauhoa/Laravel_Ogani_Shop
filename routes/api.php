<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\BannerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#FE
Route::get('product',[ProductController::class,'index'])->name('api.product');
Route::get('product-all',[ProductController::class,'index_all'])->name('api.productAll');
Route::get('product-last',[ProductController::class,'lastProduct'])->name('api.productLast');
Route::get('product-review',[ProductController::class,'reviewProduct'])->name('api.productReview');
//Route::get('product',[ProductController::class,'detail'])->name('api.productDetail');
Route::get('product-rate',[ProductController::class,'rateProduct'])->name('api.productRate');
Route::get('product-related',[ProductController::class,'relatedProduct'])->name('api.relatedProduct');
//Route::get('product/{id}',[ProductController::class,'detail'])->name('api.detail');
Route::get('category',[CategoryController::class,'index'])->name('api.category');
Route::get('banner',[BannerController::class,'index'])->name('api.banner');
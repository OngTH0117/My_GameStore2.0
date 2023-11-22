<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShippingController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('adminProducts',[ProductController::class,'index']);
Route::post('adminProduct',[ProductController::class,'store']);
Route::put('adminProduct/{id}',[ProductController::class,'update']);
Route::delete('adminProduct/{id}',[ProductController::class,'destroy']);
Route::get('adminShippingList',[ShippingController::class,'index']);
Route::post('adminShipping',[ShippingController::class,'store']);
Route::put('adminShipping/{id}',[ShippingController::class,'update']);


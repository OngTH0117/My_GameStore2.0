<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;


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
    return view('auth/login');
});
Route::get('/home', function () {
    return view('home');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class,'logout']);
Route::get('/adminHome', [AdminController::class,'index'])->middleware('can:isAdmin')->name('AdminController.index');
Route::get('/ToShipList', [AdminController::class,'toShip'])->middleware('can:isAdmin')->name('AdminController.toShip');
Route::get('/customerHome', [CustomerController::class,'index'])->middleware('can:isCustomer')->name("CustomerController.index");
Route::get('detail/{id}', [CustomerController::class,'detail']);
Route::get('search', [CustomerController::class,'search']);
Route::post('addCart', [CustomerController::class,'addCart']);
Route::get('cart', [CustomerController::class,'cartList']);
Route::get('removeCart/{id}', [CustomerController::class,'removeCart']);
Route::get('pcGames', [CustomerController::class,'pcGames']);
Route::get('psGames', [CustomerController::class,'psGames']);
Route::get('nintendoGames', [CustomerController::class,'nintendoGames']);
Route::post('placeOrder', [CustomerController::class,'placeOrder']);

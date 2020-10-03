<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\CartController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Site\CartController as SiteCartController;
use App\Http\Controllers\Site\HomeController as SiteHomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('test',function(){
    dd(session('cart'));
});

Route::group(['as'=>'site.'], function() {
    Route::get('/',[SiteHomeController::class,'index']);
    Route::get('/products/{id}',[SiteHomeController::class,'singlePage'])->name('singlePage');
    Route::get('add-to-cart/{id}',[SiteCartController::class,'addToCart'])->name('addToCart');
    Route::get('cart',[SiteCartController::class,'showCart'])->name('showCart');
    Route::post('cart',[SiteCartController::class,'cartStore'])->name('cartStore');
    Route::get('pay-page',[SiteCartController::class,'cartConfirmation'])->name('cartConfirmation');
    Route::get('decrease-cart-item-qty/{id}',[SiteCartController::class,'decreaseQty'])->name('decreaseQty');
});


Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::get('login',[LoginController::class,'loginForm'])->middleware('guest')->name('login');
Route::post('login',[LoginController::class,'login'])->name('loginPost');

Route::get('register',[LoginController::class,'registerForm'])->middleware('guest')->name('register');
Route::post('register',[LoginController::class,'registerPost'])->name('registerPost');


Route::group(['prefix' => 'dashboard','as'=>'dashboard.','middleware'=>'admin'], function() {
    Route::get('/',[HomeController::class,'statistics']);
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('carts', CartController::class);
    Route::post('cart-update-status',[CartController::class,'updateStatus']);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register',[AuthController::class, 'register']);
Route::post('post-register', [UserController::class, 'userRegistration'])->name('user.register');
Route::post('post-login',[UserController::class, 'userLogin'])->name('user.login');
Route::get('login',[AuthController::class, 'login'])->name('login');

Route::prefix('user')->group(function (){
Route::middleware('auth:user')->group(function(){
    Route::get('dashboard',[HomeController::class, 'index'])->name('dashboard');
    Route::get('orders',[HomeController::class, 'index'])->name('orders');
    Route::get('products',[HomeController::class, 'index'])->name('products');
    Route::get('daily_sales',[SaleController::class, 'index'])->name('daily-sales');
    Route::post('logout',[UserController::class, 'logout'])->name('user.logout');
    Route::get('shop_details',[HomeController::class,'shopDetails'])->name('user.shopDetails');
    Route::post('saveShopDetails',[HomeController::class, 'saveShopData'])->name('user.saveShopDetails');
    Route::post('saveDailySale',[SaleController::class, 'saveSales'])->name('user.saveDailySale');
});
});


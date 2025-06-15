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
    Route::get('dashboard',[HomeController::class, 'index'])->name('user.dashboard');
    Route::get('orders',[HomeController::class, 'index'])->name('user.orders');
    Route::get('products',[HomeController::class, 'index'])->name('user.products');
    Route::get('daily-sales',[SaleController::class, 'index'])->name('user.daily.sales');
    Route::post('logout',[UserController::class, 'logout'])->name('user.logout');
    Route::get('shop-details',[HomeController::class,'shopDetails'])->name('user.shop.details');
    Route::post('save-shop-details',[HomeController::class, 'saveShopData'])->name('user.save.shop.details');
    Route::post('save-daily-sale',[SaleController::class, 'saveSales'])->name('user.save.daily.sale');
    Route::get('profile',[HomeController::class, 'profile'])->name('user.profile');
    Route::get('add-branches',[HomeController::class,'branches'])->name('addBranches');
    Route::get('export-excel',[SaleController::class, 'exportToExcel'])->name('user.export.excel');
    Route::get('download-sample-excel',[SaleController::class, 'downloadSampleExcel'])->name('user.download.sample.excel');
    Route::post('save-export-data',[SaleController::class, 'saveExportToExcel'])->name('user.save.export.data');
   
});
});


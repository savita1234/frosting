<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\saleController;


Route::get('/products', function (){
    return response()->json('hello');
});
Route::post('/register',[UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::group([
    'middleware' => ['auth:sanctum']], function () {
        Route::get('/user_details', [UserController::class, 'userDetails']);
        Route::post('/shop_details',[ShopController::class, 'shopDetails']);
        Route::post('/daily_sale',[saleController::class, 'dailySale'] );
        Route::post('/daily_orders',[saleController::class, 'dailyOrder']);

    });


<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::name('v1.')->prefix('v1')->middleware(['jwt.verify'])->group(function () {
    // 3초에 1번까지만 호출
    Route::post('/token/create', [AuthController::class, 'tokenCreate'])->middleware(['throttle:1,0.05'])->name('token.create');

    // 1초에 최대 3번까지 호출
    Route::middleware(['throttle:3,1'])->group(function(){
        Route::post('/product/list', [ProductController::class, 'list'])->name('product.list');
    });
});
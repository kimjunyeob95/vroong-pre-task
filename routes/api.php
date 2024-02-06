<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SolutionController;
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

Route::name('v1.')->prefix('v1')->group(function () {
    Route::middleware(['jwt.verify','rateLimit'])->group(function () {
        // 3초 이내에 최대 1번까지 호출
        Route::post('/token/create', [AuthController::class, 'tokenCreate'])->name('token.create');

        // 0.3초 이내에 최대 1번까지 호출
        Route::post('/product/list', [ProductController::class, 'list'])->name('product.list');
    });

    Route::get('/how-to-lose-weight/{type}', [SolutionController::class, 'solutionDiet'])->name('solution.diet');
});
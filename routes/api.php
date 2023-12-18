<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

Route::prefix('v1')->group(function () {
    Route::get('/list', function(){
        $data = [
            "isSuccess" => true, 
            "msg" => "박영호 병신",
            "date" => Carbon::now(),
            "test" =>  bin2hex(openssl_random_pseudo_bytes(32)),
        ];
        return response()->json($data);
    })->name('api.product.list');
});
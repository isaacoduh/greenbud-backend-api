<?php

use App\Http\Controllers\API\v1\CategoryController;
use App\Http\Controllers\API\v1\OrderController;
use App\Http\Controllers\API\v1\ProductController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/categories', [CategoryController::class,'index']);
Route::get('/products', [ProductController::class,'index']);


Route::post('/orders',[OrderController::class,'placeOrder']);
Route::get('/orders',[OrderController::class,'index']);
Route::get('/orders/{id}',[OrderController::class,'getASingleOrder']);

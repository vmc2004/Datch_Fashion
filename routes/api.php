<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController as ApiUserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ProductController::class);
Route::get('/search-products', [ProductController::class, 'search']);
Route::get('order/{user_id}', [OrderController::class, 'order_user']);
Route::get('orders', [OrderController::class, 'index']);
Route::get('detailOrder/{order}', [OrderController::class,'show']);

Route::apiResource('users', ApiUserController::class);


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);  // GET giỏ hàng
    Route::post('/cart', [CartController::class, 'store']); // POST thêm sản phẩm vào giỏ
    Route::put('/cart/{cartItem}', [CartController::class, 'update']); // PUT cập nhật giỏ hàng
    Route::delete('/cart/{cartItem}', [CartController::class, 'destroy']); // DELETE xóa sản phẩm khỏi giỏ
});


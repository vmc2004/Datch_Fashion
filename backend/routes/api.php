<?php


use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\SizeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\OrderController;

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

Route::apiResource('colors', ColorController::class);
Route::apiResource('sizes', SizeController::class);
Route::apiResource('categories', CategoryController::class);

Route::apiResource('products', ProductController::class);

Route::get('/search-products', [ProductController::class, 'search']);

Route::get('order/{user_id}', [OrderController::class, 'order_user']);
Route::get('orders', [OrderController::class, 'index']);
Route::get('detailOrder/{order}', [OrderController::class, 'show']);

Route::apiResource('users', ApiUserController::class);

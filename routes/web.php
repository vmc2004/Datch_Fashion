<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::get('/account/orders/{user_id}', [OrderController::class, 'index']);
Route::get('/product/{slug}', [ProductController::class,'show']);  

Route::get('/cua-hang', function(){
    return view('Client.category.index');
});
// Route::get('/gio-hang', function(){
//     return view('Client.cart.index');
// });
// Route::middleware('auth')->group(function () {
//     Route::post('/gio-hang/add', [CartController::class, 'addToCart'])->name('cart.add');
//     Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
//     Route::post('/gio-hang/update', [CartController::class, 'update'])->name('cart.update');
//     Route::post('/gio-hang/remove', [CartController::class, 'remove'])->name('cart.remove');
// });
Route::post('/gio-hang/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/gio-hang', [CartController::class, 'showCart'])->name('cart.show');

Route::get('/tai-khoan', function(){
    return view('Client.account.profile');
});
Route::get('/account/orders', function(){
    return view('Client.order.index');
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('post-register', [AuthController::class, 'postRegister'])->name('postRegister');
// Hiển thị form yêu cầu reset password
Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
// Xử lý form yêu cầu reset password
Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->middleware('guest')->name('password.email');

// Hiển thị form nhập mật khẩu mới
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->middleware('guest')->name('password.reset');

// Xử lý form nhập mật khẩu mới
Route::post('reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.update');

//OTP
Route::get('/otp/confirm', [AuthController::class, 'showOtpConfirmationForm'])->name('otp.confirm');
Route::get('verify-otp', function () {
    return view('verifyOtp');
})->name('verifyOtpForm');
Route::post('verify-otp', [AuthController::class, 'verifyOtp'])->name('verifyOtp');


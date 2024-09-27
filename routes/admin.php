<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function(){
    // Route truy cập trang index của admin
    // Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/', function(){
            return view('Admin.home');
        });

    //Route dang ki, dang nhap
       Route::controller(AuthController::class)->group(function(){
           Route::get('register', 'register')->name('register');

       });

    // Đường dẫn danh mục sản phẩm
    Route::prefix('categories')->group(function(){
        Route::get('/', function(){
            return view('Admin.Categories.index');
        })->name('categories.index');
        // Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    //     Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    //     Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
    //     Route::get('/show/{category}', [CategoryController::class, 'show'])->name('categories.show');
    //     Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    //     Route::put('/edit/{category}', [CategoryController::class, 'update'])->name('categories.update');
    //     Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    // Kết thúc danh mục sản phẩm


    // Đường dẫn sản phẩm
    // Route::prefix('products')->group(function () {
    //     Route::get('/', [ProductController::class, 'index'])->name('products.index');
    //     Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    //     Route::post('/create', [ProductController::class, 'store'])->name('products.store');
    //     Route::get('/show/{product}', [ProductController::class, 'show'])->name('products.show');
    //     Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    //     Route::put('/edit/{product}', [ProductController::class, 'update'])->name('products.update');
    //     Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // });
    // Kết thúc sản phẩm

    // Đường dẫn order
        Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/create', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/show/{product}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('/edit/{product}', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/edit/{product}', [OrderController::class, 'update'])->name('orders.update');
        Route::delete('/destroy/{product}', [OrderController::class, 'destroy'])->name('orders.destroy');
    });
    // Kết thúc order


});


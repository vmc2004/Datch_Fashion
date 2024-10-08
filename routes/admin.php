<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;


Route::prefix('admin')->group(function(){
    // Route truy cập trang index của admin
    // Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/', function(){
            return view('Admin.home');
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
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/edit/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
    // Kết thúc sản phẩm

    // Đường dẫn thương hiệu
    Route::prefix('brands')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/create', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/show/{id}', [BrandController::class, 'show'])->name('brands.show');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
        Route::put('/edit/{id}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('/destroy/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
    });

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


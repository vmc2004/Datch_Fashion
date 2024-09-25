<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    // Route truy cập trang index của admin
    // Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/', function () {
        return view('Admin.home');
    });

    // Đường dẫn danh mục sản phẩm
    Route::prefix('categories')->group(function () {
        // Route::get('/', function(){
        //     return view('Admin.Categories.index');
        // })->name('categories.index');
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');  // Tìm kiếm
        Route::get('/categories/filter', [CategoryController::class, 'filter'])->name('categories.filter');  // Lọc và sắp xếp
        Route::patch('/categories/{id}/hide', [CategoryController::class, 'hide'])->name('categories.hide');  // Ẩn/Hiển thị  
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/edit/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        // Route::get('/show/{category}', [CategoryController::class, 'show'])->name('categories.show');
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


});

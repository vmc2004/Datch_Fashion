<?php


use App\Http\Controllers\AuthController;

use App\Http\Controllers\UserController;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    // Route truy cập trang index của admin
    // Route::get('/', [HomeController::class, 'index'])->name('index');
   Route::get('/', [HomeController::class, 'indexAdmin'])->name('admin.index');

    //Route dang ki, dang nhap
       Route::controller(AuthController::class)->group(function(){
           Route::get('register', 'register')->name('register');

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

    // Đường dẫn người dùng
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/edit/{user}', [UserController::class, 'update'])->name('users.update');
        Route::put('/{user}', [UserController::class, 'stateChange'])->name('users.stateChange');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    // Kết thúc người dùng
    // Đường dẫn order
        Route::prefix('orders')->group(function () {
        Route::get('/search/products', [OrderController::class, 'search'])->name('search.products');
        Route::get('/products/{id}', [OrderController::class, 'show_result']);
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/create', [OrderController::class, 'store'])->name('orders.store');
        Route::post('/add_product_order', [OrderController::class, 'add_product_order'])->name('orders.add_product_order');
        Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/update/{order}', [OrderController::class, 'update'])->name('orders.update');
        Route::delete('/destroy/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('/search', [OrderController::class, 'search_order'])->name('orders.search');
    });
    // Kết thúc order


});

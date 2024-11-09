<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\OrderController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\SizeController;

Route::prefix('admin')->group(function () {
    // Route truy cập trang index của admin
    // Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/', [HomeController::class, 'indexAdmin'])->name('admin.index');




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

    // Đường dẫn người dùng
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/search', [UserController::class, 'search'])->name('users.search');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/edit/{user}', [UserController::class, 'update'])->name('users.update');
        Route::put('/{user}', [UserController::class, 'stateChange'])->name('users.stateChange');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    // Kết thúc người dùng


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

    // Đường dẫn sản phẩm biến thể
    Route::prefix('product-variants')->group(function () {
        Route::get('/{id}', [ProductVariantController::class, 'index'])->name('productVariants.index');
        Route::get('/create/{id}', [ProductVariantController::class, 'create'])->name('productVariants.create');
        Route::post('/create', [ProductVariantController::class, 'store'])->name('productVariants.store');
        Route::get('/show/{id}', [ProductVariantController::class, 'show'])->name('productVariants.show');
        Route::get('/edit/{id}', [ProductVariantController::class, 'edit'])->name('productVariants.edit');
        Route::put('/edit/{id}', [ProductVariantController::class, 'update'])->name('productVariants.update');
        Route::delete('/destroy/{id}', [ProductVariantController::class, 'destroy'])->name('productVariants.destroy');
    });

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

    //Banner
    Route::prefix('banners')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('banners.index');
        Route::get('/create', [BannerController::class, 'create'])->name('banners.create');
        Route::post('/create', [BannerController::class, 'store'])->name('banners.store');
        Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('banners.edit');
        Route::put('/edit/{banner}', [BannerController::class, 'update'])->name('banners.update');
        Route::delete('/destroy/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
    });

    // Đường dẫn bài viết
    Route::prefix('blogs')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/create', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/edit/{blog}', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/update/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('/destroy/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    });
    // Đường dẫn thuộc tính màu sắc
    Route::prefix('colors')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('colors.index');
        Route::get('/create', [ColorController::class, 'create'])->name('colors.create');
        Route::post('/create', [ColorController::class, 'store'])->name('colors.store');
        Route::get('/edit/{color}', [ColorController::class, 'edit'])->name('colors.edit');
        Route::put('/update/{color}', [ColorController::class, 'update'])->name('colors.update');
        Route::delete('/destroy/{color}', [ColorController::class, 'destroy'])->name('colors.destroy');
    });
    // Đường dẫn thuộc tính kích thước
    Route::prefix('sizes')->group(function () {
        Route::get('/', [SizeController::class, 'index'])->name('sizes.index');
        Route::get('/create', [SizeController::class, 'create'])->name('sizes.create');
        Route::post('/create', [SizeController::class, 'store'])->name('sizes.store');
        Route::get('/edit/{size}', [SizeController::class, 'edit'])->name('sizes.edit');
        Route::put('/update/{size}', [SizeController::class, 'update'])->name('sizes.update');
        Route::delete('/destroy/{size}', [SizeController::class, 'destroy'])->name('sizes.destroy');
    });
});
// Đường dẫn mã giảm giá
Route::prefix('coupons')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('/create', [CouponController::class, 'create'])->name('coupons.create');
    Route::post('/create', [CouponController::class, 'store'])->name('coupons.store');
    Route::post('/send_coupon/{coupon}', [CouponController::class, 'send_coupon'])->name('coupons.send_coupon');
    Route::get('/edit/{coupon}', [CouponController::class, 'edit'])->name('coupons.edit');
    Route::put('/update/{coupon}', [CouponController::class, 'update'])->name('coupons.update');
    Route::delete('/destroy/{coupon}', [CouponController::class, 'destroy'])->name('coupons.destroy');
    Route::put('/{coupon}', [CouponController::class, 'stateChangeCoupon'])->name('coupons.stateChangeCoupon');
    Route::get('/search', [CouponController::class, 'search_coupon'])->name('coupons.search');
});
// Kết thúc mã giảm giá

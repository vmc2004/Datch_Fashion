<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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




Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('post-register', [AuthController::class, 'postRegister'])->name('postRegister');


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'checkAdmin']
], function(){
        //user
        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
        ], function(){
                Route::get('/', [UserController::class, 'index'])->name('users.index');
                Route::get('/create', [UserController::class, 'create'])->name('users.create');
                Route::post('/create', [UserController::class, 'store'])->name('users.store');
                Route::get('/show/{user}', [UserController::class, 'show'])->name('users.show');
                Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
                Route::put('/edit/{user}', [UserController::class, 'update'])->name('users.update');
                Route::put('/{user}', [UserController::class, 'stateChange'])->name('users.stateChange');
                Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
            });

        //categories
        Route::group([
            'prefix' => 'categories',
            'as' => 'categories.',
        ], function(){
            
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

        //orders
        Route::group([
            'prefix' => 'orders',
            'as' => 'orders.',
        ], function(){
            
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

        Route::group([
            'prefix' => 'banners',
            'as' => 'banners.',
        ], function(){
            Route::get('/', [BannerController::class, 'index'])->name('banners.index');
            Route::get('/create', [BannerController::class, 'create'])->name('banners.create');
            Route::post('/create', [BannerController::class, 'store'])->name('banners.store');
            Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('banners.edit');
            Route::put('/edit/{banner}', [BannerController::class, 'update'])->name('banners.update');
            Route::delete('/destroy/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');
        });

        
         Route::group([
            'prefix' => 'products',
            'as' => 'products.',
        ], function(){
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/edit/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
        
    });

///abc

Route::get('/', function () {
    return view('Welcome');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');

});
//user
Route::middleware(['auth', 'user-access:user'])->group(function(){
    Route::get('home', [HomeController::class, 'index'])->name('home');
});

// //admin
// Route::middleware(['auth', 'user-access:admin'])->group(function(){
//     Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
    
// });

});


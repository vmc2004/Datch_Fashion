<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;


use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\UserController as ClientUserController;




use App\Http\Controllers\Client\BlogController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\GoogleController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\NotificationController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\SaleController;
use App\Http\Controllers\Client\StoreController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController as ControllersOrderController;
use App\Http\Controllers\ProductVariantController;

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





Route::post('/product-variants/check-duplicate', [ProductVariantController::class, 'checkDuplicate'])->name('productVariants.checkDuplicate');
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/filter-products', [ProductController::class, 'filterByCategory'])->name('products.filter');
Route::get('/products/filter', [ProductController::class, 'getProducts']);
Route::get('/autocomplete', [ProductController::class, 'autocomplete'])->name('autocomplete');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/', [HomeController::class, 'index']);
Route::get('/account/orders', [OrderController::class,'index']);
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('client.product.show');
Route::get('/feedback', [HomeController::class,'feedback']);
Route::get('/cua-hang', [StoreController::class, 'index'])->name('Client.category.index');

Route::get('/sale', [SaleController::class, 'index'])->name('Client.sale.index');
Route::get('/sale/category/{category_id}', [SaleController::class, 'index'])->name('Client.sale.byCategory');

Route::post('/gio-hang/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/gio-hang', [CartController::class, 'showCart'])->name('cart.show');
Route::delete('/gio-hang/xoa/{item}', [CartController::class, 'removeItem'])->name('cart.removeItem');
Route::post('/gio-hang/sua/{itemId}', [CartController::class, 'updateQuantity']);
Route::post('/vnpay-payment', [CheckoutController::class, 'vnpay_payment'])->name('vnpay_payment');
Route::get('/vnpay/return', [CheckoutController::class, 'vnpayReturn']);
Route::get('/mua-hang/{user_id}', [CheckoutController::class, 'checkout']);
Route::post('/post_checkout', [CheckoutController::class, 'post_checkout'])->name('post_checkout');
Route::get('/thankyou/{order}', [CheckoutController::class, 'thankyou'])->name('thankyou');
Route::get('/account/orders/edit/{code}', [OrderController::class, 'edit'])->name('order.show');
Route::post('huy-don/{code}', [OrderController::class, 'huy']);
Route::get('/account/favorites',[HomeController::class, 'favorite']);
Route::post('/apply-coupon', [CheckoutController::class, 'apply'])->name('coupon.apply');
// web.php
Route::post('/clear-session', [CheckoutController::class, 'clearSession']);
Route::get('/order/{order}/update-status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');

Route::middleware('auth')->group(function () {

    // Route để hiển thị danh sách thông báo
    Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notifications.index');

    // Route để đánh dấu một thông báo là đã đọc
    Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

    

    // Route để đánh dấu tất cả thông báo là đã đọc
    Route::get('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');

    // Route để xóa một thông báo
    Route::delete('/notifications/{id}', [NotificationController::class, 'deleteNotification'])->name('notifications.delete');

    // Route để xóa tất cả thông báo
    Route::delete('/notifications/delete-all', [NotificationController::class, 'deleteAllNotifications'])->name('notifications.deleteAll');
});


Route::get('/cua-hang/danh-muc/{id}', [StoreController::class,'getById']);
Route::get('/cua-hang/thuong-hieu/{id}', [StoreController::class,'getByBrand']);

Route::get('/Client/bai-viet', [BlogController::class, 'index'])->name('client.blog');
Route::get('/bai-viet', [BlogController::class, 'index'])->name('client.blog');
Route::get('/bai-viet/{slug}', [BlogController::class, 'show'])->name('client.blog.show');

Route::get('/lien-he', [ContactController::class, 'contact'])->name('Client.contact');
Route::post('/lien-he', [ContactController::class, 'updateContact'])->name('Client.updateContact');


Route::get('/tai-khoan', [ClientUserController::class, 'profile'])->name('Client.account.profile');
Route::post('/tai-khoan', [ClientUserController::class, 'updateProfile']);

//USER
    
    Route::get('/Client/account/login', [ClientUserController::class, 'login'])->name('Client.account.login');
    Route::post('/Client/account/showLoginForm', [ClientUserController::class, 'showLoginForm'])->name('showLoginForm');
    Route::get('/Client/account/register', [ClientUserController::class, 'register'])->name('Client.account.register');
    Route::post('/Client/account/showRegisterForm', [ClientUserController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::get('/Client/account/forgot-password', [ClientUserController::class, 'showForgotPasswordForm'])->name('Client.account.forgot-password');
    Route::post('/Client/account/forgot-password', [ClientUserController::class, 'sendResetLinkEmail'])->name('Client.account.password.email');
    Route::get('/Client/account/reset-password/{token}', [ClientUserController::class, 'showResetPasswordForm'])->name('Client.account.reset-password');
    Route::post('/Client/account/reset-password', [ClientUserController::class, 'resetPassword'])->name('Client.account.password.update');
    // Route cho form nhập OTP
    Route::get('Client/otp/confirm', [ClientUserController::class, 'showOtpConfirmationForm'])->name('Client.otp.confirm');
    Route::get('Client/verify-otp', function () {
        return view('Client.verifyOtp');
    })->name('Client.verifyOtpForm');  
    Route::post('Client/verify-otp', [ClientUserController::class, 'verifyOtp'])->name('Client.verifyOtp');

    Route::get('/Client/home', [ClientUserController::class, 'homeClient'])->name('Client.home');
    Route::get('client/google', [GoogleController::class, 'redirectToGoogle'])->name('Client.google.login');
    Route::get('client/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('Client.google.callback');
    Route::get('/Client/account/logout', [ClientUserController::class, 'logout'])->name('Client.account.logout');
    


//ADMIN

    // Các route mà người dùng chưa đăng nhập có thể truy cập
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('post-register', [AuthController::class, 'postRegister'])->name('postRegister');
    // Hiển thị form yêu cầu reset password
    Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    // Xử lý form yêu cầu reset password
    Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    // Hiển thị form nhập mật khẩu mới
    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    // Xử lý form nhập mật khẩu mới
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

    // Các route yêu cầu quyền admin
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('google/login', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

    //OTP
    Route::get('/otp/confirm', [AuthController::class, 'showOtpConfirmationForm'])->name('otp.confirm');
    Route::get('verify-otp', function () {
        return view('verifyOtp');
    })->name('verifyOtpForm');
    Route::post('verify-otp', [AuthController::class, 'verifyOtp'])->name('verifyOtp');




Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'role:admin']
], function(){
    Route::get('/', [HomeController::class, 'indexAdmin'])->name('admin.index');
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



Route::get('/payment/return', [CheckoutController::class, 'handlePaymentReturn'])->name('payment.return');

Route::get('/Danh-gia/{variant_id}/{order_id}', [CommentController::class, 'form'])->name('rate.form');
Route::get('/Danh-gia-cua-toi', [CommentController::class, 'listRate'])->name('rate.list');
Route::post('/send-comment/{product_id}', [CommentController::class, 'sendComment'])->name('comments.sendComment');
Route::post('/send-rate/{product_id}', [CommentController::class, 'sendRate'])->name('comments.sendRate');




<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (request()->is('admin/*')) {
            Paginator::useBootstrapFive();
        } 
        // Kiểm tra nếu là client, sử dụng Tailwind
        elseif (request()->is('/*')) {
            Paginator::useTailwind();
        }
        $categories = Category::getCategoriesParentAndSub();
        view()->share('categories', $categories);

        View::composer('*', function ($view) {
        $cart = Cart::getCartByUser();
        $totalCart = $cart ? count($cart->items) : '';
        $view->with('totalCart', $totalCart);

        View::composer('*', function ($view) {
            // Kiểm tra nếu người dùng đã đăng nhập
            if (Auth::check()) {
                // Lấy số lượng thông báo chưa đọc của người dùng
                $unreadNotificationsCount = Auth::user()->unreadNotifications->count();

                // Chia sẻ biến này với tất cả các view
                $view->with('unreadNotificationsCount', $unreadNotificationsCount);
            }
        });
    });

    }
}

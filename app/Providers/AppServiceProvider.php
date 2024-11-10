<?php

namespace App\Providers;

use App\Models\Cart;
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
        Paginator::useBootstrapFive();
        $user_id = Auth::id();
        $cart = Cart::getCartByUser($user_id);
        // Kiểm tra nếu có giỏ hàng và có items trong giỏ
        $totalCart = $cart && $cart->items ? $cart->items->count() : 0;

        // Chia sẻ totalCart với tất cả các view
        view()->share('totalCart', $totalCart);
    }
}

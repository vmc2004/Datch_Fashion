<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
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
        $categories = Category::getCategoriesParentAndSub();
        view()->share('categories', $categories);

        View::composer('*', function ($view) {
        $cart = Cart::getCartByUser();
        $totalCart = $cart ? count($cart->items) : 0;
        $view->with('totalCart', $totalCart);
    });
    }
}

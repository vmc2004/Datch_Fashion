<?php

namespace App\Http\Controllers\Clinet;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::query()->limit(5)->get();
        $newPro = Product::query()->latest('id')->limit(5)->get();
        $Proview = Product::query()->Orderby('views')->limit(5)->get();
        return view('Client.home', compact('category', 'newPro', 'Proview'));
    }
    public function show($slug)
    {

        $product = Product::where('slug', $slug)
            ->with(['ProductVariants.size', 'ProductVariants.color']) // Nạp các quan hệ
            ->firstOrFail(); // Đảm bảo bạn nhận được một instance
        $colors = $product->ProductVariants->unique('color_id')->pluck('color');
        $sizes = $product->ProductVariants->unique('size_id')->pluck('size');
        $product->increment('views');
        return view('Client.product.show', compact('product','colors','sizes'));
    }
}

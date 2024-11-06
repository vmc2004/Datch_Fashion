<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        $category = Category::query()->limit(10)->get();
        $size = Size::query()->limit(10)->get();
        $color = Color::query()->limit(10)->get();
        return view('Client.category.index', compact('category','size','color','products'))->with('i' , (request()->input('page',1)-1)*6);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['ProductVariants.size', 'ProductVariants.color']) // Nạp các quan hệ
            ->firstOrFail(); // Đảm bảo bạn nhận được một instance
        $colors = $product->ProductVariants->unique('color_id')->pluck('color');
        $sizes = $product->ProductVariants->unique('size_id')->pluck('size');
        // $product->increment('views');
        $related_products = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4) // Giới hạn số lượng sản phẩm liên quan (tùy chỉnh theo ý muốn)
            ->get();

        $comments = Comment::query()->where('product_id',$product->id)->paginate('9');
        $avgRating = Comment::query()->where('product_id',$product->id)->avg('rating');
        return view('Client.product.show', [
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'related_products' => $related_products,
            'comments' => $comments,
            'avgRating' => $avgRating,
        ]);
}
}
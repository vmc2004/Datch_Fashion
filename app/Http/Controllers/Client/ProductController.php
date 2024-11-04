<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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

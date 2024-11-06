<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['ProductVariants.size', 'ProductVariants.color']) // Nạp các quan hệ
            ->firstOrFail(); // Đảm bảo bạn nhận được một instance
        $colors = $product->ProductVariants->unique('color_id')->pluck('color');
        $sizes = $product->ProductVariants->unique('size_id')->pluck('size');
        $product->increment('views');
        $related_products = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4) // Giới hạn số lượng sản phẩm liên quan (tùy chỉnh theo ý muốn)
            ->get();
        return view('Client.product.show', [
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'related_products' => $related_products
        ]);
    }
    public function autocomplete(Request $request)
    {
        $query = $request->input('query');

        // Lấy các sản phẩm có tên chứa từ khóa và giới hạn 5 kết quả gợi ý
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->take(5)
            ->get(['id', 'name']);

        // Trả về JSON chứa tên sản phẩm
        return response()->json($products);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm các sản phẩm phù hợp với từ khóa
        $products = Product::where('name', 'like', '%' . $query . '%')->get();
        $totalResults = $products->count(); // Đếm tổng số sản phẩm tìm thấy

        // Trả về view hiển thị kết quả tìm kiếm
        return view('search_results', compact('products', 'query', 'totalResults'));
    }
    public function getProducts(Request $request)
    {
        // Lọc và lấy sản phẩm kèm theo variants
        $products = Product::with('variants') // Eager load variants
            ->when($request->min_price, function ($query) use ($request) {
                return $query->whereHas('variants', function ($q) use ($request) {
                    $q->where('price', '>=', $request->min_price); // Lọc theo giá tối thiểu
                });
            })
            ->when($request->max_price, function ($query) use ($request) {
                return $query->whereHas('variants', function ($q) use ($request) {
                    $q->where('price', '<=', $request->max_price); // Lọc theo giá tối đa
                });
            })
            ->get();

        // Trả về sản phẩm dưới dạng JSON
        return response()->json($products);
    }


    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id'); // Đảm bảo tên cột khóa ngoại đúng
    }
}

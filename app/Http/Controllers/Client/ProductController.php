<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
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

        $comments = Comment::query()->where('product_id', $product->id)->paginate('9');
        $avgRating = Comment::query()->where('product_id', $product->id)->avg('rating');
        return view('Client.product.show', [
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'related_products' => $related_products,
            'comments' => $comments,
            'avgRating' => $avgRating,
            'productVariants' => $product->ProductVariants,
        ]);
    }
    public function autocomplete(Request $request)
    {
        $query = $request->input('query');

        // Lấy các sản phẩm có tên chứa từ khóa
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->take(5) // Giới hạn 5 kết quả gợi ý
            ->with('variants') // Đảm bảo lấy biến thể (variants) để truy xuất giá
            ->get();

        // Định dạng dữ liệu JSON với ảnh và giá (giả sử ảnh và giá lấy từ variants)
        $results = $products->map(function ($product) {
            // Kiểm tra nếu sản phẩm có ít nhất 1 biến thể và lấy giá từ biến thể đầu tiên
            $price = $product->variants->isNotEmpty() ? $product->variants->first()->price : 0;

            return [
                'id' => $product->id,
                'slug' => $product->slug, // Thêm slug để tạo liên kết chính xác
                'name' => $product->name,
                'image' => $product->image, // Giả sử bạn có cột `image` trong bảng products
                'price' => $price, // Lấy giá từ biến thể đầu tiên, nếu không có trả về 0
            ];
        });

        return response()->json($results);
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(5); // Phân trang với 5 sản phẩm mỗi trang
        $totalResults = $products->total(); // Tổng số kết quả tìm được

        return view('search_results', [
            'products' => $products,
            'totalResults' => $totalResults,
        ]);
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

    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        $products = Product::where('category_id', $categoryId)->with('variants')->get();

        return response()->json($products);
    }
    public function index()
    {
        $categories = Category::all(); // Giả sử bạn có model Category cho bảng danh mục
        return view('search_results', compact('categories'));
    }
}

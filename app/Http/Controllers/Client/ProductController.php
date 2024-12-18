<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['ProductVariants.size', 'ProductVariants.color'])
            ->firstOrFail();
        $colors = $product->ProductVariants->unique('color_id')->pluck('color');
        $sizes = $product->ProductVariants->unique('size_id')->pluck('size');
        $product->increment('views');
        $comments = Comment::query()->where('product_id', $product->id)->get();
        $related_products = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        $avgRating = Comment::query()->where('product_id', $product->id)->avg('rating');
        return view('Client.product.show', [
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'related_products' => $related_products,
            'avgRating' => $avgRating,
            'productVariants' => $product->ProductVariants,
            'comments' => $comments,
        ]);
    }
    public function autocomplete(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->take(5)
            ->with('variants')
            ->get();
        $results = $products->map(function ($product) {
            $price = $product->variants->isNotEmpty() ? $product->variants->first()->price : 0;

            return [
                'id' => $product->id,
                'slug' => $product->slug,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $price,
            ];
        });

        return response()->json($results);
    }


    public function search(Request $request)
    {
        $category = Category::query()->where('is_active', 1)->limit(10)->get();
        $sizes = Size::query()->limit(10)->get();
        $colors = Color::query()->limit(10)->get();
        $flow_type = $request->input('flow_type', 'default');
        $price_filter = $request->input('price', 'price_all');
        $min = $request->query('min', 0);
        $max = $request->query('max', 999999999);
        $color = $request->get('color');
        $size = $request->get('size');
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(5);
        $totalResults = $products->total();

        return view('Client.category.index', [
            'products' => $products,
            'totalResults' => $totalResults,
            'category' => $category,
            'sizes' => $sizes,
            'colors' => $colors,
            'flow_type' => $flow_type,
        ]);
    }
    public function getProducts(Request $request)
    {
        $products = Product::with('variants')
            ->when($request->min_price, function ($query) use ($request) {
                return $query->whereHas('variants', function ($q) use ($request) {
                    $q->where('price', '>=', $request->min_price);
                });
            })
            ->when($request->max_price, function ($query) use ($request) {
                return $query->whereHas('variants', function ($q) use ($request) {
                    $q->where('price', '<=', $request->max_price);
                });
            })
            ->get();
        return response()->json($products);
    }


    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }
    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        $products = Product::where('category_id', $categoryId)->with('variants')->get();

        return response()->json($products);
    }
    public function index()
    {
        $categories = Category::all();
        return view('search_results', compact('categories'));
    }
}

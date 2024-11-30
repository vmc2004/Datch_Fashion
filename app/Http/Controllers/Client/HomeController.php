<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $brands = Brand::query()->limit(5)->get();
        $newPro = Product::query()->latest('id')->limit(5)->get();
        $Proview = Product::query()->orderBy('views', 'desc')->limit(5)->get();
        $category = Category::all();

        // Kiểm tra lại việc truyền biến vào view
        return view('Client.home', compact('brands', 'category', 'newPro', 'Proview'));
    }
    public function feedback()
    {
        return view('Client.feedback');
    }

    public function fetchFavorites(Request $request)
    {
        $wishlist = $request->input('wishlist', []);

        if (empty($wishlist)) {
            return response()->json([
                'success' => false,
                'message' => 'Danh sách yêu thích trống.'
            ]);
        }

        $products = Product::whereIn('id', $wishlist)->get();

        // Render view danh sách yêu thích
        $html = view('partials.wishlist', compact('products'))->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }
}

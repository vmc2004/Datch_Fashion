<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\FavoriteProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $blogs = Blog::where('status', 1)->paginate(4);
        $banners = Banner::where('is_active', 1)->where('location', 1)->get();
        $brands = Brand::query()->limit(5)->get();
        $newPro = Product::query()->where('status', 1)->latest('id')->limit(10)->get();
        $Proview = Product::query()->where('status', 1)->orderBy('views', 'desc')->limit(10)->get();
        $category = Category::all();

        return view('Client.home', compact('brands', 'category', 'newPro', 'Proview', 'banners', 'blogs'));
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

        $html = view('partials.wishlist', compact('products'))->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }
    public function favorite(Request $request){
        $sort = $request->sort;
        $query = FavoriteProduct::query();
        $query->when($sort, function ($query) use ($sort) {
            switch ($sort) {
                case '-createdAt': 
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'createdAt':  
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'updatedAt': 
                    $query->orderBy('updated_at', 'desc');
                    break;
                case '-updatedAt': 
                    $query->orderBy('updated_at', 'asc');
                    break;
                case 'totalPrice':  
                    $query->join('product_items', 'product_items.product_id', '=', 'favourites.product_id')
                          ->orderBy('product_items.price', 'desc');
                    break;
                case '-totalPrice': 
                    $query->join('product_items', 'product_items.product_id', '=', 'favourites.product_id')
                          ->orderBy('product_items.price', 'asc');
                    break;
                default:
                    break;
            }
        });

        $favorites = $query->where('user_id', Auth::id())->get();

        return view('Client.product.favorite', [
            'favorites' => $favorites,
            'sort' => $sort,
        ]);
    }
}

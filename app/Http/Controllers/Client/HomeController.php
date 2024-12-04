<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
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
        $banners = Banner::where('is_active', 1)->where('location', 1)->get();
        $brands = Brand::query()->limit(5)->get();
        $newPro = Product::query()->where('is_active', 1)->latest('id')->limit(10)->get();
        $Proview = Product::query()->where('is_active', 1)->orderBy('views', 'desc')->limit(10)->get();
        $category = Category::all();

        // Kiểm tra lại việc truyền biến vào view
        return view('Client.home', compact('brands', 'category', 'newPro', 'Proview', 'banners'));
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
    public function favorite(Request $request){
        $sort = $request->sort;
        $query = FavoriteProduct::query();
        $query->when($sort, function ($query) use ($sort) {
            switch ($sort) {
                case '-createdAt':  // Được tạo gần đây
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'createdAt':  // Cũ nhất được tạo trước
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'updatedAt':  // Cập nhật gần đây
                    $query->orderBy('updated_at', 'desc');
                    break;
                case '-updatedAt':  // Cũ nhất cập nhật trước
                    $query->orderBy('updated_at', 'asc');
                    break;
                case 'totalPrice':  // Giá cao tới thấp
                    $query->join('product_items', 'product_items.product_id', '=', 'favourites.product_id')
                          ->orderBy('product_items.price', 'desc');
                    break;
                case '-totalPrice':  // Giá thấp tới cao
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

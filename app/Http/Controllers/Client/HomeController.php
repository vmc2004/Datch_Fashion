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
            $Proview = Product::query()->orderby('views')->limit(5)->get();
            $category = Category::all();
        
            // Kiểm tra lại việc truyền biến vào view
            return view('Client.home', compact('brands', 'category', 'newPro', 'Proview'));
        }
        
    
}

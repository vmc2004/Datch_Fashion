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
        return view('Client.category.index', [
            'products' => $products,
            'category' => $category,
            'size' => $size,
            'color' => $color,
        ])->with('i' , (request()->input('page',1)-1)*6);
    } 
}
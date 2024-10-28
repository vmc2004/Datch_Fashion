<?php

namespace App\Http\Controllers\Clinet;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $category = Category::query()->limit(5)->get();
        $newPro = Product::query()->latest('id')->limit(5)->get();
        $Proview = Product::query()->Orderby('views')->limit(5)->get();
        return view('Client.home', compact('category', 'newPro', 'Proview'));
    }
    public function show($slug)
    {
       $product = Product::query()->where('slug', $slug);
       $product->increment('views');
       return view('Client.product.show', compact('product'));
    }
    
    
}

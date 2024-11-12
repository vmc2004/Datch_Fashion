<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function getSaleProducts()
    {     
        $saleProducts = Product::whereHas('productVariants', function ($query) {
            $query->where('sale_price', '<', DB::raw('price'));
        })->with(['productVariants' => function ($query) {
            $query->where('sale_price', '<', DB::raw('price'));  
        }])->paginate(6);
        
        $category = Category::query()->limit(10)->get();
        $size = Size::query()->limit(10)->get();
        $color = Color::query()->limit(10)->get();
        return view('Client.sale.index', compact('saleProducts','category','size','color'))
        ->with('i' , (request()->input('page',1)-1)*6);
    }
}

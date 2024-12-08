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
    public function index(Request $request, $category_id = null)
{
    // Lấy danh mục
    $categories = Category::all();

    // Nếu người dùng chọn danh mục
    if ($category_id) {
        $saleProducts = Product::where('category_id', $category_id)
            ->whereHas('productVariants', function ($query) {
                $query->whereNotNull('price'); // Chỉ lấy sản phẩm đang giảm giá
            })
            ->paginate(9);
    } else {
        // Hiển thị tất cả sản phẩm giảm giá
        $saleProducts = Product::whereHas('productVariants', function ($query) {
            $query->whereNotNull('price');
        })->paginate(9);
    }

    return view('Client.sale.index', [
        'saleProducts' => $saleProducts,
        'category' => $categories
    ]);
}

    
}
    

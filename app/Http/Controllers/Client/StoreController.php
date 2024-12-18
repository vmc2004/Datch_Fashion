<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
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
        $query = Product::query();

        $query->when($min !== null && $max !== null, function ($query) use ($min, $max) {
            $query->whereHas('productVariants', function ($q) use ($min, $max) {
                $q->whereBetween('price', [$min, $max]);
            });
        });

        $query->when($color, function ($query) use ($color) {
            return $query->whereHas('productVariants', function ($q) use ($color) {
                $q->where('color_id', $color); 
            });
        });

        $query->when($size, function ($query) use ($size) {
            return $query->whereHas('productVariants', function ($q) use ($size) {
                $q->where('size_id', $size); 
            });
        });
        $query->when($flow_type == '-modifiedAt', function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->when($flow_type == 'priceMin', function ($query) {
            $query->with(['productVariants' => function($q) {
                $q->orderBy('price', 'asc'); // Sắp xếp các variants theo giá tăng dần
            }])
            ->orderBy(function ($query) {
                $query->select('price')
                      ->from('product_variants') // Thay 'productVariants' thành 'product_variants'
                      ->whereColumn('product_variants.product_id', 'products.id') // Cập nhật tên bảng
                      ->limit(1); // Đảm bảo lấy giá trị của price từ variants
            }, 'asc'); // Sắp xếp sản phẩm theo giá của variants
        })
        
       ->when($flow_type == '-priceMin', function ($query) {
            $query->with(['productVariants' => function($q) {
                $q->orderBy('price', 'desc'); // Sắp xếp các variants theo giá giảm dần
            }])
            ->orderBy(function ($query) {
                $query->select('price')
                    ->from('product_variants') // Thay 'productVariants' thành 'product_variants'
                    ->whereColumn('product_variants.product_id', 'products.id') // Cập nhật tên bảng
                    ->limit(1); // Đảm bảo lấy giá trị của price từ variants
            }, 'desc'); // Sắp xếp sản phẩm theo giá của variants giảm dần
        });

        $products = $query->where('is_active', 1)->paginate(9);
        
        return view('Client.category.index', [
            'products' => $products,
            'category' => $category,
            'sizes' => $sizes,
            'colors' => $colors,
            'flow_type' =>$flow_type,
        ]);
    } 
    public function getById(Request $request, $id)
{
    // Lấy danh mục cha và các danh mục con của nó
    $category = Category::with('sub')->find($id);

    // Lấy các danh mục con nếu đó là danh mục con được chọn
    if ($category->parent_id != null) {
        // Nếu chọn danh mục con, chỉ lấy sản phẩm thuộc danh mục đó
        $query = Product::query()
            ->where('category_id', $id)
            ->where('is_active', 1);
    } else {
        // Nếu chọn danh mục cha, lấy sản phẩm của tất cả các danh mục con liên kết với nó
        $query = Product::query()
            ->whereHas('category', function ($query) use ($id) {
                $query->where('parent_id', $id);
            })
            ->where('is_active', 1);
    }

    // Xử lý lọc theo size, color và khoảng giá
    $size = $request->get('size');
    $color = $request->get('color');
    $min = $request->query('min', 0);
    $max = $request->query('max', 999999999);

    // Lọc theo size
    if ($size) {
        $query->whereHas('productVariants', function ($q) use ($size) {
            $q->where('size_id', $size);
        });
    }

    // Lọc theo color
    if ($color) {
        $query->whereHas('productVariants', function ($q) use ($color) {
            $q->where('color_id', $color);
        });
    }

    // Lọc theo khoảng giá
    if ($min !== null && $max !== null) {
        $query->whereHas('productVariants', function ($q) use ($min, $max) {
            $q->whereBetween('price', [$min, $max]);
        });
    }

    // Xử lý sắp xếp sản phẩm theo `flow_type`
    $flow_type = $request->input('flow_type', 'default');

    $query->when($flow_type == '-modifiedAt', function ($query) {
        $query->orderBy('created_at', 'desc');
    })
    ->when($flow_type == 'priceMin', function ($query) {
        $query->with(['productVariants' => function($q) {
            $q->orderBy('price', 'asc');
        }])
        ->orderBy(function ($query) {
            $query->select('price')
                  ->from('product_variants')
                  ->whereColumn('product_variants.product_id', 'products.id')
                  ->limit(1);
        }, 'asc');
    })
    ->when($flow_type == '-priceMin', function ($query) {
        $query->with(['productVariants' => function($q) {
            $q->orderBy('price', 'desc');
        }])
        ->orderBy(function ($query) {
            $query->select('price')
                  ->from('product_variants')
                  ->whereColumn('product_variants.product_id', 'products.id')
                  ->limit(1);
        }, 'desc');
    });

    // Phân trang và lấy sản phẩm
    $products = $query->paginate(9);

    return view('Client.category.index', [
        'products' => $products,
        'category' => $category,
        'sizes' => Size::query()->limit(10)->get(),
        'colors' => Color::query()->limit(10)->get(),
        'flow_type' => $flow_type,
    ]);
}

    public function getByBrand(Request $request, $id)
    {
        $brand = Brand::all();
        $category = Category::query()->limit(10)->get();
        $sizes = Size::query()->limit(10)->get();
        $colors = Color::query()->limit(10)->get();
        $flow_type = request()->input('flow_type', 'default');
        $price_filter = $request->input('price', 'price_all');
        // Khởi tạo truy vấn cho sản phẩm
        $query = Product::query()->where('brand_id', $id);
    
        $query->when($price_filter == 'free', function ($query) {
            $query->whereHas('productItems', function ($q) {
                $q->where('price', 0);
            });
        })
        ->when($price_filter == 'price_under_100', function ($query) {
            $query->whereHas('productItems', function ($q) {
                $q->where('price', '<', 100000);
            });
        })
        ->when($price_filter == 'price_under_200', function ($query) {
            $query->whereHas('productItems', function ($q) {
                $q->whereBetween('price', [100000, 200000]);
            });
        })
        ->when($price_filter == 'price_under_500', function ($query) {
            $query->whereHas('productItems', function ($q) {
                $q->whereBetween('price', [200000, 500000]);
            });
        })
        ->when($price_filter == 'price_above_500', function ($query) {
            $query->whereHas('productItems', function ($q) {
                $q->where('price', '>', 500000);
            });
        });
        // Thêm điều kiện sắp xếp theo flow_type
        $query->when($flow_type == '-modifiedAt', function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->when($flow_type == 'priceMin', function ($query) {
            $query->with(['productVariants' => function($q) {
                $q->orderBy('price', 'asc'); // Sắp xếp các variants theo giá tăng dần
            }])
            ->orderBy(function ($query) {
                $query->select('price')
                    ->from('product_variants') // Thay 'productVariants' thành 'product_variants'
                    ->whereColumn('product_variants.product_id', 'products.id') // Cập nhật tên bảng
                    ->limit(1); // Đảm bảo lấy giá trị của price từ variants
            }, 'asc'); // Sắp xếp sản phẩm theo giá của variants
        })
        ->when($flow_type == '-priceMin', function ($query) {
            $query->with(['productVariants' => function($q) {
                $q->orderBy('price', 'desc'); // Sắp xếp các variants theo giá giảm dần
            }])
            ->orderBy(function ($query) {
                $query->select('price')
                    ->from('product_variants') // Thay 'productVariants' thành 'product_variants'
                    ->whereColumn('product_variants.product_id', 'products.id') // Cập nhật tên bảng
                    ->limit(1); // Đảm bảo lấy giá trị của price từ variants
            }, 'desc'); // Sắp xếp sản phẩm theo giá của variants giảm dần
        });
    
        // Phân trang và lấy sản phẩm
        $products = $query->where('is_active', 1)->paginate(9);
    
        return view('Client.category.index', [
            'products' => $products,
            'category' => $category,
            'sizes' => $sizes,
            'brand' => $brand,
            'colors' => $colors,
            'flow_type' => $flow_type,
        ]);
    }
    
}
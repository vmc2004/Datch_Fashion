<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(5);
        return view('Admin.Products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $brands = Brand::all();
        return view('Admin.Products.add', compact('categories', 'colors', 'sizes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Tạo slug từ tên sản phẩm
    $slug = Str::slug($request->name, '-');

    // Xử lý upload hình ảnh nếu có
    $imagePath = null;
    if ($request->hasFile('image')) {
        // Tạo tên tệp duy nhất cho ảnh
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        // Di chuyển tệp vào thư mục uploads
        $imagePath = $request->file('image')->move(public_path('uploads/products'), $imageName);
    }


    $product = Product::create([
        'code' => $request->code,
        'name' => $request->name,
        'slug' => $slug,
        'image' => 'uploads/products/' . $imageName, 
        'price' => $request->price,
        'description' => $request->description,
        'material' => $request->material,
        'status' => $request->status,
        'is_active' => $request->is_active,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
    ]);

    return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công');
}


    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('Admin.Products.edit', compact('product', 'categories', 'brands', 'sizes', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $request->validate([
            'code' => 'required|string|max:9|unique:products,code,' . $id,
            'name' => 'required|string|max:199',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'material' => 'nullable|string',
            'status' => 'required|boolean',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = Product::FindorFail($id);
        // Tạo slug từ tên sản phẩm
        $slug = Str::slug($request->name, '-');
        
        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image)); // Xóa ảnh cũ
            }

            // Lưu ảnh mới vào thư mục uploads/products và chỉ lưu đường dẫn tương đối
            $fileName = $request->file('image')->getClientOriginalName();
            $imagePath = 'uploads/products/' . $fileName; // Đường dẫn tương đối
            $request->file('image')->move(public_path('uploads/products'), $fileName);
        }


        // Tạo sản phẩm mới
        $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'description' => $request->description,
            'material' => $request->material,
            'status' => $request->status,
            'is_active' => $request->is_active,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::FindorFail($id);

        $product->delete();

        return redirect()->route('products.index');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Tìm kiếm dựa theo tất cả các trường
        $products = Product::query()
            ->with(['category', 'brand'])
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('code', 'like', '%' . $keyword . '%')
            ->orWhere('material', 'like', '%' . $keyword . '%')
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->orWhereHas('brand', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function filter(Request $request)
    {
        $query = Product::query();

        // Lọc theo trạng thái sản phẩm
        if ($request->has('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        // Sắp xếp theo tên sản phẩm
        if ($request->has('sort')) {
            if ($request->sort === 'az') {
                $query->orderBy('name', 'asc');
            } elseif ($request->sort === 'za') {
                $query->orderBy('name', 'desc');
            }
        }

        // Lấy danh sách sản phẩm (nếu không có tiêu chí lọc sẽ trả về tất cả)
        $products = $query->paginate(10);

        // Trả về view danh sách sản phẩm
        return view('admin.products.index', compact('products'));
    }
}

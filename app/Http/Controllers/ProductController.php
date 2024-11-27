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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(10);
        return view('Admin.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
            $imagePath = Storage::put('uploads/products', $request->file('image'));
        }

        // dd($request->all());

        // Tạo sản phẩm mới
        $product = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'price' => $request->price,
            'description' => $request->description,
            'material' => $request->material,
            'status' => $request->status,
            'is_active' => $request->is_active,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        return redirect()->route('products.index')->with('message', 'Thêm sản phẩm thành công');
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

        // Xử lý upload hình ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));  // Xóa ảnh cũ
            }
        
            // Lưu ảnh mới vào thư mục uploads/products trong thư mục public
            $imagePath = Storage::put('uploads/products', $request->file('image'));

           
        }

        // Tạo sản phẩm mới
        $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'price' => $request->price,
            'description' => $request->description,
            'material' => $request->material,
            'status' => $request->status,
            'is_active' => $request->is_active,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        return redirect()->route('products.index')->with('message', 'Cập nhật sản phẩm thành công');
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
}

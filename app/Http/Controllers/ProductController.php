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
        $request->validate([
            'code' => 'required|string|max:9|unique:products,code',
            'name' => 'required|string|max:199',
            'image' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'material' => 'nullable|string',
            'status' => 'required|boolean',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'color_id.*' => 'required|exists:colors,id',
            'size_id.*' => 'required|exists:sizes,id',
            'quantity.*' => 'required|integer|min:0',
            'images.*' => 'nullable|image|max:2048',
        ]);

        // Tạo slug từ tên sản phẩm
        $slug = Str::slug($request->name, '-');

        // Xử lý upload hình ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/products', 'public');
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




        for ($i = 0; $i < count($request['color_id']); $i++) {
            $variant = [
                'product_id' => $product->id,
                'color_id' => $request['color_id'][$i],
                'size_id' => $request['size_id'][$i],
                'quantity' => $request['quantity'][$i],
                'image' => $request['images'][$i]->store('uploads/products', 'public')
            ];
            ProductVariant::create($variant);
        }

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

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
            'price' => 'required|numeric|min:0',
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
            if ($product->image) {
                Storage::disk('public')->delete('image');
            }
            $imagePath = $request->file('image')->store('uploads/products', 'public');
        } else {
            $imagePath = $product->image;
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

        foreach ($request['color_id'] as $index => $color_id) {

            if (isset($request->images[$index])) {
                // Lưu ảnh tương ứng với từng biến thể
                $imagePath = $request->images[$index]->store('uploads/products/variants', 'public');
            } else {
                // Nếu không có ảnh mới, giữ nguyên ảnh cũ nếu đang ở chế độ chỉnh sửa
                $imagePath = $request->existing_images[$index] ?? null;
            }
            $data_variant = [
                'product_id' => $product->id,
                'color_id' => $color_id,
                'size_id' => $request['size_id'][$index],
                'quantity' => $request['quantity'][$index],
                // 'image' => $imagePath
            ];
        }
        // dd($data_variant);
        $find_variant = ProductVariant::query()
            ->where('product_id', $product->id)
            ->where('color_id', $color_id)
            ->where('size_id', $request['size_id'][$index])
            ->first();

        // dd($find_variant);

        if ($find_variant) {
            $find_variant->update($data_variant);
        } else {
            // 
            dd('Không update đc');
        }
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
}

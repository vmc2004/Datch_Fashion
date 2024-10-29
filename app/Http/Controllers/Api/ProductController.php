<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(10);
        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
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
            'status' => 'required|boolean',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $slug = Str::slug($request->name, '-');
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = Storage::put('uploads/products', $request->file('image'));
        }

        $product = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'is_active' => $request->is_active,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        return response()->json([
            'success' => true,
            'data' => $product,
            'message' => 'Product created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code' => 'required|string|max:9|unique:products,code,' . $id,
            'name' => 'required|string|max:199',
            'image' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = Product::findOrFail($id);
        $slug = Str::slug($request->name, '-');

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('uploads/products', 'public');
        }

        $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'is_active' => $request->is_active,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        return response()->json([
            'success' => true,
            'data' => $product,
            'message' => 'Product updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
        ]);
    }

    
}

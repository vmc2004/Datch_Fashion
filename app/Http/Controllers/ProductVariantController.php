<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductVariantRequest;
use App\Http\Requests\UpdateProductVariantRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $productVariants = ProductVariant::query()->with('product', 'size', 'color')->where('product_id', $id)->paginate(8);
        return view('Admin.ProductVariants.index', compact('productVariants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $product = Product::find($id);
        $colors = Color::query()->get();
        $sizes = Size::query()->get();
        return view('Admin.ProductVariants.add', compact('colors', 'sizes', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductVariantRequest $request, Product $product)
    {
        // dd($request->all());
        $productVariant = $request->except('image');
        if ($request->hasFile('image')) {
            // Lưu ảnh vào thư mục public/uploads/variants
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/variants'), $imageName);
            $productVariant['image'] = 'uploads/variants/' . $imageName;
        }
        ProductVariant::query()->create($productVariant);
        return redirect()->route('products.index')->with('message', 'Thêm biến thể thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductVariant $productVariant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productVariant = ProductVariant::query()->find($id);
        $colors = Color::query()->get();
        $sizes = Size::query()->get();
        return view('Admin.ProductVariants.edit', compact('productVariant', 'colors', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductVariantRequest $request, $id)
    {
        $productVariant = ProductVariant::query()->find($id);
        $id = $productVariant->product_id;
        $dataVariant = $request->except('image');
        if ($request->hasFile('image')) {
            // Lưu ảnh mới vào thư mục public/uploads/variants
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/variants'), $imageName);
            $dataVariant['image'] = 'uploads/variants/' . $imageName;

            // Xóa ảnh cũ nếu có
            if ($productVariant->image && file_exists(public_path($productVariant->image))) {
                unlink(public_path($productVariant->image));
            }
        }
        if ($request->hasFile('image')) {
            // Lưu ảnh mới vào thư mục public/uploads/variants
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/variants'), $imageName);
            $dataVariant['image'] = 'uploads/variants/' . $imageName;

            // Xóa ảnh cũ nếu có
            if ($productVariant->image && file_exists(public_path($productVariant->image))) {
                unlink(public_path($productVariant->image));
            }
        }
        return redirect()->route('productVariants.index', ['id' => $id])->with('message', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductVariant $productVariant)
    {
        //
    }

    public function checkDuplicate(Request $request)
    {
        $product_id = $request->product_id;
        $color_id = $request->color_id;
        $size_id = $request->size_id;

        $exists = ProductVariant::where('product_id', $product_id)
            ->where('color_id', $color_id)
            ->where('size_id', $size_id)
            ->exists();

        return response()->json(['exists' => $exists]);
    }
}

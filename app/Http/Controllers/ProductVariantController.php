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
        $productVariants = ProductVariant::query()->with('product','size','color')->where('product_id',$id)->paginate(8);
        return view('Admin.ProductVariants.index',compact('productVariants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $product = Product::find($id);
        $colors = Color::query()->get();
        $sizes = Size::query()->get();
        return view('Admin.ProductVariants.add', compact('colors','sizes','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $exists = ProductVariant::where('product_id', $request->product_id)
            ->where('color_id', $request->color_id)
            ->where('size_id', $request->size_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['duplicate' => 'Biến thể sản phẩm này đã tồn tại!'])->withInput();
        }

        // Lưu biến thể nếu không trùng
        ProductVariant::create($request->all());

        return redirect()->route('productVariants.index', $request->product_id)
            ->with('success', 'Thêm biến thể sản phẩm thành công!');
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
        return view('Admin.ProductVariants.edit',compact('productVariant','colors','sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
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
            return redirect()->route('productVariants.index',['id'=>$id])->with('message','cập nhật thành công');
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

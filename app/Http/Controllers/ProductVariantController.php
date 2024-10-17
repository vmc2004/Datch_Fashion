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
    public function store(StoreProductVariantRequest $request,Product $product)
    {
        // dd($request->all());
        $productVariant = $request->except('image');
        if ($request->hasFile('image')) {
            $productVariant['image'] = Storage::put('uploads/products',$request->file('image'));
        }
        ProductVariant::query()->create($productVariant); 
        return redirect()->route('products.index')->with('message','Thêm biến thể thành công');
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
    public function update(UpdateProductVariantRequest $request,$id)
    {
        $productVariant = ProductVariant::query()->find($id);
        $id = $productVariant->product_id;
        $dataVariant = $request->except('image');
        if ($request->hasFile('image')) {
            $dataVariant['image'] = Storage::put('uploads', $request->file('image'));
        }
        $oldImage = $request->has('image');
        $productVariant->update($dataVariant);
            if ($request->hasFile('image')&&Storage::exists($oldImage)) {
                Storage::delete($oldImage);
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
}

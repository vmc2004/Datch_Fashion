<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view("Admin.Brands.index", compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'logo' => 'required|image|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            // Lưu logo vào thư mục public/uploads/brands
            $logoFile = $request->file('logo');
            $logoPath = 'uploads/brands/' . time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('uploads/brands'), $logoPath);
        }
        $brand = Brand::create([
            'name' => $request->name,
            'logo' => $logoPath
        ]);

        return redirect()->route('brands.index')->with('success', 'Thêm mới thương hiệu thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand, $id)
    {
        $brand = Brand::FindorFail($id);
        return view('Admin.Brands.edit', compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand, $id)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'logo' => 'required|image|max:2048',
        ]);

        $brand = Brand::FindorFail($id);

        $logoPath = $brand->logo;
        if ($request->hasFile('logo')) {
            // Xóa logo cũ nếu có
            if ($brand->logo && file_exists(public_path('uploads/brands/' . $brand->logo))) {
                unlink(public_path('uploads/brands/' . $brand->logo)); // Xóa ảnh cũ
            }
    
            // Lưu logo mới vào thư mục public/uploads/brands
            $logoFile = $request->file('logo');
            $logoPath = 'uploads/brands/' . time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('uploads/brands'), $logoPath);
        }
        // dd($logoPath);

        $brand->update([
            'name' => $request->name,
            'logo' => $logoPath
        ]);
        // dd($brand);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand, $id)
    {
        $brand = Brand::FindorFail($id);

        $brand->delete();

        return redirect()->route('brands.index');

    }
}

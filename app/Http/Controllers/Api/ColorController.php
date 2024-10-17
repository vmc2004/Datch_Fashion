<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; 
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::query()->latest('id')->paginate(10);
        return response()->json($colors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:colors|max:255',
            'color_code' => 'required'
        ]);

        $color = Color::create($validated);
        return response()->json([
            'message' => 'Tạo màu thành công',
            'color' => $color
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return response()->json($color);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $validated = $request->validate([
            'name' => 'required|unique:colors,name,' . $color->id . '|max:255', // Fix logic cho unique
            'color_code' => 'required'
        ]);

        $color->update($validated);
        return response()->json([
            'message' => 'Cập nhật màu thành công',
            'color' => $color
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return response()->json([
            'message' => 'Xóa màu thành công'
        ]);
    }
}

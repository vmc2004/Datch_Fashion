<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::query()->latest('id')->paginate(10);
        return response()->json($sizes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:sizes|max:25',
        ]);

        $size = Size::query()->create($validated);
        return response()->json([
            'message' => 'Thêm mới thành công',
            'size' => $size
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        return response()->json($size);
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function update(Request $request, Size $size)
    {
        $validated = $request->validate([
            'name' => 'required|unique:sizes|max:25',
        ]);

        $size->update($validated);
        return response()->json([
            'message' => 'Thêm mới thành công',
            'size' => $size
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return response()->json([
            'message' => 'Xóa thành công'
        ]);
    }
}

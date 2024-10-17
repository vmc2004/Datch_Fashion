<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy các danh mục cha (parent_id = null) và load các danh mục con
        $categories = Category::whereNull('parent_id')->with('children')->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }

    /**
     * Search for categories.
     */
    public function search(Request $request)
    {
        $categories = Category::where('name', 'like', '%' . $request->input('name') . '%')->with('children')->paginate(10);
        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }

    /**
     * Filter categories.
     */
    public function filter(Request $request)
    {
        $query = Category::query();

        // Lọc theo trạng thái
        if ($request->has('is_active')) {
            $query->where('is_active', $request->input('is_active'));
        }

        // Sắp xếp theo A-Z hoặc Z-A
        if ($request->has('sort')) {
            $query->orderBy('name', $request->input('sort') == 'az' ? 'asc' : 'desc');
        }

        $categories = $query->whereNull('parent_id')->with('children')->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'image' => 'nullable|image',
            'is_active' => 'boolean',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Lưu hình ảnh
            $pathFile = $request->file('image')->store('images/categories');
            $data['image'] = 'storage/' . $pathFile;
        }

        $category = Category::create($data);

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'Danh mục đã được tạo thành công.'
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Lấy danh sách các danh mục cha (trừ chính nó và các con của nó)
        $categories = Category::whereNull('parent_id')->where('id', '!=', $category->id)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'category' => $category,
                'categories' => $categories
            ]
        ], 200);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'image' => 'nullable|image',
            'is_active' => 'boolean',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Lưu ảnh mới
            $pathFile = $request->file('image')->store('images/categories');
            $data['image'] = 'storage/' . $pathFile;

            // Xóa ảnh cũ nếu tồn tại
            if ($category->image && Storage::exists(str_replace('storage/', '', $category->image))) {
                Storage::delete(str_replace('storage/', '', $category->image));
            }
        }

        $category->update($data);

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'Danh mục đã được cập nhật thành công.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Xóa danh mục
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Danh mục đã được xóa thành công.'
        ], 200);
    }

    /**
     * Hide or show the specified category.
     */
    public function hide($id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = !$category->is_active;
        $category->save();

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'Trạng thái danh mục đã được thay đổi.'
        ], 200);
    }
}

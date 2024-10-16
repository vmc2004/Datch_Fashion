<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy các danh mục cha (parent_id = null) và load các danh mục con
        $categories = Category::whereNull('parent_id')->with('children')->paginate(10);

        return view('Admin.Categories.index', compact('categories'));
    }

    /**
     * Search for categories.
     */
    public function search(Request $request)
    {
        $categories = Category::where('name', 'like', '%' . $request->input('name') . '%')->with('children')->paginate(10);
        return view('Admin.Categories.index', compact('categories'));
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

        return view('Admin.Categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lấy tất cả các danh mục (kể cả danh mục cha và con)
        $categories = Category::with('children')->get();
        return view('Admin.Categories.create', compact('categories'));
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

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Lấy tất cả các danh mục (kể cả danh mục cha và con)
        $categories = Category::with('children')->get();

        return view('Admin.Categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255' . $category->id,
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

        return redirect()->back()->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Xóa danh mục
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được xóa thành công.');
    }

    /**
     * Hide or show the specified category.
     */
    public function hide($id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = !$category->is_active;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Trạng thái danh mục đã được thay đổi.');
    }
}

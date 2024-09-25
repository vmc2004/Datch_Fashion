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
        $query = Category::query();

        // Phân trang 10 danh mục mỗi trang
        $categories = $query->paginate(10);

        return view('Admin.Categories.index', compact('categories'));
    }

    public function search(Request $request){
        $categories = Category::where('name', 'like', '%' . $request->input('name') . '%')->paginate(10);
        return view('Admin.Categories.index', compact('categories'));
    }

    public function filter(Request $request)
    {
        $query = Category::query();

        // Lọc theo trạng thái
        if ($request->has('is_active')) {
            $query->where('is_active', $request->input('is_active'));
        }

        // Sắp xếp theo thứ tự A-Z hoặc Z-A
        if ($request->has('sort')) {
            $query->orderBy('name', $request->input('sort') == 'az' ? 'asc' : 'desc');
        }

        $categories = $query->paginate(10);
        return view('Admin.Categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'image' => 'nullable|image',
            'is_active' => 'boolean'
        ]);

        $category = new Category($validated);

        $data = $request->except('image');

        // Kiểm tra xem có file hình ảnh được upload hay không
        if ($request->hasFile('image')) {
            // Lưu file vào thư mục 'images/categories' và lấy đường dẫn
            $pathFile = $request->file('image')->store('images/categories');
            $data['image'] = 'storage/' . $pathFile;
        }

        Category::query()->create($data);

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Admin.Categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate đầu vào
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id, // Kiểm tra trùng tên ngoại trừ danh mục hiện tại
            'image' => 'nullable|image',
            'is_active' => 'boolean'
        ]);

        // Lấy dữ liệu trừ image
        $data = $request->except('image');

        // Xử lý việc lưu ảnh nếu có file được upload
        if ($request->hasFile('image')) {
            // Lưu ảnh mới
            $pathFile = $request->file('image')->store('images/categories');
            $data['image'] = 'storage/' . $pathFile;

            // Xóa ảnh cũ nếu tồn tại
            if ($category->image && Storage::exists(str_replace('storage/', '', $category->image))) {
                Storage::delete(str_replace('storage/', '', $category->image));
            }
        }

        // Cập nhật danh mục với dữ liệu đã validate
        $category->update($data);

        return redirect()->back()->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Danh mục đã được xóa thành công.');
    }

    public function hide($id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = !$category->is_active;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Trạng thái danh mục đã được thay đổi.');
    }

    
}

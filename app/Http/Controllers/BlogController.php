<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::query()->latest('id')->paginate(10);
        return view('Admin.Blogs.index',compact('blogs'));
    }

    public function __construct()
{
    $this->middleware('auth');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->with(['children' => function ($query) {
                $query->with('children'); // Eager load các danh mục con của danh mục con
            }])
            ->get();
        return view('Admin.Blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->except('image');
        $data['user_id'] = Auth::user()->id;
        if ($request->hasFile('image')) {
            // Lưu hình ảnh vào thư mục uploads/blogs bằng phương thức move
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Tạo tên file duy nhất
            $file->move(public_path('uploads/blogs'), $fileName);
            
            $data['image'] = 'uploads/blogs/' . $fileName;
        }
        Blog::create($data);
        return redirect()->route('blogs.index')->with('success', 'Bài viết đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::whereNull('parent_id')
            ->with(['children' => function ($query) {
                $query->with('children'); // Eager load các danh mục con của danh mục con
            }])
            ->get();
        return view('Admin.Blogs.edit',compact('categories','blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->except('image');
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('image')) {
            // Tạo tên file duy nhất cho ảnh mới
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Di chuyển ảnh mới vào thư mục public/uploads/blogs
            $file->move(public_path('uploads/blogs'), $fileName);
            $data['image'] = 'uploads/blogs/' . $fileName;
    
            // Xóa ảnh cũ nếu tồn tại
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
        }

        $blog -> update($data);
        return redirect()->back()->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Bài viết đã được xóa thành công.');
    }
}

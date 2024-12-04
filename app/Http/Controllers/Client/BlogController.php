<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status',1)->paginate(3);
        return view('Client.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->firstOrFail();

        $related_blog = Blog::where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->take(3) // Giới hạn số lượng sản phẩm liên quan (tùy chỉnh theo ý muốn)
            ->get();

        return view('Client.blog.show', compact('blog','related_blog'));
    }
}

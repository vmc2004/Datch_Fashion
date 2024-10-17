<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::paginate(8);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|unique:banners|max:255',
            'image' => 'nullable|image',
            'description' => 'required|unique:banners|max:255'
        ]);

        $banner = new Banner($validated);

        $data = $request->except('image');
        if ($request->hasFile('image')){
            $path_image = $request->file('image')->store('images/banners');
            $data['image'] = $path_image;
        }

        Banner::query()->create($data);
        return redirect()->route('banners.index')->with('message', 'Thêm mới banner thành công');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner){
        // Validate dữ liệu, bỏ qua unique cho banner hiện tại
        $validated = $request->validate([
            'title' => 'required|max:255|unique:banners,title,' . $banner->id,
            'image' => 'nullable|image',
            'description' => 'required|max:255|unique:banners,description,' . $banner->id
        ]);
    
        // Lưu dữ liệu từ request trừ ảnh
        $data = $request->except('image');
        $image_old = $banner->image;
        $data['image'] = $image_old;
    
        // Nếu có ảnh mới, lưu ảnh mới và cập nhật đường dẫn ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images/banners');
            $data['image'] = $path_image;
        }
    
        // Cập nhật banner
        $banner->update($data);

        if (file_exists('storage/' . $image_old)){
            unlink('storage/' . $image_old);
        }
    
        return redirect()->route('banners.index')->with('message', 'Cập nhật banner thành công');
    }
    
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->back()->with('success', 'Banner đã được xóa thành công.');
    }
}

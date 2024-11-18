<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Thay đổi theo Model của bạn
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        // Kiểm tra xem sản phẩm có tồn tại không
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại.'], 404);
        }

        // Kiểm tra nếu người dùng đã đăng nhập (bỏ qua nếu bạn muốn thử nghiệm mà không cần Auth)
        if (!Auth::check()) {
            return response()->json(['message' => 'Bạn cần đăng nhập để sử dụng tính năng này.'], 401);
        }

        // Thêm sản phẩm vào danh sách yêu thích (logic xử lý, ví dụ: sử dụng bảng pivot)
        // Giả sử bạn đã thiết lập quan hệ favorites trong model User
        $user = Auth::user();
        if ($user->favorites()->where('product_id', $id)->exists()) {
            return response()->json(['message' => 'Sản phẩm đã có trong danh sách yêu thích.']);
        }

        $user->favorites()->attach($id);

        return response()->json(['message' => 'Đã thêm sản phẩm vào danh sách yêu thích.']);
    }
}

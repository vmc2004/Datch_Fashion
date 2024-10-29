<?php

namespace App\Http\Controllers\Clinet;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Kiểm tra tính hợp lệ của dữ liệu
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Tìm biến thể dựa trên ID sản phẩm, màu sắc và kích cỡ
        $variant = ProductVariant::where('product_id', $validatedData['product_id'])
            ->where('color_id', $validatedData['color_id'])
            ->where('size_id', $validatedData['size_id'])
            ->firstOrFail();

        // Kiểm tra giỏ hàng của người dùng (nếu chưa có, tạo giỏ hàng mới)
        $cart = Cart::firstOrCreate([
            'user_id' => 1,
            'status' => 'active',
        ]);

        // Thêm sản phẩm vào giỏ hàng
        $cart->items()->create([
            'variant_id' => $variant->id,
            'quantity' => $validatedData['quantity'],
            'price_at_purchase' => $variant->price,
        ]);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    public function showCart()
    {
        // Lấy giỏ hàng của người dùng (user_id là 1 theo yêu cầu)
        $cart = Cart::with('items.variant.product', 'items.variant.color', 'items.variant.size')
            ->where('user_id', 1)
            ->where('status', 'active')
            ->first();

        // Kiểm tra nếu giỏ hàng trống
        if (!$cart || $cart->items->isEmpty()) {
            return view('client.cart.index', [
                'cart' => null,
                'message' => 'Giỏ hàng của bạn đang trống.',
            ]);
        }

        // Trả về view hiển thị giỏ hàng
        return view('client.cart.index', [
            'cart' => $cart,
        ]);
    }
}

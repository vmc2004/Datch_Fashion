<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    // Lấy giỏ hàng với thông tin sản phẩm và các biến thể
    public function index()
    {
        $cart = Cart::with(['items.productVariant.product', 'items.productVariant.color', 'items.productVariant.size'])
            ->where('user_id', auth()->id())
            ->first();

        return response()->json($cart);
    }

    // Thêm sản phẩm vào giỏ hàng
    public function store(Request $request)
    {
        // Kiểm tra giỏ hàng đã tồn tại chưa, nếu chưa thì tạo mới
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        // Thêm sản phẩm vào giỏ
        $cart->items()->updateOrCreate(
            ['product_variant_id' => $request->product_variant_id],
            ['quantity' => $request->quantity]
        );

        return response()->json(['message' => 'Product added to cart']);
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function update(Request $request, CartDetail $cartItem)
    {
        if ($cartItem->cart->user_id != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Cart item updated']);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function destroy(CartDetail $cartItem)
    {
        if ($cartItem->cart->user_id != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $cartItem->delete();

        return response()->json(['message' => 'Cart item removed']);
    }
}

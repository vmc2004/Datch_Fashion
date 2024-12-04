<?php

namespace App\Http\Controllers\Client;

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
            'user_id' => Auth::id(),
            'status' => 'active',
        ]);

        // Kiểm tra sản phẩm trong giỏ hàng và cập nhật số lượng nếu cần
        $cartItem = $cart->items()->where('variant_id', $variant->id)->first();

        if ($cartItem) {
            // Nếu đã có sản phẩm, tăng số lượng
            $cartItem->increment('quantity', $validatedData['quantity']);
        } else {
            // Nếu chưa có, tạo mới
            $cart->items()->create([
                'variant_id' => $variant->id,
                'quantity' => $validatedData['quantity'],
                'price_at_purchase' => $variant->price,
            ]);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function showCart()
    {
        // Lấy giỏ hàng của người dùng (user_id là 1 theo yêu cầu)
        $cart = Cart::with('items.variant.product', 'items.variant.color', 'items.variant.size')
            ->where('user_id', Auth::id())
            ->where('status', 'active')
            ->first();

        // Kiểm tra nếu giỏ hàng trống
        if (!$cart || $cart->items->isEmpty()) {
            return view('client.cart.index', [
                'cart' => null,
                'message' => 'Giỏ hàng của bạn đang trống.',
            ]);
        }



        // $cart = Cart::with('items.variant.product', 'items.variant.color', 'items.variant.size')
        //     ->where('user_id', 1)
        //     ->where('status', 'active')
        //     ->first();

        // if (!$cart) {
        //     dd('Không tìm thấy giỏ hàng cho người dùng này.');
        // }

        // Trả về view hiển thị giỏ hàng
        $totalCart = $cart->items->count();

        // Trả về view hiển thị giỏ hàng với tổng số lượng item
        return view('client.cart.index', [
            'cart' => $cart,
            'totalCart' => $totalCart,
        ]);
    }
    public function removeItem($itemId)
    {
        // Tìm item trong giỏ hàng của người dùng
        $item = CartItem::find($itemId);

        if ($item) {
            // Xóa item
            $item->delete();

            // Trả về phản hồi JSON
            return response()->json([
                'success' => true,
                'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng.',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy sản phẩm.',
        ], 404);
    }

    public function updateQuantity($itemId, Request $request)
    {
        $cartItem = CartItem::find($itemId);

        if (!$cartItem) {
            return response()->json(['success' => false], 404);
        }

        // Cập nhật số lượng
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        // Tính toán lại tổng giá trị của sản phẩm
        $newTotalPrice = $cartItem->price_at_purchase * $cartItem->quantity;

        // Tính toán lại tổng tiền giỏ hàng
        $cart = $cartItem->cart;
        $totalPrice = $cart->items->sum(function ($item) {
            return $item->price_at_purchase * $item->quantity;
        });

        // Giả sử bạn không có các khoản phí khác, như thuế hay phí vận chuyển
        return response()->json([
            'success' => true,
            'new_total_price' => $newTotalPrice,
            'new_cart_total' => [
                'total_price' => $totalPrice
            ]
        ]);
    }
}

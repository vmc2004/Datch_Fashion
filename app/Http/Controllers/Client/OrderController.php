<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\OrderCancelled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', '');
        $orders = Order::where('user_id', Auth::id())
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->latest('id')
            ->paginate(7);
        return view('Client.order.index', [
            'orders' => $orders,
            'status' => $status,
        ]);
    }
    public function edit($code)
    {
        $order = Order::where('code', $code)->first();
        return view('Client.order.edit', [
            'order' => $order,
        ]);
    }

    public function huy($code)
    {
        $order = Order::where('code', $code)
            ->with('orderDetails.productVariant')
            ->first();
        if ($order) {
            foreach ($order->orderDetails as $detail) {
                $variant = $detail->productVariant;
                if ($variant) {
                    $variant->quantity += $detail->quantity;
                    $variant->save();
                }
            }
            $order->status = 'Đơn hàng đã hủy';
            $order->save();

            // Tạo thông báo hủy đơn hàng
            $notificationData = [
                'message' => 'Đơn hàng #' . $order->code . ' đã bị hủy.',
                'order_code' => $order->code,
                'order_status' => 'Đã hủy',
                'details_url' => route('order.show', ['code' => $order->code]), // Link chi tiết đơn hàng
                'product_name' => $order->orderDetails->first()->productVariant->product->name,  // Lấy tên sản phẩm
                'product_image' => $order->orderDetails->first()->productVariant->product->image,  // Lấy ảnh sản phẩm đầu tiên trong đơn hàng
            ];

            // Gửi thông báo cho người dùng
            Auth::user()->notify(new OrderCancelled($notificationData));

            return redirect()->back()->with('success', 'Hủy đơn hàng thành công');
        }

        return redirect()->back()->with('error', 'Không tìm thấy đơn hàng');
    }
}

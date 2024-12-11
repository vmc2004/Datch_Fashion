<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
    public function edit($code){
        $order = Order::where('code', $code)->first();
        return view('Client.order.edit', [
            'order'=> $order,
        ]);
    }
    
    public function huy($code)
    {
        $order = Order::where('code', $code)
            ->with('orderDetails.productVariant') 
            ->first();
        if($order->status == 'Chờ xác nhận'){
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
                return redirect()->back()->with('success', 'Hủy đơn hàng thành công');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Bạn không thể hủy đơn hàng này!');
        }
    }


}

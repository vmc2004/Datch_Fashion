<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::query()->where('user_id', Auth::id())->latest('id')->paginate(7);
        return view('Client.order.index', [
            'orders' => $orders,
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
    $order = Order::where('code', $code)->first();

    if ($order) {
        $order->status = 'Đơn hàng đã hủy';
        $order->save();
        
        return redirect()->back()->with('success', 'Hủy đơn hàng thành công');
    }

    return redirect()->back()->with('error', 'Không tìm thấy đơn hàng');
}

}

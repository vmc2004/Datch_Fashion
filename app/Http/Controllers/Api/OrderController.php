<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function order_user(Request $request, $user_id){
    $data = Order::query()->where('user_id', $user_id)->get();
    return response()->json($data);
   }
    public function index(){
        $data = Order::query()->get();
        return response()->json($data);
    }
    public function show(Order $order){
        $order->load('OrderDetails'); // Eager load quan hệ
        return response()->json([
            'order' => $order,
            'orderdetail' => $order->orderDetails
        ]);
    }
    
    
}

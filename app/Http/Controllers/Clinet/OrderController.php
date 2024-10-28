<?php

namespace App\Http\Controllers\Clinet;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($user_id){
        $orders = Order::query()->where('user_id', $user_id)->get();
        return view('Client.order.index');
    }
}

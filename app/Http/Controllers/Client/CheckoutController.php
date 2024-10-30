<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // public function show(){

    //     return view('Client.checkout.show');
    // }
    public function checkout(Request $request ,$user_id)
    {
    $cartItems = Cart::with('items')->where('user_id', $user_id)->first();
    return view('Client.checkout.show', [
        'cartItems' => $cartItems,
    ]);
    }
    public function post_checkout(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email',
        'address' => 'required|string|max:255',
        'payment' => 'required|string',
        'variant_id' => 'required|array', 
        'price' => 'required|array',     
        'quantity' => 'required|array',   
    ]);
    $data = $request->only('name', 'phone', 'email', 'address');
    dd($data);
    return redirect()->route('thankyou')->with('success', 'Đơn hàng của bạn đã được xử lý thành công!');
    }
    public function thankyou(){
        return view('Client.checkout.done');
    }

}

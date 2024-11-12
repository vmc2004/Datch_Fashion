<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\OrderSuccessMail;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout(Request $request ,$user_id)
    {
    $cartItems = Cart::with('items')->where('user_id', $user_id)->first();
    return view('Client.checkout.show', [
        'cartItems' => $cartItems,
    ]);
    }
    public function post_checkout(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'payment' => 'required|string',
            'variant_id' => 'required|array',
            'price' => 'required|array',
            'quantity' => 'required|array', 
        ]);
    
        try {
            if (!Auth::check()) {
                return redirect()->route('login')->withErrors(['message' => 'Bạn cần đăng nhập để thanh toán.']);
            }
    
            $order = new Order();
            $order->user_id = Auth::id(); 
            $order->fullname = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->save(); 
    
            
            foreach ($request->input('variant_id') as $index => $variantId) {
                $quantity = $request->input('quantity')[$index]; 
                $price = $request->input('price')[$index];
    
                if ($price < 0 || $quantity < 0) {
                    return back()->withErrors(['message' => 'Giá và số lượng không thể âm.']);
                }
    
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id; 
                $orderDetail->variant_id = $variantId;
                $orderDetail->quantity = $quantity; 
                $orderDetail->price = $price; 
                $orderDetail->total_price = $price * $quantity; 
                $orderDetail->save();
            }
    
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $cart->items()->delete(); 
                $cart->delete(); 
            }
            Mail::to($order->email)->send(new OrderSuccessMail($order));
            return redirect()->route('thankyou');
           
        } catch (\Exception $e) {
            // Ghi log lỗi
            \Log::error('Error creating order: ' . $e->getMessage(), [
                'request_data' => $request->all(),
            ]);

            return back()->withErrors(['message' => 'Có lỗi xảy ra. Vui lòng thử lại.']);
        }
    }
    
    public function thankyou(){
        return view('Client.checkout.done');
    }
    

}

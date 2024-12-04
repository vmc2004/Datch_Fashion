<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\OrderSuccessMail;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout(Request $request ,$user_id)
    {
        $user = Auth::user();
        $cartItems = Cart::with('items')->where('user_id', $user_id)->first();
        return view('Client.checkout.show', [
            'cartItems' => $cartItems,
            'user'=> $user,
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
    
            if (!Auth::check()) {
                return redirect()->route('login')->withErrors(['message' => 'Bạn cần đăng nhập để thanh toán.']);
            }
            $totalPrice = 0;
            $order = new Order();
            $order->code = strtoupper(Str::random(6)) . rand(100, 999);
            $order->user_id = Auth::id(); 
            $order->fullname = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->total_price = $totalPrice; 
            $order->payment = $request->payment;
            if($request->payment == 'Thanh toán khi nhận hàng'){
                $order->payment_status = 'Chưa thanh toán';
            }
            elseif($request->payment == 'Thanh toán qua VNPay'){
                $order->payment_status = 'Đã thanh toán';
            }
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
                $totalPrice += $orderDetail->total_price;
            }
    
            $order->total_price = $totalPrice;
            $order->save();
           
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $cart->items()->delete(); 
                $cart->delete(); 
            }
                return redirect()->route('thankyou', ['order' => $order->code]);
    
    }
    
    public function vnpay_payment(Request $request)
    {
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
            $totalPrice = 0;
            $order = new Order();
            $order->code = strtoupper(Str::random(6)) . rand(100, 999);
            $order->user_id = Auth::id(); 
            $order->fullname = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->total_price = $totalPrice; 
            $order->payment = $request->payment;
            if($request->payment == 'Thanh toán khi nhận hàng'){
                $order->payment_status = 'Chưa thanh toán';
            }
            elseif($request->payment == 'Thanh toán qua VNPay'){
                $order->payment_status = 'Đã thanh toán';
            }
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
                $totalPrice += $orderDetail->total_price;
            }
    
            $order->total_price = $totalPrice;
            $order->save();
           
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $cart->items()->delete(); 
                $cart->delete(); 
            }
    
            // Tạo URL thanh toán VNPAY
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('thankyou', ['order' => $order->code]); // Thay đổi ở đây
            $vnp_TmnCode = "OXAW03IW"; // Mã website tại VNPAY 
            $vnp_HashSecret = "0GXPKQFPJA8NE2VE2LO0WYO575TFRTAZ"; // Chuỗi bí mật
    
            $vnp_TxnRef = $order->code; // Sử dụng mã đơn hàng đã được tạo trước đó
            $vnp_OrderInfo = "Thanh toán hóa đơn";
            $vnp_OrderType = "Datch Fashion";
            $vnp_Amount = $order->total_price * 100; // Quy đổi thành đồng
            $vnp_Locale = "VN";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    
            $inputData = [
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            ];
    
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
    
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
    
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
        
            return redirect()->away($vnp_Url);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }
    

    
    public function thankyou($order)
    {
        $order = Order::where('code', $order)
            ->with('orderDetails.productVariant')
            ->first();
    
        if ($order) {
            foreach ($order->orderDetails as $detail) {
                $variant = $detail->productVariant; 
                if ($variant) {
                    if ($variant->quantity >= $detail->quantity) {
                        $variant->quantity -= $detail->quantity; 
                        $variant->save(); 
                    } else {
                        return redirect()->route('Client.home')->withErrors([
                            'message' => 'Sản phẩm ' . $variant->name . ' không đủ số lượng tồn kho.'
                        ]);
                    }
                }
            }
            Mail::to($order->email)->send(new OrderSuccessMail($order));
            return view('Client.checkout.done', compact('order'));
        }
        return redirect()->route('Client.home')->withErrors(['message' => 'Đơn hàng không hợp lệ.']);
    }
    
    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('code');
        $cartTotal = $request->input('cart_total');
    
        $coupon = Coupon::where('code', $couponCode)->first();
    
        if (!$coupon) {
            return response()->json(['error' => 'Mã giảm giá không hợp lệ.']);
        }
        if ($coupon->end_date < now()) {
            return response()->json(['error' => 'Mã giảm giá đã hết hạn.']);
        }
        $discount = $coupon->discount_type;  // Giảm giá cố định
        $totalAfterDiscount = $cartTotal - $discount;
    
        return response()->json([
            'discount' => number_format($discount),
            'total' => number_format($totalAfterDiscount),
        ]);
    }
    



    

}
// Dữ liệu test 
// Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456
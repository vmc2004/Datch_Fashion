<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\OrderSuccessMail;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductVariant;
use App\Notifications\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout(Request $request ,$user_id)
    {
        $priceProduct= 0;
        $user = Auth::user();
        $cartItems = Cart::with('items')->where('user_id', $user_id)->first();
        foreach ($cartItems->items as $item) {
            $priceProduct += $item->price_at_purchase * $item->quantity;  
            
        }
        if($priceProduct <= 599000){
            $total_price = $priceProduct+30000;
        }
        else{
            $total_price = $priceProduct;
        }
        return view('Client.checkout.show', [
            'cartItems' => $cartItems,
            'priceProduct' => $priceProduct,
            'total_price' => $total_price,
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

            $order = new Order();
            $order->code = strtoupper(Str::random(6)) . rand(100, 999);
            $order->user_id = Auth::id(); 
            $order->fullname = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->shiping = $request->shiping;
            $order->discount = $request->discount;
            $order->total_price =$request->subtotal; 
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
            $order = new Order();
            $order->code = strtoupper(Str::random(6)) . rand(100, 999);
            $order->user_id = Auth::id(); 
            $order->fullname = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->total_price = $request->subtotal; 
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
                $variant = ProductVariant::find($variantId); 
                if (!$variant || $variant->quantity < $quantity) {
                    $order->orderDetails()->delete();
                    $order->delete();
                    return redirect()->route('cart.show')->with([
                        'warning' => 'Sản phẩm không đủ số lượng tồn kho.'
                    ]);
                }
    
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id; 
                $orderDetail->variant_id = $variantId;
                $orderDetail->quantity = $quantity; 
                $orderDetail->price = $price; 
                $orderDetail->total_price = $price * $quantity; 
                $orderDetail->save();
            }
           
    
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('payment.return');
            $vnp_TmnCode = "OXAW03IW"; // Mã website tại VNPAY 
            $vnp_HashSecret = "0GXPKQFPJA8NE2VE2LO0WYO575TFRTAZ"; // Chuỗi bí mật
    
            $vnp_TxnRef = $order->code; // Sử dụng mã đơn hàng đã được tạo trước đó
            $vnp_OrderInfo = "Thanh toán hóa đơn";
            $vnp_OrderType = "Datch Fashion";
            $vnp_Amount = $order->total_price * 100; // Quy đổi thành đồng
            $vnp_Locale = "vn";
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
                        $cart = Cart::where('user_id', Auth::id())->first();
                        if ($cart) {
                            $cart->items()->delete(); 
                            $cart->delete(); 
                        }
                        $notificationData = [
                            'message' => 'Đơn hàng ' . $order->code . ' đã được đặt thành công.',
                            'order_code' => $order->code,
                            'order_status' => $order->payment_status,
                            'details_url' => route('order.show', ['code' => $order->code]), 
                            'product_name' => $order->orderDetails->first()->productVariant->product->name, 
                            'product_image' => asset(($order->orderDetails->first()->productVariant->product->image ?? 'default-image.jpg')),
                        ];
                
                
                        Auth::user()->notify(new OrderPlaced($notificationData));
                    } else {
                        $order->orderDetails()->delete();

                        $order->delete();
        
                        return redirect()->route('cart.show')->with([
                            'warning' => 'Sản phẩm không đủ số lượng tồn kho.'
                        ]);
                    }
                }
            }
            
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $cart->items()->delete(); 
                $cart->delete(); 
            }
            Mail::to($order->email)->send(new OrderSuccessMail($order));
            return view('Client.checkout.done', compact('order'));
        }
        return redirect()->route('Client.home')->withErrors(['message' => 'Đơn hàng không hợp lệ.']);
    }
 
    public function apply(Request $request)
{
    $request->validate([
        'code' => 'required|string|max:10',
        'subtotal' => 'required',
    ]);
    $subtotal = $request->subtotal;
    $code = $request->code;
    $coupon = Coupon::where('code', $code)
        ->where('is_active', 1)
        ->first();

    if (!$coupon) {
        return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ!');
    }

    $userId = Auth::id(); 
    $alreadyUsed = DB::table('coupon_user')
        ->where('user_id', $userId)
        ->where('coupon_id', $coupon->id)
        ->exists();
    if ($alreadyUsed) {
        return redirect()->back()->with('error', 'Bạn đã sử dụng mã giảm giá này rồi!');
    }
    if ($coupon->discount_type == 'fixed') {
        $discountAmount = $coupon->discount;
        $subtotals = $subtotal - $discountAmount;
    } else {
        $discountAmount = $subtotal * ($coupon->discount / 100);
        $subtotals = $subtotal - $discountAmount;
    }

    session([
        'subtotals' => $subtotals,
        'discount' => $discountAmount,
    ]);

    DB::table('coupon_user')->insert([
        'user_id' => $userId,
        'coupon_id' => $coupon->id,
        'used_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Áp dụng mã giảm giá thành công!');
}

    public function clearSession()
    {
        Session::forget('subtotals');
        Session::forget('discount');
        return response()->json(['status' => 'success']);
    }
    
    public function handlePaymentReturn(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $orderCode = $request->input('vnp_TxnRef');
    
        $order = Order::where('code', $orderCode)->first();
    
        if (!$order) {
            return redirect()->route('cart.show')->withErrors(['error' => 'Đơn hàng không tồn tại.']);
        }
        if ($vnp_ResponseCode == '00') { 
            $order->payment_status = 'Đã thanh toán';
            $order->save();
            return redirect()->route('thankyou', ['order' => $order->code])
                ->with('success', 'Thanh toán thành công!');
        } else { 
            $order->orderDetails()->delete();
            $order->delete();
            return redirect('/mua-hang/'.Auth::id())
                ->with(['warning' => 'Thanh toán bị hủy. Đơn hàng chưa được xử lý.']);
        }
    }
    


    

}
// Dữ liệu test 
// Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456
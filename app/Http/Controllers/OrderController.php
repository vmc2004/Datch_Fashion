<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusUpdated;
use App\Mail\OrderStatusUpdatedMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Notifications\OrderCancelled;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

public function index(Request $request)
{
    $search_order = $request->get('search-order');
    $payment_status = $request->get('payment_status');
    $status = $request->get('status');
    $date_filter = $request->get('date_filter'); 
    $orders = Order::query()
        ->when($status, function($query) use ($status) {
            return $query->where('status', $status);
        })
        ->when($payment_status, function($query) use ($payment_status) {
            return $query->where('payment_status', $payment_status);
        })
        ->when($search_order, function($query) use ($search_order){
            return $query->where('phone', 'LIKE', '%'. $search_order. '%')
                         ->orWhere('code', 'LIKE', '%'.$search_order . '%')
                         ->orWhere('fullname', 'LIKE', '%'.$search_order.'%');
        })
        ->when($date_filter, function($query) use ($date_filter) {
            switch ($date_filter) {
                case 'today':
                    return $query->whereDate('created_at', Carbon::today());
                case 'yesterday':
                    return $query->whereDate('created_at', Carbon::yesterday());
                case 'this_week':
                    return $query->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek(),
                    ]);
                case 'this_month':
                    return $query->whereMonth('created_at', Carbon::now()->month)
                                 ->whereYear('created_at', Carbon::now()->year);
                default:
                    return $query;
            }
        })
        ->orderBy('id', 'desc')
        ->paginate(8);

    return view('Admin.Orders.index', compact('orders'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        FacadesSession::forget('order');
        
        return view('Admin.Orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

   
    

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('Admin.Orders.edit', compact('order'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
            'note' => function ($attribute, $value, $fail) use ($request) {
                if ($request->status === 'Đơn hàng đã hủy' && empty($value)) {
                    $fail('Vui lòng ghi chú lý do hủy đơn hàng.');
                }
            },
        ]);

        $data = [
            'status' => $request->status,
            'note' => $request->note,
        ];

     
        if ($request->status === 'Đơn hàng đã hủy') {
            $notificationData = [
                'message' => 'Đơn hàng #' . $order->code . ' đã bị hủy, Lí do:' .$order->note . '.',
                'order_code' => $order->code,
                'order_status' => 'Đã hủy',
                'details_url' => route('order.show', ['code' => $order->code]), // Link chi tiết đơn hàng
                'product_name' => $order->orderDetails->first()->productVariant->product->name,  // Lấy tên sản phẩm
                'product_image' => $order->orderDetails->first()->productVariant->product->image,  // Lấy ảnh sản phẩm đầu tiên trong đơn hàng
            ];
    
            // Gửi thông báo cho người dùng
            Auth::user()->notify(new OrderCancelled($notificationData));
        }
        if ($request->status === 'Đã giao hàng') {
            $data['payment_status'] = 'Đã thanh toán';
        }

        try {
            $order->update($data);
            Mail::to($order->email)->send(new OrderStatusUpdatedMail($order));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật đơn hàng.');
        }
       
        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('code', 'LIKE', '%' . $query . '%')->get();
        $product_id = $products->pluck('id');
        $variants = ProductVariant::whereIn('product_id' ,$product_id)->with('product', 'color', 'size')->get();
        return response()->json($variants);
    }

   
}

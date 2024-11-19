<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductVariant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function filter(Request $request)
{
    $data = $request->all();
    $from_date = $data['from_date'];
    $to_date = $data['to_date'];

    try {
        $from_date = \Carbon\Carbon::parse($from_date)->startOfDay();
        $to_date = \Carbon\Carbon::parse($to_date)->endOfDay();
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ngày tháng không hợp lệ'], 400);
    }

    $orders = Order::whereBetween('created_at', [$from_date, $to_date])
        ->orderBy('created_at', 'ASC')
        ->with('orderDetails')
        ->get();

    if ($orders->isEmpty()) {
        return response()->json(['message' => 'Không có đơn hàng trong khoảng thời gian này'], 404);
    }

    $chart_data = [];
    foreach ($orders as $order) {
        foreach ($order->orderDetails as $orderDetail) {
            $chart_data[] = [
                'period' => $order->created_at->format('Y-m-d H:i:s'),
                'order' => $orderDetail->count('order_id') ,
                'quantity' => $orderDetail->quantity,
                'total_price' => $orderDetail->price * $orderDetail->quantity,
            ];
        }
    }

    return response()->json($chart_data);
}

public function dashboard_filter(Request $request)
{
    $data = $request->all();

    $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    // Kiểm tra giá trị của `dashboard_value` từ request
    $orders = collect();

    if ($data['dashboard_value'] == '7ngay') {
        // Lấy đơn hàng trong 7 ngày qua
        $orders = Order::whereBetween('created_at', [$sub7days, $now])
                       ->orderBy('created_at', 'ASC')
                       ->with('orderDetails') 
                       ->get();
    } elseif ($data['dashboard_value'] == 'thangnay') {
        // Lấy đơn hàng trong tháng này
        $orders = Order::whereBetween('created_at', [$dauthangnay, $now])
                       ->orderBy('created_at', 'ASC')
                       ->with('orderDetails')
                       ->get();
    } elseif ($data['dashboard_value'] == 'thangtruoc') {
        // Lấy đơn hàng trong tháng trước
        $orders = Order::whereBetween('created_at', [$dau_thangtruoc, $cuoi_thangtruoc])
                       ->orderBy('created_at', 'ASC')
                       ->with('orderDetails')
                       ->get();
    } elseif ($data['dashboard_value'] == '365ngay') {
        // Lấy đơn hàng trong 365 ngày qua
        $orders = Order::whereBetween('created_at', [$sub365days, $now])
                       ->orderBy('created_at', 'ASC')
                       ->with('orderDetails')
                       ->get();
    }

    $chart_data = [];
    foreach ($orders as $order) {
        foreach ($order->orderDetails as $orderDetail) {
            $chart_data[] = [
                'period' => $order->created_at->format('Y-m-d H:i:s'),
                'order' => $orderDetail->count('order_id') ,
                'quantity' => $orderDetail->quantity,
                'total_price' => $orderDetail->price * $orderDetail->quantity,
            ];
        }
    }

    return response()->json($chart_data);
}

public function get30DaysOrderData(Request $request)
    {
        $sub30days = Carbon::now()->subDays(30)->toDateString();
        $now = Carbon::now()->toDateString();

        $orders = Order::whereBetween('created_at', [$sub30days, $now])
                       ->orderBy('created_at', 'ASC')
                       ->with('orderDetails')
                       ->get();

        $chart_data = [];
        foreach ($orders as $order) {
            foreach ($order->orderDetails as $orderDetail) {
                $chart_data[] = [
                'period' => $order->created_at->format('Y-m-d H:i:s'),
                'order' => $orderDetail->count('order_id') ,
                'quantity' => $orderDetail->quantity,
                'total_price' => $orderDetail->price * $orderDetail->quantity,
                ];
            }
        }
        return response()->json($chart_data);
    }

    

    public function indexAdmin()
{
    
    return view('Admin.index');
}
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('home');
    }

    public function adminHome(){
        return view('admin/home');
    }
    
}

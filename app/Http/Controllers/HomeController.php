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
                    'order' => $orderDetail->count('order_id'),
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
                    'order' => $orderDetail->count('order_id'),
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
                    'order' => $orderDetail->count('order_id'),
                    'quantity' => $orderDetail->quantity,
                    'total_price' => $orderDetail->price * $orderDetail->quantity,
                ];
            }
        }
        return response()->json($chart_data);
    }



    public function indexAdmin()
    {


        // Truy vấn dữ liệu đơn hàng, sản phẩm và thông tin thanh toán
        $orderStatus = Product::select('products.name', 'products.image', 'orders.payment', 'orders.status')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->groupBy('products.name', 'products.image', 'orders.payment', 'orders.status') // Group theo tất cả các trường không sử dụng hàm tổng hợp
            ->selectRaw('SUM(order_details.quantity) as total_quantity')
            ->orderByDesc('total_quantity')
            ->get();

        $topSellingProducts = DB::table('products')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')  // Kết nối bảng products với order_details
            ->select('products.name', 'products.image', 'order_details.price', DB::raw('SUM(order_details.quantity) as total_sales'))
            ->groupBy('products.id', 'products.name', 'products.image', 'order_details.price')  // Nhóm theo product
            ->orderByDesc('total_sales')  // Sắp xếp giảm dần theo số lượng bán
            ->limit(10)  // Giới hạn 10 sản phẩm bán chạy nhất
            ->get();

        return view('Admin.index', compact('orderStatus', 'topSellingProducts'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('admin/home');
    }
}

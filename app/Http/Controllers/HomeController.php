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

        // Kiểm tra và chuyển đổi định dạng ngày
        try {
            $from_date = Carbon::parse($from_date)->startOfDay();
            $to_date = Carbon::parse($to_date)->endOfDay();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ngày tháng không hợp lệ'], 400);
        }

        // Lấy dữ liệu đơn hàng trong khoảng thời gian
        $orders = Order::whereBetween('created_at', [$from_date, $to_date])
            ->with('orderDetails')
            ->get();

        // Nếu không có đơn hàng
        if ($orders->isEmpty()) {
            return response()->json(['message' => 'Không có đơn hàng trong khoảng thời gian này'], 404);
        }

        // Nhóm dữ liệu theo ngày và tính tổng giá trị, số lượng đơn hàng, sản phẩm bán được
        $chart_data = [];

        foreach ($orders as $order) {
            // Chuyển đổi thời gian tạo đơn hàng sang định dạng ngày (Y-m-d)
            $order_date = $order->created_at->format('Y-m-d');

            // Nếu chưa có dữ liệu cho ngày này, tạo một entry mới
            if (!isset($chart_data[$order_date])) {
                $chart_data[$order_date] = [
                    'period' => $order_date,
                    'order_count' => 0,
                    'quantity' => 0,
                    'total_price' => 0,
                ];
            }

            // Cập nhật số lượng đơn hàng, số lượng sản phẩm và tổng giá trị cho ngày
            foreach ($order->orderDetails as $orderDetail) {
                $chart_data[$order_date]['order_count']++;
                $chart_data[$order_date]['quantity'] += $orderDetail->quantity;
                $chart_data[$order_date]['total_price'] += $orderDetail->price * $orderDetail->quantity;
            }
        }

        // Chuyển đổi dữ liệu thành mảng để trả về
        $chart_data = array_values($chart_data);

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
    $now = Carbon::now('Asia/Ho_Chi_Minh');

    $startOfDay = $now->copy()->startOfDay();
    $endOfDay = $now->copy()->endOfDay();

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
    } elseif ($data['dashboard_value'] == '1ngay') {
        $orders = Order::whereBetween('created_at', [$startOfDay, $endOfDay])
                       ->orderBy('created_at', 'ASC')
                       ->with('orderDetails')
                       ->get();
    }

    $chart_data = [];
    foreach ($orders as $order) {
        foreach ($order->orderDetails as $orderDetail) {
            $period = $order->created_at->format('Y-m-d');
            
            if (!isset($chart_data[$period])) {
                $chart_data[$period] = [
                    'period' => $period,
                    'order_count' => 0,
                    'quantity' => 0,
                    'total_price' => 0,
                ];
            }

            $chart_data[$period]['order_count']++;
            $chart_data[$period]['quantity'] += $orderDetail->quantity;
            $chart_data[$period]['total_price'] += $orderDetail->price * $orderDetail->quantity;
        }
    }
    $chart_data = array_values($chart_data);
    // Thống kê 10 sản phẩm bán chạy nhất

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


    public function topSellingProducts(Request $request)
{
    $data = $request->all();
    $from_date = $data['from_date'] ?? null;
    $to_date = $data['to_date'] ?? null;

    // Kiểm tra và chuyển đổi định dạng ngày nếu có
    if ($from_date && $to_date) {
        try {
            $from_date = Carbon::parse($from_date)->startOfDay();
            $to_date = Carbon::parse($to_date)->endOfDay();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ngày tháng không hợp lệ'], 400);
        }
    }

    // Truy vấn dữ liệu từ bảng order_details (hoặc bảng tương ứng)
    $query = OrderDetail::selectRaw('
            product_variants.product_id, 
            SUM(order_details.quantity) as total_quantity, 
            SUM(order_details.price * order_details.quantity) as total_sales,
            AVG(order_details.price) as average_price')  // Lấy giá trung bình
        ->join('product_variants', 'order_details.variant_id', '=', 'product_variants.id')
        ->join('products', 'product_variants.product_id', '=', 'products.id')
        ->groupBy('product_variants.product_id')
        ->orderByDesc('total_quantity') // Sắp xếp theo số lượng bán được
        ->limit(10); // Lấy top 10 sản phẩm

    // Nếu có lọc theo ngày, thêm điều kiện lọc
    if ($from_date && $to_date) {
        $query->whereHas('order', function ($q) use ($from_date, $to_date) {
            $q->whereBetween('created_at', [$from_date, $to_date]);
        });
    }

    // Thực hiện truy vấn
    $topProducts = $query->get();

    // Nếu không có sản phẩm
    if ($topProducts->isEmpty()) {
        return response()->json(['message' => 'Không có sản phẩm nào trong khoảng thời gian này'], 404);
    }

    // Lấy tất cả các product_id trong top sản phẩm
    $productIds = $topProducts->pluck('product_id');

    // Lấy tất cả sản phẩm từ bảng Product
    $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

    // Chuyển đổi kết quả để lấy thêm thông tin về sản phẩm (tên, giá...)
    $result = $topProducts->map(function ($item) use ($products) {
        // Lấy thông tin từ bảng `product_variants` và `order_details`
        $product = $products->get($item->product_id);
        return [
            'product_name' => $product ? $product->name : 'Sản phẩm không tồn tại',
            'quantity_sold' => $item->total_quantity,
            'total_sales' => $item->total_sales,
            'average_price' => $item->average_price // Trả về giá trung bình
        ];
    });

    return response()->json($result);
}

public function filterOrderStatus(Request $request)
{
    $data = $request->all();
    $from_date = $data['from_date'];
    $to_date = $data['to_date'];
    try {
        $from_date = Carbon::parse($from_date)->startOfDay();
        $to_date = Carbon::parse($to_date)->endOfDay();
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ngày tháng không hợp lệ'], 400);
    }

    $orders = Order::whereBetween('created_at', [$from_date, $to_date])
        ->with(['orderDetails.productVariant.product'])
        ->get();

    if ($orders->isEmpty()) {
        return response()->json(['message' => 'Không có đơn hàng trong khoảng thời gian này'], 404);
    }

    $order_data = [];

    foreach ($orders as $order) {

        $order_date = $order->created_at->format('Y-m-d');

        foreach ($order->orderDetails as $orderDetail) {
            $product_name = $orderDetail->productVariant->product ? $orderDetail->productVariant->product->name : 'Không có sản phẩm';

            $order_status = $order->status;

            $payment = $order->payment;

            $payment_status = $order->payment_status;

            $order_data[] = [
                'order_date' => $order_date,
                'product_name' => $product_name,
                'order_status' => $order_status,
                'payment' => $payment, 
                'payment_status' => $payment_status, 
            ];
        }
    }

    return response()->json($order_data);
}

public function filterStockStatus(Request $request)
{
    $data = $request->all();
    $from_date = $data['from_date'];
    $to_date = $data['to_date'];

    try {
        $from_date = Carbon::parse($from_date)->startOfDay();
        $to_date = Carbon::parse($to_date)->endOfDay();
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ngày tháng không hợp lệ'], 400);
    }

    $products = Product::with(['productVariants' => function($query) {

        $query->select('id', 'product_id', 'size_id', 'color_id', 'quantity', 'price');
    }, 'productVariants.size', 'productVariants.color']) 
    ->get();

    if ($products->isEmpty()) {
        return response()->json(['message' => 'Không có sản phẩm nào'], 404);
    }

    $product_data = [];

    foreach ($products as $product) {
        foreach ($product->productVariants as $variant) {
            $product_data[] = [
                'product_name' => $product->name,       
                'quantity' => $variant->quantity,           
                'price' => $variant->price,                  
                'size' => $variant->size->name,             
                'color' => $variant->color->name,          
            ];
        }
    }

    return response()->json($product_data);
}



    public function indexAdmin()
{
    return view('Admin.index');
}
    public function showTopProduct(){
        return view('Admin.Statistic.topProduct');
    }
    public function showInventory(){
        return view('Admin.Statistic.inventory');
    }
    public function showOderStatus(){
        return view('Admin.Statistic.orderStatus');
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
<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $orders = Order::orderBy('id', 'desc')->paginate(8);
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

    public function add_product_order(Request $request)
    {
        // 1. Xác thực dữ liệu đầu vào
        $request->validate([
            'variant_id' => 'required|integer',
           
        ]);
    
        // 2. Lấy dữ liệu từ request
        $variant_id = $request->input('variant_id');
        $quantity = $request->input('quantity', 1);
        $variant = ProductVariant::with(['product', 'color', 'size'])->find($variant_id);
        
        // 3. Lấy giỏ hàng hiện tại từ session hoặc khởi tạo mới
        $order = session()->get('order', []);
        
        if(isset($order[$variant_id])){
            $order[$variant_id]['quantity'] += $quantity;
            $order[$variant_id]['total_price'] = $order[$variant_id]['unit_price'] * $order[$variant_id]['quantity'];
        } else {
            $order[$variant_id] = [
                'variant_id' => $variant_id,
                'code' => $variant->product->code,
                'product_name' => $variant->product->name,
                'color' => $variant->color->name,
                'size' => $variant->size->name,
                'quantity' => $quantity,
                'unit_price' => $variant->price, // Giả sử có trường price
                'total_price' => $variant->price * $quantity,
            ];
        }

        return response()->json([
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng!',
            'order' => $order,
        ]);
        
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
        $order->update($data);
        return redirect()->back()->with('message', 'Cập nhật thành công!');
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

    public function show_result($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
    public function search_order(Request $request){
        $orders = Order::where('phone', 'LIKE', '%'. $request['search-order']. '%')
        ->orwhere('code', 'LIKE', '%'. str_replace('HD0', '', $request['search-order']) . '%')
        ->paginate(8);
        return view('Admin.Orders.index', compact('orders'));
    }
    public function exportToExcel()
    {
        return Excel::download(new OrdersExport, 'Hoa_don.xlsx');
    }
}

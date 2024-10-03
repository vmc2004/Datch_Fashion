<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $orders = Order::OrderByDesc('id')->paginate(8);
        return view('Admin.Orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
       $code = $request->input('code');
        $quantity = $request->input('quantity', 1); // Mặc định là 1 nếu không có giá trị
    
        // 3. Lấy giỏ hàng hiện tại từ session hoặc khởi tạo mới
        $order = session()->get('order', []);

    
        // 4. Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($order[$variant_id])) {
            // Tăng số lượng sản phẩm
            $order[$variant_id]['quantity'] += $quantity;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $order[$variant_id] = [
                'variant_id' => $variant_id,
                'quantity' => $quantity,
            ];
        }
    
        // 5. Cập nhật giỏ hàng vào session
        session()->put('order', $order);
    
        // 6. Trả về phản hồi JSON với giỏ hàng đã cập nhật
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
        $data = [
            'status' => $request['status']
        ];
        $order->update($data);
        return redirect()->back()->with('message', 'Cập nhật thành công !');
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
        // ->orwhere('id', 'LIKE', '%'. $request['search-order']. '%')
        ->paginate(8);
        return view('Admin.Orders.index', compact('orders'));
    }
}

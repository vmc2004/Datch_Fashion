@extends('Admin.layout.app')
@section('title', "Đơn hàng")
@section('title-page', "Đơn hàng")
@section('single-page', "Danh sách đơn hàng")
@section('content')

<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
      <h2 class="text-center">Đơn hàng</h2>
      <div class="search-box col-md-8">
          <form action="" method="GET" class="d-flex align-items-center">
              <i class="fas fa-search text-secondary me-2"></i>
              @csrf
              <input type="text" name="search-order" class="form-control" placeholder="Tìm kiếm đơn hàng...">
          </form>
      </div>
                <div class="header d-flex justify-content-between align-items-center py-3 border-bottom">
                    <!-- Ô tìm kiếm -->
                
                    <!-- Form lọc danh mục -->
                    <div class="col-md-10">
                        <form action="" method="GET" class="row g-3 align-items-center">
                            <!-- Trạng thái -->
                            <div class="col-md-3">
                                <select class="form-select" name="payment_status">
                                    <option value="">Tất cả trạng thái</option>
                                    <option value="Đã thanh toán" {{ request('payment_status') == 'Đã thanh toán' ? 'selected' : '' }}>Đã thanh toán</option>
                                    <option value="Chưa thanh toán" {{ request('payment_status') == 'Chưa thanh toán' ? 'selected' : '' }}>Chưa thanh toán</option>
                                </select>
                            </div>
                            <!-- Sắp xếp -->
                            <div class="col-md-3">
                                <select class="form-select" name="status">
                                    <option value="">Sắp xếp theo</option>
                                    <option value="Chờ xác nhận" {{ request('status') == 'Chờ xác nhận' ? 'selected' : '' }}>Đơn hàng mới</option>
                                    <option value="Đã xác nhận" {{ request('status') == 'Đã xác nhận' ? 'selected' : '' }}>Đã xác nhận</option>
                                    <option value="Đang chuẩn bị hàng" {{ request('status') == 'Đang chuẩn bị hàng' ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                                    <option value="Đang giao hàng" {{ request('status') == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng</option>
                                    <option value="Đã giao hàng" {{ request('status') == 'Đã giao hàng' ? 'selected' : '' }}>Đã giao hàng</option>
                                    <option value="Đơn hàng đã hủy" {{ request('status') == 'Đơn hàng đã hủy' ? 'selected' : '' }}>Đơn hàng đã hủy</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" name="date_filter">
                                    <option value="">Sắp xếp theo thời gian</option>
                                    <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Hôm nay</option>
                                    <option value="yesterday" {{ request('date_filter') == 'yesterday' ? 'selected' : '' }}>Hôm qua</option>
                                    <option value="this_week" {{ request('date_filter') == 'this_week' ? 'selected' : '' }}>Tuần này</option>
                                    <option value="this_month" {{ request('date_filter') == 'this_month' ? 'selected' : '' }}>Tháng này</option>
                                </select>
                            </div>
                            <!-- Nút lọc -->
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Lọc</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
                
              
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-dark-subtle">
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Khách hàng</th>
                        <th>Sđt</th>
                        <th>Tổng</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                  
                  @foreach ($orders as $order)
                  <tr>
                    <td><a href="{{route('orders.edit', $order->id)}}" class="d-flex justify-content-center"> {{ $order->code }}</a></td>
                    <td>{{ $order->created_at }}</td>
                    <td class="d-flex justify-content-center">{{ $order->fullname }}</td>
                    <td class="">{{ $order->phone }}</td>
                    
                 
                    
                    <td>{{ number_format($order->total_price) }} ₫</td>
                    
                    <td>
                        @if($order->payment_status == 'Đã thanh toán')
                        <p class="text-success">{{$order->payment_status}}</p>
                        @elseif ($order->payment_status == 'Chưa thanh toán')
                        <p class="text-danger">{{$order->payment_status}}</p>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('orders.update', $order) }}" method="POST" id="orderForm-{{ $order->id }}">
                            @csrf
                            @method('PUT')
                            <select name="status" class="border border-secondary-subtle rounded-2" id="status" {{ ($order->status == 'Đã giao hàng' || $order->status == 'Đơn hàng đã hủy') ? 'disabled' : '' }} onchange="handleStatusChange(event, {{ $order->id }})">
                                <option 1 value="Chờ xác nhận" {{ $order->status == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                                <option 2 value="Đã xác nhận" {{ $order->status == 'Đã xác nhận' ? 'selected' : '' }}>Đã xác nhận</option>
                                <option 3  value="Đang chuẩn bị hàng" {{ $order->status == 'Đang chuẩn bị hàng' ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                                <option 4 value="Đang giao hàng" {{ $order->status == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng</option>
                                <option 5 value="Đã giao hàng" {{ $order->status == 'Đã giao hàng' ? 'selected' : '' }}>Đã giao hàng</option>
                                <option 6 value="Đơn hàng đã hủy" {{ $order->status == 'Đơn hàng đã hủy' ? 'selected' : '' }}>Đơn hàng đã hủy</option>
                            </select>
                        </form>
                    </td>
                </tr>
                  @endforeach
                   
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                
                <nav>
                    <ul class="pagination">
                        <li>{{$orders->links()}}</li>
                    </ul>
                </nav>
                <script>
                  function handleStatusChange(event, orderId) {
                    const formId = `orderForm-${orderId}`;
                    const form = document.getElementById(formId);

                    if (event.target.value === 'Đơn hàng đã hủy') {
                        Swal.fire({
                            title: 'Nhập lý do hủy',
                            input: 'text',
                            inputPlaceholder: 'Lý do hủy đơn hàng',
                            showCancelButton: true,
                            confirmButtonText: 'Xác nhận',
                            cancelButtonText: 'Hủy'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const reason = result.value;
                                const inputHidden = document.createElement('input');
                                inputHidden.type = 'hidden';
                                inputHidden.name = 'note';
                                inputHidden.value = reason;
                                form.appendChild(inputHidden);
                                form.submit();
                            }
                        });
                    } else {
                        form.submit();
                    }
                }

                </script>
                
       
@endsection

@section('style')
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .search-box {
        border: 1px solid #ccc;
        border-radius: 25px;
        padding: 5px 10px;
        display: flex;
        align-items: center;
        width: 300px;
    }
    .search-box input {
        border: none;
        outline: none;
        width: 100%;
        padding-left: 5px;
    }
    .search-box i {
        color: #ccc;
    }
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .header h1 {
        font-size: 24px;
        font-weight: bold;
        color: #3a3a3a;
    }
    .btn-custom {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        margin-left: 10px;
    }
    .btn-custom i {
        margin-right: 5px;
    }
</style>
@endsection

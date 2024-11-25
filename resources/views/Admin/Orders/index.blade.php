@extends('Admin.layout.app')
@section('title', "Đơn hàng")
@section('title-page', "Đơn hàng")
@section('single-page', "Danh sách đơn hàng")
@section('content')

<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
           
  @if (session()->has('message'))
      <div class="alert alert-success text-white">
        {{session()->get('message')}}
      </div>
      @endif
            <div class="header">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                   <form action="{{route('orders.search')}}" method="GET">
                    @csrf
                    <input type="text" name="search-order" placeholder="Tìm kiếm đơn hàng...">
                   </form>
                </div>
                <h1>Đơn hàng</h1>
                <div>
                    <button class="btn btn-custom btn-success"><i class="fas fa-file-export"></i>Xuất file</button>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-dark-subtle">
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền hàng</th>
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
                    
                 
                    
                    <td>{{ number_format($order->total_price) }} ₫</td>
                    
                    <td>
                        @if($order->payment_status == 'Đã thanh toán')
                        <p class="text-success">{{$order->payment_status}}</p>
                        @elseif ($order->payment_status == 'Chưa thanh toán')
                        <p class="text-danger">{{$order->payment_status}}</p>
                        @endif
                    </td>
                    <td>
                        @if ($order->status == 'Đã giao hàng')
                            <p class="text-success">Hoàn thành</p>
                        @elseif ($order->status == 'Đơn hàng đã hủy')
                            <p class="text-danger">Hủy đơn hàng</p>
                        @elseif($order->status == 'Chờ xác nhận')
                            <p>Đơn hàng mới</p>
                        @else
                            <p class="text-primary">Đang xử lý</p>
                        @endif
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

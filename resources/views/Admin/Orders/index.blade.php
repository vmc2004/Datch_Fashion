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
            <div class="d-flex justify-content-end align-items-center mb-3">
                
                    <a href="{{route('orders.create')}}" class="btn btn-success me-1 "> <i class="fa-solid fa-plus"></i>  Bán hàng</a>
                    <button type="button" class="btn btn-success"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Xuất file</button>
                
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-dark-subtle">
                        <th><input type="checkbox" ></th>
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền hàng</th>
                        <th>Giảm giá</th>
                        <th>Khách đã trả</th>
                    </tr>
                </thead>
                <tbody>
                  
                  @foreach ($orders as  $order)
                  <tr>
                    <td><input type="checkbox"></td>
                    <td><a href="{{route('orders.show', $order->id)}}"> {{ $order->id }}</a></td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->fullname }}</td>
                    <td>{{ $order->OrderDetail }}</td>
                    <td>0</td>
                    <td>{{ $order->total_money}}</td>
                </tr>
                  @endforeach
                   
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>113,000</td>
                        <td>0</td>
                        <td>113,000</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Hiển thị 1 - 10 trên tổng số 518 hóa đơn</p>
                </div>
                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                    </ul>
                </nav>
       
                

@endsection
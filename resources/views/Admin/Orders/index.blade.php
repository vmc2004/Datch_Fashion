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
                        
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền hàng</th>
                        <th>Giảm giá</th>
                        <th>Khách đã trả</th>
                        <th>TTTT</th>
                    </tr>
                </thead>
                <tbody>
                  
                  @foreach ($orders as  $order)
                  <tr>
                    <td><a href="{{route('orders.edit', $order->id)}}"> {{ $order->id }}</a></td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->fullname }}</td>
                    @foreach ($order->OrderDetail as $detail )
                        <td>{{$detail->price}}</td>
                    <td>0</td>
                        <td>{{ $detail->total_price }}</td>
                    @endforeach
                    <td>
                        <div class="btn {{ $order->payment == 'Thanh toán khi nhận hàng' ? 'btn-danger' : 'btn-primary' }}">
                            {{ $order->payment == 'Thanh toán khi nhận hàng' ? 'Chưa thanh toán' : 'Đã thanh toán' }}
                        </div>
                        
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
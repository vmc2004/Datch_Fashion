@extends('Admin.layout.app')
@section('title', "Đơn hàng")

@section('title-page', "Đơn hàng")
@section('single-page', "Cập nhật đơn hàng")

@section('content')

<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
           
            <h2 class="text-center  ">Cập nhật đơn hàng</h2>
            @if (session()->has('message'))
            <div class="alert alert-success text-white">
              {{session()->get('message')}}
            </div>
            @endif
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã đơn Hàng</th>
                        <th>Tên Hàng</th>
                        <th>Màu</th>
                        <th>Size</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->OrderDetail as $detail)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td style="max-width:400px" class="text-truncate">{{ $detail->variant->product->name }}</td>
                        <td>{{ $detail->variant->color->name }}</td>
                        <td>{{ $detail->variant->size->name }}</td>
                        <td>{{ number_format($detail->variant->price) }} ₫</td>
                        <td>{{$detail->quantity}}</td>
                        <td>{{ number_format($detail->quantity * $detail->variant->price) }} ₫</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user"></i> Người gửi
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="senderName" class="form-label">Tên người gửi:</label>
                                <input type="text" class="form-control" id="senderName" value="Datch Fashion" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="senderPhone" class="form-label">Số điện thoại:</label>
                                <input type="text" class="form-control" id="senderPhone" value="0339381785" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="senderAddress" class="form-label">Địa chỉ:</label>
                                <input type="text" class="form-control" id="senderAddress" value="Ahihi Express" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user"></i> Người nhận
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="receiverName" class="form-label">Tên người nhận:</label>
                                <input type="text" class="form-control" id="receiverName" value="{{$order->fullname}}">
                            </div>
                            <div class="mb-3">
                                <label for="receiverPhone" class="form-label">Số điện thoại:</label>
                                <input type="text" class="form-control" id="receiverPhone" value="{{$order->phone}}">
                            </div>
                            <div class="mb-3">
                                <label for="receiverAddress" class="form-label">Địa chỉ:</label>
                                <input type="text" class="form-control" id="receiverAddress" value="{{$order->address}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Trạng thái đơn hàng
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                          <form action="{{route('orders.update', $order)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="payer" class="form-label">Trạng thái</label>
                            <select class="form-select" id="payer" name="status">
                                <option value="Chờ xác nhận" {{ $order->status == "Chờ xác nhận" ? 'selected' : '' }}>Chờ xác nhận</option>
                                <option value="Đã xác nhận" {{ $order->status == "Đã xác nhận" ? 'selected' : '' }}>Đã xác nhận</option>
                                <option value="Đang chuẩn bị hàng" {{ $order->status == "Đang chuẩn bị hàng" ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                                <option value="Đang giao hàng" {{ $order->status == "Đang giao hàng" ? 'selected' : '' }}>Đang giao hàng</option>
                                <option value="Đã giao hàng" {{ $order->status == "Đã giao hàng" ? 'selected' : '' }}>Giao hàng thành công</option>
                                <option value="Đơn hàng đã hủy" {{ $order->status == "Đơn hàng đã hủy" ? 'selected' : '' }}>Đơn hàng đã hủy</option>
                            </select>
                            
                            
                        </div>
                        
                    </div>
                </div>
                <div class="d-flex  ms-2">
                    <button type="submit" class="btn btn-success me-2">Cập nhật đơn hàng</button>
                    <a href="{{route('orders.index')}}"  class="btn btn-danger">Danh sách</a>
                </div>
            </div>
        </form>
            </div>
            
        </div>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection
@extends('Admin.layout.app')
@section('title', "Đơn hàng")

@section('title-page', "Đơn hàng")
@section('single-page', "Cập nhật đơn hàng")

@section('content')

<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
           
            <h2 class="text-center  ">Cập nhật đơn hàng : {{$order->code}}</h2>
            @if (session()->has('message'))
            <div class="alert alert-success text-white">
              {{session()->get('message')}}
            </div>
            @endif
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên Hàng</th>
                        <th>Màu</th>
                        <th>Size</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->OrderDetails as $detail)
                    <tr>
                        <td>{{$detail->variant->product->code}}</td>
                        <td><img src="{{asset($detail->variant->image)}}" alt="Ảnh sản phẩm" width="100"></td>
                        <td style="max-width:400px" class="text-truncate">{{ $detail->variant->product->name }}</td>
                        <td>{{ $detail->variant->color->name }}</td>
                        <td>{{ $detail->variant->size->name }}</td>
                        <td>{{ number_format($detail->variant->price) }} ₫</td>
                        <td>{{$detail->quantity}}</td>
                        <td>{{ number_format($detail->quantity * $detail->variant->price) }} ₫</td>
                    </tr>
                   
                    @endforeach
                        

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="text-end"><strong>Tổng tiền hàng:</strong></td>
                        <td><strong>{{ number_format($order->OrderDetails->sum(function($detail) { return $detail->quantity * $detail->variant->price; })) }} ₫</strong></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-end"><strong>Tiền giao hàng:</strong></td>
                        <td>@if (($order->OrderDetails->sum(function($detail) { return $detail->quantity * $detail->variant->price; }))  > 599000)
                            <strong>0₫</strong>
                        @else
                        <strong>30.000₫</strong>
                        @endif</td>
                    </tr>
                    {{-- <tr>
                        <td colspan="7" class="text-end"><strong>Giảm giá:</strong></td>
                        <td><strong>{{ number_format($order->discount) }} ₫</strong></td>
                    </tr> --}}
                    <tr>
                        <td colspan="7" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td><strong>{{ number_format($order->total_price) }} ₫</strong></td>
                    </tr>
                </tfoot>
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
                                <input type="text" class="form-control" id="receiverName" value="{{$order->fullname}}"  disabled>
                            </div>
                            <div class="mb-3">
                                <label for="receiverPhone" class="form-label">Số điện thoại:</label>
                                <input type="text" class="form-control" id="receiverPhone" value="{{$order->phone}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="receiverAddress" class="form-label">Địa chỉ:</label>
                                <input type="text" class="form-control" id="receiverAddress" value="{{$order->address}}" disabled>
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
                        <div class="">
                          <form action="{{route('orders.update', $order)}}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Trạng thái -->
                                <div class="col-md-3">
                                    <label for="payer" class="form-label">Trạng thái</label>
                                    <select class="form-select" id="payer" name="status" 
                                        {{ in_array($order->status, ['Đơn hàng đã hủy', 'Đã giao hàng']) ? 'disabled' : '' }}>
                                        <option value="Chờ xác nhận" {{ $order->status == "Chờ xác nhận" ? 'selected' : '' }}>Chờ xác nhận</option>
                                        <option value="Đã xác nhận" {{ $order->status == "Đã xác nhận" ? 'selected' : '' }}>Đã xác nhận</option>
                                        <option value="Đang chuẩn bị hàng" {{ $order->status == "Đang chuẩn bị hàng" ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                                        <option value="Đang giao hàng" {{ $order->status == "Đang giao hàng" ? 'selected' : '' }}>Đang giao hàng</option>
                                        <option value="Đã giao hàng" {{ $order->status == "Đã giao hàng" ? 'selected' : '' }}>Giao hàng thành công</option>
                                        <option value="Đơn hàng đã hủy" {{ $order->status == "Đơn hàng đã hủy" ? 'selected' : '' }}>Đơn hàng đã hủy</option>
                                    </select>
                                </div>
                                
                            
                                <!-- Ghi chú -->
                                <div class="col-md-9">
                                    <label for="note" class="form-label">Ghi chú</label>
                                    <textarea name="note" id="note" class="form-control" cols="30" rows="4">{{ old('note', $order->note) }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="d-flex justify-content-between ms-2">
                   <div>
                    <button type="submit" class="btn btn-success me-2">Cập nhật đơn hàng</button>
                    <a href="{{route('orders.index')}}"  class="btn btn-danger">Danh sách</a>
                   </div>
                    <div>
                        <a href="" class="btn btn-primary me-2"><i class="fa-solid fa-print me-1" style="color: #ffffff;"></i> In hóa đơn
                        </a>
                    </div>
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

<script>
     document.querySelector('form').addEventListener('submit', function (e) {
        const statusSelect = document.getElementById('payer');
        const noteTextarea = document.getElementById('note');

        if (statusSelect.value === 'Đơn hàng đã hủy' && noteTextarea.value.trim() === '') {
            e.preventDefault(); // Ngăn gửi form
            alert('Vui lòng ghi chú lý do hủy đơn hàng!');
            noteTextarea.focus(); // Đặt con trỏ vào ô ghi chú
        }
    });
</script>

@endsection

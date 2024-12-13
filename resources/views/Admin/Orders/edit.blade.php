@extends('Admin.layout.app')
@section('title', "Đơn hàng")

@section('title-page', "Đơn hàng")
@section('single-page', "Cập nhật đơn hàng")

@section('content')

<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card shadow-lg ">
            <div class="card-body border mt-3" style="margin-left: 200px; margin-right:200px;">
                <div class="text-center mb-4">
                    <h5 class="text-uppercase fw-bold">Hóa đơn chi tiết</h5>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold">Thông tin người nhận</h6>
                        <p class="mb-1"><strong>Tên người nhận: </strong>{{$order->fullname}}</p>
                        <p class="mb-1"><strong>Số điện thoại:</strong> {{$order->phone}}</p>
                        <p class="mb-1"><strong>Địa chỉ:</strong> {{$order->address}}</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p class="mb-1"><strong>Mã hóa đơn:</strong> {{$order->code}}</p>
                        <p class="mb-1"><strong>Ngày:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead class="">

                        <tr>
                            <th class="text-center">Mô tả</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Tổng</th>
                        </tr>
                    </thead>
                    <tbody class="border">
                        @foreach ($order->OrderDetails as $detail)
                        <tr>
                            <td class="text-center">{{ $detail->variant->product->name }} - {{ $detail->variant->color->name }} - {{ $detail->variant->size->name }}</td>
                            <td class="text-center">{{ number_format($detail->variant->price) }} ₫</td>
                            <td class="text-center">{{$detail->quantity}}</td>
                            <td class="text-center">{{ number_format($detail->quantity * $detail->variant->price) }} ₫</td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>

                <div class="row mt-4">
                    <div class="col-md-6 offset-md-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-end"><strong>Tổng:</strong></td>
                                    <td class="text-end">{{ number_format($order->OrderDetails->sum(function($detail) { return $detail->quantity * $detail->variant->price; })) }} ₫</td>
                                </tr>
                                <tr>
                                    <td class="text-end"><strong>Vận chuyển:</strong></td>
                                    <td class="text-end">{{ number_format($order->shiping)}} ₫</td>
                                </tr>
                                <tr>
                                    <td class="text-end"><strong>Giảm giá:</strong></td>
                                    <td class="text-end">{{ number_format($order->discount)}} ₫</td>
                                </tr>
                                <tr>
                                    <td class="text-end"><strong>Tổng đơn hàng:</strong></td>
                                    <td class="text-end fw-bold text-primary">{{ number_format($order->total_price)}} ₫</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <a href="{{route('orders.index')}}">
                    <button class="btn btn-success">Quay lại</button>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

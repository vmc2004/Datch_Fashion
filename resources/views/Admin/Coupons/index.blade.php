@extends('Admin.layout.app')
@section('title', 'Giảm giá')
@section('title-page', 'giảm giá')
@section('single-page', 'Danh sách mã giảm giá')
@section('content')

    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">

                    @if (session()->has('message'))
                        <div class="alert alert-success text-white">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="header">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <form action="{{ route('coupons.search') }}" method="GET">
                                @csrf
                                <input type="text" name="search-order" placeholder="Tìm kiếm mã giảm giá ...">
                            </form>
                        </div>
                        <h1>Đơn hàng</h1>
                        <div>
                            <button class="btn btn-custom btn-success">
                                <a href="{{ route('coupons.create') }}" class=" text-white"><i class="fas fa-plus "></i>Thêm mã giảm giá</a>
                            </button>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="bg-dark-subtle">

                                <th>Mã Giảm giá</th>
                                <th>Giảm giá</th>
                                <th>Loại giảm giá</th>
                                <th>Giới hạn sử dụng</th>
                                <th>Đã sử dụng</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày hết hạn</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->code }}</td>
                                    <td>
                                        @if ($coupon->discount_type=='percent')
                                        {{ number_format($coupon->discount,)}}%
                                        @elseif ($coupon->discount_type == 'fixed')
                                        {{ number_format($coupon->discount, 2)}}đ
                                        @endif
                                    </td>
                                    <td>{{ $coupon->discount_type }}</td>
                                    <td>{{ $coupon->usage_limit }}</td>
                                    <td>{{ $coupon->used_count }}</td>
                                    <td>{{ $coupon->start_date }}</td>
                                    <td>{{ $coupon->end_date }}</td>
                                    <td>
                                        <form action="{{ route('coupons.stateChangeCoupon', $coupon) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="btn btn-sm {{ $coupon->is_active ? 'btn-success' : 'btn-warning' }}">{{ $coupon->is_active ? 'Đang hoạt động' : 'Ngừng Hoạt động' }}</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('coupons.edit', $coupon) }}" class="btn btn-warning">Cập nhật</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center">

                        <nav>
                            <ul class="pagination">

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

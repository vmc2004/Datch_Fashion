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
                        <div class="alert alert-success text-white slide-in" id="success-message">
                            {{ session()->get('message') }}
                        </div>
                        <script>
                            const message = document.getElementById('success-message');

                            // Hiển thị thông báo với hiệu ứng cuộn từ từ từ trái qua phải
                            setTimeout(function() {
                                message.classList.add('show');
                            }, 100); // Thêm một chút trễ để hiệu ứng diễn ra mượt mà

                            // Ẩn thông báo sau 2 giây với hiệu ứng cuộn từ phải qua trái
                            setTimeout(function() {
                                message.classList.remove('show');
                                message.classList.add('hide', 'slide-out');

                                // Sau khi hiệu ứng kết thúc, hoàn toàn ẩn thông báo
                                setTimeout(function() {
                                    message.style.display = 'none';
                                }, 500); // Độ trễ của hiệu ứng cuộn 0.5 giây
                            }, 2000); // Thời gian hiển thị thông báo 2 giây
                        </script>
                    @endif



                    <h2 class="text-center">Danh sách mã giảm giá</h2>
                </div>
                <!-- Form tìm kiếm -->
                <!-- Form lọc danh mục -->
                <div class="container-fluid d-flex align-items-center justify-content-between">
                    <div class="flex-grow-1 me-3">
                        <form action="{{ route('categories.filter') }}" method="GET" class="row g-3">
                            <div class="col-md-5">
                                <select class="form-select" name="is_active">
                                    <option value="">Tất cả trạng thái</option>
                                    <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Hiển thị
                                    </option>
                                    <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Đã ẩn
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="form-select" name="sort">
                                    <option value="">Sắp xếp theo</option>
                                    <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A-Z</option>
                                    <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z-A</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Lọc</button>
                            </div>
                        </form>
                    </div>
                    <!-- Nút thêm mới -->
                    <div>
                        <a href="{{ route('coupons.create') }}" class="btn btn-success">
                            <i class="fa-solid fa-plus me-2"></i>Tạo mã giảm giá
                        </a>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-dark-subtle">

                            <th>Mã Giảm giá</th>
                            <th>Giảm giá</th>
                            <th>Số lượng</th>
                            <th>Đã sử dụng</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày hết hạn</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td><a href="{{ route('coupons.edit', $coupon) }}">{{ $coupon->code }}</a></td>
                                <td>
                                    @if ($coupon->discount_type == 'percent')
                                        {{ number_format($coupon->discount) }}%
                                    @elseif ($coupon->discount_type == 'fixed')
                                        {{ number_format($coupon->discount) }}đ
                                    @endif
                                </td>
                                <td>{{ $coupon->quantity }}</td>
                                <td>{{ $coupon->used }}</td>
                                {{-- <td>
                                        @if ($coupon->discount_type == 'percent')
                                        Theo phần trăm
                                        @elseif ($coupon->discount_type == 'fixed')
                                        Cố định
                                        @endif
                                    </td> --}}

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
                                    @if ($coupon->is_active == 0)
                                    @else
                                        <form action="{{ route('coupons.send_coupon', $coupon) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm border">Gửi mã</button>
                                        </form>
                                    @endif

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
                        .alert {
                            overflow: hidden;
                            /* Đảm bảo không hiển thị phần tràn ra ngoài */
                        }

                        /* Bắt đầu cuộn từ trái qua phải khi hiển thị */
                        .slide-in {
                            transform: translateX(-100%);
                            /* Bắt đầu ngoài màn hình bên trái */
                            opacity: 0;
                            /* Bắt đầu ẩn */
                            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
                            /* Hiệu ứng chuyển động */
                        }

                        .slide-in.show {
                            transform: translateX(0);
                            /* Di chuyển vào giữa màn hình */
                            opacity: 1;
                            /* Hiển thị đầy đủ */
                        }

                        /* Khi ẩn, cuộn từ phải qua trái */
                        .slide-out {
                            transform: translateX(0);
                            /* Bắt đầu ở giữa màn hình */
                            opacity: 1;
                            /* Hiển thị đầy đủ */
                            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
                            /* Hiệu ứng chuyển động khi ẩn */
                        }

                        .slide-out.hide {
                            transform: translateX(-100%);
                            /* Cuộn ra khỏi màn hình bên trái */
                            opacity: 0;
                            /* Ẩn hoàn toàn */
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

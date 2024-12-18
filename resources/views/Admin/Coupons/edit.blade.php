@extends('Admin.layout.app')

@section('title')
    Cập nhật mã giảm giá
@endsection

@section('title-page')
    Giảm giá
@endsection

@section('single-page')
    Cập nhật mã giảm giá
@endsection

@section('content')
    <div id="toast-container" class="fixed top-4 right-4 space-y-4 z-50"></div>

    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h2 class="text-center">Cập nhật mã giảm giá</h2>
                    <form method="POST" action="{{ route('coupons.update', $coupon) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="" class="form-label">Mã giảm giá</label>
                            <input type="text" name="code" class="form-control" id=""
                                value="{{ $coupon->code }}">
                        </div>

                        <div class="form-group">
                            <label for="my-select">Loại giảm giá</label>
                            <select id="my-select" class="form-control" name="discount_type">

                                <option value="fixed" @if ($coupon->discount_type == 'fixed') selected @endif>Cố định</option>
                                <option value="percent" @if ($coupon->discount_type == 'percent') selected @endif>Phần trăm</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Giảm giá</label>
                            <input type="number" name="discount" class="form-control" id=""
                                value="{{ $coupon->discount }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Số lượng mã</label>
                            <input type="number" name="quantity" class="form-control" id=""
                                value="{{ $coupon->quantity }}">
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Ngày bắt đầu</label>
                            <input type="date" name="start_date" class="form-control" id=""
                                value="{{ $coupon->start_date }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Ngày kết thúc</label>
                            <input type="date" name="end_date" class="form-control" id=""
                                value="{{ $coupon->end_date }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{ route('coupons.index') }}" class="btn btn-success">Quay lại</a>
                    </form>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('message'))
                showToast("{{ session('message') }}", "success");
            @endif
        });

        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toast-container');
            const toast = document.createElement('div');

            // Xác định màu dựa trên loại thông báo
            let bgColor;
            switch (type) {
                case 'success':
                    bgColor = 'bg-green-500';
                    break;
                case 'error':
                    bgColor = 'bg-red-500';
                    break;
                case 'warning':
                    bgColor = 'bg-yellow-500';
                    break;
                case 'info':
                    bgColor = 'bg-blue-500';
                    break;
                default:
                    bgColor = 'bg-gray-500';
            }

            // Nội dung Toast
            toast.className = `${bgColor} text-white px-4 py-2 rounded shadow-lg flex items-center justify-between`;
            toast.innerHTML = `
            <span>${message}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 text-white hover:text-black">
                &times;
            </button>
        `;

            // Thêm Toast vào container
            toastContainer.appendChild(toast);

            // Tự động ẩn sau 3 giây
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    </script>

@endsection

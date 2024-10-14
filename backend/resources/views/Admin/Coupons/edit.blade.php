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
<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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

        <h2 class="text-center">Cập nhật mã giảm giá</h2>
        <form method="POST" action="{{ route('coupons.update', $coupon) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Mã giảm giá</label>
                <input type="text" name="code" class="form-control" id="" value="{{$coupon->code}}">
            </div>
            
            
            <div class="form-group">
                <label for="my-select">Loại giảm giá</label>
                <select id="my-select" class="form-control" name="discount_type">
                    <option value="fixed" @if ($coupon->discount_type=='fixed') selected @endif >Cố định</option>
                    <option value="percent" @if ($coupon->discount_type=='percent') selected @endif>Phần trăm</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Giảm giá</label>
                <input type="number" name="discount" class="form-control" id=""  value="{{$coupon->discount}}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Số lượng mã</label>
                <input type="number" name="usage_limit" class="form-control" id="" value="{{$coupon->usage_limit}}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Giới hạn số lượng mã cho người dùng </label>
                <input type="number" name="usage_limit_per_user" class="form-control" id="" value="{{$coupon->usage_limit_per_user}}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Đã sử dụng</label>
                <input type="number" name="used_count" class="form-control" id="" value="{{$coupon->used_count}}">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Tổng tiền tối thiểu</label>
                <input type="number" name="minimum_amount" class="form-control" id="" value="{{$coupon->minimum_amount}}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Tổng tiền tối đa</label>
                <input type="number" name="maximum_amount" class="form-control" id="" value="{{$coupon->maximum_amount}}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ngày bắt đầu</label>
                <input type="datetime-local" name="start_date" class="form-control" id="" value="{{$coupon->start_date}}" >
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ngày kết thúc</label>
                <input type="datetime-local" name="end_date" class="form-control" id="" value="{{$coupon->end_date}}">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{route('coupons.index')}}" class="btn btn-success">Quay lại</a>
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
@endsection


@section('style')
    <style>
        .alert {
                                overflow: hidden; /* Đảm bảo không hiển thị phần tràn ra ngoài */
                            }

                            /* Bắt đầu cuộn từ trái qua phải khi hiển thị */
                            .slide-in {
                                transform: translateX(-100%); /* Bắt đầu ngoài màn hình bên trái */
                                opacity: 0; /* Bắt đầu ẩn */
                                transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out; /* Hiệu ứng chuyển động */
                            }

                            .slide-in.show {
                                transform: translateX(0); /* Di chuyển vào giữa màn hình */
                                opacity: 1; /* Hiển thị đầy đủ */
                            }

                            /* Khi ẩn, cuộn từ phải qua trái */
                            .slide-out {
                                transform: translateX(0); /* Bắt đầu ở giữa màn hình */
                                opacity: 1; /* Hiển thị đầy đủ */
                                transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out; /* Hiệu ứng chuyển động khi ẩn */
                            }

                            .slide-out.hide {
                                transform: translateX(-100%); /* Cuộn ra khỏi màn hình bên trái */
                                opacity: 0; /* Ẩn hoàn toàn */
                            }
    </style>
@endsection
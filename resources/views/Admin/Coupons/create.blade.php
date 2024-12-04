@extends('Admin.layout.app')

@section('title')
    Thêm mới mã giảm giá
@endsection

@section('title-page')
    Giảm giá
@endsection

@section('single-page')
    Thêm mới mã giảm giá
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

        <h2 class="text-center">Thêm mới mã giảm giá</h2>
        <form method="POST" action="{{ route('coupons.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Mã giảm giá</label>
                <input type="text" name="code" class="form-control" id="">
            </div>
            
            
            <div class="form-group">
                <label for="my-select">Loại giảm giá</label>
                <select id="my-select" class="form-control" name="discount_type">
                    <option value="fixed">Cố định</option>
                    <option value="percent">Phần trăm</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Giảm giá</label>
                <input type="number" name="discount" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Số lượng mã</label>
                <input type="number" name="usage_limit" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Giới hạn số lượng mã cho người dùng </label>
                <input type="number" name="usage_limit_per_user" class="form-control" id="">
            </div>

            {{-- <div class="mb-3">
                <label for="" class="form-label">Đã sử dụng</label>
                <input type="number" name="used_count" class="form-control" id="">
            </div> --}}


            <div class="mb-3">
                <label for="" class="form-label">Tổng tiền tối thiểu</label>
                <input type="number" name="minimum_amount" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Tổng tiền tối đa</label>
                <input type="number" name="maximum_amount" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ngày bắt đầu</label>
                <input type="date" name="start_date" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ngày kết thúc</label>
                <input type="date" name="end_date" class="form-control" id="">
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
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


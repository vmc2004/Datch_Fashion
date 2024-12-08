@extends('Admin.layout.app')
@section('title', "Dashboard")
@section('title-page', "Dashboard")
@section('content')

<div class="container-fluid py-4">
  <div class="row mb-4">
  <div class="col-12 text-center">
      <p class="display-4 text-black font-weight-bold">Danh mục thống kê</p>
    </div>
    <div class="col-12 text-center">
      <a href="{{ route('admin.index') }}" class="btn btn-danger mx-2">Thống kê đơn hàng doanh số</a>
      <a href="{{ route('admin.topProduct') }}" class="btn btn-success mx-2">Thống kê 10 sản phẩm bán chạy nhất</a>
      <a href="{{ route('admin.orderStatus') }}" class="btn btn-warning mx-2">Thống kê hàng tồn kho</a>
      <a href="{{ route('admin.orderStatus') }}" class="btn btn-info mx-2">Thống kê trạng thái đơn hàng</a>
    </div>
  </div>

  <div class="row mb-4">
    <form autocomplete="off" class="row">
      @csrf
      <div class="col-md-3 mb-3">
        <label for="datepicker" class="form-label text-white">Từ Ngày</label>
        <input type="text" id="datepicker" class="form-control" placeholder="Chọn ngày">
      </div>

      <div class="col-md-3 mb-3">
        <label for="datepicker2" class="form-label text-white">Đến Ngày</label>
        <input type="text" id="datepicker2" class="form-control" placeholder="Chọn ngày">
      </div>

      <div class="col-md-3 mb-3">
        <label for="filter" class="form-label text-white">Lọc Theo</label>
        <select class="dashboard-filter form-control" id="filter">
          <option value="">---Chọn---</option>
          <option value="1ngay">Hôm nay</option>
          <option value="7ngay">7 Ngày Qua</option>
          <option value="thangtruoc">Tháng trước</option>
          <option value="thangnay">Tháng này</option>
          <option value="365ngay">365 Ngày Qua</option>
        </select>
      </div>

      <div class="col-md-3 mb-3 d-flex align-items-end">
        <button type="button" id="btn-dashboard-filter" class="btn btn-primary w-100 mt-4">Lọc kết quả</button>
      </div>
    </form>
  </div>

  <div class="row mb-4">
    <div class="col-md-12">
      <div id="mychart" class="bg-light" style="height: 250px;"></div>
    </div>
  </div>

    <div class="row mb-4">
  <div class="col-sm-12">
    <p class="display-4 text-center text-dark font-weight-bold mb-4">
      <i class="fas fa-chart-line"></i> Bảng thống kê doanh số
    </p>
    <table class="table table-bordered table-striped table-hover"  id="orderTable">
      <thead class="table-dark">
        <tr>
          <th><i class="fas fa-calendar-day"></i> Thời gian</th>
          <th><i class="fas fa-box"></i> Số lượng đơn hàng</th>
          <th><i class="fas fa-cogs"></i> Số lượng sản phẩm đã bán</th>
          <th><i class="fas fa-dollar-sign"></i> Tổng giá trị</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dữ liệu sẽ được hiển thị ở đây -->
      </tbody>
    </table>
  </div>
</div>


</div>

@endsection
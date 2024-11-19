@extends('Admin.layout.app')
@section('title', "Dashboard")
@section('title-page', "Dashboard")
@section('content')


<div class="container-fluid py-3">
  <style type="text/css">
    p.title_thongke {
      text-align: center;
      font-size: 25px;
      font-weight: bold;
      color: black;
    }
    option{
      text-align: center;
    }
    p{
      color: black;
    }
  </style>

  <div class="row ">
    <p class="title_thongke">Thống kê đơn hàng doanh số</p>

        <form autocomplete="off" class="row">
        @csrf
        <div class="col-md-2">
          <p>Từ Ngày : <input type="text" id="datepicker" class="form-control"></p>
          <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
          
        </div>
        
        <div class="col-md-2">
          <p>Đến Ngày : <input type="text" id="datepicker2" class="form-control"></p>
        </div>

        <div class="col-md-2">
          <p>
            Lọc Theo :
            <select class="dashboard-filter form-control">
              <option>>---Chọn---<</option>
              <option value="7ngay">7 Ngày Qua</option>
              <option value="thangtruoc">Tháng trước</option>
              <option value="thangnay">Tháng này</option>
              <option value="365ngay">365 Ngày Qua</option>
            </select>
          </p>
        </div>
        </form>
  </div>

  <div class="col-md-12 py-4">
    <div id="mychart" style="height:250px;">
  </div>
  </div>

  <div class="row"></div>
    <div class="col-sm-12">
      <p class="title_thongke">Top 10 sản phẩm bán chạy</p>
      <table class="table">
                        <thead class="table-dark">
                              <th>#</th>
                              <th>Tên Sản Phẩm</th>
                              <th>Hình Ảnh</th>
                              <th>Giá</th>
                              <th>Lượt Bán</th>
                        </thead>
                        <tbody class="table-light">
                            <td></td>
                        </tbody>
                    </table>

    </div>

    <div class="col-sm-12">
      <p class="title_thongke">Thống kê đơn hàng theo Trạng Thái</p>
      <table class="table">
                        <thead class="table-dark">
                              <th>#</th>
                              <th>Tên Sản Phẩm</th>
                              <th>Hình Ảnh</th>
                              <th>Hình thức thanh toán</th>
                              <th>Tình Trạng Đơn Hàng</th>
                        </thead>
                        
                    </table>

    </div>
</div>

@endsection
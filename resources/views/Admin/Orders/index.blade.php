@extends('Admin.layout.app')
@section('title', "Đơn hàng")

@section('content')

<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
           

            <h2>Đơn hàng</h2>
            <div class="d-flex justify-content-end align-items-center mb-3">
                
                    <a href="{{route('orders.create')}}" class="btn btn-success me-1 "> <i class="fa-solid fa-plus"></i>  Bán hàng</a>
                    <button type="button" class="btn btn-success"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Xuất file</button>
                
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-dark-subtle">
                        <th><input type="checkbox" ></th>
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền hàng</th>
                        <th>Giảm giá</th>
                        <th>Khách đã trả</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>HD028222</td>
                        <td>29/12/2017 13:47</td>
                        <td>Khách lẻ</td>
                        <td>113,000</td>
                        <td>0</td>
                        <td>113,000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>HD028103</td>
                        <td>24/12/2017 21:32</td>
                        <td>Khách lẻ</td>
                        <td>800,000</td>
                        <td>400,000</td>
                        <td>400,000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>HD028067</td>
                        <td>24/12/2017 12:21</td>
                        <td>Khách lẻ</td>
                        <td>282,000</td>
                        <td>0</td>
                        <td>282,000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>HD028036</td>
                        <td>23/12/2017 18:51</td>
                        <td>Khách lẻ</td>
                        <td>1,066,000</td>
                        <td>0</td>
                        <td>1,066,000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>HD028021</td>
                        <td>23/12/2017 15:33</td>
                        <td>Khách lẻ</td>
                        <td>188,000</td>
                        <td>0</td>
                        <td>188,000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>HD027616</td>
                        <td>30/11/2017 11:48</td>
                        <td>Khách lẻ</td>
                        <td>217,500</td>
                        <td>0</td>
                        <td>217,500</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>HD027554</td>
                        <td>27/11/2017 21:36</td>
                        <td>Khách lẻ</td>
                        <td>375,000</td>
                        <td>0</td>
                        <td>375,000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class=""></td>
                        <td>HD027496</td>
                        <td>26/11/2017 19:17</td>
                        <td>Khách lẻ</td>
                        <td>188,000</td>
                        <td>0</td>
                        <td>188,000</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>113,000</td>
                        <td>0</td>
                        <td>113,000</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Hiển thị 1 - 10 trên tổng số 518 hóa đơn</p>
                </div>
                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                    </ul>
                </nav>
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
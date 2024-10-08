@extends('Admin.layout.app')
@section('title', "Đơn hàng")
@section('title-page', "Đơn hàng")
@section('single-page', "Danh sách đơn hàng")
@section('content')

<div class="row m-4 vh-90">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
           
  @if (session()->has('message'))
      <div class="alert alert-success text-white">
        {{session()->get('message')}}
      </div>
      @endif
            <div class="header">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                   <form action="{{route('orders.search')}}" method="GET">
                    @csrf
                    <input type="text" name="search-order" placeholder="Tìm kiếm đơn hàng...">
                   </form>
                </div>
                <h1>Đơn hàng</h1>
                <div>
                    <button class="btn btn-custom btn-success"><a href="{{route('orders.create')}}" class=" text-white"><i class="fas fa-plus "></i>Bán hàng</a></button>
                    <button class="btn btn-custom btn-success"><i class="fas fa-file-export"></i>Xuất file</button>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-dark-subtle">
                        
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền hàng</th>
                        <th>Trạng thái</th>
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
                
                <nav>
                    <ul class="pagination">
                        <li>{{$orders->links()}}</li>
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
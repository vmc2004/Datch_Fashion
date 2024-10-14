@extends('Admin.layout.app')

@section('title')
    Thêm mới người dùng
@endsection

@section('title-page')
    Người dùng
@endsection

@section('single-page')
    Thêm mới người dùng
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

    <div class="container" style="width: 60%">
        <h2>Thêm mới người dùng</h2>
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Họ và tên</label>
                <input type="text" name="fullname" class="form-control" id="">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Số điện thoại</label>
                <input type="tel" name="phone" class="form-control" id="">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">password</label>
                <input type="text" name="password" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="my-select">role</label>
                <select id="my-select" class="form-control" name="role">
                    <option value="member">Member</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{route('users.index')}}" class="btn btn-success">Quay lại</a>
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
</div>
@endsection


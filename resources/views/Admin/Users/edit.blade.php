@extends('Admin.layout.app')

@section('title')
    Cập nhật người dùng
@endsection

@section('title-page')
    Người dùng
@endsection

@section('single-page')
    Cập nhật người dùng
@endsection

@section('content')
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

    <div class="container" style="width: 60%">
        <form method="POST" action="{{route('users.update',$user)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Họ và tên</label>
                <input type="text" value="{{$user->fullname}}" name="fullname" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ảnh đại diện</label>
                <input type="file" name="avatar" class="form-control" id="">
                <img src="{{asset('storage/'.$user->avatar)}}" width="100px" alt="">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Số điện thoại</label>
                <input type="tel" name="phone" value="{{$user->phone}}" class="form-control" id="">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Địa chỉ</label>
                <input type="text" name="address" value="{{$user->address}}" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="">
            </div>

            @if ($user->email == Auth::user()->email)
                <div class=""></div>
            @else
            <div class="mb-3">
                <label for="" class="form-label">password</label>
                <input type="text" name="password" value="{{$user->password}}" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="my-select">role</label>
                <select id="my-select" class="form-control" name="role">
                    <option value="member">Member</option>
                    <option value="admin" {{$user->role=='admin'?'selected':''}}>Admin</option>
                </select>
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Cập nhật</button>
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


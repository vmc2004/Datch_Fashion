@extends('Admin.layout.app')

@section('title')
    Danh sách người dùng
@endsection

@section('title-page')
    Người dùng
@endsection

@section('single-page')
    Danh sách người dùng
@endsection

@section('content')
<div class="container-fluid">
    <a href="{{route('users.create')}}" class="btn btn-success">Thêm người dùng  </a>
    @if (session()->has('message'))
      <div class="alert alert-success text-white">
        {{session()->get('message')}}
      </div>
    @endif
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      </div>
      <div class="card-body">
        <div class="table-responsive">
          {{-- search --}}
          <form action="{{route('users.search')}}" method="GET" class="row g-3 mb-1">
            <div class="d-flex ms-auto">
              <div class="col-md-8">
                <input type="text" name="fullname" class="form-control" value="{{ request('fullname') }}" placeholder="Tìm kiếm theo tên">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass me-2"></i>Tìm kiếm</button>
            </div>
            </div>
        </form>
        {{-- end search --}}
          <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user )
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->fullname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->phone}}</td>
                <td><p class="text-{{$user->role=='admin'?'primary':'warning'}}">{{$user->role}}</p></td>
                <td>
                  <form action="{{route('users.stateChange',$user)}}" method="post">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm {{$user->status?'btn-warning':'btn-success'}}">{{$user->status?'Ngừng kích hoạt':'kích hoạt'}}</button>
                  </form>
                </td>
                <td>
                  <a href="{{route('users.edit',$user)}}" class="btn btn-warning">Cập nhật</a>
                  <form class="d-inline" action="{{route('users.destroy',$user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Xóa</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$users->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection


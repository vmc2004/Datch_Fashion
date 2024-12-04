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
          <!-- Form tìm kiếm -->
          <div class="container-fluid mb-3 mt-4   ">
            <form action="{{route('users.search')}}" method="GET" class="row g-3">
                <div class="col-md-9">
                    <input type="text" name="fullname" class="form-control" placeholder="Tìm kiếm theo tên"
                        value="{{ request('fullname') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-50">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>Tìm kiếm
                    </button>
                </div>
            </form>
        </div>

        <!-- Form lọc danh mục -->
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 me-3">
                <form action="{{route('users.filter')}}" method="GET" class="row g-3">
                    <div class="col-md-5">
                        <select class="form-select" name="status">
                            <option value="">Tất cả trạng thái</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Đang kích hoạt</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Ngừng kích hoạt</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select class="form-select" name="sort">
                            <option value="">Sắp xếp theo</option>
                            <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A-Z</option>
                            <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z-A</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Lọc</button>
                    </div>
                </form>
            </div>
            <!-- Nút thêm mới -->
            <div>
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus me-2"></i>Tạo người dùng mới
                </a>
            </div>
        </div>
          <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>Họ và tên</th>
                <th>Ảnh đại diện</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user )
              <tr>
                <td>{{$user->fullname}}</td>
                <td><img src="{{asset('uploads/'.$user->avatar)}}" alt="" width="120px" ></td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td><p class="text-{{$user->role=='admin'?'primary':'warning'}}">{{$user->role}}</p></td>
                <td>
                  @if ($user['email'] == Auth::user()->email)
                  <p class="text-primary font-weight-bold">Đang đăng nhập</p>
                  @else
                  <form action="{{route('users.stateChange',$user)}}" method="post">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm {{$user->status?'btn-success':'btn-warning'}}">{{$user->status?'Đang kích hoạt':'Ngừng kích hoạt'}}</button>
                  </form>
                  @endif
                </td>
                <td>
                  <a href="{{route('users.edit',$user)}}" class="btn btn-warning">Cập nhật</a>
                  {{-- <form class="d-inline" action="{{route('users.destroy',$user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Xóa</button>
                  </form> --}}
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


@extends('Admin.layout.app')

@section('title')
    Quản lý phân quyền
@endsection

@section('title-page')
    Phân quyền
@endsection

@section('single-page')
    Danh sách phân quyền
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Header -->
        <div class="card mt-3">
            <h3 class="card-header text-center">Danh sách phân quyền</h3>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success text-white">
            {{ session()->get('message') }}
        </div>
    @endif

        <!-- Thanh tìm kiếm và thêm mới -->
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              

                <!-- Nút thêm mới -->
                <a href="{{ route('roles.create') }}" class="btn btn-primary ms-auto">
                    <i class="fas fa-plus"></i> Thêm mới
                </a>
            </div>
        </div>


        <!-- Bảng danh sách người dùng -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tên vai trò</th>
                        <th>Tên hiện thị</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>
                                <!-- Nút chỉnh sửa -->
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-link text-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Nút xóa -->
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Phân trang -->
        
           
            {{ $roles->links() }}
       
    </div>
</div>
@endsection

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
<div class="container mt-5">
    <h1 class="my-4 text-center">Thêm phân quyền</h1>

    {{-- Hiển thị thông báo lỗi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

   
        <div class="mb-3 mt-9">
            <label for="name" class="form-label">Tên vai trò</label>
            <input type="text" name="name" id="name" class="form-control" value="" required>
        </div>

       
        <div class="mb-3">
            <label for="display_name" class="form-label">Tên hiện thị</label>
            <input type="display_name" name="display_name" id="display_name" class="form-control" value="" required>
        </div>

        
        <div class="mb-3">
            <label for="group" class="form-label">Nhóm</label>
            <select name="group" class="form-control">
                <option value="system">System</option>
                <option value="user">User</option>

            </select>

        </div>


        <div class="mb-3">
            <label for="role" class="form-label">Quyền</label>
            <div class="row">
                @foreach ($permission as $groupName => $permission)
                    <div class="col-5">
                        <h4>{{ $groupName }}</h4>

                        <div>
                            @foreach ($permission as $item)
                                <div class="form-check">
                                    <input class="form-check-input" name="permission_ids[]" type="checkbox"
                                        value="{{ $item->id }}">
                                    <label class="custom-control-label"
                                        for="customCheck1">{{ $item->display_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        {{-- Nút gửi --}}
        <button type="submit" class="btn btn-primary text-center">Thêm mới</button>
    </form>
</div>
@endsection

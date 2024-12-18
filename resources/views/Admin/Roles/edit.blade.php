@extends('Admin.layout.app')

@section('title')
    Quản lý phân quyền
@endsection

@section('title-page')
    Phân quyền
@endsection

@section('single-page')
    Sửa phân quyền
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="my-4 text-center">Sửa phân quyền</h1>

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
    @if (session()->has('message'))
    <div class="alert alert-success text-white">
        {{ session()->get('message') }}
    </div>
@endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

   
        <div class="mb-3 mt-9">
            <label for="name" class="form-label">Tên vai trò</label>
            <input type="text" name="name" value="{{ old('name') ?? $role->name }}" id="name" class="form-control">

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

       
        <div class="mb-3">
            <label for="display_name" class="form-label">Tên hiển thị</label>
            <input type="text" name="display_name" value="{{ old('display_name') ?? $role->display_name }}" id="display_name" class="form-control">
            @error('display_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        

        
        <div class="mb-3">
            <label for="group" class="form-label">Nhóm</label>
            <select name="group" class="form-control">
                <option value="system" {{ $role->group == 'system' ? 'selected' : '' }}>Hệ thống</option>
                <option value="user" {{ $role->group == 'user' ? 'selected' : '' }}>Người dùng</option>
                <option value="admin" {{ $role->group == 'admin' ? 'selected' : '' }}>Quản trị</option>
            </select>

            @error('group')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        </div>


        <div class="mb-3">
            <label for="role" class="form-label">Quyền</label>
            <div class="row">
                @foreach ($permissions as $groupName => $permission)
                <div class="col-5">
                    <h4>{{ $groupName }}</h4>
                    <div>
                        @foreach ($permission as $item)
                            <div class="form-check">
                                <input class="form-check-input" name="permission_ids[]" type="checkbox"
                                {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                     value="{{ $item->id }}">
                                <label class="custom-control-label" for="">
                                    {{ $item->display_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            
            </div>

        </div>

        {{-- Nút gửi --}}
        <button type="submit" class="btn btn-primary text-center">Cập nhật</button>
        <a href="{{ route('roles.index') }}" class="btn btn-success">Quay lại</a>
    </form>
</div>
@endsection

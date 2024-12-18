@extends('Admin.layout.app')
@section('title', "Danh mục")
@section('title-page', "Danh mục")
@section('single-page', "Thêm mới danh mục")
@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="container">
                        <h2 class="text-center">Thêm mới danh mục</h2>
                        <br>
                        <br>
                        

                        @if ($errors->any())
                            <div class="alert alert-danger ">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Danh mục cha</label>
                                <select class="form-select" id="parent_id" name="parent_id">
                                    <option value="">Không có danh mục cha</option>
                                    @foreach ($categories as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                        @if ($parent->children)
                                            @foreach ($parent->children as $child)
                                                <option value="{{ $child->id }}">-- {{ $child->name }}</option>
                                                @if ($child->children)
                                                    @foreach ($child->children as $grandchild)
                                                        <option value="{{ $grandchild->id }}">---- {{ $grandchild->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Ảnh danh mục</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            {{-- <div class="mb-3">
                                <label for="is_active" class="form-label">Trạng thái</label>
                                <select class="form-select" id="is_active" name="is_active">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div> --}}
                            <a href="{{ route('categories.index') }}" class="btn btn-primary ">
                                <i class="fa-solid fa-arrow-left me-2"></i>Quay lại trang danh sách
                            </a>
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

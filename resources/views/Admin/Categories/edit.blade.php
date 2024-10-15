@extends('Admin.layout.app')

@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="container">
                        <h2>Cập nhật danh mục</h2>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-2">
                            <i class="fa-solid fa-arrow-left me-2"></i>Quay lại trang danh sách
                        </a>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success text-white">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <form action="{{ route('categories.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $category->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Danh mục cha</label>
                                <select class="form-select" id="parent_id" name="parent_id">
                                    <option value="">Không có danh mục cha</option>
                                    @foreach ($categories as $parent)
                                        <option value="{{ $parent->id }}"
                                            {{ $category->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name }}
                                        </option>
                                        @if ($parent->children)
                                            @foreach ($parent->children as $child)
                                                <option value="{{ $child->id }}"
                                                    {{ $category->parent_id == $child->id ? 'selected' : '' }}>--
                                                    {{ $child->name }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <img src="{{ asset($category->image) }}" alt="" width="100px">
                                <label for="image" class="form-label">Ảnh danh mục</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            {{-- <div class="mb-3">
                                <label for="is_active" class="form-label">Trạng thái</label>
                                <select class="form-select" id="is_active" name="is_active">
                                    <option value="1" {{ $category->is_active ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ !$category->is_active ? 'selected' : '' }}>Ẩn</option>
                                </select>
                            </div> --}}

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('Admin.layout.app')
@section('title', 'Bài viết')
@section('title-page', 'Bài viết')
@section('single-page', 'Danh sách bài viết')
@section('content')

    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">

                    @if (session()->has('message'))
                        <div class="alert alert-success text-white">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success text-white">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                        <h2 class="text-center">Danh sách bài viết</h2>
                                      <!-- Form tìm kiếm -->
                                      <div class="container-fluid mb-3 mt-4   ">
                                        <form action="{{ route('categories.search') }}" method="GET" class="row g-3">
                                            <div class="col-md-9">
                                                <input type="text" name="name" class="form-control" placeholder="Tìm kiếm theo tiêu đề bài viết"
                                                    value="{{ request('name') }}">
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
                                            <form action="{{ route('categories.filter') }}" method="GET" class="row g-3">
                                                <div class="col-md-5">
                                                    <select class="form-select" name="is_active">
                                                        <option value="">Tất cả trạng thái</option>
                                                        <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Hiển thị</option>
                                                        <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Đã ẩn</option>
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
                                            <a href="{{ route('blogs.create') }}" class="btn btn-success">
                                                <i class="fa-solid fa-plus me-2"></i>Tạo bài viết
                                            </a>
                                        </div>
                                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu Đề</th>
                                <th>Ảnh</th>
                                <th>Trạng Thái</th>
                                <th>Danh mục</th>
                                <th>Người Đăng</th>
                                <th>Ngày Tạo</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"  style="font-size: 11px">
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $blog->title }}
                                </td>
                                <td>
                                    <img src="{{asset($blog->image)}}" alt="" width="100px">
                                </td>
                                {{-- <td>{{ Str::limit($blog->content, 50) }}</td> --}}
                                <td>{!! $blog->status
                                    ? '<span class="badge text-bg-success text-white">Hiển thị</span>'
                                    : '<span class="badge text-bg-danger text-white">Ẩn</span>' !!}</td>
                                {{-- <td>{{ $blog->status }}</td> --}}
                                <td>{{ $blog->category->name}}</td>
                                <td>{{ $blog->user->fullname}}</td>
                                <td>{{ $blog->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning">Sửa</a>
                                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links() }}
                    <div class="d-flex justify-content-between align-items-center">

                        <nav>
                            <ul class="pagination">

                            </ul>
                        </nav>

                    </div>

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

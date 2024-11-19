@extends('Admin.layout.app')
@section('title', 'Màu sắc')
@section('title-page', 'Màu sắc')
@section('single-page', 'Danh sách màu sắc')
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
                    <div class="header">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <form action="" method="GET">
                                @csrf
                                <input type="text" name="search-order" placeholder="">
                            </form>
                        </div>
                        <h1>Bài viết</h1>
                        <div>
                            <button class="btn btn-custom btn-success"><a href="{{ route('blogs.create') }}"
                                    class=" text-white"><i class="fas fa-plus "></i>Thêm mới</a></button>
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
                                <td>{{ $blog->title }}</td>
                                <td>
                                    <img src="{{asset($blog->image)}}" alt="" width="100px">
                                </td>
                                {{-- <td>{{ Str::limit($blog->content, 50) }}</td> --}}
                                <td>{!! $blog->status
                                    ? '<span class="badge text-bg-success">Hiển thị</span>'
                                    : '<span class="badge text-bg-danger">Ẩn</span>' !!}</td>
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

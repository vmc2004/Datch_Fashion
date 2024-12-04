@extends('Admin.layout.app')

@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header text-center">Danh sách thương hiệu</h3>
                    </div>
                    <div class="container-fluid mt-4   ">
                        <form action="{{ route('brands.search') }}" method="GET" class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm thương hiệu"
                                    value="{{ request('keyword') }}">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i> Tìm kiếm
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Form lọc danh mục -->
                    <div class="container-fluid d-flex align-items-center justify-content-between">
                        <div class="flex-grow-1 me-3">
                            <form action="{{ route('brands.filter') }}" method="GET" class="row g-3">
                                <div class="col-md-5">
                                    <select class="form-select" name="sort">
                                        <option value="#">Sắp xếp theo</option>
                                        <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A-Z</option>
                                        <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z-A</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fa-solid fa-filter me-2"></i>Lọc
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Nút thêm mới -->
                        <div>
                            <a href="{{ route('brands.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-plus me-2"></i>Tạo mới thương hiệu
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên thương hiệu</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->logo)
                                            <img src="{{ asset($item->logo) }}" width="100px" height="70px"
                                                alt="Logo">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('brands.edit', $item->id) }}"><button
                                                    class="btn btn-warning">Sửa</button></a>
                                            <form action="{{ route('brands.destroy', $item->id) }}" method="POST"
                                                onclick="return confirm('Bạn có muốn xóa sản phẩm??')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger ms-2">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

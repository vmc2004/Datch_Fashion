@extends('Admin.layout.app')
@section('title', 'Sản phẩm')
@section('title-page', 'Sản phẩm')
@section('single-page', 'Danh sách sản phẩm')
@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header text-center">Danh sách sản phẩm</h3>
                    </div>
                    <form action="{{ route('products.search') }}" method="GET" class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm"
                                value="{{ request('keyword') }}">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa-solid fa-magnifying-glass me-2"></i> Tìm kiếm
                            </button>
                        </div>
                    </form>

                    <!-- Form lọc danh mục -->
                    <div class="container-fluid d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 me-3">
                            <form action="{{ route('products.filter') }}" method="GET" class="row g-3">
                                <!-- Lọc theo trạng thái -->
                                <div class="col-md-5">
                                    <select class="form-select" name="is_active">
                                        <option value="#">Tất cả trạng thái</option>
                                        <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Hiển thị
                                        </option>
                                        <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Đã ẩn
                                        </option>
                                    </select>
                                </div>

                                <!-- Sắp xếp theo tên -->
                                <div class="col-md-5">
                                    <select class="form-select" name="sort">
                                        <option value="#">Sắp xếp theo</option>
                                        <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A-Z</option>
                                        <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z-A</option>
                                    </select>
                                </div>

                                <!-- Nút lọc -->
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fa-solid fa-filter me-2"></i>Lọc
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Nút thêm mới -->
                        <div>
                            <a href="{{ route('products.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-plus me-2"></i>Tạo mới sản phẩm
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Mã SKU</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Chất liệu</th>
                                    <th scope="col">TTHĐ</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Thương hiệu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $item)
                                    {{-- @if ($item->status == '1') --}}
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td style="max-width:100px ;" class="text-truncate">{{ $item->name }}</td>
                                            <td>{{ number_format($item->price) }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" width="100px" alt="">
                                                @endif
                                            </td>
                                            <td class="text-truncate" style="max-width: 100px;">{{ $item->material }}</td>
                                            <td>{!! $item->status
                                                ? '<span class="badge text-bg-success text-white">Hiển thị</span>'
                                                : '<span class="badge text-bg-danger text-white">Ẩn</span>' !!}</td>
                                            <td>{!! $item->is_active
                                                ? '<span class="badge text-bg-success text-white">Còn hàng</span>'
                                                : '<span class="badge text-bg-danger text-white">Hết hàng</span>' !!}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->brand->name }}</td>
                                            <td>
                                                <a href="{{ route('productVariants.create', $item->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                                <a href="{{ route('productVariants.index', $item->id) }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-list"></i></a>
                                                <a href="{{ route('products.edit', $item->id) }}"
                                                    class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </tr>
                                    {{-- @else
                                        <div class=""></div>
                                    @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
 
                </div>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

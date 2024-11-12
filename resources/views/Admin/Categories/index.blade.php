@extends('Admin.layout.app')

@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="mb-3 d-flex">
                        <h2 class="">Quản lý danh mục</h2>
                        <!-- Nút thêm mới danh mục -->
                        <div class="ms-3 mt-1">
                            <a href="{{ route('categories.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-plus me-2"></i>Thêm mới
                            </a>
                        </div>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success text-white">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <!-- Form tìm kiếm -->
                    <form action="{{ route('categories.search') }}" method="GET" class="row g-3 mb-1">
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" placeholder="Tìm kiếm theo tên"
                                value="{{ request('name') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-magnifying-glass me-2"></i>Tìm kiếm
                            </button>
                        </div>
                    </form>

                    <!-- Form lọc danh mục -->
                    <form action="{{ route('categories.filter') }}" method="GET" class="row g-3 mb-4">
                        <div class="col-md-4">
                            <select class="form-select" name="is_active">
                                <option value="">Tất cả trạng thái</option>
                                <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Hiển thị</option>
                                <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Đã ẩn</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" name="sort">
                                <option value="">Sắp xếp theo</option>
                                <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A-Z</option>
                                <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z-A</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Lọc</button>
                        </div>
                    </form>

                    <!-- Bảng danh sách danh mục -->
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên danh mục</th>
                                <th>Danh mục cha</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                @include('Admin.Categories.category_row', ['category' => $category, 'level' => 0])
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $categories->links() }}
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

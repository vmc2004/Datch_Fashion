@extends('Admin.layout.app')
@section('title', "Sản phẩm")
@section('title-page', "Sản phẩm")
@section('single-page', "Danh sách sản phẩm")
@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header text-center">Danh sách sản phẩm</h3>
                    </div>
                    <a href="{{ route('products.create') }}" class="btn btn-success mt-3"> <i class="fa-solid fa-plus me-2"></i>Thêm sản phẩm</a>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã SKU</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Chất liệu</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">TTHĐ</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Thương hiệu</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $index => $item)
                                        @if ($item->status=='1')
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td style="max-width:100px ;" class="text-truncate">{{ $item->name }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{asset($item->image)}}" width="100px" alt="">
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
                                                <a href="{{route('productVariants.create',$item->id)}}" class="btn btn-success">Thêm biến thể</a>
                                                <a href="{{route('productVariants.index',$item->id)}}" class="btn btn-primary">Danh sách biến thể</a>
                                                <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                                        </tr>
                                        @else
                                            <div class=""></div>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>

                    </div> --}}
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    @endsection

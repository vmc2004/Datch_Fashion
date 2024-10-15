@extends('Admin.layout.app')

@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header">Danh sách biến thể</h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Màu sắc</th>
                                        <th scope="col">Kích cỡ</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Giá sale</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productVariants as $productVariant)
                                        
                                        <tr>
                                            <td>{{ $productVariant->product->name }}</td>
                                            <td>{{ $productVariant->color->name }}</td>
                                            <td>{{ $productVariant->size->name }}</td>
                                            <td>{{$productVariant->price}}</td>
                                            <td>{{$productVariant->sale_price}}</td>
                                            <td>{{$productVariant->quantity}}</td>
                                            <td><img src="{{asset('storage/'.$productVariant->image)}}" style="width: 100px" alt=""></td>
                                            <td>
                                                <a href="{{route('productVariants.edit',$productVariant->id)}}" class="btn btn-warning">Cập nhật</a>
                                                <a href="{{route('products.index')}}" class="btn btn-success">Quay lại</a>
                                            </td>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>

                    </div> --}}
                    </div>
                    {{ $productVariants->links() }}
                </div>
            </div>
        </div>
    @endsection
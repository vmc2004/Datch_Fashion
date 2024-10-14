@extends('Admin.layout.app')

@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header">Danh sách thương hiệu</h3>
                    </div>
                    <a href="{{ route('brands.create') }}" class="btn btn-success mt-3">Thêm thương hiệu</a>
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
                                            <img src="{{ asset('storage/' . $item->logo) }}" width="100px" height="70px" alt="Logo">
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
                                                <button class="btn btn-danger">Xóa</button>
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

<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
</div>
@extends('Admin.layout.app')

@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header">Cập nhật thương hiệu</h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-lable">Tên thương hiệu</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $brand['name']) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-lable">Hình ảnh: </label>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror"
                                value="{{ old('logo', $brand['logo']) }}">
                            @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if ($brand->logo)
                                <img src="{{ asset('storage/' . $brand->logo) }}" width="100px" height="70px"
                                    alt="">
                            @endif
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

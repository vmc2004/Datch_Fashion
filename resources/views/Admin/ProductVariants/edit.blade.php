@extends('Admin.layout.app')
@section('title', "Biến thể")
@section('title-page', "Sản phẩm")
@section('single-page', "Cập nhật Biến thể")
@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header">Cập nhật biến thể sản phẩm</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body p-3">
                        <form action="{{ route('productVariants.update', $productVariant->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="color" class="form-lable">Màu sắc </label>
                                <select id="status" name="color_id" class="form-select @error('color_id') is-invalid @enderror">
                                    <option value="">-- Chọn màu sắc --</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" {{ $color->id == old('color_id', $productVariant->color_id) ? 'selected' : '' }}>{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="size" class="form-lable">Kích cỡ </label>
                                <select id="status" name="size_id" class="form-select @error('size_id') is-invalid @enderror">
                                    <option value="">-- Chọn kích cỡ --</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}" {{ $size->id == old('size_id', $productVariant->size_id) ? 'selected' : '' }}>{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-lable">Số lượng </label>
                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $productVariant->quantity) }}">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-lable">Giá </label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $productVariant->price) }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sale_price" class="form-lable">Giá sale</label>
                                <input type="number" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price', $productVariant->sale_price) }}">
                                @error('sale_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-lable">Hình ảnh: </label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $productVariant->image) }}">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                <a href="{{ route('productVariants.index', $productVariant->product_id) }}" class="btn btn-primary ms-2">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@extends('Admin.layout.app')

@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header">Thêm mới sản phẩm</h3>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="code" class="form-lable">Mã SKU</label>
                                <input type="text" name="code"
                                    class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}">
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-lable">Tên sản phẩm</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-lable">Hình ảnh: </label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-lable">Mô tả sản phẩm:</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30"
                                    rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="material" class="form-lable">Chất liệu: </label>
                                <input type="text" name="material"
                                    class="form-control @error('material') is-invalid @enderror"
                                    value="{{ old('material') }}">
                                @error('material')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-lable">Trạng thái: </label>
                                {{-- <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}"> --}}
                                <select id="status" name="status"
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="is_active" class="form-lable">Trạng thái: </label>
                                {{-- <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}"> --}}
                                <select id="is_active" name="is_active"
                                    class="form-select @error('is_active') is-invalid @enderror">
                                    <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Không hoạt động
                                    </option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-lable">Danh mục: </label>
                                {{-- <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}"> --}}
                                <select class="form-select" name="category_id">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="brand_id" class="form-lable">Thương hiệu: </label>
                                {{-- <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}"> --}}
                                <select class="form-select" name="brand_id">
                                    @foreach ($brands as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <h3>Biến thể sản phẩm</h3>
                            <div class="mb-3">
                                <button class="btn btn-primary" id="add_variant">Thêm biến thể</button>
                            </div>
                            <div id="variant">

                            </div>


                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Thêm mới</button>
                            </div>
                        </form>
                        <script>
                            var add_variant = document.querySelector('#add_variant');
                            var variant = document.querySelector('#variant');
                            var html = ``;
                            add_variant.addEventListener('click', function(e) {
                                e.preventDefault();
                                html = `
                                <div class="mb-3">
                                    <label for="color_id" class="form-lable">Màu sắc: </label>
                                    <select class="form-select" name="color_id[]">
                                        @foreach ($colors as $item)
                                            <option value="{{ $item->id }}" ">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('color_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="size_id" class="form-lable">Size: </label>
                                    <select class="form-select" name="size_id[]">
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('size_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-lable">Số lượng: </label>
                                    <input type="number" value="0" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-lable">Hình ảnh: </label>
                                    <input type="file" name="images[]" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            `;
                                variant.innerHTML += html;
                            })
                            document.addEventListener('change', function(e) {
                                if (e.target.matches('select[name="color_id[]"]')) {
                                    const selectedOption = e.target.options[e.target.selectedIndex];
                                    const colorCode = selectedOption.getAttribute('data-color');
                                    const colorPreview = e.target.nextElementSibling; // div color-preview

                                    colorPreview.style.backgroundColor = colorCode;
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    @endsection

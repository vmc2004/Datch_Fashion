@extends('Admin.layout.app')
@section('title', "Biến thể")
@section('title-page', "Sản phẩm")
@section('single-page', "Thêm mới Biến thể")
@section('content')
    <div class="row m-4 vh-90">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="card mt-3">
                        <h3 class="card-header">Thêm mới biến thể sản phẩm {{$product->name}}</h3>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error )
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body p-3">
                        <form action="{{ route('productVariants.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <input type="hidden" value="{{$product->id}}" name="product_id"
                                    class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id') }}">
                                @error('product_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="color" class="form-lable">Màu sắc </label>
                                {{-- <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}"> --}}
                                <select id="status" name="color_id"
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value="">-- Chọn màu sắc --</option>
                                    @foreach ($colors as $color )
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="size" class="form-lable">Kích cỡ </label>
                                {{-- <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}"> --}}
                                <select id="status" name="size_id"
                                    class="form-select @error('size_id') is-invalid @enderror">
                                    <option value="">-- Chọn kích cỡ --</option>
                                    @foreach ($sizes as $size )
                                        <option value="{{$size->id}}" >{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-lable">Số lượng </label>
                                <input type="number" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-lable">Giá </label>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sale_price" class="form-lable">Giá sale</label>
                                <input type="number" name="sale_price"
                                    class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price') }}">
                                @error('sale_price')
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

                            {{-- <h3>Biến thể sản phẩm</h3>
                            <div class="mb-3">
                                <button class="btn btn-primary" id="add_variant">Thêm biến thể</button>
                            </div>
                            <div id="variant">

                            </div>
                            --}}
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Thêm mới</button>
                                <a href="{{route('productVariants.index',$product->id)}}" class="btn btn-primary ms-2">Quay lại</a>
                            </div>
                        </form>
                        {{-- <script>
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
                        </script> --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "1000",
        "hideDuration": "500",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "easeOutQuart",
        "hideEasing": "easeInQuart",
        "showMethod": "slideDown",
        "hideMethod": "fadeOut"
    };

    const colorSelect = document.querySelector('select[name="color_id"]');
    const sizeSelect = document.querySelector('select[name="size_id"]');
    const submitButton = document.querySelector('button[type="submit"]');

    function checkDuplicate() {
        const product_id = document.querySelector('input[name="product_id"]').value;
        const color_id = colorSelect.value;
        const size_id = sizeSelect.value;

        if (color_id && size_id) {
            fetch("{{ route('productVariants.checkDuplicate') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id,
                    color_id,
                    size_id
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    toastr.error('Biến thể sản phẩm này đã tồn tại!');
                    submitButton.disabled = true;
                } else {
                    toastr.success('Biến thể hợp lệ! Bạn có thể cập nhật.');
                    submitButton.disabled = false;
                }
            });
        }
    }

    colorSelect.addEventListener('change', checkDuplicate);
    sizeSelect.addEventListener('change', checkDuplicate);
});

    </script>
    

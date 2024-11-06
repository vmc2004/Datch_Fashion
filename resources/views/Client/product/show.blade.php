@extends('Client.layout.layout')

@section('title', 'Chi tiết sản phẩm')


@section('content')
<hr>
<div class="max-w-screen-xl mx-auto ">
    <div class="container flex mx-auto flex">
        <div class="mb-5">
            <ul class="flex container mx-auto pt-2 pb-2 text-sm ">
                <li>
                    <a class="hover:underline cursor-pointer" href="/">
                        Datch Fashion
                    </a>
                </li>
                <li>
                    <span class="mx-4">&gt;</span>
                    <a class="hover:underline cursor-pointer" href="">{{$product->category->name}}</a>
                </li>
                <li>
                    <span class="mx-4">&gt;</span>
                    <a class="hover:underline cursor-pointer" href="">{{$product->name}}</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex  shadow p-4 rounded">
        <!-- Left Section: Product Images -->
        <div class="w-1/2">
            <div class="relative">
                <div><img alt="Ảnh sản phẩm" class="image-container" class="w-full border" height="800" src="{{asset('/storage/'. $product->image)}}" width="600" alt="Zoomed Image" class="zoom-image" /></div>
                <button class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md">
                    <i class="fas fa-chevron-left">
                    </i>
                </button>
                <button class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md">
                    <i class="fas fa-chevron-right">
                    </i>
                </button>
            </div>
            <div class="flex mt-4 space-x-2">
                @php
                // Loại bỏ các biến thể có màu trùng lặp bằng cách chỉ lấy các biến thể có id màu sắc duy nhất
                $uniqueVariants = $product->ProductVariants->unique('color_id');
                @endphp
                @foreach ($uniqueVariants as $variant)
                <img alt="Ảnh biến thể" class="w-20 h-20 border" src="{{ asset('/storage/' . $variant->image) }}" width="100" height="100" />
                @endforeach
            </div>
        </div>
        <!-- Right Section: Product Details -->
        <div class="w-1/2 pl-8">


            <h1 class="text-2xl font-bold flex">
                {{$product->name}}
                <button class="action action-wishlist action towishlist action towishlist ml-8	">
                    <i class="fa-regular fa-heart fa-xl"></i>
                </button>
            </h1>
            <p class="text-gray-500">
                Mã sản phẩm: {{$product->code}}
            </p>


            <p class="text-2xl font-bold text-red-600 mt-2">
                {{ number_format($product->ProductVariants->first()?->price ?? 0) }} đ
            </p>
            @if($product->ProductVariants->first()->price > 599000)
            <div class="bg-red-600 text-white text-center py-2 mt-4">
                <i class="fas fa-shipping-fast">
                </i>
                FREESHIP TOÀN BỘ ĐƠN HÀNG Khi chọn mua sản phẩm
            </div>
            @endif
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <!-- Trường ẩn chứa ID của sản phẩm -->
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mt-4">
                    <p class="font-bold">
                        Màu sắc:
                        <span id="selectedColorName" class="text-gray-500">
                            {{$product->ProductVariants->first()->color->name}}
                        </span>
                    </p>

                    <div class="flex space-x-2 mt-2">
                        @php
                        // Loại bỏ các màu trùng lặp bằng cách chỉ lấy các biến thể có id màu sắc duy nhất
                        $uniqueColors = $product->ProductVariants->unique('color_id');
                        @endphp

                        @foreach ($uniqueColors as $variant)
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="{{ $variant->color->id }}" class="hidden color-radio" data-color-name="{{ $variant->color->name }}" onchange="highlightColor(this)">
                            <div class="color-option w-8 h-8 border border-gray-300 rounded-full"
                                style="background-color: {{ $variant->color->color_code }}">
                            </div>
                        </label>
                        @endforeach

                    </div>
                </div>
                <div class="mt-4">
                    <p class="font-bold">
                        Kích cỡ:
                    </p>
                    <div class="flex space-x-2 mt-2">
                        @foreach ($product->ProductVariants as $variant)
                        <input type="button" name="size"
                            class="size-option w-10 h-10 border border-gray-300 rounded"
                            value="{{ $variant->size->name }}"
                            onclick="highlightSize(this)">
                        @endforeach
                    </div>
                </div>
                <p class="font-bold">
                    Số lượng:
                </p>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center border rounded-lg px-1 py-1">
                        <button class="text-gray-500" onclick="decrement()">−</button>
                        <input type="number" id="quantity" value="1" min="0" class="mx-2 w-10 text-center appearance-none   ">
                        <button class="text-gray-500" onclick="increment()">+</button>
                    </div>
                </div>


                <div class="mt-4 flex space-x-4 ">
                    <button class="border border-red-500 rounded-lg px-4 py-2 text-black" type="submit">Thêm vào giỏ hàng</button>
                    <button class="bg-red-600 text-white py-2 px-4 rounded">
                        Mua ngay
                    </button>
                </div>
            </form>

            <div class="mt-4">
                <h2 class="font-bold">
                    Mô tả
                </h2>
                <p class="text-gray-700 mt-2">
                    {{$product->description}}
                </p>
            </div>
            <div class="mt-4">
                <h2 class="font-bold">
                    Chất liệu
                </h2>
                <p class="text-gray-700 mt-2">
                    {{$product->material}}
                </p>
            </div>
            <div class="mt-4">
                <h2 class="font-bold">
                    Hướng dẫn sử dụng
                </h2>
                <p class="text-gray-700 mt-2">
                    Giặt máy ở chế độ nhẹ, nhiệt độ thường.
                    Không sử dụng hóa chất tẩy có chứa Clo.
                    Phơi trong bóng mát.
                    Sấy khô ở nhiệt độ thấp.
                    Là ở nhiệt độ thấp 110 độ C.
                    Giặt với sản phẩm cùng màu.
                    Không là lên chi tiết trang trí.
                </p>
            </div>
        </div>
    </div>


    {{-- Gợi ý mua cùng  --}}
    <div class="container mx-auto p-4 pt-10">
        <h2 class="text-2xl font-semibold mb-4">
            Gợi ý mua cùng
        </h2>
        <div class="grid grid-cols-4 gap-4">
            <!-- Product 1 -->
            @foreach ($related_products as $hihi)
            <div class="text-center">
                <img alt="Ảnh sản phẩm gợi ý" class="w-full" height="400"
                    src="{{ asset('/storage/' . $hihi->image) }}" width="300" />
                <div class="flex justify-center mt-2">
                    <div class="w-4 h-4 bg-blue-800 rounded-full border border-gray-300">
                    </div>
                </div>
                <p class="mt-2 text-gray-700">
                    {{ $hihi->name }}
                </p>
                @if ($hihi->ProductVariants->first()?->sale_price != 0)
                <p class="text-lg font-semibold">
                    {{ number_format($hihi->ProductVariants->first()?->sale_price ?? 0) }} đ
                </p>
                <p class="text-gray-500 line-through">
                    {{ number_format($hihi->ProductVariants->first()?->price ?? 0) }} đ
                </p>
                @else
                <p class="text-gray-500 ">
                    {{ number_format($hihi->ProductVariants->first()?->price ?? 0) }} đ
                </p>
                @endif

                <p class="text-red-600">
                    -50%
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    // Hiệu ứng chọn cho màu 
    function highlightColor(selectedInput) {
        const colorName = selectedInput.getAttribute('data-color-name');
        document.getElementById('selectedColorName').textContent = colorName;
        // Loại bỏ viền từ tất cả các tùy chọn màu
        document.querySelectorAll('.color-option').forEach(element => {
            element.classList.remove('border-4', 'border-gray-500', 'p-2'); // bỏ border khi không được chọn
        });

        // Thêm viền cho tùy chọn màu đã chọn
        selectedInput.nextElementSibling.classList.add('border-4', 'border-gray-500', 'p-2');
    }
    // Hiệu ứng chọn cho size 
    function highlightSize(selectedButton) {
        // Loại bỏ viền nổi bật từ tất cả các nút kích thước
        document.querySelectorAll('.size-option').forEach(element => {
            element.classList.remove('border-4', 'border-blue-500'); // loại bỏ border khi không được chọn
        });

        // Thêm viền nổi bật cho nút kích thước đã chọn
        selectedButton.classList.add('border-4', 'border-blue-500');
    }

    function increment() {
        // Lấy giá trị hiện tại của ô nhập
        let quantityInput = document.getElementById('quantity');
        let currentValue = parseInt(quantityInput.value);

        // Tăng giá trị lên 1
        quantityInput.value = currentValue + 1;
    }

    function decrement() {
        // Lấy giá trị hiện tại của ô nhập
        let quantityInput = document.getElementById('quantity');
        let currentValue = parseInt(quantityInput.value);

        // Kiểm tra nếu giá trị lớn hơn 0 thì mới giảm
        if (currentValue > 0) {
            quantityInput.value = currentValue - 1;
        }
    }
    const imageContainer = document.querySelector('.image-container');
    const zoomImage = document.querySelector('.zoom-image');
    imageContainer.addEventListener('mousemove', (e) => {
        const rect = imageContainer.getBoundingClientRect();
        const x = e.clientX - rect.left; // Vị trí X tương đối trong container
        const y = e.clientY - rect.top; // Vị trí Y tương đối trong container
        const moveX = (x / rect.width) * 100;
        const moveY = (y / rect.height) * 100;
        zoomImage.style.transformOrigin = `${moveX}% ${moveY}%`;
    });
    imageContainer.addEventListener('mouseleave', () => {
        zoomImage.style.transformOrigin = "center center"; // Đưa ảnh về trung tâm khi rời chuột
    });
</script>
<style>
    .image-container {
        position: relative;
        overflow: hidden;

        cursor: url('https://example.com/search-icon.png'), auto;
        /* Thay đổi biểu tượng trỏ chuột */
    }

    .zoom-image {
        width: 100%;
        height: 100%;
        transition: transform 0.3s ease;
        transform-origin: center;
        position: absolute;
        left: 0;
        top: 0;
    }

    .image-container:hover .zoom-image {
        transform: scale(1.5);
        /* Phóng to ảnh khi hover */
    }
</style>
@endsection
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
                    <a class="hover:underline cursor-pointer" href="">{{ $product->category->name }}</a>
                </li>
                <li>
                    <span class="mx-4">&gt;</span>
                    <a class="hover:underline cursor-pointer" href="">{{ $product->name }}</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex p-4 rounded">
        <!-- Left Section: Product Images -->
        <div class="w-5/12	mr-8">
            <div class="relative">
                <!-- Ảnh lớn hiển thị chính -->
                <div class="relative image-container">
                    <img alt="Ảnh sản phẩm" class="zoom-image " src="{{ asset( $product->image) }}"  />

                    <!-- Nút Trái -->
                    <button class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md left-arrow">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <!-- Nút Phải -->
                    <button class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md right-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="flex mt-4 space-x-2 ml-8">
                @php
                $uniqueVariants = $product->ProductVariants->unique('color_id');
                @endphp

                <div class="flex mt-4 space-x-2">
                    @foreach ($uniqueVariants as $variant)
                    <img alt="Ảnh biến thể" class="w-20 h-20 border thumbnail"
                        src="{{ asset($variant->image) }}" />
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Right Section: Product Details  2-->
        <div class="w-1/2 pl-8">
            <h1 class="text-2xl font-bold flex">
                {{ $product->name }}
                <button class="action action-wishlist action towishlist action towishlist ml-8	">
                    <i class="fa-regular fa-heart fa-xl"></i>
                </button>
            </h1>
            <p class="text-gray-500">
                Mã sản phẩm: {{ $product->code }}
            </p>


            <p class="text-2xl font-bold text-red-600 mt-2">
                {{ number_format($product->ProductVariants->first()?->price ?? 0) }} đ
            </p>
            @if ($product->ProductVariants->first()->price > 599000)
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
                <input type="hidden" id="selectedColorId" name="color_id" value="">
                <input type="hidden" id="selectedSizeId" name="size_id" value="">
                <div class="mt-4">
                    <p class="font-bold">
                        Màu sắc:
                        <span id="selectedColorName" class="text-gray-500">
                            {{ $product->ProductVariants->first()->color->name }}
                        </span>
                    </p>

                    <div class="flex space-x-2 mt-2">
                        @php
                        $uniqueColors = $product->ProductVariants->unique('color_id');
                        @endphp

                        @foreach ($uniqueColors as $variant)
                        <button type="button" class="color-button w-8 h-8 border border-gray-300 rounded-full"
                            style="background-color: {{ $variant->color->color_code }};"
                            data-color-id="{{ $variant->color->id }}"
                            data-color-name="{{ $variant->color->name }}" onclick="selectColor(this)">
                        </button>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4">
                    <p class="font-bold">
                        Kích cỡ:
                    </p>
                    <div class="flex space-x-2 mt-2">
                        @foreach ($product->ProductVariants->unique('size_id') as $variant)
                        <input type="button" name="size"
                            class="size-option w-10 h-10 border border-gray-300 rounded"
                            value="{{ $variant->size->name }}" data-size="{{ $variant->size_id }}"
                            onclick="highlightSize(this)">
                    @endforeach
                    
                    </div>
                </div>
                <p class="font-bold">Số lượng:</p>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center border rounded-lg px-1 py-1">
                        <button type="button" class="text-gray-500" onclick="decrement()">−</button>
                        <input type="number" id="quantity" name="quantity" value="1" min="1"
                            class="mx-2 w-10 text-center appearance-none">
                        <button type="button" class="text-gray-500" onclick="increment()">+</button>
                    </div>
                </div>


                <div class="mt-4 flex space-x-4">
                    <button class="border border-red-500 rounded-lg px-4 py-2 text-black" type="submit">Thêm vào giỏ
                        hàng</button>
                    <button class="bg-red-600 text-white rounded-lg px-4 py-2">Mua ngay</button>
                </div>
            </form>

            <div class="mt-4">
                <h2 class="font-bold">
                    Mô tả
                </h2>
                <p class="text-gray-700 mt-2">
                    {{ $product->description }}
                </p>
            </div>
            <div class="mt-4">
                <h2 class="font-bold">
                    Chất liệu
                </h2>
                <p class="text-gray-700 mt-2">
                    {{ $product->material }}
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

    <div class="container mx-auto p-4 pt-10">
        <div id="toast" class="toast">Bình luận của bạn đã được gửi thành công!</div>
        <h2 class="text-2xl font-semibold mb-4 t">
            Bình luận sản phẩm
        </h2>

        <p class="mt-2"><span class="font-bold">Đánh giá trung bình:</span> {{ round($avgRating, 1) }}/5 <i
                class="fa-solid fa-star text-warning"></i></p>

        <div class="row">
            @foreach ($comments as $comment)
            @if ($comment->status == 'approved')
            <div class="comment my-2 col-sm-4 col-md-4">
                <p><span class="font-bold">Đăng bởi:</span> {{ $comment->user->fullname }} vào ngày
                    {{ $comment->created_at->format('d/m/Y') }}
                </p>
                <p><span class="font-bold">Nội dung:</span> {{ $comment->content }}</p>
                <p><span class="font-bold">Đánh giá:</span> {{ $comment->rating }} sao</p>
            </div>
            @else
            <div></div>
            @endif
            @endforeach
            {{ $comments->links() }}
        </div>
        <hr class="mb-3">

        @if (Auth::check())
        <form action="{{ route('comments.sendComment', $product->id) }}" method="POST"
            class="comment-form w-100">
            @csrf
            <div class="star-rating">
                <input type="radio" id="star5" name="rating" value="5" />
                <label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star4">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star1">&#9733;</label>
            </div>

            <textarea name="content" placeholder="Viết bình luận của bạn..." required></textarea>
            <button type="submit" class="submit-button">Gửi bình luận</button>
        </form>
        @else
        <div class=""></div>
        @endif
    </div>


    {{-- gợi ý mua cùng --}}
    <div class="container mx-auto p-4 pt-10">
        <h2 class="text-2xl font-semibold mb-4">
            Gợi ý mua cùng
        </h2>
        <div class="grid grid-cols-4 gap-4">
            <!-- Product 1 -->
            @foreach ($related_products as $hihi)
            <div class="text-center">
                <a href="/product/{{$hihi->slug}}">
                <img alt="Ảnh sản phẩm gợi ý" class="w-full" height="400"
                    src="{{ asset($hihi->image) }}" width="300" />
                </a>
                <div class="flex justify-center mt-2">
                    @foreach ($hihi->ProductVariants->unique('color_id') as $variant)
                        <div class="w-4 mr-1 h-4 rounded-full border border-gray-300" 
                            style="background-color: {{ $variant->color->color_code }}">
                        </div>
                    @endforeach
                
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
            </div>
            @endforeach
        </div>
    </div>

    @endsection

    @section('javascript')
    <script>
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

        function selectColor(button) {
            // Lấy color_id và color name từ thuộc tính của button
            let selectedColorId = button.getAttribute('data-color-id');
            let selectedColorName = button.getAttribute('data-color-name');

            // Gán giá trị vào trường ẩn để submit form
            document.getElementById('selectedColorId').value = selectedColorId;

            // Hiển thị tên màu được chọn
            document.getElementById('selectedColorName').textContent = selectedColorName;

            console.log('Selected color_id:', selectedColorId);
        }

        function highlightSize(selectedButton) {
            document.querySelectorAll('.size-option').forEach(element => {
                element.classList.remove('border-4', 'border-blue-500');
            });

            selectedButton.classList.add('border-4', 'border-blue-500');

            // Lấy size_id từ thuộc tính data
            const sizeId = selectedButton.getAttribute('data-size');
            console.log('ID kích cỡ đã chọn:', sizeId);

            // Cập nhật giá trị của input ẩn
            document.getElementById('selectedSizeId').value = sizeId;
        }

        function increment() {
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        }

        function decrement() {
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        async function handleSubmit(event) {
            event.preventDefault();

            let form = event.target;
            let formData = new FormData(form);

            // Log tất cả các trường và giá trị của chúng
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            try {
                let response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                if (response.ok) {
                        showToast1();
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    } else {
                        console.error('Lỗi khi thêm sản phẩm vào giỏ');
                        let errorData = await response.json();
                        console.error('Chi tiết lỗi:', errorData);
                    }
                } catch (error) {
                    console.error('Đã xảy ra lỗi:', error);
                }
            }

            function showToast1() {
                const toast1 = document.getElementById('toast1');
                toast1.classList.add('show');

                setTimeout(() => {
                    toast1.classList.remove('show');
                }, 3000);
            }
        document.addEventListener("DOMContentLoaded", () => {
            const mainImage = document.querySelector(".zoom-image");
            const thumbnails = document.querySelectorAll(".thumbnail");
            let currentIndex = 0; // Chỉ số ảnh to hiện tại

            // Hàm cập nhật ảnh chính và ảnh con
            function updateImages(newIndex) {
                // Hoán đổi ảnh to và ảnh con tại vị trí mới
                const tempSrc = mainImage.src;
                mainImage.src = thumbnails[newIndex].src;
                thumbnails[newIndex].src = tempSrc;

                // Cập nhật chỉ số ảnh to hiện tại
                currentIndex = newIndex;
            }

            // Sự kiện khi nhấn vào ảnh con
            thumbnails.forEach((thumbnail, index) => {
                thumbnail.addEventListener("click", () => {
                    updateImages(index);
                });
            });

            // Sự kiện khi nhấn nút trái
            document.querySelector(".left-arrow").addEventListener("click", () => {
                const newIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
                updateImages(newIndex);
            });

            // Sự kiện khi nhấn nút phải
            document.querySelector(".right-arrow").addEventListener("click", () => {
                const newIndex = (currentIndex + 1) % thumbnails.length;
                updateImages(newIndex);
            });
        });
    </script>
    <style>
        .image-container {
            position: relative;
            overflow: hidden;

            height: 500px;
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

        .rounded {
            padding: 0;
        }
    </style>
    @endsection

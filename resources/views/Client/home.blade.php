@extends('Client.layout.layout')

@section('title', 'Trang chủ')


@section('content')
    @include('Client.layout.slide')
    {{-- <div class="bird-container">
    <img src="https://chillnfree.vn/assets/images/bird-animation-desktop-1.gif" alt="chillnfree" class="bird-animation bird-desktop" id="birdAnimation">
</div> --}}
    <div class="max-w-screen-xl mx-auto py-8" data-aos="fade-up">



        <h2 class="text-2xl font-semibold text-left">Danh mục bạn yêu thích</h2>
        <div class="relative">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">

                @foreach ($brands as $brand)
                    <div class="text-center">
                        <a href="/cua-hang/thuong-hieu/{{ $brand->id }}">
                            <div class="w-24 h-24 mx-auto rounded-full bg-white shadow-lg flex items-center justify-center">
                                <img src="{{ asset($brand->logo) }}" alt="Ảnh danh mục {{ $brand->name }}"
                                    class="w-24 h-24 rounded-full">
                            </div>
                            <p class="mt-2">{{ $brand->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Sản phẩm mới đăng</h2>
        <div class="relative">
            <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach ($newPro as $new)
                    <div class="relative text-center group">
                        <!-- Container của ảnh sản phẩm -->
                        <div class="relative">
                            <a href="/product/{{ $new->slug }}">
                                <img alt="Ảnh sản phẩm gợi ý" class="w-full duration-100 transform group-hover:scale-110"
                                    height="400" src="{{ asset($new->image) }}" width="300" />
                            </a>

                            <!-- Nền xám và chữ "Hết hàng" -->
                            @if (!$new->is_active)
                                <div
                                    class="absolute inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center text-white text-xl font-semibold opacity-0 group-hover:opacity-100 duration-200">
                                    Hết hàng
                                </div>
                            @endif
                        </div>

                        <!-- Thông tin sản phẩm -->
                        <div class="flex justify-center mt-2">
                            @foreach ($new->ProductVariants->unique('color_id') as $variant)
                                <div class="w-4 mr-1 h-4 rounded-full border border-gray-300"
                                    style="background-color: {{ $variant->color->color_code }}">
                                </div>
                            @endforeach
                        </div>
                        <p class="mt-2 text-gray-700">
                            {{ $new->name }}
                        </p>
                        @if ($new->ProductVariants->first()?->sale_price != 0)
                            <p class="text-lg font-semibold">
                                {{ number_format($new->ProductVariants->first()?->sale_price ?? 0) }} đ
                            </p>
                            <p class="text-gray-500 line-through">
                                {{ number_format($new->ProductVariants->first()?->price ?? 0) }} đ
                            </p>
                        @else
                            <p class="text-gray-500">
                                {{ number_format($new->ProductVariants->first()?->price ?? 0) }} đ
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="max-w-screen-xl mx-auto py-8">
            <h2 class="text-2xl font-semibold mb-4">Sản phẩm nổi bật</h2>
            <div class="relative">
                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6">
                    @foreach ($Proview as $view)
                        <div class="text-center">
                            <a href="/product/{{ $view->slug }}">
                                <img alt="Ảnh sản phẩm gợi ý" class="w-full hover:scale-110 duration-100" height="400"
                                    src="{{ asset($view->image) }}" width="300" />
                            </a>
                            <div class="flex justify-center mt-2">
                                @foreach ($view->ProductVariants->unique('color_id') as $variant)
                                    <div class="w-4 mr-1 h-4 rounded-full border border-gray-300"
                                        style="background-color: {{ $variant->color->color_code }}">
                                    </div>
                                @endforeach
                            </div>
                            <p class="mt-2 text-gray-700">
                                {{ $view->name }}
                            </p>
                            @if ($view->ProductVariants->first()?->sale_price != 0)
                                <p class="text-lg font-semibold">
                                    {{ number_format($view->ProductVariants->first()?->sale_price ?? 0) }} đ
                                </p>
                                <p class="text-gray-500 line-through">
                                    {{ number_format($view->ProductVariants->first()?->price ?? 0) }} đ
                                </p>
                            @else
                                <p class="text-gray-500">
                                    {{ number_format($view->ProductVariants->first()?->price ?? 0) }} đ
                                </p>
                            @endif
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

        <div class="max-w-screen-xl mx-auto py-8">
            <h2 class="text-2xl font-semibold mb-4">Sản phẩm yêu thích</h2>
            <div class="relative">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6" id="wishlist-container">
                    <!-- Sản phẩm yêu thích sẽ được thêm vào đây -->
                </div>
            </div>
        </div>
        <script>
            AOS.init({
                duration: 1200, // Thời gian chạy hiệu ứng (tính bằng ms)
            });

            function getWishlist() {
                return JSON.parse(localStorage.getItem('wishlist')) || [];
            }

            // Hàm render danh sách yêu thích từ localStorage
            function renderWishlist() {
                const wishlist = getWishlist();
                const wishlistContainer = document.querySelector('#wishlist-container');

                if (wishlist.length === 0) {
                    wishlistContainer.innerHTML = '<p>Danh sách yêu thích trống</p>';
                    return;
                }

                const gridHTML = wishlist.map(item => {
                    return `
            <div class="text-center">
                <a href="/product/${item.slug}">
                    <img alt="Ảnh sản phẩm yêu thích" class="w-full hover:scale-110 duration-100" height="400" src="${item.image}" width="300" />
                </a>
                <div class="flex justify-center mt-2">
                    <div class="w-4 mr-1 h-4 rounded-full border border-gray-300" style="background-color: ${item.color_code}"></div>
                </div>
                <p class="mt-2 text-gray-700">
                    ${item.name}
                </p>
                ${item.sale_price ? `
                                                                                                            <p class="text-lg font-semibold">
                                                                                                                ${new Intl.NumberFormat('vi-VN').format(item.sale_price)} đ
                                                                                                            </p>
                                                                                                            <p class="text-gray-500 line-through">
                                                                                                                ${new Intl.NumberFormat('vi-VN').format(item.price)} đ
                                                                                                            </p>
                                                                                                        ` : `
                                                                                                            <p class="text-gray-500">
                                                                                                                ${new Intl.NumberFormat('vi-VN').format(item.price)} đ
                                                                                                            </p>
                                                                                                        `}
                    </div>
                `;
                }).join('');

                wishlistContainer.innerHTML = gridHTML;
            }

            // Gọi renderWishlist khi trang được tải
            document.addEventListener('DOMContentLoaded', function() {
                renderWishlist();
            });
        </script>
        <style>
            .product-item {
                transition: all 0.3s ease-in-out;
                /* Thêm hiệu ứng mượt mà khi ẩn/hiện */
            }

            .slick-carousel .product-item {
                display: block;
                /* Đảm bảo rằng các phần tử có thể hiển thị */
            }

            /* Thêm hiệu ứng hover */
            .product-item:hover {
                transform: scale(1.05);
                /* Hiệu ứng phóng to khi hover */
            }

            /* Đảm bảo hiệu ứng hover mở rộng */
            .group {
                position: relative;
            }

            .group:hover img {
                transform: scale(1.1);
                /* Hiệu ứng phóng to ảnh */
            }

            .group .absolute {
                transition: opacity 0.2s ease-in-out;
                /* Hiệu ứng chuyển đổi mềm mại */
            }

            .group:hover .absolute {
                opacity: 1;
                /* Nền xám và chữ hiện ra khi hover */
            }

            .bg-gray-800 {
                background-color: rgba(31, 41, 55, 0.8);
                /* Màu nền xám */
            }

            .bg-opacity-50 {
                background-color: rgba(0, 0, 0, 0.5);
                /* Độ mờ nền xám */
            }

            .opacity-0 {
                opacity: 0;
                /* Mặc định ẩn lớp phủ */
            }

            .group-hover\:opacity-100 {
                opacity: 1;
                /* Hiện lớp phủ khi hover */
            }

            .duration-200 {
                transition-duration: 200ms;
                /* Thời gian chuyển đổi */
            }
        </style>
    @endsection

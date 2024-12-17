@extends('Client.layout.layout')

@section('title', 'Trang chủ')


@section('content')


    @include('Client.layout.slide')
    {{-- <div class="bird-container">
    <img src="https://chillnfree.vn/assets/images/bird-animation-desktop-1.gif" alt="chillnfree" class="bird-animation bird-desktop" id="birdAnimation">
</div> --}}
    <div class="max-w-screen-xl mx-auto py-8" data-aos="fade-up">



        <h2 class="text-2xl font-semibold text-left">Thương hiệu</h2>
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
            <div class="relative w-full overflow-hidden">
                <!-- Slide container -->
                <div class="flex transition-transform duration-500 ease-in-out" id="slider-wrapper">
                    @foreach ($newPro as $new)
                        <div class="flex-shrink-0 w-full md:w-1/3 lg:w-1/5 px-2">
                            <div class="text-center">
                                <a href="/product/{{ $new->slug }}">
                                    <img alt="Ảnh sản phẩm gợi ý" class="w-full hover:scale-110 duration-100" height="400"
                                        src="{{ asset($new->image) }}" width="300" />
                                </a>
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
                                {{ number_format($new->price) }} đ
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Nút điều hướng -->
                <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-500 text-white p-4 rounded-full">
                    ‹
                </button>
                <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-500 text-white p-4 rounded-full">
                    ›
                </button>
            </div>
            
        </div>


        <div class="max-w-screen-xl mx-auto py-8">
            <h2 class="text-2xl font-semibold mb-4">Sản phẩm nổi bật</h2>
            <div class="relative">
                <div class="relative">
                    <div class="flex overflow-hidden" id="slider">
                        @foreach ($Proview as $view)
                            <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3 xl:w-1/5 px-2">
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
                                    <p class="mt-2 text-gray-700">{{ $view->name }}</p>
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
                            </div>
                        @endforeach
                    </div>
                    <!-- Previous and Next buttons -->
                    <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-500 text-white p-4 rounded-full">‹</button>
                    <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-500 text-white p-4 rounded-full">›</button>
                </div>
            </div>
        </div>

        <div class="max-w-screen-xl mx-auto py-8">
            <h2 class="text-2xl font-semibold mb-4">Sản phẩm yêu thích</h2>
            <div class="relative">
                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
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
            document.addEventListener('DOMContentLoaded', function () {
    const sliderWrapper = document.getElementById('slider-wrapper');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');

    let currentIndex = 0;
    const slideWidth = document.querySelector('#slider-wrapper .flex-shrink-0').offsetWidth;
    const totalSlides = document.querySelectorAll('#slider-wrapper .flex-shrink-0').length;
    
    // Để tạo hiệu ứng vòng lặp, chúng ta sao chép slide đầu tiên và cuối cùng vào cuối và đầu slider
    function duplicateSlides() {
        const firstSlide = document.querySelector('#slider-wrapper .flex-shrink-0');
        const lastSlide = document.querySelector('#slider-wrapper .flex-shrink-0:last-child');
        
        // Sao chép và thêm slide đầu tiên vào cuối
        sliderWrapper.appendChild(firstSlide.cloneNode(true));

        // Sao chép và thêm slide cuối cùng vào đầu
        sliderWrapper.insertBefore(lastSlide.cloneNode(true), sliderWrapper.firstChild);
    }

    duplicateSlides();

    function updateSliderPosition() {
        sliderWrapper.style.transition = 'transform 0.5s ease-in-out';
        sliderWrapper.style.transform = `translateX(-${(currentIndex + 1) * slideWidth}px)`;
    }

    prevButton.addEventListener('click', function() {
        if (currentIndex === 0) {
            // Nếu ở slide đầu tiên, di chuyển đến slide cuối cùng
            currentIndex = totalSlides - 1;
            updateSliderPosition();
            setTimeout(() => {
                sliderWrapper.style.transition = 'none'; // Bỏ qua transition khi chuyển sang slide cuối cùng
                sliderWrapper.style.transform = `translateX(-${(currentIndex + 1) * slideWidth}px)`;
            }, 500);
        } else {
            currentIndex--;
            updateSliderPosition();
        }
    });

    nextButton.addEventListener('click', function() {
        if (currentIndex === totalSlides - 1) {
            // Nếu ở slide cuối cùng, di chuyển về slide đầu tiên
            currentIndex = 0;
            updateSliderPosition();
            setTimeout(() => {
                sliderWrapper.style.transition = 'none'; // Bỏ qua transition khi chuyển về đầu
                sliderWrapper.style.transform = `translateX(-${(currentIndex + 1) * slideWidth}px)`;
            }, 500);
        } else {
            currentIndex++;
            updateSliderPosition();
        }
    });
});



document.addEventListener("DOMContentLoaded", function() {
        const slider = document.getElementById('slider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        
        let scrollAmount = 0;
        const slideWidth = slider.children[0].offsetWidth; // Width of one slide

        // Scroll to the previous slide
        prevBtn.addEventListener('click', () => {
            if (scrollAmount > 0) {
                scrollAmount -= slideWidth;
                slider.scrollTo({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        });

        // Scroll to the next slide
        nextBtn.addEventListener('click', () => {
            if (scrollAmount < slider.scrollWidth - slider.clientWidth) {
                scrollAmount += slideWidth;
                slider.scrollTo({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        });
    });
    setTimeout(() => {
        const toast = document.getElementById('toast-message');
        if (toast) {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 500); // Xóa khỏi DOM sau khi mờ dần
        }
    }, 3000);
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
        </style>
    @endsection
@extends('Client.layout.layout')

@section('title', "Trang chủ")


@section('content')
@include('Client.layout.slide')
{{-- <div class="bird-container">
{{-- <div class="bird-container">
    <img src="https://chillnfree.vn/assets/images/bird-animation-desktop-1.gif" alt="chillnfree" class="bird-animation bird-desktop" id="birdAnimation">
</div> --}}
<div class="max-w-screen-xl mx-auto py-8" data-aos="fade-up">



</div> --}}
<div class="max-w-screen-xl mx-auto py-8" data-aos="fade-up">



    <h2 class="text-2xl font-semibold text-left">Danh mục bạn yêu thích</h2>
    <div class="relative">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">

            @foreach ($brands as $brand)
            <div class="text-center">
                <a href="/cua-hang/thuong-hieu/{{$brand->id}}">
                    <div class="w-24 h-24 mx-auto rounded-full bg-white shadow-lg flex items-center justify-center">
                        <img src="{{ asset('storage/'.$brand->logo) }}" alt="Ảnh danh mục {{$brand->name}}" class="w-24 h-24 rounded-full">
                    </div>
                    <p class="mt-2">{{$brand->name}}</p>
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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($newPro as $new)
            <div class="text-center">
                <a href="/product/{{$new->slug}}">
                    <img alt="Ảnh sản phẩm gợi ý" class="w-full hover:scale-110 duration-100" height="400"
                        src="{{ asset('storage/'.$new->image) }}" width="300" />
                </a>
                <div class="flex justify-center mt-2">
                    @foreach ($new->ProductVariants->unique('color_id') as $variant)
                        <div class="w-4 mr-1 h-4 rounded-full border border-gray-300" 
                            style="background-color: {{ $variant->color->color_code }}">
                        </div>
                    @endforeach
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
        @endforeach
        </div>
    </div>



<div class="max-w-screen-xl mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4">Sản phẩm nổi bật</h2>
    <div class="relative">
        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($Proview as $view)
            <div class="text-center">
                <a href="/product/{{$view->slug}}">
                    <img alt="Ảnh sản phẩm gợi ý" class="w-full hover:scale-110 duration-100" height="400"
                        src="{{ asset('storage/'.$view->image) }}" width="300" />
                </a>
                <div class="flex justify-center mt-2">
                    @foreach ($view->ProductVariants->unique('color_id') as $variant)
                        <div class="w-4 mr-1 h-4 rounded-full border border-gray-300" 
                            style="background-color: {{ $variant->color->color_code }}">
                        </div>
                    @endforeach
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
        @endforeach
        
       
</div>
</div>
</div>
<script>
    AOS.init({
        duration: 1200, // Thời gian chạy hiệu ứng (tính bằng ms)
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
</style>
<script>
    AOS.init({
        duration: 1200, // Thời gian chạy hiệu ứng (tính bằng ms)
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
</style>
@endsection
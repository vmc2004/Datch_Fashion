@extends('Client.layout.layout')

@section('title', "Trang chủ")


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
                <a href="/thuong-hieu/{{$brand->name}}">
                    <div class="w-24 h-24 mx-auto rounded-full bg-white shadow-lg flex items-center justify-center">
                        <img src="{{ asset($brand->logo) }}" alt="Ảnh danh mục {{$brand->name}}" class="w-24 h-24 rounded-full">
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
            <div class="h-full rounded-lg relative shadow-xl">
                <div class="absolute -left-[3.2px] top-2 z-10">
                    <div
                        class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                    </div>
                </div>
                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                    <div class="overflow-hidden h-72">
                        <a href="/product/{{$new->slug}}">
                            <img class="hover:scale-110 duration-100"
                                src="{{ asset($new->image) }}" alt="{{$new->slug}}" >
                        </a>
                    </div>
                    <div class="bg-white p-2 flex flex-col space-y-2">
                        <div class="">
                            <div class="cursor-pointer">
                                <a class="text-slate-800" href=""> {{$new->name}} </a>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-slate-800">
                                {{ number_format($new->ProductVariants->first()?->price ?? 0) }} đ
                            </p>
                            <div class="flex gap-2 text-xs text-slate-700">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-4">
                                    <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                Hà Nội
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            @foreach ($Proview as $view)
            <div class="h-full rounded-lg relative shadow-xl">
                <div class="absolute -left-[3.2px] top-2 z-10">
                   
                    <div
                        class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                    </div>
                </div>
                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                    <div class="overflow-hidden h-48">
                        <a href="/product/{{$view->slug}}">
            <img class="hover:scale-110 duration-100"
                src="{{ asset($view->image) }}" alt="{{$view->slug}}">
            </a>
        </div>
        <div class="bg-white p-2 flex flex-col space-y-2">
            <div class="">
                <div class="cursor-pointer">
                    <a class="text-slate-800" href=""> {{$view->name}} </a>
                </div>
            </div>
            <div class="space-y-2">
                <p class="font-semibold text-slate-800">
                    {{ number_format($view->ProductVariants->first()?->price ?? 0) }} đ
                </p>
                <div class="flex gap-2 text-xs text-slate-700">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    Hà Nội
                </div>
            </div>
        </div>

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
@endsection
@extends('Client.layout.layout')

@section('title', "Hồ sơ của tôi")

@section('content')
<div class="max-w-screen-xl mx-auto ">

    <div class="mt-12 md:grid grid-cols-5 gap-8">
        <!-- Sidebar -->
        @include('Client.layout.profile_sidebar')
        <div class="col-span-4">
            <div>
                <h3
                    class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block" style="width: 920px;">
                    <strong>Yêu thích</strong>
                </h3 >
                <div class="flex md:mb-12 mb-6">
                    <h3 class="text-xl font-bold text-slate-800">{{count($favorites)}} sản phẩm</h3>
                    <div class="flex items-center ml-auto text-sm">
                        <label class="mr-2">Sắp xếp:</label>
                        <form method="GET">
                            <div class="inline-block w-[80px] md:w-48">
                                <div class="h-full">
                                    <select name="sort" class="md:w-full md:h-full w-16 rounded-full border border-solid border-current py-1 px-2.5" onchange="handleSortChange(event)">
                                        <option value="">Mặc định</option>
                                        <option value="-createdAt" {{ $sort == '-createdAt' ? 'selected' : '' }}>Được tạo gần đây</option>
                                        <option value="createdAt" {{ $sort == 'createdAt' ? 'selected' : '' }}>Cũ nhất được tạo trước</option>
                                        <option value="updatedAt" {{ $sort == 'updatedAt' ? 'selected' : '' }}>Cập nhật gần đây</option>
                                        <option value="-updatedAt" {{ $sort == '-updatedAt' ? 'selected' : '' }}>Cũ nhất cập nhật trước</option>
                                        <option value="totalPrice" {{ $sort == 'totalPrice' ? 'selected' : '' }}>Giá cao tới thấp</option>
                                        <option value="-totalPrice" {{ $sort == '-totalPrice' ? 'selected' : '' }}>Giá thấp tới cao</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               @foreach ($favorites as $favorite)
               <div class="Account_box__RWHwN mb-12 bg-white rounded-lg shadow-md border">
                <div class="p-6">
                    <div class="flex justify-between p-6">
                        <div class="flex">
                            <div class="rounded-lg">
                                <img src="https://static.oreka.vn/250-250_57539a38-9b83-42db-a5aa-e7a1374d4d9e"
                                     width="100" height="100" alt="" style="object-fit: cover;">
                            </div>
                            <div class="flex-1 ml-12">
                                <div class="flex items-center justify-between">
                                    <a class="Account_title_product__UvmmS font-bold text-18 text-black-600 mb-6 inline-block"
                                       href="/mua-ban-kinh-mat-nam/-thanh-ly-chinh-hang--kinh-uniqlo-chong-tia-uv-noi-dia-nhat-detail/19070">
                                       {{$favorite->product->name}}
                                    </a>
                                </div>
                                <p class="mb-4 text-black-500">1 Lượt xem, Số lượng: {{$favorite->product->productItems->first()->quantity}}  (Kích cỡ & Màu sắc)</p>
                                <div class="text-black-500">
                                    <span class="font-bold mr-12">{{number_format($favorite->product->productItems->first()->price)}} vnđ</span>

                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-between">
                            <button
                                class="border border-[#BB0000] border-solid rounded-full text-[#BB0000] h-8 px-2 w-36">
                              <a href="/san-pham/{{$favorite->product->id}}">  Xem sản Phẩm</a>
                            </button>
                                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-product-id="{{ $favorite->product->id }}" id="trash-icon" data-icon="trash" class="w-[20px] h-[20px] overflow-hidden svg-vertical inline-block cursor-pointer" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M368 64l-33.6-44.8C325.3 7.1 311.1 0 296 0h-80c-15.1 0-29.3 7.1-38.4 19.2L144 64H40c-13.3 0-24 10.7-24 24v2c0 3.3 2.7 6 6 6h20.9l33.2 372.3C78.3 493 99 512 123.9 512h264.2c24.9 0 45.6-19 47.8-43.7L469.1 96H490c3.3 0 6-2.7 6-6v-2c0-13.3-10.7-24-24-24H368zM216 32h80c5 0 9.8 2.4 12.8 6.4L328 64H184l19.2-25.6c3-4 7.8-6.4 12.8-6.4zm188 433.4c-.7 8.3-7.6 14.6-15.9 14.6H123.9c-8.3 0-15.2-6.3-15.9-14.6L75 96h362l-33 369.4z"></path>
                                </svg>
                        </div>
                    </div>
    </div>
</div>

@endsection
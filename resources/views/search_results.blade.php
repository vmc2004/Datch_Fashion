@extends('Client.layout.layout')

@section('title', "Trang chủ")

@section('content')
<div class="flex p-4">
    <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="locgiasp" type="button">
        Filter by category
        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Category</h6>
        <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
            <li class="flex items-center">
                <input id="range1" name="price_range" type="radio" value="0-200000" class="price-filter w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                <label for="range1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">0đ - 200.000đ</label>
            </li>

            <li class="flex items-center">
                <input id="range2" name="price_range" type="radio" value="200000-400000" class="price-filter w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                <label for="range2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">200.000đ - 400.000đ</label>
            </li>

            <li class="flex items-center">
                <input id="range3" name="price_range" type="radio" value="400000-1000000" class="price-filter w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                <label for="range3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">400.000đ - 1.000.000đ</label>
            </li>
        </ul>
    </div>
</div>

<div class="container flex mx-auto flex">
    <div class="mb-5">
        <ul class="flex container mx-auto pt-2 pb-2 text-sm">
            <li>
                <a class="hover:underline cursor-pointer" href="/">
                    Datch Fashion
                </a>
            </li>
            <li>
                <span class="mx-4">&gt;</span>
                <a class="hover:underline cursor-pointer" href="#">Kết quả tìm thấy cho {{ $query ?? 'Search Results' }}</a>
            </li>
        </ul>
        <p class="text-sm pt-2">
            {{ $totalResults }} Sản phẩm
        </p>
    </div>
</div>

<div class="max-w-screen-xl mx-auto py-8">
    @if($products->isEmpty())
    <p>No products found.</p>
    @else
    <div class="relative">
        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6" id="products-grid">
            @foreach ($products as $new)
            <div class="h-full rounded-lg relative shadow-xl product-item">
                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                    <div class="overflow-hidden h-48">
                        <a href="/product/{{$new->slug}}">
                            <img class="hover:scale-110 duration-100" src="{{ asset('public/' . $new->image) }}" alt="{{$new->slug}}">
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
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
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
    @endif
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện thay đổi của các nút radio trong bộ lọc giá
        $('.price-filter').change(function() {
            // Lấy giá trị đã chọn
            var priceRange = $(this).val().split('-');
            var minPrice = priceRange[0];
            var maxPrice = priceRange[1];

            // Gửi yêu cầu AJAX để lọc sản phẩm
            $.ajax({
                url: '/products/filter', // Đường dẫn của API lọc
                method: 'GET',
                data: {
                    min_price: minPrice,
                    max_price: maxPrice
                },
                success: function(response) {
                    var productsGrid = $('#products-grid');
                    productsGrid.empty(); // Xóa danh sách sản phẩm cũ

                    if (response.length === 0) {
                        productsGrid.append('<div>No products found in this price range.</div>');
                        return;
                    }

                    // Lặp qua các sản phẩm và hiển thị
                    response.forEach(function(product) {
                        var price = product.variants && product.variants.length > 0 ?
                            product.variants[0].price :
                            'Price not available';

                        productsGrid.append('<div class="h-full rounded-lg relative shadow-xl product-item">' +
                            '<div class="h-full rounded-lg overflow-hidden flex flex-col">' +
                            '<div class="overflow-hidden h-48"><a href="/product/' + product.slug + '">' +
                            '<img class="hover:scale-110 duration-100" src="' + product.image + '" alt="' + product.slug + '">' +
                            '</a></div>' +
                            '<div class="bg-white p-2 flex flex-col space-y-2">' +
                            '<div><a class="text-slate-800" href="/product/' + product.slug + '">' + product.name + '</a></div>' +
                            '<div class="space-y-2"><p class="font-semibold text-slate-800">' + price + ' đ</p>' +
                            '<div class="flex gap-2 text-xs text-slate-700"><svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">' +
                            '<path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />' +
                            '<path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />' +
                            '</svg> Hà Nội</div></div></div></div></div>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + ": " + error);
                    console.error("Response Text: " + xhr.responseText);
                }
            });
        });
    });
</script>
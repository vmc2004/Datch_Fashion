@extends('Client.layout.layout')

@section('title', "Trang chủ")


@section('content')
<div class="flex p-4">
    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
        class="locgiasp"
        type="button">
        Filter by category
        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
            Category
        </h6>
        <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
            <li class="flex items-center">
                <input id="apple" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Apple (56)
                </label>
            </li>

            <li class="flex items-center">
                <input id="fitbit" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Fitbit (56)
                </label>
            </li>

            <li class="flex items-center">
                <input id="dell" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Dell (56)
                </label>
            </li>

            <li class="flex items-center">
                <input id="asus" type="checkbox" value="" checked
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Asus (97)
                </label>
            </li>

            <li class="flex items-center">
                <input id="logitech" type="checkbox" value="" checked
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="logitech" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Logitech (97)
                </label>
            </li>

            <li class="flex items-center">
                <input id="msi" type="checkbox" value="" checked
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="msi" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    MSI (97)
                </label>
            </li>

            <li class="flex items-center">
                <input id="bosch" type="checkbox" value="" checked
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="bosch" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Bosch (176)
                </label>
            </li>

            <li class="flex items-center">
                <input id="sony" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="sony" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Sony (234)
                </label>
            </li>

            <li class="flex items-center">
                <input id="samsung" type="checkbox" value="" checked
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="samsung" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Samsung (76)
                </label>
            </li>

            <li class="flex items-center">
                <input id="canon" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="canon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Canon (49)
                </label>
            </li>

            <li class="flex items-center">
                <input id="microsoft" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="microsoft" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Microsoft (45)
                </label>
            </li>

            <li class="flex items-center">
                <input id="razor" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                <label for="razor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Razor (49)
                </label>
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
<form id="price-filter">
    <input type="number" id="min_price" placeholder="Min Price" />
    <input type="number" id="max_price" placeholder="Max Price" />
    <button type="submit">Lọc</button>
</form>

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
                            <img class="hover:scale-110 duration-100"
                                src="{{ asset('public/' . $new->image) }}" alt="{{$new->slug}}">
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
    @endif
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Sự kiện submit form lọc giá
        $('#price-filter').submit(function(e) {
            e.preventDefault(); // Ngăn không để form submit mặc định

            // Lấy giá trị từ các input
            var minPrice = $('#min_price').val();
            var maxPrice = $('#max_price').val();

            // Kiểm tra giá trị đã nhập
            if (minPrice === "" || maxPrice === "") {
                alert("Please enter both min and max price.");
                return;
            }

            console.log("Min Price: " + minPrice);
            console.log("Max Price: " + maxPrice);

            // Gửi yêu cầu AJAX để lọc sản phẩm
            $.ajax({
                url: '/products/filter', // URL của API
                method: 'GET',
                data: {
                    min_price: minPrice,
                    max_price: maxPrice
                },
                success: function(response) {
                    console.log("Response from server:", response); // Kiểm tra dữ liệu trả về

                    var productsGrid = $('#products-grid');
                    productsGrid.empty(); // Xóa danh sách sản phẩm cũ

                    if (response.length === 0) {
                        productsGrid.append('<div>No products found in this price range.</div>');
                        return;
                    }

                    // Lặp qua các sản phẩm và hiển thị
                    response.forEach(function(product) {
                        console.log("Product:", product); // Kiểm tra từng sản phẩm trả về từ server

                        // Kiểm tra xem sản phẩm có variant không và có giá không
                        if (product.variants && product.variants.length > 0) {
                            var variant = product.variants[0]; // Lấy variant đầu tiên
                            var price = variant.price || 'Price not available'; // Kiểm tra nếu giá không có thì hiển thị 'Price not available'
                            productsGrid.append('<div class="h-full rounded-lg relative shadow-xl product-item">' +
                                '<div class="h-full rounded-lg overflow-hidden flex flex-col">' +
                                '<div class="overflow-hidden h-48"><a href="/product/' + product.slug + '">' +
                                '<img class="hover:scale-110 duration-100" src="' + product.image + '" alt="' + product.slug + '">' +
                                '</a></div>' +
                                '<div class="bg-white p-2 flex flex-col space-y-2">' +
                                '<div class=""><a class="text-slate-800" href="/product/' + product.slug + '">' + product.name + '</a></div>' +
                                '<div class="space-y-2">' +
                                '<p class="font-semibold text-slate-800">' + price + ' đ</p>' +
                                '<div class="flex gap-2 text-xs text-slate-700">' +
                                '<svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">' +
                                '<path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />' +
                                '<path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />' +
                                '</svg> Hà Nội</div>' +
                                '</div></div></div></div>');
                        } else {
                            // Trường hợp không có variants
                            var price = 'Price not available'; // Không có giá
                            productsGrid.append('<div class="h-full rounded-lg relative shadow-xl product-item">' +
                                '<div class="h-full rounded-lg overflow-hidden flex flex-col">' +
                                '<div class="overflow-hidden h-48"><a href="/product/' + product.slug + '">' +
                                '<img class="hover:scale-110 duration-100" src="' + product.image + '" alt="' + product.slug + '">' +
                                '</a></div>' +
                                '<div class="bg-white p-2 flex flex-col space-y-2">' +
                                '<div class=""><a class="text-slate-800" href="/product/' + product.slug + '">' + product.name + '</a></div>' +
                                '<div class="space-y-2">' +
                                '<p class="font-semibold text-slate-800">' + price + ' đ</p>' +
                                '<div class="flex gap-2 text-xs text-slate-700">' +
                                '<svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">' +
                                '<path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />' +
                                '<path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />' +
                                '</svg> Hà Nội</div>' +
                                '</div></div></div></div>');
                        }
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
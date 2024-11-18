@extends('Client.layout.layout')
@section('single-page', "Danh sách sản phẩm")
@section('title', "Cửa hàng")
@section('content')

<div class="max-w-screen-xl mx-auto ">
   <div class="container flex mx-auto flex">
      <div>
         <ul class="flex container mx-auto pt-4 text-sm ">
            <li>
               <a class="hover:underline cursor-pointer" href="/">
                  Datch Fashion
               </a>
            </li>
            <li>
               <span class="mx-4">&gt;</span>
               <a class="hover:underline cursor-pointer" href="/cua-hang">@yield('single-page')</a>
            </li>
         </ul>
      </div>
   </div>

   <div class="container mx-auto pt-4">
      <!-- Bên Trái -->
      <div class="flex border-b">
         <div class="mr-12 w-[270px] border-r hidden md:block">

            <div class="border-b pl-6 md:pl-0 pb-8">
               <div class="flex justify-between items-center text-[15px] cursor-pointer pr-4 pt-2 pb-3">
                  <div class="text-slate-800 font-bold flex items-center">
                     Danh mục
                  </div>
                  <span class="dropdownBtn size-8 flex justify-center items-center">
                     <svg class="w-3" viewBox="0 0 256 512">
                        <path fill="currentColor"
                           d="M136.5 185.1l116 117.8c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L128 224.7 27.6 326.9c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17l116-117.8c4.7-4.6 12.3-4.6 17 .1z">
                        </path>
                     </svg>
                  </span>
               </div>
               <div class="can-mini pr-5">
                  <div style="height: auto; overflow: visible" aria-hidden="false"
                     class="rah-static rah-static--height-auto">
                     <div>
                        <div class="space-y-2 text-sm">
                           <a class="block hover:text-orange-500" href="">
                              Tất cả danh mục
                           </a>
                           @foreach ($categories as $cat)
                           <a class="block ml-7 hover:text-orange-500" href="/danh-muc/{{$cat->id}}">
                              {{$cat->name}}
                           </a>
                           @if (!empty($cat->sub))
                           <div class="ml-10">
                              @foreach ($cat->sub as $subcat)
                              <a class="block hover:text-orange-500" href="/danh-muc/{{$subcat->id}}">
                                 {{$subcat->name}}
                              </a>
                              @endforeach
                           </div>
                           @endif
                           @endforeach

                           <p class="flex items-center cursor-pointer ml-12 hover:text-[#007aff]">
                              <span class="mr-2">Xem thêm</span>
                              <svg class="w-2 mt-2" viewBox="0 0 256 512">
                                 <path
                                    d="M119.5 326.9L3.5 209.1c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0L128 287.3l100.4-102.2c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L136.5 327c-4.7 4.6-12.3 4.6-17-.1z">
                                 </path>
                              </svg>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            {{-- Lọc theo giá  --}}
            <div class="filter-container">
               <div class="flex flex-col space-y-6">
                  <!-- Các lựa chọn giá có sẵn -->
                  <div class="price-filters space-y-3">
                     <div class="text-slate-800 font-bold flex items-center">
                        Giá
                     </div>
                     <label class="block flex items-center space-x-2">
                        <input type="radio" name="price_range" value="0-200000" class="price-filter h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" />
                        <span class="text-sm text-gray-800">0đ - 200.000đ</span>
                     </label>

                     <label class="block flex items-center space-x-2">
                        <input type="radio" name="price_range" value="200000-400000" class="price-filter h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" />
                        <span class="text-sm text-gray-800">200.000đ - 400.000đ</span>
                     </label>

                     <label class="block flex items-center space-x-2">
                        <input type="radio" name="price_range" value="400000-1000000" class="price-filter h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" />
                        <span class="text-sm text-gray-800">400.000đ - 1.000.000đ</span>
                     </label>

                     <label class="block flex items-center space-x-2">
                        <input type="radio" name="price_range" value="all" class="price-filter h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" />
                        <span class="text-sm text-gray-800">Tất cả</span>
                     </label>
                  </div>
               </div>
            </div>
            <!-- Form nhập giá -->
            <div class="price-range-input space-y-2">
               <div class="space-y-3">
                  <div class="flex items-center gap-3">
                     <div class="relative">
                        <label for="min-price" class="block text-sm font-medium text-gray-700">Giá từ</label>
                        <input type="number" id="min-price" name="priceMin" class="border border-current border-solid rounded-lg w-24 p-2 bg-[#e2e2e2]" placeholder="Từ" value="">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 color-black-100">đ</span>
                     </div>
                     <div>-</div>
                     <div class="relative">
                        <label for="max-price" class="block text-sm font-medium text-gray-700">Giá đến</label>
                        <input type="number" id="max-price" name="priceMax" class="border border-current border-solid rounded-lg w-24 p-2 bg-[#e2e2e2]" placeholder="Đến" value="">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 color-black-100">đ</span>
                     </div>
                  </div>
                  <button id="submit-price-range" class="w-full p-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3">Áp dụng</button>
               </div>
            </div>

            {{-- kết thúc lọc giá  --}}
            <!-- Hết Danh mục đến Size -->
            <div class="pl-6 md:pl-0 pb-8">
               <div class="flex justify-between items-center text-[15px] cursor-pointer pr-4 pt-2 pb-3">
                  <div class="text-slate-800 font-bold flex items-center">
                     Size
                  </div>
                  <span class="dropdownBtn size-8 flex justify-center items-center">
                     <svg class="w-3" viewBox="0 0 256 512">
                        <path fill="currentColor" d="M136.5 185.1l116 117.8c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L128 224.7 27.6 326.9c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17l116-117.8c4.7-4.6 12.3-4.6 17 .1z"></path>
                     </svg>
                  </span>
               </div>
               <div class="can-mini pr-5 border-b pb-8">
                  <div class="grid grid-cols-5 gap-2">
                     @foreach($size as $sz)
                     <label for="size-{{$sz->id}}" aria-label="Select size {{$sz->name}}">
                        <input type="checkbox" id="size-{{$sz->id}}" class="size-filter" value="{{$sz->name}}" data-id="{{$sz->id}}">
                        <span>{{$sz->name}}</span>
                     </label>
                     @endforeach
                  </div>
               </div>
            </div>




            <!-- Hết div 1 : Danh mục , Color -->
            <div class="mb-4">
               <label for="color-filter" class="text-lg font-semibold">Chọn màu sắc:</label>
               <div class="flex gap-3 mt-2">
                  @foreach ($color as $cl)
                  <label class="cursor-pointer">
                     <input type="radio" name="color" value="{{ $cl->id }}" class="hidden color-radio" data-color-name="{{ $cl->name }}">
                     <div class="color-option w-10 h-10 border border-gray-300 rounded-full" style="background-color: {{$cl->color_code}};" title="{{ $cl->name }}"></div>
                  </label>
                  @endforeach
               </div>
            </div>


            <!-- Hết bên trái -->
            <!-- Bên phải -->
         </div>
         <div class="flex-1">
            <div>
               <div class="flex gap-2 flex-col">
                  <!-- Lọc theo -->
                  <div class="ml-auto ">
                     <div class="flex items-center hidden md:flex"><span class="mr-2">Lọc theo:</span>
                        <div class="inline-block">
                           <div class="rounded-full h-full relative">
                              <select name="flow_type"
                                 class="border border-gray-400 border-solid rounded-full p-1.5 text-xs md:py-1 md:px-2.5 md:text-base">
                                 <option selected>Mặc định</option>
                                 <option value="-modifiedAt">Mới nhất</option>
                                 <option value="priceMin">Giá thấp nhất</option>
                                 <option value="-priceMin">Giá cao nhất</option>
                                 <option value="-likedCount">Yêu thích nhất</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="md:mt-10">
                  <div class="image-gallery" aria-live="polite">
                     <div class="image-gallery-content  image-gallery-thumbnails-bottom">
                        <div
                           class="image-gallery-slide-wrapper  image-gallery-thumbnails-bottom image-gallery-rtl">
                           <div class="image-gallery-slides"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Hiển thị danh mục đang chọn -->
               <div class="flex flex-wrap items-center md:mt-6 gap-4">
                  <div class="bg-gray-200 py-2 px-3 rounded-full flex items-center gap-2">
                     <div class="text-slate-600"></div>
                     <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" stroke="currentColor"
                        class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                     </svg>
                  </div>
                  <span class="cursor-pointer text-slate-800 hover:text-[#BB0000]">Xóa tất cả</span>
               </div>
               <!-- Kết thúc iển thị danh mục đang chọn -->

               <!-- Sản phẩm -->
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
                     <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="products-grid">
                        @foreach ($products as $new)
                        <div class="h-full rounded-lg relative shadow-xl product-item transform hover:scale-105 transition duration-300 ease-in-out">
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                              <div class="overflow-hidden h-64 w-full">
                                 <a href="/product/{{$new->slug}}">
                                    <img class="hover:scale-110 duration-200 transition-transform"
                                       src="{{ asset('public/' . $new->image) }}" alt="{{$new->slug}}">
                                 </a>
                              </div>
                              <div class="bg-white p-4 flex flex-col space-y-4">
                                 <div class="text-xl font-semibold text-slate-800">
                                    <a class="text-slate-800 hover:text-blue-600 transition-colors" href="/product/{{$new->slug}}">{{$new->name}}</a>
                                 </div>
                                 <div class="space-y-2">
                                    <p class="font-bold text-lg text-slate-800">
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
               <div class="py-4">
                  {{$products->links()}}
               </div>
               <!-- Kết thúc sp -->

               <!-- Chuyển Trang -->
               <div class="flex justify-center md:my-16 my-4">

               </div>
               <!-- Kết thúc chuyển trang -->
            </div>
         </div>
         <!-- End -->
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $(document).ready(function() {
      // Lắng nghe sự kiện thay đổi của các nút radio trong bộ lọc giá
      $('.price-filter').change(function() {
         var priceRange = $(this).val();
         var minPrice, maxPrice;

         // Nếu chọn "Tất cả", sẽ hiển thị tất cả sản phẩm
         if (priceRange === "all") {
            minPrice = 0;
            maxPrice = 10000000; // Giá trị cao nhất giả định
            // Đảm bảo rằng radio button "Tất cả" được chọn và các bộ lọc khác được bỏ chọn
            $('input[name="price_range"]').prop('checked', false); // Bỏ chọn tất cả
            $('input[value="all"]').prop('checked', true); // Chọn lại "Tất cả"
         } else {
            // Lấy giá trị đã chọn từ radio button
            var range = priceRange.split('-');
            minPrice = range[0];
            maxPrice = range[1];
         }

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

      // Khi nhấn "Tìm kiếm" từ form nhập giá
      $('#submit-price-range').click(function() {
         var minPrice = $('#min-price').val();
         var maxPrice = $('#max-price').val();

         // Kiểm tra nếu cả hai ô nhập giá đều có giá trị
         if (minPrice && maxPrice) {
            $.ajax({
               url: '/products/filter',
               method: 'GET',
               data: {
                  min_price: minPrice,
                  max_price: maxPrice
               },
               success: function(response) {
                  var productsGrid = $('#products-grid');
                  productsGrid.empty();

                  if (response.length === 0) {
                     productsGrid.append('<div>No products found in this price range.</div>');
                     return;
                  }

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
               }
            });
         }
      });
   });
   // Lọc size
   $.ajax({
      url: '/products/filter-by-size',
      method: 'GET',
      data: {
         sizes: selectedSizes // Mảng các kích thước đã chọn
      },
      success: function(response) {
         $('#products-grid').html(response);
      },
      error: function(xhr, status, error) {
         console.error('Lỗi khi lọc sản phẩm: ' + error);
      }
   });

   // Lọc màu
   $(document).ready(function() {
      // Lắng nghe sự kiện chọn màu
      $('input[name="color"]').on('change', function() {
         let colorId = $(this).val(); // Lấy ID màu đã chọn

         // Gửi yêu cầu AJAX để lọc sản phẩm
         $.ajax({
            url: '/products/filter-by-color', // Đảm bảo URL đúng với route của bạn
            method: 'GET',
            data: {
               color: colorId
            },
            success: function(response) {
               let productsGrid = $('#products-grid');
               productsGrid.html(''); // Xóa các sản phẩm hiện tại

               if (response.length > 0) {
                  response.forEach(function(product) {
                     productsGrid.append(`
                            <div class="h-full rounded-lg relative shadow-xl product-item transform hover:scale-105 transition duration-300 ease-in-out">
                                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                    <div class="overflow-hidden h-64 w-full">
                                        <a href="/product/${product.slug}">
                                            <img class="hover:scale-110 duration-200 transition-transform" src="${product.image}" alt="${product.slug}">
                                        </a>
                                    </div>
                                    <div class="bg-white p-4 flex flex-col space-y-4">
                                        <div class="text-xl font-semibold text-slate-800">
                                            <a class="text-slate-800 hover:text-blue-600 transition-colors" href="/product/${product.slug}">${product.name}</a>
                                        </div>
                                        <div class="space-y-2">
                                            <p class="font-bold text-lg text-slate-800">${product.price} đ</p>
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
                        `);
                  });
               } else {
                  productsGrid.append('<p>No products found.</p>');
               }
            },
            error: function() {
               alert('Có lỗi xảy ra khi lọc sản phẩm.');
            }
         });
      });
   });
</script>
<style>
   .color-option {
      display: inline-block;
      cursor: pointer;
      transition: transform 0.3s;
   }

   .color-option:hover {
      transform: scale(1.1);
   }
</style>
@endsection
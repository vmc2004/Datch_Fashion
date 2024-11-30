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
         <div class="mr-12 w-[270px] border-r hidden md:block bg-white shadow-lg rounded-lg p-6">
            <!-- Category Section -->
            <div class="border-b pb-8 mb-6">
               <div
                  id="dropdownToggle"
                  class="flex justify-between items-center text-[15px] cursor-pointer pr-4 pt-2 pb-3">
                  <div class="text-slate-800 font-bold flex items-center">Danh mục</div>
                  <span class="dropdownBtn flex justify-center items-center">
                     <svg id="dropdownIcon" class="w-3 transition-transform duration-300" viewBox="0 0 256 512">
                        <path fill="currentColor" d="M136.5 185.1l116 117.8c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L128 224.7 27.6 326.9c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17l116-117.8c4.7-4.6 12.3-4.6 17 .1z"></path>
                     </svg>
                  </span>
               </div>
               <!-- Nội dung danh mục -->
               <div id="dropdownContent" class="space-y-2 text-sm hidden">
                  <a class="block hover:text-orange-500" href="">Tất cả danh mục</a>
                  @foreach ($categories as $cat)
                  <a class="block ml-7 hover:text-orange-500" href="/danh-muc/{{$cat->id}}">{{$cat->name}}</a>
                  @if (!empty($cat->sub))
                  <div class="ml-10">
                     @foreach ($cat->sub as $subcat)
                     <a class="block hover:text-orange-500" href="/danh-muc/{{$subcat->id}}">{{$subcat->name}}</a>
                     @endforeach
                  </div>
                  @endif
                  @endforeach
                  <p class="flex items-center cursor-pointer ml-12 hover:text-[#007aff]">
                     <span class="mr-2">Xem thêm</span>
                     <svg class="w-2 mt-2" viewBox="0 0 256 512">
                        <path d="M119.5 326.9L3.5 209.1c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0L128 287.3l100.4-102.2c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L136.5 327c-4.7 4.6-12.3 4.6-17-.1z"></path>
                     </svg>
                  </p>
               </div>
            </div>

            <!-- Price Filters -->
            <div class="mb-6">
               <div class="text-slate-800 font-bold mb-4">Giá</div>
               <div class="space-y-3">
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

            <!-- Price Range Input -->
            <div class="mb-6">
               <div class="space-y-3">
                  <div class="flex items-center gap-3">
                     <div class="relative w-full">
                        <label for="min-price" class="block text-sm font-medium text-gray-700">Giá từ</label>
                        <input type="number" id="min-price" name="priceMin" class="border border-gray-300 rounded-lg w-full p-2 bg-[#e2e2e2]" placeholder="Từ" value="">
                     </div>
                     <div>-</div>
                     <div class="relative w-full">
                        <label for="max-price" class="block text-sm font-medium text-gray-700">Giá đến</label>
                        <input type="number" id="max-price" name="priceMax" class="border border-gray-300 rounded-lg w-full p-2 bg-[#e2e2e2]" placeholder="Đến" value="">
                     </div>
                  </div>
                  <button id="submit-price-range" class="w-full p-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3">Áp dụng</button>
               </div>
            </div>

            <!-- Size Selection -->
            <div class="mb-6">
               <label for="size-filter" class="text-lg font-semibold">Chọn size:</label>
               <div id="size-options" class="flex gap-4 mt-2">
                  <button data-size="1" class="size-button w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-sm hover:bg-blue-500 hover:text-white transition">S</button>
                  <button data-size="2" class="size-button w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-sm hover:bg-blue-500 hover:text-white transition">M</button>
                  <button data-size="3" class="size-button w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-sm hover:bg-blue-500 hover:text-white transition">L</button>
                  <button data-size="4" class="size-button w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-sm hover:bg-blue-500 hover:text-white transition">XL</button>
                  <button data-size="5" class="size-button w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-sm hover:bg-blue-500 hover:text-white transition">XXL</button>
                  <button data-size="6" class="size-button w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-sm hover:bg-blue-500 hover:text-white transition">2XL</button>
               </div>
            </div>

            <!-- Color Selection -->
            <div class="mb-6">
               <label for="color-filter" class="text-lg font-semibold">Chọn màu sắc:</label>
               <div class="flex gap-3 mt-2 flexcolor">
                  @foreach ($color as $cl)
                  <label class="cursor-pointer">
                     <input type="radio" name="color" value="{{ $cl->id }}" class="hidden color-radio" data-color-name="{{ $cl->name }}">
                     <div class="color-option w-10 h-10 border border-gray-300 rounded-full whcolor" style="background-color: {{$cl->color_code}};" title="{{ $cl->name }}"></div>
                  </label>
                  @endforeach
               </div>
            </div>
         </div>

         <div class="flex-1">
            <div>
               <div class="flex gap-2 flex-col">
                  <!-- Lọc theo -->
                  <div class="ml-auto ">
                     <div class="flex items-center hidden md:flex"><span class="mr-2">Lọc theo:</span>
                        <div class="inline-block">
                           <form action="" method="GET">
                              <div class="rounded-full h-full relative">
                                 <select name="flow_type"
                                    class="border border-gray-400 border-solid rounded-full p-1.5 text-xs md:py-1 md:px-2.5 md:text-base"
                                    onchange="this.form.submit()">
                                    <option value="default" @if ($flow_type=='default' ) selected @endif>Mặc định</option>
                                    <option value="-modifiedAt" @if ($flow_type=='-modifiedAt' ) selected @endif>Mới nhất</option>
                                    <option value="priceMin" @if ($flow_type=='priceMin' ) selected @endif>Giá thấp nhất</option>
                                    <option value="-priceMin" @if ($flow_type=='-priceMin' ) selected @endif>Giá cao nhất</option>
                                 </select>
                              </div>
                           </form>
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


               <!-- Sản phẩm -->
               <div class="max-w-screen-xl mx-auto py-8">
                  @if($products->isEmpty())
                  <p>No products found.</p>
                  @else
                  <div class="relative">

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
   $(document).ready(function() {
      $('.size-button').on('click', function() {
         const sizeId = $(this).data('size'); // Lấy size ID từ data-size

         // Đổi màu nút được chọn
         $('.size-button').removeClass('bg-blue-500 text-white').addClass('bg-gray-200 text-black');
         $(this).removeClass('bg-gray-200 text-black').addClass('bg-blue-500 text-white');

         // Gửi request AJAX để lọc sản phẩm
         $.ajax({
            url: '/filter-by-size', // API route
            type: 'GET',
            data: {
               size: sizeId
            },
            success: function(response) {
               // Làm mới danh sách sản phẩm
               $('#products-grid').empty();

               if (response.length === 0) {
                  $('#products-grid').html('<p>No products found for this size.</p>');
               } else {
                  // Hiển thị sản phẩm mới
                  response.forEach(function(product) {
                     let productHTML = `
                            <div class="h-full rounded-lg shadow-xl product-item transform hover:scale-105 transition duration-300 ease-in-out">
                                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                    <div class="overflow-hidden h-64 w-full">
                                        <a href="/product/${product.slug}">
                                            <img class="hover:scale-110 duration-200 transition-transform"
                                                 src="${product.image || '/default-image.jpg'}" alt="${product.name}">
                                        </a>
                                    </div>
                                    <div class="bg-white p-4 flex flex-col space-y-4">
                                        <div class="text-xl font-semibold text-slate-800">
                                            <a href="/product/${product.slug}" class="hover:text-blue-600">${product.name}</a>
                                        </div>
                                        <div class="space-y-2">
                                            <p class="font-bold text-lg text-slate-800">
                                                ${new Intl.NumberFormat().format(product.variants[0]?.price || 0)} đ
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
                        `;
                     $('#products-grid').append(productHTML);
                  });
               }
            },
            error: function(xhr) {
               console.error(xhr.responseText);
               $('#products-grid').html('<p>Failed to load products. Please try again later.</p>');
            },
         });
      });
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
               <p class="font-bold text-lg text-slate-800">${product.variants[0]?.price || 'Liên hệ'} đ</p>
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


   document.getElementById('dropdownToggle').addEventListener('click', function() {
      const dropdownContent = document.getElementById('dropdownContent');
      const dropdownIcon = document.getElementById('dropdownIcon');

      // Đổi trạng thái ẩn/hiện
      dropdownContent.classList.toggle('hidden');
      dropdownContent.classList.toggle('show');

      // Xoay mũi tên
      dropdownIcon.classList.toggle('rotate-180');
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

   .size-button {
      width: 2.5rem;
      /* Kích thước nút */
      height: 2.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      /* Hình tròn */
      background-color: #e5e7eb;
      /* Màu xám nhạt */
      color: #1f2937;
      /* Màu chữ */
      font-size: 0.875rem;
      /* Kích thước chữ */
      transition: all 0.3s ease;
      /* Hiệu ứng chuyển đổi */
   }

   .size-button:hover {
      background-color: #3b82f6;
      /* Màu xanh khi hover */
      color: #ffffff;
      /* Màu trắng khi hover */
   }

   .size-button.bg-blue-500 {
      background-color: #3b82f6;
      /* Màu xanh khi được chọn */
      color: #ffffff;
      /* Màu trắng khi được chọn */
   }

   .flexcolor {
      flex-wrap: wrap;
   }

   .whcolor {
      width: 30px;
      height: 30px;
   }
</style>
@endsection
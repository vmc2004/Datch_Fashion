
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
                                 <a class="block ml-7 hover:text-orange-500" href="/cua-hang/danh-muc/{{$cat->id}}">
                                     {{$cat->name}}
                                 </a>
                                 @if (!empty($cat->sub))
                                     <div class="ml-10">
                                         @foreach ($cat->sub as $subcat)
                                             <a class="block hover:text-orange-500" href="/cua-hang/danh-muc/{{$subcat->id}}">
                                                 {{$subcat->name}}
                                             </a>
                                         @endforeach
                                     </div>
                                 @endif
                             @endforeach
                              </div>
                        </div>
                     </div>
                  </div>
            </div>
            {{-- Lọc theo giá  --}}
            <div class="pl-6 md:pl-0 pb-8">
               <div class="flex justify-between items-center text-[15px] cursor-pointer pr-4 pt-2 pb-3">
                  <div class="text-slate-800 font-bold flex items-center">
                     Giá
                  </div>
                  <span class="dropdownBtn size-8 flex justify-center items-center">
                     <svg class="w-3" viewBox="0 0 256 512">
                           <path fill="currentColor"
                              d="M136.5 185.1l116 117.8c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L128 224.7 27.6 326.9c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17l116-117.8c4.7-4.6 12.3-4.6 17 .1z">
                           </path>
                     </svg>
                  </span>
               </div>
            <div class="can-mini pr-5 border-b pb-8">
               <form action="" method="GET" id="filterForm">
                  <div class="space-y-3 text-sm">
                     <div>
                        <input id="all" type="radio" name="price" onclick="setPriceRange(0, 100000000)" />
                        <label for="all">Tất cả</label>
                    </div>
                    <div>
                        <input id="from_0_to_100" type="radio" name="price" onclick="setPriceRange(0, 99999)" />
                        <label for="from_0_to_100">Dưới 100.000đ</label>
                    </div>
                     <div>
                           <input id="from_100_to_200" type="radio"  name="price" onclick="setPriceRange(100000, 200000)"/>
                           <label for="from_100_to_200">100.000đ - 200.000đ</label>
                     </div>
                     <div>
                           <input id="from_200_to_500" type="radio"  name="price" onclick="setPriceRange(200000, 500000)" />
                           <label for="from_200_to_500">200.000đ - 500.000đ</label>
                     </div>
                     <div>
                           <input id="above_500" type="radio" name="price" onclick="setPriceRange(500001 , null)"/>
                           <label for="above_500">Trên 500.000đ</label>
                     </div>
                     <div class="flex items-start cursor-pointer">
                           <input type="radio" id="price" name="price" value="aaa">
                           <label for="price" class="ml-2">
                              <div class="space-y-3">
                                 <p class=" cursor-pointer">Chọn Khoảng giá</p>
                                 <div class="flex items-center gap-3">
                                       <div class="relative">
                                          <div class="relative">
                                             <input type="text" name="min"
                                                   class="border border-current border-solid rounded-lg w-24 p-2 bg-[#e2e2e2]"
                                                   placeholder="Từ"  value="">
                                             <span
                                                   class="absolute right-3 top-1/2 -translate-y-1/2 color-black-100">đ</span>
                                          </div>
                                       </div>
                                       <div>-</div>
                                       <div class="relative">
                                          <div class="relative">
                                             <input type="text" name="max"
                                                   class="border border-current border-solid rounded-lg w-24 p-2 bg-[#e2e2e2]"
                                                   placeholder="Đến"  value="">
                                             <span
                                                   class="absolute right-3 top-1/2 -translate-y-1/2 color-black-100">đ</span>
                                          </div>
                                       </div>
                                 </div>
                                 <button class="hover:text-blue-700 cursor-pointer">Áp dụng</button>
                              </div>
                           </label>
                     </div>
               </form>
                  </div>
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
                              <path fill="currentColor"
                                 d="M136.5 185.1l116 117.8c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L128 224.7 27.6 326.9c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17l116-117.8c4.7-4.6 12.3-4.6 17 .1z">
                              </path>
                        </svg>
                     </span>
                  </div>
                  <form action="" method="GET" id="sizeForm">
                     <div class="can-mini pr-5 border-b pb-8">
                         <div class="grid grid-cols-5 gap-2">
                             @foreach($sizes as $sz)
                                 <div class="size-option">
                                     <input type="radio" name="size" value="{{ $sz->id }}" id="size-{{ $sz->id }}" class="hidden size-radio" >
                                     <label for="size-{{ $sz->id }}" class="border border-gray-300 rounded-md py-2 text-gray-600 text-center cursor-pointer block" style="width: 40px; height: 40px;">
                                         {{ $sz->name }}
                                     </label>
                                 </div>
                             @endforeach
                         </div>
                     </div>
                 </form>
            </div>
             

          <!-- Hết div 1 : Danh mục , Size -->
          <div class="pl-6 md:pl-0 pb-8">
            <div class="flex justify-between items-center text-[15px] cursor-pointer pr-4 pt-2 pb-3">
               <div class="text-slate-800 font-bold flex items-center">
                 Màu sắc
               </div>
               <span class="dropdownBtn size-8 flex justify-center items-center">
                  <svg class="w-3" viewBox="0 0 256 512">
                        <path fill="currentColor"
                           d="M136.5 185.1l116 117.8c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L128 224.7 27.6 326.9c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17l116-117.8c4.7-4.6 12.3-4.6 17 .1z">
                        </path>
                  </svg>
               </span>
            </div>
            <div class="can-mini pr-5 border-b pb-8">
               <form action="" method="GET" id="color-form">
                  <div class="flex flex-wrap">
                      <div class="grid grid-cols-5 gap-2">
                          @foreach ($colors as $cl)
                              <div class="mr-2 mb-2">
                                  <input type="radio" name="color" value="{{ $cl->id }}" id="color-{{ $cl->id }}" class="hidden color-radio" data-color-name="{{ $cl->name }}">
                                  <label for="color-{{ $cl->id }}" class="cursor-pointer inline-block w-10 h-10 rounded-full border-2 border-gray-300" style="background-color: {{ $cl->color_code }};" title="{{ $cl->name }}">
                                      <span class="sr-only">Chọn màu {{ $cl->name }}</span>
                                  </label>
                              </div>
                          @endforeach
                      </div>
                  </div>
              </form>
            </div>
      </div>
      <!-- Hết bên trái -->
      <!-- Bên phải -->
      {{-- @if ($request->get('query'))
        Kết quả tìm kiếm cho {{$request->get('query')}}
      @endif --}}
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
                                             <option value="default" @if ($flow_type == 'default') selected @endif>Mặc định</option>
                                             <option value="-modifiedAt" @if ($flow_type == '-modifiedAt') selected @endif>Mới nhất</option>
                                             <option value="priceMin" @if ($flow_type == 'priceMin') selected @endif>Giá thấp nhất</option>
                                             <option value="-priceMin" @if ($flow_type == '-priceMin') selected @endif>Giá cao nhất</option>
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
                     <!-- Hiển thị danh mục đang chọn -->
                     
                     <!-- Kết thúc iển thị danh mục đang chọn -->

                     <!-- Sản phẩm -->
                     <div class="mt-6 grid md:grid-cols-3 grid-cols-2 md:gap-10 gap-4">
                        @foreach($products as $new)
                        <div class="h-full rounded-lg relative shadow-xl">
                            <div class="absolute -left-[3.2px] top-2 z-10">
                                <div class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent"></div>
                            </div>
                            <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                <div class="overflow-hidden h-72">
                                    <a href="/product/{{$new->slug}}">
                                        <img class="hover:scale-110 duration-100" src="{{ asset($new->image) }}" alt="{{$new->slug}}">
                                    </a>
                                </div>
                                <div class="flex justify-center mt-2">
                                    @foreach ($new->ProductVariants->unique('color_id') as $variant)
                                        <div class="w-4 mr-1 h-4 rounded-full border border-gray-300"
                                             style="background-color: {{ $variant->color->color_code }}">
                                        </div>
                                    @endforeach
                                </div>
                                <p class="mt-2 text-gray-700 text-center">
                                    {{ $new->name }}
                                </p>
                                <p class="text-gray-900 font-bold text-center">
                                    {{ number_format($new->price) }} đ
                                </p>
                            </div>
                        </div>
                    @endforeach
                    
                     
                     </div>
                     <div class="py-4">
                     {{$products->links()}}
                     </div>
                     <!-- Kết thúc sp -->

                     <!-- Chuyển Trang -->
                    
                     <!-- Kết thúc chuyển trang -->
               </div>
            </div>
            <!-- End -->
         </div>
   </div>
</div>

<script>
      document.querySelectorAll('input[type="radio"]').forEach(function(input) {
        input.addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });
    });

    
function setPriceRange(min, max) {
        // Cập nhật giá trị trong các input "Từ" và "Đến"
        document.querySelector('input[name="min"]').value = min;
        document.querySelector('input[name="max"]').value = max;
    }

    // Hàm này có thể được sử dụng để khi người dùng submit form, kiểm tra giá trị trong các input
    document.getElementById('filterForm').addEventListener('submit', function() {
        // Nếu người dùng không chọn khoảng giá mà chỉ để trống priceMin và priceMax
        var min = document.querySelector('input[name="min"]').value;
        var max = document.querySelector('input[name="max"]').value;

        // Cập nhật giá trị mặc định nếu trống
        if (min === "") {
            document.querySelector('input[name="min"]').value = 0; // Giá trị mặc định
        }
        if (max === "") {
            document.querySelector('input[name="max"]').value = 100000000; // Giá trị mặc định
        }
    });
      // Lắng nghe sự kiện thay đổi của radio button
      document.querySelectorAll('.color-radio').forEach(function(radio) {
        radio.addEventListener('change', function() {
            document.getElementById('color-form').submit(); // Submit form khi chọn màu
        });
    });
    document.querySelectorAll('.size-option input').forEach(input => {
        input.addEventListener('change', function() {
            document.getElementById('sizeForm').submit(); // Submit form khi chọn size
        });
    });
</script>

@endsection

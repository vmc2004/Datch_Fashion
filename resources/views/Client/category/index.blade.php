@extends('Client.layout.layout')

@section('title', "Cửa hàng")
@section('content')
<hr>
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
                     <a class="hover:underline cursor-pointer" href="">Đồ cho nam</a>
               </li>
            </ul>
         </div>
   </div>
   <div class="container mx-auto pt-4">
         <div class="flex border-b">
            <div class="mr-12 w-[270px] border-r hidden md:block">
               <div class="pr-5">
                     <div
                        class="box-border border border-current border-solid bg-neutral-100 border border-solid border-transparent rounded-lg h-8 leading-8 text-sm">
                        <div class="relative">
                           <input type="text" name="keyword" class="bg-neutral-100 px-2.5"
                                 placeholder="Tìm trên Vietmira" />
                           <svg class="absolute cursor-pointer overflow-visible w-4 top-1/4 right-2"
                                 viewBox="0 0 512 512">
                                 <path fill="currentColor"
                                    d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z">
                                 </path>
                           </svg>
                        </div>
                     </div>
               </div>
               <div class="border-b pb-4">
                     <div class="flex justify-between cursor-pointer pr-4 pt-6 transition-all pb-5">
                        <div class="text-slate-800 font-bold flex items-center gap-2 text-[15px]">
                           Ưu đãi
                        </div>
                        <span class="dropdownBtn size-8 flex justify-center items-center">
                           <svg class="w-3" viewBox="0 0 256 512">
                                 <path fill="currentColor"
                                    d="M136.5 185.1l116 117.8c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L128 224.7 27.6 326.9c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17l116-117.8c4.7-4.6 12.3-4.6 17 .1z">
                                 </path>
                           </svg>
                        </span>
                     </div>
                     <div class="can-mini pr-4">
                        <div>
                           <div>
                                 <div>
                                    <div class="cursor-pointer">
                                       <input type="checkbox" name="freeship" id="freeship" />
                                       <label class="ml-4" for="freeship">
                                             <div
                                                class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                                <svg class="overflow-visible w-4 inline-block"
                                                   viewBox="0 0 640 512">
                                                   <path fill="currentColor"
                                                         d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                                   </path>
                                                </svg>
                                                Freeship
                                             </div>
                                       </label>
                                    </div>
                                    <div class="cursor-pointer">
                                       <input type="checkbox" name="0d" id="0d" />
                                       <div class="inline-flex">
                                             <label for="0d" class="ml-4">
                                                <p
                                                   class="text-slate-800 px-2 bg-neutral-200 text-xs border border-solid border-transparent rounded-sm">
                                                   Sản phẩm 0đ
                                                </p>
                                             </label>
                                       </div>
                                    </div>
                                 </div>
                           </div>
                        </div>
                     </div>
               </div>
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
                                 <div class="space-y-4 text-sm">
                                    <a class="block hover:text-orange-500" href="">
                                       Tất cả danh mục
                                    </a>
                                    <a class="block ml-7 text-orange-500 font-semibold" href="">
                                       Đồ cho nam
                                    </a>
                                    <a class="block hover:text-orange-500 ml-12" href="">
                                       Giày nam
                                    </a>
                                    <a class="block hover:text-orange-500 ml-12" href="">
                                       Phụ kiện nam
                                    </a>
                                    <a class="block hover:text-orange-500 ml-12" href="">
                                       Túi, ví nam
                                    </a>
                                    <a class="block hover:text-orange-500 ml-12" href="">
                                       Đồ vệ sinh và làm đẹp nam
                                    </a>
                                    <a class="block hover:text-orange-500 ml-12" href="">
                                       Áo nam
                                    </a>
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
                        <div class="space-y-3 text-sm">
                           <div>
                                 <input id="all" type="radio" name="price" value="price_all" />
                                 <label for="all">Tất cả</label>
                           </div>
                           <div>
                                 <input id="free" type="radio" name="price" value="free" />
                                 <label for="free">Sản phẩm 0đ</label>
                           </div>
                           <div>
                                 <input id="under100" type="radio" name="price" value="price_all" />
                                 <label for="under100">Dưới 100.000đ</label>
                           </div>
                           <div>
                                 <input id="price_under_200" type="radio" name="price" value="price_under_200" />
                                 <label for="price_under_200">100.000đ - 200.000đ</label>
                           </div>
                           <div>
                                 <input id="price_under_500" type="radio" name="price" value="price_under_500" />
                                 <label for="price_under_500">200.000đ - 500.000đ</label>
                           </div>
                           <div>
                                 <input id="price_above_500" type="radio" name="price" value="price_above_500" />
                                 <label for="price_above_500">Trên 500.000đ</label>
                           </div>
                           <div class="flex items-start cursor-pointer">
                                 <input type="radio" id="price" name="price" value="aaa">
                                 <label for="price" class="ml-2">
                                    <div class="space-y-3">
                                       <p class=" cursor-pointer">Chọn Khoảng giá</p>
                                       <div class="flex items-center gap-3">
                                             <div class="relative">
                                                <div class="relative">
                                                   <input type="text" name="priceMin"
                                                         class="border border-current border-solid rounded-lg w-24 p-2 bg-[#e2e2e2]"
                                                         placeholder="Từ" disabled value="">
                                                   <span
                                                         class="absolute right-3 top-1/2 -translate-y-1/2 color-black-100">đ</span>
                                                </div>
                                             </div>
                                             <div>-</div>
                                             <div class="relative">
                                                <div class="relative">
                                                   <input type="text" name="priceMax"
                                                         class="border border-current border-solid rounded-lg w-24 p-2 bg-[#e2e2e2]"
                                                         placeholder="Đến" disabled value="">
                                                   <span
                                                         class="absolute right-3 top-1/2 -translate-y-1/2 color-black-100">đ</span>
                                                </div>
                                             </div>
                                       </div>
                                       <button class="hover:text-blue-700 cursor-pointer">Áp dụng</button>
                                    </div>
                                 </label>
                           </div>
                        </div>
                     </div>
               </div>
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
                <div class="can-mini pr-5 border-b pb-8">
                    <div class="grid grid-cols-5 gap-2">
                        <button class="border border-gray-300 rounded-md py-2 text-gray-600">XS</button>
                        <button class="border border-gray-300 rounded-md py-2 text-gray-600">S</button>
                        <button class="border border-gray-300 rounded-md py-2 text-gray-600">M</button>
                        <button class="border border-gray-300 rounded-md py-2 text-gray-600">L</button>
                        <button class="border border-gray-300 rounded-md py-2 text-gray-600">XL</button>
                        <button class="border border-gray-300 rounded-md py-2 text-gray-600 col-span-2">XXL</button>
                    </div>
                </div>
          </div>
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
                <div class="grid grid-cols-5 gap-2">
                    <div class="w-10 h-10 rounded-full bg-yellow-200 border border-gray-300"></div>
            <div class="w-10 h-10 rounded-full bg-pink-400 border border-gray-300"></div>
            <div class="w-10 h-10 rounded-full bg-brown-600 border border-gray-300"></div>
            <div class="w-10 h-10 rounded-full bg-white border border-gray-300"></div>
            <div class="w-10 h-10 rounded-full bg-purple-500 border border-gray-300"></div>
            <div class="w-10 h-10 rounded-full bg-yellow-400 border border-gray-300"></div>
            <div class="w-10 h-10 rounded-full bg-blue-400 border border-gray-300"></div>
            <div class="w-10 h-10 rounded-full bg-green-500 border border-gray-300"></div>
            <div class="w-10 h-10 rounded-full bg-gray-400 border border-gray-300"></div>
                </div>
            </div>
      </div>
            </div>
            <div class="flex-1">
               <div>
                     <div class="flex gap-2 flex-col">
                        <div>
                           <h1 class="inline text-lg font-bold text-slate-800 max-w-1/2 ">
                                 Bán đồ cho nam
                           </h1>
                           <p class="inline ml-2 text-slate-500 text-sm">(296 kết quả)</p>
                        </div>
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
                     <div class="flex flex-wrap items-center md:mt-6 gap-4">
                        <div class="bg-gray-200 py-2 px-3 rounded-full flex items-center gap-2">
                           <div class="text-slate-600">Đồ cho nam</div>
                           <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" stroke="currentColor"
                                 class="size-6">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                           </svg>
                        </div>
                        <span class="cursor-pointer text-slate-800 hover:text-[#BB0000]">Xóa tất cả</span>
                     </div>
                     <div class="mt-12 grid md:grid-cols-4 grid-cols-2 md:gap-10 gap-4">
                        <div class="h-full rounded-lg relative shadow-xl">
                           <div class="absolute -left-[3.2px] top-2 z-10">
                                 <div
                                    class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                    <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                                       <path fill="currentColor"
                                             d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                       </path>
                                    </svg>
                                    Freeship
                                 </div>
                                 <div
                                    class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                                 </div>
                           </div>
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                 <div class="overflow-hidden h-48">
                                    <a href="">
                                       <img class="hover:scale-110 duration-100"
                                             src="{{asset('assets/images/book-default.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> Jordan Travis scott siêu cấp </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             950,000đ </p>
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
                        <div class="h-full rounded-lg relative shadow-xl">
                           <div class="absolute -left-[3.2px] top-2 z-10">
                                 <div
                                    class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                    <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                                       <path fill="currentColor"
                                             d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                       </path>
                                    </svg>
                                    Freeship
                                 </div>
                                 <div
                                    class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                                 </div>
                           </div>
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                 <div class="overflow-hidden h-48">
                                    <a href="">
                                       <img class="hover:scale-110 duration-100"
                                             src="{{asset('assets/images/book-default.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> Jordan Travis scott siêu cấp </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             950,000đ </p>
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
                        <div class="h-full rounded-lg relative shadow-xl">
                           <div class="absolute -left-[3.2px] top-2 z-10">
                                 <div
                                    class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                    <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                                       <path fill="currentColor"
                                             d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                       </path>
                                    </svg>
                                    Freeship
                                 </div>
                                 <div
                                    class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                                 </div>
                           </div>
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                 <div class="overflow-hidden h-48">
                                    <a href="">
                                       <img class="hover:scale-110 duration-100"
                                             src="{{asset('assets/images/book-default.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> Jordan Travis scott siêu cấp </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             950,000đ </p>
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
                        <div class="h-full rounded-lg relative shadow-xl">
                           <div class="absolute -left-[3.2px] top-2 z-10">
                                 <div
                                    class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                    <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                                       <path fill="currentColor"
                                             d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                       </path>
                                    </svg>
                                    Freeship
                                 </div>
                                 <div
                                    class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                                 </div>
                           </div>
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                 <div class="overflow-hidden h-48">
                                    <a href="">
                                       <img class="hover:scale-110 duration-100"
                                             src="{{asset('assets/images/book-default.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> Jordan Travis scott siêu cấp </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             950,000đ </p>
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
                        <div class="h-full rounded-lg relative shadow-xl">
                           <div class="absolute -left-[3.2px] top-2 z-10">
                                 <div
                                    class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                    <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                                       <path fill="currentColor"
                                             d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                       </path>
                                    </svg>
                                    Freeship
                                 </div>
                                 <div
                                    class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                                 </div>
                           </div>
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                 <div class="overflow-hidden h-48">
                                    <a href="">
                                       <img class="hover:scale-110 duration-100"
                                             src="{{asset('assets/images/book-default.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> Jordan Travis scott siêu cấp </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             950,000đ </p>
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
                        <div class="h-full rounded-lg relative shadow-xl">
                           <div class="absolute -left-[3.2px] top-2 z-10">
                                 <div
                                    class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                    <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                                       <path fill="currentColor"
                                             d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                       </path>
                                    </svg>
                                    Freeship
                                 </div>
                                 <div
                                    class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                                 </div>
                           </div>
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                 <div class="overflow-hidden h-48">
                                    <a href="">
                                       <img class="hover:scale-110 duration-100"
                                             src="{{asset('assets/images/book-default.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> Jordan Travis scott siêu cấp </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             950,000đ </p>
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
                        <div class="h-full rounded-lg relative shadow-xl">
                           <div class="absolute -left-[3.2px] top-2 z-10">
                                 <div
                                    class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                    <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                                       <path fill="currentColor"
                                             d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                       </path>
                                    </svg>
                                    Freeship
                                 </div>
                                 <div
                                    class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                                 </div>
                           </div>
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                 <div class="overflow-hidden h-48">
                                    <a href="">
                                       <img class="hover:scale-110 duration-100"
                                             src="{{asset('assets/images/book-default.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> Jordan Travis scott siêu cấp </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             950,000đ </p>
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
                        <div class="h-full rounded-lg relative shadow-xl">
                           <div class="absolute -left-[3.2px] top-2 z-10">
                                 <div
                                    class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                                    <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                                       <path fill="currentColor"
                                             d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                                       </path>
                                    </svg>
                                    Freeship
                                 </div>
                                 <div
                                    class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                                 </div>
                           </div>
                           <div class="h-full rounded-lg overflow-hidden flex flex-col">
                                 <div class="overflow-hidden h-48">
                                    <a href="">
                                       <img class="hover:scale-110 duration-100"
                                             src="{{asset('assets/images/book-default.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> Jordan Travis scott siêu cấp </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             950,000đ </p>
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

                     </div>
                     <div class="flex justify-center md:my-16 my-4">
                        <ul class="flex items-center gap-3 text-black-500">
                           <li>
                                 <a href="">
                                    <span
                                       class="w-6 h-6 md:w-10 md:h-10 rounded-lg text-16 mx-1 md:mx-2 cursor-pointer flex items-center justify-center bg-[#BB0000] text-white">
                                       1
                                    </span>
                                 </a>
                           </li>
                           <li>
                                 <a href="">
                                    <span
                                       class="text-slate-600 flex items-center justify-center md:w-10 md:h-10 w-6 h-6  border border-transparent">
                                       2
                                    </span>
                                 </a>
                           </li>
                           <li>
                                 <a href="">
                                    <span
                                       class="text-slate-600 flex items-center justify-center md:w-10 md:h-10 w-6 h-6 border border-transparent">
                                       3
                                    </span>
                                 </a>
                           </li>
                           <li>
                                 <a href="">
                                    <span
                                       class="text-slate-600 flex items-center justify-center md:w-10 md:h-10 w-6 h-6 border border-transparent">
                                       ...
                                    </span>
                                 </a>
                           </li>
                           <li>
                                 <a href="">
                                    <span
                                       class="text-slate-600 flex items-center justify-center md:w-10 md:h-10 w-6 h-6 border border-transparent">
                                       11
                                    </span>
                                 </a>
                           </li>
                           <li>
                                 <a href="">
                                    <span
                                       class="flex items-center justify-center md:w-10 md:h-10 p-2 border border-transparent">
                                       <svg viewBox="0 0 24 24" stroke="currentColor" class="w-6">
                                             <path d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                       </svg>
                                    </span>
                                 </a>
                           </li>
                        </ul>
                     </div>
                     <div class="border-b pl-2 md:pl-0 pb-8 md:hidden text-sm">
                        <div
                           class="flex justify-between items-center text-[15px] cursor-pointer pr-4 pt-2 pb-3">
                           <div class="text-slate-800 font-bold flex items-center">
                                 Mua bán đồ nam cũ
                           </div>
                        </div>
                        <div class="can-mini pr-5">
                           <div style="height: auto; overflow: visible" aria-hidden="false"
                                 class="rah-static rah-static--height-auto">
                                 <div>
                                    <div>
                                       <span class="inline-block w-full BoxLink_featureLinkItem__uwfrg">
                                             <a title="Bán đồ cho nam tại Hồ Chí Minh"
                                                class="capitalize hover:underline text-blue-500 hover:text-blue-700 visited:text-purple-800"
                                                href="">
                                                Đồ cho nam cũ tại Hồ Chí Minh
                                             </a>
                                       </span>
                                       <span class="inline-block w-full BoxLink_featureLinkItem__uwfrg">
                                             <a title="Bán đồ cho nam tại Phú Thọ"
                                                class="capitalize hover:underline text-blue-500 hover:text-blue-700 visited:text-purple-800"
                                                href="">
                                                Đồ cho nam cũ tại Phú Thọ
                                             </a>
                                       </span>
                                       <span class="inline-block w-full BoxLink_featureLinkItem__uwfrg">
                                             <a title="Bán đồ cho nam tại Hà Nội"
                                                class="capitalize hover:underline text-blue-500 hover:text-blue-700 visited:text-purple-800"
                                                href="">
                                                Đồ cho nam cũ tại Hà Nội
                                             </a>
                                       </span>
                                       <span class="inline-block w-full BoxLink_featureLinkItem__uwfrg">
                                             <a title="Bán đồ cho nam tại Đà Nẵng"
                                                class="capitalize hover:underline text-blue-500 hover:text-blue-700 visited:text-purple-800"
                                                href="">
                                                Đồ cho nam cũ tại Đà Nẵng
                                             </a>
                                       </span>
                                       <span class="inline-block w-full BoxLink_featureLinkItem__uwfrg">
                                             <a title="Bán đồ cho nam tại Cần Thơ"
                                                class="capitalize hover:underline text-blue-500 hover:text-blue-700 visited:text-purple-800"
                                                href="">
                                                Đồ cho nam cũ tại Cần Thơ
                                             </a>
                                       </span>
                                    </div>
                                 </div>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
         </div>
   </div>
</div>


@endsection
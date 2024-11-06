@extends('Client.layout.layout')
@section('single-page', "Danh sách sản phẩm")
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
                     <a class="hover:underline cursor-pointer" href="/cua-hang">@yield('single-page')</a>
               </li>
            </ul>
         </div>
   </div>
   
   <div class="container mx-auto pt-4">
      <!-- Bên Trái -->
      <div class="flex border-b">
            <div class="mr-12 w-[270px] border-r hidden md:block">
               <div class="pr-5">
                     <div
                        class="box-border border border-current border-solid bg-neutral-100 border border-solid border-transparent rounded-lg h-8 leading-8 text-sm">
                        <div class="relative">
                           <input type="text" name="keyword" class="bg-neutral-100 px-2.5"
                                 placeholder="Tìm trên DATCH" />
                           <svg class="absolute cursor-pointer overflow-visible w-4 top-1/4 right-2"
                                 viewBox="0 0 512 512">
                                 <path fill="currentColor"
                                    d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z">
                                 </path>
                           </svg>
                        </div>
                     </div>
               </div>
               
               <!-- Danh mục -->
               <div class="border-b pl-6 md:pl-0 pb-8 py-3 border-black text-black">
                  <div class="form-group">
                     <label class="py-2 font-bold" for="categoryDropdown">Danh mục</label>
                     <select name="category_id" id="categoryDropdown" class="form-control">
                     
                     @foreach($category as $ct)
                        <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                     @endforeach
                     </select>
                  </div>            
               </div>
               <!-- Hết Danh mục đến Size -->
               <div class="pl-6 md:pl-0 pb-8 border-black font-bold text-black">
                  <div class="form-group">
                     <label class="" for="categoryDropdown">Size</label>
                     <select name="category_id" id="categoryDropdown" class="form-control">
                     
                     @foreach($size as $sz)
                        <option value="{{ $ct->id }}">{{ $sz->name }}</option>
                     @endforeach
                     </select>
                  </div>
               </div>

          <!-- Hết div 1 : Danh mục , Size -->
          <div class="pl-6 md:pl-0 pb-8">
            <div class="flex justify-between items-center text-[15px] cursor-pointer pr-4 pt-2 pb-3">
               <div class="text-slate-800 font-bold flex items-center">
                 Màu sắc
               </div>
            </div>
            <div class="can-mini pr-5 border-b pb-8">
                <div class="grid grid-cols-5 gap-2">
                  @foreach($color as $cl)
                     <label class="cursor-pointer">
                        <input type="radio" name="color" value="{{ $cl->id }}" class="hidden color-radio" data-color-name="{{ $cl->name }}">
                        <div class="color-option w-8 h-8 border border-gray-300 rounded-full" 
                        style="background-color: {{$cl->color_code}} ">
                        </div>
                     </label>
                  @endforeach
                </div>
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
                     <div class="mt-6 grid md:grid-cols-3 grid-cols-2 md:gap-10 gap-4">
                     @foreach($products as $pd)
                     <div class="h-full rounded-lg relative shadow-xl">
                     
                        <div class="overflow-hidden h-48">
                           <a href="/product/{{$pd->slug}}">
                              <img class="hover:scale-110 duration-100"
                                    src="{{ asset('storage/' . $pd->image) }}" alt="{{$pd->slug}}">
                           </a>
                        </div>
                     
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
                                 
                                 <div class="bg-white p-2 flex flex-col space-y-2">
                                    <div class="">
                                       <div class="cursor-pointer">
                                             <a class="text-slate-800" href=""> {{$pd->name}} </a>
                                       </div>
                                    </div>
                                    <div class="space-y-2">
                                       <p class="font-semibold text-slate-800">
                                             {{$pd->price}} </p>
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



@endsection
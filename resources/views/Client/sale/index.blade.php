@extends('Client.layout.layout')
@section('single-page', "Sale")
@section('title', "Sale")

@section('content')


    <div class="max-w-screen-xl mx-auto ">
        <div class="container flex mx-auto flex py-4">
              <div>
                 <ul class="flex container mx-auto pt-4 text-sm ">
                    <li>
                          <a class="hover:underline cursor-pointer" href="/">
                             Datch Fashion
                          </a>
                    </li>
                    <li>
                          <span class="mx-4">&gt;</span>
                          <a class="hover:underline cursor-pointer" href="/sale">@yield('single-page')</a>
                    </li>
                 </ul>
              </div>
        </div>

        <div class="flex justify-center my-4">
            <img class="w-full max-h-60 object-cover rounded-lg" src="{{ asset('assets/client/images/Blacknov2d_cate_desktop-29.11.jpg') }}" alt="Banner">
        </div>
    <!-- Tabs Danh mục -->
    <div class="flex justify-center space-x-4">
      <a href="{{ route('Client.sale.index') }}">
          <button class="px-4 py-2 rounded-full bg-red-600 text-white">Tất cả</button>
      </a>
  
      @foreach($category as $cat)
          <a href="{{ route('Client.sale.byCategory', ['category_id' => $cat->id]) }}">
              <button class="px-4 py-2 rounded-full border">{{ $cat->name }}</button>
          </a>
      @endforeach
  </div>

   
    <!-- Hiển thị sản phẩm giảm giá -->


    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-6">
      @foreach($saleProducts as $product)
          <div class="relative border rounded-lg p-4">
              <!-- Nhãn Sale -->
              <div class="absolute top-0 left-0 bg-red-600 text-white px-2 py-1 text-xs">
                  SALE
              </div>
              <!-- Hình ảnh -->
             
              <a href="/product/{{ $product->slug }}" class="flex justify-center items-center">
                  <img class="hover:scale-110 duration-100 w-90 h-80" src="{{ asset($product->image) }}" alt="">
              </a>
              <!-- Tên sản phẩm -->
              <div class="mt-2">
                  <a href="/product/{{ $product->slug }}" class="block text-gray-700 font-bold">{{ $product->name }}</a>
                  <!-- Giá -->
                  <div class="flex justify-between items-center mt-1">
                      <span class="text-red-600 font-bold">{{ number_format($product->productVariants->first()?->sale_price ?? 0) }} đ</span>
                      <span class="line-through text-gray-400">{{ number_format($product->productVariants->first()?->price ?? 0) }} đ</span>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
  

    <!-- Pagination -->
    <div class="mt-4">
        {{ $saleProducts->links() }}
    </div>

</div>

@endsection

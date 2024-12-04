@extends('Client.layout.layout')

@section('title', "Đơn hàng của tôi")


@section('content')
<div class="max-w-screen-xl mx-auto ">

    <div class="mt-12 md:grid grid-cols-5 gap-8">
        <!-- Sidebar -->
        @include('Client.layout.profile_sidebar')

        <div class="col-span-4">
            <div>
                <h3
                    class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                    <strong>Đơn mua</strong>
                </h3>
                <div class=" mx-auto p-4 bg-white shadow-md">
                    <div class="flex items-center space-x-4 border-b pb-2">
                     <a class="text-red-500 flex items-center space-x-1" href="#">
                      <i class="fas fa-list">
                      </i>
                      <span>
                       Tất cả
                      </span>
                     </a>
                     <a class="text-gray-500 flex items-center space-x-2" href="#">
                      <i class="fas fa-shipping-fast">
                      </i>
                      <span>
                       Vận chuyển
                      </span>
                     </a>
                     <a class="text-gray-500 flex items-center space-x-1" href="#">
                      <i class="fas fa-truck">
                      </i>
                      <span>
                       Giao hàng
                      </span>
                     </a>
                     <a class="text-gray-500 flex items-center space-x-1" href="#">
                      <i class="fas fa-check-circle">
                      </i>
                      <span>
                       Hoàn thành
                      </span>
                     </a>
                     <a class="text-gray-500 flex items-center space-x-1" href="#">
                      <i class="fas fa-times-circle">
                      </i>
                      <span>
                       Đã hủy
                      </span>
                     </a>
                     <a class="text-gray-500 flex items-center space-x-1" href="#">
                      <i class="fas fa-undo-alt">
                      </i>
                      <span>
                       Trả hàng/Hoàn tiền
                      </span>
                     </a>
                    </div>
                    <!-- Search Bar -->
                    <div class="mt-4">
                     <input class="w-full p-2 border rounded" placeholder="Bạn có thể tìm kiếm theo mã đơn hàng" type="text"/>
                    </div>
                    <!-- Order Details -->
                    @foreach ($orders as $order)
                    <div class="mt-4 mb-4">
                        <div class="flex justify-between items-center">
                         <span class="font-bold">
                          {{$order->code}}
                         </span>
                         <div class="text-sm text-gray-500">
                          <span>
                         {{$order->created_at}}
                          </span>
                          <span class="ml-2 text-yellow-500">
                           | {{$order->status}}
                          </span>
                         </div>
                        </div>
                        <!-- Items -->
                        @foreach ($order->orderDetails as $detail)
                        <div class="mt-4 space-y-4">
                         <div class="flex items-center space-x-4">
                          <img alt="Image of Xà lách thủy tinh thủy canh 230g" class="w-16 h-16"  src=" {{ asset($detail->productVariant->image) }}"/>
                          <div class="flex-1">
                           <div class="text-gray-500 font-bold">
                            {{ $detail->productVariant->product->name }}
                           </div>
                           
                           <div class="text-gray-500 text-sm">
                            Màu sắc: {{ $detail->productVariant->color->name }} - Số lượng: {{ $detail->quantity }}
                           </div>
                          </div>
                          <div class="text-right">
                           <div class="text-gray-500">
                            {{ number_format($detail->price, 0, ',', '.') }} VND
                           </div>
                           
                          </div>
                         </div>
                         </div>
                        </div>
                        @endforeach
                        <!-- Total -->
                        <div class="mt-4 mb-4 flex justify-between items-center">
                         <button class="bg-green-500 text-white px-4 py-2 rounded">
                          Xem chi tiết
                         </button>
                         <div class="text-red-500 font-bold">
                          Thành tiền: {{number_format($order->total_price, 0, ',', '.')}} VND
                         </div>
                        </div> <hr>
                        @endforeach
                    </div>
                   </div>
                 

            <div>
            </div>
            </div>
        </div>
    </div>
</div>


                   


@endsection
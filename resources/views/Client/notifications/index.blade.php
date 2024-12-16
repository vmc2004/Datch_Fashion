@extends('Client.layout.layout')

@section('title', 'Thông báo')


@section('content')
    <div class="max-w-screen-xl mx-auto ">

        <div class="mt-12 md:grid grid-cols-5 gap-8">
            <!-- Sidebar -->
            @include('Client.layout.profile_sidebar')

            <div class="col-span-4">
                <div>
                    <h3
                        class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                        <strong>Thông báo</strong>
                    </h3>
                    <div class=" mx-auto ">
                        @foreach ($notifications as $notification)
                            <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                                <div class="flex items-center mb-2">
                                    <!-- Kiểm tra loại thông báo và hiển thị icon tương ứng -->
                                    @if (Str::contains($notification->data['message'], 'hủy'))
                                        <i class="fas fa-exclamation-circle text-purple-500 mr-2"></i>
                                    @elseif (Str::contains($notification->data['message'], 'đặt'))
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                    @else
                                        <i class="fas fa-comment-alt text-orange-500 mr-2"></i>
                                    @endif
                                    <span class="text-gray-700 font-semibold">
                                        {{ $notification->data['message'] }}
                                    </span>
                                </div>
                                <div class="text-gray-500 text-sm mb-2">
                                    {{ \Carbon\Carbon::parse($notification->created_at)->format('d/m/Y') }}
                                </div>

                                <!-- Hiển thị chi tiết đơn hàng hoặc sản phẩm liên quan -->
                                <div class="flex items-center mb-2">
                                    <img alt="{{ $notification->data['product_name'] }}" class="w-12 h-12 mr-4"
                                        src=""
                                        width="50" height="50" />
                                    <div>
                                        <div class="text-gray-700">
                                            <!-- Tên sản phẩm hoặc đơn hàng -->
                                            @if (isset($notification->data['product_name']))
                                                {{ $notification->data['product_name'] }}
                                            @else
                                                {{ $notification->data['order_code'] }}
                                            @endif
                                        </div>
                                        <div class="text-gray-500 text-sm">
                                            @if (isset($notification->data['order_code']))
                                                Mã đơn hàng: {{ $notification->data['order_code'] }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Nếu thông báo có link chi tiết -->
                                @if (isset($notification->data['details_url']))
                                    <div class="text-blue-500 text-sm">
                                        <a href="{{ $notification->data['details_url'] }}">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection

@extends('Client.layout.layout')

@section('title', 'Thanh toán')
@section('content')
<hr>


<div class="max-w-screen-xl mx-auto ">
    <div class="container mx-auto mb-12 pb-20">
        <div class="mb-5">
            <ul class="flex container mx-auto py-2">
                <li>
                    <a class="hover:underline hover:text-red-700 cursor-pointer" href="/">Datch Fashion</a>
                </li>
                <li>
                    <span class="mx-3">&gt;</span>
                    <a class="hover:underline hover:text-red-700 cursor-pointer" href="/">Thanh toán</a>
                </li>
            </ul>
        </div>
        <h1 class="text-center p-5 border shadow-2xl rounded-lg text-2xl font-bold ">Thanh toán</h1>
        <div class="max-w-7xl mx-auto p-4">
            <form action="{{route('post_checkout')}}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Left Column -->
                    <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-4">Người nhận</h2>
                        <div class="mb-4">
                            <label class="block text-gray-700">Tên khách hàng</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="name" placeholder="Tên khách hàng" type="text" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Số điện thoại</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="phone" placeholder="Số điện thoại" type="text" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email của bạn</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="email" placeholder="Email của bạn" type="email" />
                        </div>
                        <hr>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-bold">Địa chỉ của bạn</label>
                            <div class="mb-4">
                                <input class="w-full p-2 border border-gray-300 rounded mt-1" name="address" placeholder="Nhập địa chỉ (VD: Số 10 Nguyễn Tuân)" type="text" />
                            </div>
                        </div>

                        <h2 class="text-xl font-bold mb-4">Phương thức vận chuyển</h2>
                        <div class="mb-4">
                            <label class="block text-gray-700">Tiêu chuẩn</label>
                            <div class="flex justify-between items-center p-4 border border-gray-300 rounded mt-1">
                                <div>
                                    <input class="mr-2" name="transport" type="radio" />
                                    <span>30.000 đ</span>
                                </div>
                                <span>Đơn hàng nhận từ 3 - 5 ngày</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Thẻ tín dụng (VISA)</label>
                            <div class="p-4 border border-gray-300 rounded mt-1">
                                <div class="flex items-center mb-3">
                                    <input class="mr-2" value="Thanh toán khi nhận hàng" name="payment" type="radio" />
                                    <span>Thanh toán khi nhận hàng</span>
                                    <img alt="Banking logo" class="ml-auto" height="20" src="{{ asset('assets/client/images/cod.png') }}" width="50" />
                                </div>
                                <div class="flex items-center mb-3">
                                    <input class="mr-2" value="Thanh toán bằng thẻ" name="payment" type="radio" />
                                    <span>Thẻ nội địa/Internet Banking</span>
                                    <img alt="Banking logo" class="ml-auto" height="20" src="{{ asset('assets/client/images/visa.png') }}" width="80" />
                                </div>
                                <div class="flex items-center mb-3">
                                    <input class="mr-2" value="Thanh toán qua VNPay" name="payment" type="radio" />
                                    <span>Ví điện tử VNPAY</span>
                                    <img alt="VNPAY logo" class="ml-auto" src="{{ asset('assets/client/images/vnpay.png') }}" width="80" />
                                </div>
                            </div>
                        </div>
                        <button class="w-full bg-red-600 text-white p-4 rounded-lg mt-4" type="submit">Thanh toán</button>
            </form>
        </div>


        <!-- Right Column -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Thông tin sản phẩm</h2>
            @php
            $subtotal = 0; // Khởi tạo biến tổng tiền tạm tính
            @endphp
            @foreach ($cartItems->items as $item)


            @php
            $subtotal += $item['price_at_purchase'] * $item['quantity']; // Cộng dồn giá trị
            @endphp
            <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">
            <input type="hidden" name="variant_id[]" value="{{ $item['variant_id'] }}">
            <input type="hidden" name="price[]" value="{{ $item['price_at_purchase'] }}">

            <div class="flex items-center mb-4">
                <img alt="Ảnh sản phẩm" class="w-20 h-20 rounded-lg" height="80" src="" width="80" />
                <div class="ml-4">
                    <p>{{ $item->variant->product->name }} - {{ $item->variant->color->name }}, {{ $item->variant->size->name }}</p>
                    <p>{{number_format($item['price_at_purchase'])}} đ</p>
                    <p>x{{$item['quantity']}}</p>
                </div>
            </div>
            @endforeach

            <div class="mb-4">
                <label class="block text-gray-700">Mã giảm giá</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Nhập mã giảm giá" type="text" />
            </div>
            <div class="mb-4">
                <div class="flex justify-between">
                    <span>Tạm tính</span>
                    <span>{{number_format($subtotal)}} đ</span>
                </div>
                <div class="flex justify-between">
                    <span>Vận chuyển</span>
                    <span>30.000 đ</span>
                </div>
            </div>
            <div class="mb-4">
                <div class="flex justify-between font-bold">
                    <span>Tổng thanh toán</span>
                    <span>{{number_format($subtotal +30000)}} đ</span>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
@endsection
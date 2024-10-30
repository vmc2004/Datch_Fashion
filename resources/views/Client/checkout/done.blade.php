@extends('Client.layout.layout')

@section('title', 'Thanh toán thành công')
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
                <li>
                    <span class="mx-3">&gt;</span>
                    <span class="text-gray-500">Thanh toán thành công</span>
                </li>
            </ul>
        </div>
        
        
        <div class="text-center mt-8">
            <p class="text-lg mb-6">Cảm ơn bạn đã mua sắm tại Datch Fashion! Đơn hàng của bạn đã được đặt thành công.</p>
            <p class="text-gray-700 mb-6">Chúng tôi sẽ gửi thông tin chi tiết đơn hàng tới địa chỉ email của bạn sớm nhất.</p>
            <div class="mt-8">
                <a href="/" class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-all">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>
@endsection

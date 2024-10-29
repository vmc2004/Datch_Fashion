@extends('Client.layout.layout')

@section('title', 'Giỏ hàng')
@section('content')
    <hr>
    <div class="max-w-screen-xl mx-auto ">
        <div class="container mx-auto mb-12 pb-20">
            <div class="border-b border-black-100">
                <ul class="flex container mx-auto py-2">
                    <li>
                        <a class="hover:underline hover:text-red-700 cursor-pointer" href="/">Datch Fashion</a>
                    </li>
                    <li>
                        <span class="mx-3">&gt;</span>
                        <a class="hover:underline hover:text-red-700 cursor-pointer" href="/">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
            <div class="flex md:mt-16">
                <div class="flex-1 md:mr-8">
                    <div class="bg-white md:px-6 md:py-10 py-4 px-2 rounded-lg">
                        <h2 class="md:mb-6 mb-2 text-slate-800 font-semibold text-xl">2 Sản phẩm trong giỏ hàng</h2>
                        <div>
                            <div id="paymentBtn" class="cursor-pointer select-none">
                                <span class="paymentClose">
                                    <svg class="w-4 h-4 inline-block svg-vertical" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="ml-2">Chọn tất cả</span>
                            </div>
                            <div class="container mx-auto">
                                @if ($cart && $cart->items->count() > 0)
                                    <div class="bg-white shadow-md rounded-lg p-4">
                                        @foreach ($cart->items as $item)
                                            <div class="flex items-center border-b py-4">
                                                <!-- Cột 1: Ảnh sản phẩm -->
                                                <div class="flex-shrink-0 w-1/5 text-center">
                                                    
                                                    <img src="{{ asset($item->variant->product->image) }}"
                                                        alt="{{ $item->variant->product->name }}"
                                                        class="w-50 h-24 object-cover rounded">
                                                </div>

                                                <!-- Cột 2: Tên sản phẩm và biến thể -->
                                                <div class="flex-1 ml-4">
                                                    <h2 class="text-lg font-semibold">{{ $item->variant->product->name }}
                                                    </h2>
                                                    <p class="text-sm text-gray-500">Biến thể:
                                                        {{ $item->variant->size->name }} / {{ $item->variant->color->name }}
                                                    </p>
                                                </div>

                                                <!-- Cột 3: Số lượng -->
                                                <div class="flex items-center w-1/5 text-center">
                                                    <button onclick="changeQuantity({{ $item->id }}, -1)"
                                                        class="px-2 py-1 border">-</button>
                                                    <input type="number" id="quantity-{{ $item->id }}"
                                                        value="{{ $item->quantity }}" class="w-12 text-center border mx-2"
                                                        min="1" readonly>
                                                    <button onclick="changeQuantity({{ $item->id }}, 1)"
                                                        class="px-2 py-1 border">+</button>
                                                </div>

                                                <!-- Cột 4: Giá -->
                                                <div class="flex-shrink-0 w-1/5 text-center">
                                                    <p class="text-lg font-bold">
                                                        {{ number_format($item->price_at_purchase * $item->quantity, 2) }}
                                                        VNĐ</p>
                                                </div>

                                                <!-- Cột 5: Nút xóa -->
                                                <div class="flex-shrink-0 w-1/5 text-center">
                                                    <form action="" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 focus:outline-none">
                                                            <i class="fas fa-trash-alt"></i> <!-- Biểu tượng xóa từ Font Awesome -->
                                                        </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-4">
                                        <p class="text-lg font-bold">Tổng giá:
                                            {{ number_format($cart->items->sum('price_at_purchase'), 2) }} VNĐ</p>
                                       
                                    </div>
                                @else
                                    <p class="text-gray-500">Giỏ hàng của bạn đang trống.</p>
                                @endif
                            </div>
                            <script>
                                function changeQuantity(itemId, change) {
                                    const quantityInput = document.getElementById('quantity-' + itemId);
                                    let currentQuantity = parseInt(quantityInput.value);
                                    currentQuantity = Math.max(1, currentQuantity + change); // Không cho phép số lượng nhỏ hơn 1
                                    quantityInput.value = currentQuantity;
                            
                                    // Cập nhật giá
                                    const priceAtPurchase = {{ $item->price_at_purchase }}; // Thay thế giá sản phẩm cụ thể
                                    const priceElement = quantityInput.closest('.flex').querySelector('p');
                                    priceElement.innerHTML = (priceAtPurchase * currentQuantity).toFixed(2) + ' VNĐ';
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="w-96 hidden md:block">
                    <div class="md:flex p-6 mb-8 rounded-lg bg-[#05a5011a] text-[#05a501] text-sm hidden">
                        <div>
                            <svg class="font-bold mr-2 overflow-visible w-4 inline-block svg-vertical"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M256 410.955V99.999l-142.684 59.452C123.437 279.598 190.389 374.493 256 410.955zm-32-66.764c-36.413-39.896-65.832-97.846-76.073-164.495L224 147.999v196.192zM466.461 83.692l-192-80a47.996 47.996 0 0 0-36.923 0l-192 80A48 48 0 0 0 16 128c0 198.487 114.495 335.713 221.539 380.308a48 48 0 0 0 36.923 0C360.066 472.645 496 349.282 496 128a48 48 0 0 0-29.539-44.308zM262.154 478.768a16.64 16.64 0 0 1-12.31-.001C152 440 48 304 48 128c0-6.48 3.865-12.277 9.846-14.769l192-80a15.99 15.99 0 0 1 12.308 0l192 80A15.957 15.957 0 0 1 464 128c0 176-104 312-201.846 350.768z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-1 font-bold">Bảo vệ người mua</p>
                            <p class="text-xs">Được hoàn tiền đầy đủ nếu hàng không như mô tả hoặc không được giao
                            </p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg mb-8 text-slate-700">
                        <div class="px-5 py-5 flex border-b">
                            <p class="text-lg uppercase">Giao hàng tới</p>
                            <div class="text-blue-800 ml-auto cursor-pointer">
                                <span id="open-modal1">
                                    <svg class="overflow-visible w-4 inline-block svg-vertical"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M417.8 315.5l20-20c3.8-3.8 10.2-1.1 10.2 4.2V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h292.3c5.3 0 8 6.5 4.2 10.2l-20 20c-1.1 1.1-2.7 1.8-4.2 1.8H48c-8.8 0-16 7.2-16 16v352c0 8.8 7.2 16 16 16h352c8.8 0 16-7.2 16-16V319.7c0-1.6.6-3.1 1.8-4.2zm145.9-191.2L251.2 436.8l-99.9 11.1c-13.4 1.5-24.7-9.8-23.2-23.2l11.1-99.9L451.7 12.3c16.4-16.4 43-16.4 59.4 0l52.6 52.6c16.4 16.4 16.4 43 0 59.4zm-93.6 48.4L403.4 106 169.8 339.5l-8.3 75.1 75.1-8.3 233.5-233.6zm71-85.2l-52.6-52.6c-3.8-3.8-10.2-4-14.1 0L426 83.3l66.7 66.7 48.4-48.4c3.9-3.8 3.9-10.2 0-14.1z">
                                        </path>
                                    </svg>
                                    <span class="hover:underline text-[13px]">Chỉnh sửa</span>
                                </span>
                            </div>
                        </div>
                        <div class="px-5 py-5">
                            <div>
                                <div class="mb-2 flex justify-between">
                                    <span>
                                        <span class="pr-4 font-semibold border-r-2 border-current">
                                            Superultranovamega
                                        </span>
                                        <span class="pl-4 font-bold">0123456789</span>
                                    </span>
                                </div>
                                <div class="mb-8">Vân Canh - Hoài Đức, Xã Vân Canh, Huyện Hoài Đức, Hà Nội</div>
                            </div>
                            <div class="block">
                                <div class="relative">
                                    <textarea name="note_for_seller" class="w-full border border-slate-600 resize-none p-2 text-sm rounded-lg"
                                        placeholder="Lưu ý cho người bán hoặc đơn vị vận chuyển (không bắt buộc)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg">
                        <div class="p-5 border-b text-lg uppercase text-slate-700">
                            Tóm tắt đơn hàng
                        </div>
                        <div class="p-5 border-b">
                            <div class="flex flex-col gap-3 mb-8 text-sm">
                                <div class="flex">
                                    <div>Tổng tiền hàng:</div>
                                    <div class="ml-auto">0 đ</div>
                                </div>
                                <div class="flex">
                                    <div>Tổng tiền phí vận chuyển:</div>
                                    <div class="ml-auto">0 đ</div>
                                </div>
                                <div class="flex">
                                    <div>Tổng số tiền:</div>
                                    <div class="ml-auto font-semibold">0 đ</div>
                                </div>
                            </div>
                            <div class="font-semibold text-slate-700 py-5 text-[18px]">Giảm giá</div>
                            <div class="grid grid-cols-5 mb-4">
                                <div class="col-span-3 flex flex-col">
                                    <div class="flex flex-1">
                                        <div class="w-14">
                                            <div class="">
                                                <div class="cursor-pointer">
                                                    <img class="inline-block w-6 h-6" src="./assets/images/O2.svg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <span class="mt-auto">Dùng điểm O2</span>
                                            <div class="ml-3">
                                                <div class="cursor-pointer">
                                                    <svg class="w-4 h-4 inline-block" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512">
                                                        <path fill="currentColor"
                                                            d="M256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28zm7.67-24h-16c-6.627 0-12-5.373-12-12v-.381c0-70.343 77.44-63.619 77.44-107.408 0-20.016-17.761-40.211-57.44-40.211-29.144 0-44.265 9.649-59.211 28.692-3.908 4.98-11.054 5.995-16.248 2.376l-13.134-9.15c-5.625-3.919-6.86-11.771-2.645-17.177C185.658 133.514 210.842 116 255.67 116c52.32 0 97.44 29.751 97.44 80.211 0 67.414-77.44 63.849-77.44 107.408V304c0 6.627-5.373 12-12 12zM256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ml-14 text-14">(0 có sẵn)</div>
                                </div>
                                <div class="col-span-2">
                                    <div class="text-center flex items-center">
                                        <div>
                                            <input type="text" name="point"
                                                class="border border-current rounded-md h-[35px] p-2 w-full bg-neutral-200 text-sm"
                                                disabled="" placeholder="Nhập số O2" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 mb-6">
                                <div class="col-span-3 flex flex-col">
                                    <div class="flex flex-1">
                                        <div class="w-14">
                                            <img src="{{ asset('assets/client/assets/images/wallet.svg') }}"
                                                alt="" class="w-6 h-6 inline-block">
                                        </div>
                                        <div class="flex">
                                            <span class="text-16 text-black-600 mt-auto">Số dư của bạn</span>
                                            <div class="ml-3">
                                                <div class="cursor-pointer">
                                                    <svg class="w-4 h-4 inline-block svg-vertical"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="currentColor"
                                                            d="M256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28zm7.67-24h-16c-6.627 0-12-5.373-12-12v-.381c0-70.343 77.44-63.619 77.44-107.408 0-20.016-17.761-40.211-57.44-40.211-29.144 0-44.265 9.649-59.211 28.692-3.908 4.98-11.054 5.995-16.248 2.376l-13.134-9.15c-5.625-3.919-6.86-11.771-2.645-17.177C185.658 133.514 210.842 116 255.67 116c52.32 0 97.44 29.751 97.44 80.211 0 67.414-77.44 63.849-77.44 107.408V304c0 6.627-5.373 12-12 12zM256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ml-14 text-black-400 text-14">(0 có sẵn)</div>
                                </div>
                                <div class="text-left col-span-2">
                                    <div class="text-center flex items-center">
                                        <div>
                                            <input type="text" name="point"
                                                class="border border-current rounded-md h-[35px] p-2 w-full bg-neutral-200 text-sm"
                                                disabled="" placeholder="Nhập số tiền" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Payment" class="py-5">
                            <div class="mb-12 px-5">
                                <div class="font-bold text-slate-700 mb-2 text-lg">Phương thức thanh toán</div>
                                <div>
                                    <div class="flex flex-wrap items-center">
                                        <label for="cash"
                                            class="relative flex items-center px-3 py-4 cursor-pointer border rounded-md mt-3 w-full">
                                            <img src="{{ asset('assets/client/assets/images/cash.svg') }}" alt="COD"
                                                class="block w-8 h-8">
                                            <div class="ml-4">
                                                <span class="block text-slate-700 text-[16px]">
                                                    Thanh toán khi nhận hàng
                                                </span>
                                                <span class="block text-slate-700 text-[14px]">Áp dụng cho đơn hàng
                                                    dưới 2tr</span>
                                            </div>
                                            <span class="ml-auto">
                                                <input type="radio" id="cash" name="payment">
                                            </span>
                                        </label>
                                        <label for="airPay"
                                            class="relative flex items-center px-3 py-4 cursor-pointer border rounded-md mt-3 w-full">
                                            <img src="{{ asset('assets/client/assets/images/airPay.svg') }}"
                                                alt="COD" class="block w-7 h-7">
                                            <div class="ml-4">
                                                <span class="block text-slate-700 text-[16px]">
                                                    Thanh toán Online
                                                </span>
                                                <span class="block text-slate-700 text-[14px]">Thanh toán bằng Visa,
                                                    Banking...</span>
                                            </div>
                                            <span class="ml-auto">
                                                <input type="radio" id="airPay" name="payment">
                                            </span>

                                        </label>
                                        <label for="momo"
                                            class="relative flex items-center px-3 py-4 cursor-pointer border rounded-md mt-3 w-full">
                                            <img src="{{ asset('assets/client/assets/images/momo.png') }}" alt="COD"
                                                class="block w-7 h-7">
                                            <div class="ml-4">
                                                <span class="block text-slate-700 text-[16px]">
                                                    Ví momo
                                                </span>
                                                <span class="block text-slate-700 text-[14px]">Số tiền tối thiểu:
                                                    1.000đ</span>
                                            </div>
                                            <span class="ml-auto">
                                                <input type="radio" id="momo" name="payment">
                                            </span>
                                            <div class="absolute -top-2 -left-1.5">
                                                <div
                                                    class="inline-flex items-center gap-1 p-[2px_4px] bg-[#BB0000] text-white font-medium text-xs rounded-r rounded-tl">
                                                    Khuyên dùng
                                                </div>
                                                <div
                                                    class="size-0 border-[2.5px] border-[#BB0000] border-l-transparent border-b-transparent">
                                                </div>
                                                <div
                                                    class="absolute left-0 bottom-0 size-0 border-[2.5px] border-l-transparent border-b-transparent">
                                                </div>
                                            </div>
                                        </label>

                                    </div>
                                </div>
                                <div class="font-bold mt-8 text-slate-700 text-lg">
                                    Chi tiết thanh toán
                                </div>
                                <div class="flex flex-col gap-2 py-4 border-b border-dashed border-gray-300">
                                    <div class="flex text-slate-700">
                                        <div class="text-[14px]">Tổng số tiền:</div>
                                        <div class="ml-auto">537,000 đ</div>
                                    </div>
                                    <div class="flex text-slate-700">
                                        <div class="text-[14px]">Điểm 02:</div>
                                        <div class="ml-auto">-0 đ</div>
                                    </div>
                                    <div class="flex text-slate-700">
                                        <div class="text-[14px]">Số dư:</div>
                                        <div class="ml-auto">-0 đ</div>
                                    </div>
                                </div>
                                <div class="flex pt-6">
                                    <div class="text-[14px] text-slate-700">Tổng thanh toán:</div>
                                    <div class="ml-auto text-lg font-semibold text-[#BB0000]">537,000 đ</div>
                                </div>
                            </div>
                            <div class="border-t">
                                <div class="flex items-center px-5 mb-6 mt-6">
                                    <p class="text-[14px]">
                                        Tôi xác nhận đã kiểm tra đơn hàng và đồng ý với các
                                        <a class="text-blue-800 hover:underline" href="">
                                            điều khoản quy định
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="text-center px-5">
                                <button
                                    class="mb-2 font-bold text-lg relative w-full p-2 bg-[#BB0000] text-white rounded-3xl">
                                    Thanh toán
                                </button>
                            </div>
                        </div>
                        <div class="py-5">
                            <div class="border-t border-black-900">
                                <div class="flex items-center px-8 mb-6 mt-8">
                                    <p class="text-sm">
                                        Tôi xác nhận đã kiểm tra đơn hàng và đồng ý với các
                                        <a class="text-blue-800 hover:underline" href="">điều khoản quy định</a>
                                    </p>
                                </div>
                            </div>
                            <div class="text-center px-5">
                                <button
                                    class="mb-2 font-bold text-lg relative w-full p-2 bg-[#BB0000] text-white rounded-3xl"
                                    disabled="">
                                    Xác nhận
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endsection

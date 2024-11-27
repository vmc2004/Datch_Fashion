@extends('Client.layout.layout')

@section('title', 'Giỏ hàng')
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
                        <a class="hover:underline hover:text-red-700 cursor-pointer" href="/">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
         
            <div class="flex md:mt-16">
                <div class="flex-1 md:mr-8">
                    <div class="bg-white md:px-6 md:py-10 py-4 px-2 rounded-lg">
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
                            <div class="container mx-auto shadow-2xl">
                                @if ($cart && $cart->items->count() > 0)
                                    <div class="bg-white shadow-md rounded-lg p-4">
                                        @foreach ($cart->items as $item)
                                            <div class="flex items-center border-b py-4">
                                                <!-- Cột 1: Ảnh sản phẩm -->
                                                <div class="flex-shrink-0 w-1/5 text-center">
                                                    <img src="{{ asset($item->variant->product->image) }}"
                                                        alt="ảnh sản phẩm {{ $item->variant->product->name }}"
                                                        class="w-50 h-24 object-cover rounded border">
                                                </div>

                                                <!-- Cột 2: Tên sản phẩm và biến thể -->
                                                <div class="flex-1 ml-4">
                                                    <h2 class="text-lg font-semibold">{{ $item->variant->product->name }}
                                                    </h2>
                                                    <p class="text-sm text-gray-500">Sản phẩm:
                                                        {{ $item->variant->size->name }} / {{ $item->variant->color->name }}
                                                    </p>
                                                </div>

                                                <!-- Cột 3: Số lượng -->
                                                <div class="flex items-center border rounded-lg">
                                                    <button onclick="changeQuantity({{ $item->id }}, -1)"
                                                        class="px-2">-</button>
                                                    <input class="w-8 text-center border-l border-r"
                                                        id="quantity-{{ $item->id }}" type="text"
                                                        value="{{ $item->quantity }}" readonly />
                                                    <button onclick="changeQuantity({{ $item->id }}, 1)"
                                                        class="px-2">+</button>
                                                </div>
                                                <!-- Cột 4: Giá -->
                                                <div class="flex-shrink-0 w-1/5 text-center">
                                                    <p class="text-lg font-bold" id="total-price-{{ $item->id }}">
                                                        {{ number_format($item->price_at_purchase * $item->quantity) }} đ
                                                    </p>
                                                </div>

                                                <!-- Cột 5: Nút xóa -->
                                                <div class="flex-shrink-0 w-1/5 text-center">
                                                    <form action="{{ route('cart.removeItem', $item->id) }}" method="POST"
                                                        class="remove-item-form" data-item-id="{{ $item->id }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="text-red-600 hover:text-red-800 focus:outline-none remove-item">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-500">Giỏ hàng của bạn đang trống.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-96 hidden md:block mt-16">
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
                            <p class="text-xs">Được hoàn tiền đầy đủ nếu hàng không như mô tả hoặc không được giao</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg border shadow-2xl">
                        @if ($cart && $cart->items->count() > 0)
                        <div class="p-5 border-b text-lg uppercase text-slate-700">
                            Tóm tắt đơn hàng
                        </div>
                        <div class="p-5 border-b">
                            <div class="flex flex-col gap-3 mb-8 text-sm">
                                <div class="flex">
                                    <div>Tổng tiền hàng:</div>
                                    <div class="ml-auto" id="total-price-cart">
                                        {{ number_format($cart->items->sum('price_at_purchase')) }} đ
                                    </div>
                                </div>
                            </div>
                            <div class="flex font-bold">
                                <div>Tổng cộng:</div>
                                <div class="ml-auto" id="total-cart-price">
                                    {{ number_format($cart->items->sum('price_at_purchase')) }} đ
                                </div>
                            </div>
                        </div>

                        <div class="p-5 flex items-center justify-between">

                            <?php
                            $user_id = 1;
                            ?>
                            <button class="bg-red-600 hover:bg-red-700 text-white h-10 rounded-lg w-full" type="submit"><a
                                    href="/mua-hang/{{ Auth::id() }}">Thanh toán</a></button>

                                <button class="bg-red-600 hover:bg-red-700 text-white h-10 rounded-lg w-full" type="submit"><a
                                    href="/mua-hang/{{Auth::id()}}">Thanh toán</a></button>

                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Thêm sự kiện xóa sản phẩm trong giỏ hàng bằng AJAX
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                const itemId = form.getAttribute('data-item-id');

                // Lấy CSRF token từ thẻ <meta> trong HTML
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Gửi yêu cầu xóa qua AJAX
                fetch(form.action, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Xóa sản phẩm khỏi giỏ hàng trên giao diện
                            form.closest('.flex').remove(); // Xóa phần tử sản phẩm
                            // alert(data.message); // Hiển thị thông báo thành công
                        } else {
                            alert(data.message); // Hiển thị thông báo lỗi
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Đã có lỗi xảy ra.');
                    });
            });
        });

        function changeQuantity(itemId, delta) {
            const quantityInput = document.getElementById('quantity-' + itemId);
            const totalPriceElement = document.getElementById('total-price-' + itemId);
            let currentQuantity = parseInt(quantityInput.value);

            // Tính toán số lượng mới
            const newQuantity = currentQuantity + delta;
            if (newQuantity < 1) return; // Đảm bảo số lượng không nhỏ hơn 1

            // Gửi yêu cầu AJAX
            fetch(`/gio-hang/sua/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token
                    },
                    body: JSON.stringify({
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật giá trị số lượng trong input
                        quantityInput.value = newQuantity;

                        // Cập nhật giá trị tổng của sản phẩm
                        const newTotalPrice = data.new_total_price; // Nhận giá trị mới từ response
                        totalPriceElement.textContent = newTotalPrice.toLocaleString() + ' đ';

                        // Cập nhật tổng tiền hàng và tổng cộng của giỏ hàng
                        const newCartTotal = data.new_cart_total; // Nhận tổng tiền mới từ response
                        document.getElementById('total-price-cart').textContent = newCartTotal.total_price
                            .toLocaleString() + ' đ';
                        document.getElementById('total-cart-price').textContent = newCartTotal.total_price
                            .toLocaleString() + ' đ';
                    } else {
                        alert('Đã có lỗi xảy ra!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

@endsection    
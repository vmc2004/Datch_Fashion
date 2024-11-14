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
<<<<<<< HEAD
                    {{-- <div class="bg-white md:px-6 md:py-10 py-4 px-2 rounded-lg">
                        <h2 class="md:mb-6 mb-2 text-slate-800 font-semibold text-xl">2 Sản phẩm trong giỏ hàng</h2>
=======
                    <div class="bg-white md:px-6 md:py-10 py-4 px-2 rounded-lg">
>>>>>>> c8c5f72dcf0d71d4339d36a52f68478d9c5d0d3e
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
<<<<<<< HEAD

=======
>>>>>>> c8c5f72dcf0d71d4339d36a52f68478d9c5d0d3e
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
<<<<<<< HEAD
                                                    <form action="" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-800 focus:outline-none">
                                                            <i class="fas fa-trash-alt"></i>
                                                            <!-- Biểu tượng xóa từ Font Awesome -->
=======
                                                    <form action="{{ route('cart.removeItem', $item->id) }}" method="POST"
                                                        class="remove-item-form" data-item-id="{{ $item->id }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="text-red-600 hover:text-red-800 focus:outline-none remove-item">
                                                            <i class="fas fa-trash-alt"></i>
>>>>>>> c8c5f72dcf0d71d4339d36a52f68478d9c5d0d3e
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
<<<<<<< HEAD
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
                    </div> --}}
                    <div>
                        <div class="bg-white md:mt-10 mt-4 rounded-lg">
                            <div class="py-6 md:px-6 px-2 border-b flex items-center justify-between">
                                <div class="flex flex-row md:items-center md:justify-between overflow-hidden">
                                    <div class="shopBtn cursor-pointer select-none">
                                        <span class="shopBtnClose">
                                            <svg class="w-4 h-4 inline-block svg-vertical"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-2">Shop Name</span>
                                    </div>
                                    <div class="md:ml-6 ml-2 flex items-center">
                                        <div class="flex" style="display: flex;">
                                            <div aria-label="add rating by typing an integer from 0 to 5 or pressing arrow keys"
                                                class="undefined react-stars" class="overflow-hidden relative"
                                                style="overflow: hidden; position: relative;">
                                                <style>
                                                    span.react-stars-half>* {
                                                        color: #EB6E34;
                                                    }
                                                </style>
                                                <span
                                                    class="relative overflow-hidden cursor-default block float-left text-[#eb6e34] font-[16px]">
                                                    <svg class="w-4 h-6" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path fill="currentColor"
                                                            d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span
                                                    class="relative overflow-hidden cursor-default block float-left text-[#eb6e34] font-[16px]">
                                                    <svg class="w-4 h-6" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path fill="currentColor"
                                                            d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span
                                                    class="relative overflow-hidden cursor-default block float-left text-[#eb6e34] font-[16px]">
                                                    <svg class="w-4 h-6" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path fill="currentColor"
                                                            d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span
                                                    class="relative overflow-hidden cursor-default block float-left text-[#eb6e34] font-[16px]">
                                                    <svg class="w-4 h-6" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path fill="currentColor"
                                                            d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span
                                                    class="relative overflow-hidden cursor-default block float-left text-[#eb6e34] font-[16px]">
                                                    <svg class="w-4 h-6" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path fill="currentColor"
                                                            d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="ml-2 text-blue-800">(1 sản phẩm)</span>
                                </div>
                            </div>
                            <div class="py-4">
                                @foreach ($cart->items as $item)
                                    <div class="flex md:px-6 px-2 py-4 relative cart-item" data-id="{{ $item->id }}">
                                        <label class="md:mr-10 mr-2 flex items-center w-[170px]">
                                            <div class="itemsBtn cursor-pointer select-none">
                                                <span class="itemsBtnClose">
                                                    <svg class="w-4 h-4 inline-block svg-vertical"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <img src="{{ $item->variant->product->image }}"
                                                class="md:ml-8 ml-2 rounded-lg w-[135px] h-[135px]"
                                                alt="{{ $item->variant->product->name }}">
                                        </label>
                                        <div class="flex-1 relative text-sm">
                                            <div class="md:mb-4 mb-2 flex items-center justify-between">
                                                <div class="text-slate-700">
                                                    <a
                                                        href="#">{{ Str::words($item->variant->product->name, 10, ' ...') }}</a>
                                                </div>
                                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST"
                                                    class="delete-form">
                                                    @csrf
                                                    @method('DELETE') <!-- Đây là cách chỉ định phương thức DELETE -->
                                                    <button type="submit" class="itemsBtn cursor-pointer select-none"
                                                        title="Xóa sản phẩm">
                                                        <span class="itemsBtnClose">
                                                            <i class="fas fa-trash-alt text-red-600"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="md:mb-4 mb-2 text-slate-700">
                                                <span>
                                                    <div class="flex">
                                                        <span>Size: {{ $item->variant->size->name }} </span>
                                                    </div>
                                                    Màu: {{ $item->variant->color->name }}
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span class="font-semibold mr-12 text-slate-700 hidden md:block">
                                                    {{ $item->variant->product->shop_name }}
                                                </span>
                                                <span class="font-semibold text-slate-700 mr-4 text-lg">
                                                    {{ number_format($item->price_at_purchase, 0, ',', '.') }} vnđ
                                                </span>

                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <button
                                                        class="w-8 h-8 bg-slate-100 rounded-full flex justify-center items-center mr-4 decrease-quantity"
                                                        data-id="{{ $item->id }}">
                                                        -
                                                    </button>
                                                    <span class="text-black-400 quantity"
                                                        id="quantity-{{ $item->id }}">
                                                        {{ $item->quantity }}
                                                    </span>
                                                    <button
                                                        class="w-8 h-8 bg-slate-100 rounded-full flex justify-center items-center ml-4 increase-quantity"
                                                        data-id="{{ $item->id }}">
                                                        +
                                                    </button>
                                                </div>
                                                <p class="flex items-center mb-0">
                                                    <span class="font-bold text-slate-700 mr-4 text-lg total-price"
                                                        id="total-price-{{ $item->id }}">
                                                        {{ number_format($item->variant->price * $item->quantity, 0, ',', '.') }}
                                                        vnđ
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

=======
>>>>>>> c8c5f72dcf0d71d4339d36a52f68478d9c5d0d3e
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
                        {{-- @if ($cart && $cart->items->count() > 0) --}}
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
                                    href="/mua-hang/1">Thanh toán</a></button>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
<<<<<<< HEAD
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.increase-quantity').click(function() {
                        const itemId = $(this).data('id');
                        const quantityElement = $('#quantity-' + itemId);
                        let quantity = parseInt(quantityElement.text());
                        quantity++;

                        updateQuantity(itemId, quantity);
                    });

                    $('.decrease-quantity').click(function() {
                        const itemId = $(this).data('id');
                        const quantityElement = $('#quantity-' + itemId);
                        let quantity = parseInt(quantityElement.text());
                        if (quantity > 1) {
                            quantity--;
                            updateQuantity(itemId, quantity);
                        }
                    });

                    function updateQuantity(itemId, quantity) {
                        $.ajax({
                            url: '{{ route('cart.update') }}',
                            method: 'POST',
                            data: {
                                cart_item_id: itemId,
                                quantity: quantity,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                $('#quantity-' + itemId).text(response.new_quantity);
                                $('#total-price-' + itemId).text(response.new_total_price);
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });

                $(document).ready(function() {
                    // Xóa sản phẩm khỏi giỏ hàng
                    $('.delete-form').on('submit', function(e) {
                        e.preventDefault(); // Ngăn tải lại trang
                        let form = $(this);
                        let itemId = form.closest('.cart-item').data('id');

                        $.ajax({
                            url: form.attr('action'), // Lấy URL từ form
                            type: 'DELETE',
                            data: form.serialize(),
                            success: function(response) {
                                // Xóa phần tử DOM của sản phẩm
                                $(`.cart-item[data-id="${itemId}"]`).remove();
                                // Cập nhật lại tổng giỏ hàng nếu cần thiết
                                updateCartTotal();
                            },
                            error: function(xhr) {
                                alert('Lỗi khi xóa sản phẩm');
                            }
                        });
                    });
                });
            </script>
=======
        </div>
    </div>
    <script>
        // Thêm sự kiện xóa sản phẩm trong giỏ hàng bằng AJAX
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                const itemId = form.getAttribute('data-item-id');
>>>>>>> c8c5f72dcf0d71d4339d36a52f68478d9c5d0d3e

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
@extends('Client.layout.layout')

@section('title', 'Thanh toán')
@section('content')
<hr>

<div class="max-w-screen-xl mx-auto">
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
        <h1 class="text-center p-5 border shadow-2xl rounded-lg text-2xl font-bold">Thanh toán</h1>
        <div class="max-w-7xl mx-auto p-4">
            <form id="checkoutForm" action="{{ route('post_checkout') }}" method="POST" >
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Left Column -->
                    <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-4">Người nhận</h2>
                        <div class="mb-4">
                            <label class="block text-gray-700">Tên khách hàng</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="name" placeholder="Tên khách hàng" type="text"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Số điện thoại</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="phone" placeholder="Số điện thoại" type="text"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email </label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="email" placeholder="Email của bạn" type="email"/>
                        </div>
                        <hr>

                        <div class="mb-4 custom-cursor-on-hover">
                            <label class="block font-semibold mb-2">Địa chỉ:</label>
                            <div class="flex items-center gap-4">
                                <input type="hidden" name="address_id">
                                <input type="text" name="new-address"  id="new-address" class="border border-gray-300 rounded px-3 py-2 w-full" placeholder="Địa chỉ..." readonly/>
                                <span class="text-blue-500 flex items-center whitespace-nowrap" id="open-modal1">
                                    Chỉnh sửa
                                </span>
                            </div>
                        </div>

                        <h2 class="text-xl font-bold mb-4">Phương thức thanh toán</h2>
                        <div class="mb-4">
                            <div class="p-4 border border-gray-300 rounded mt-1">
                                <div class="flex items-center mb-3">
                                    <input class="mr-2" value="Thanh toán khi nhận hàng" name="payment" type="radio" id="cod"/>
                                    <span>Thanh toán khi nhận hàng</span>
                                    <img alt="Banking logo" class="ml-auto" height="20" src="{{ asset('assets/client/images/cod.png') }}" width="50"/>
                                </div>
                                <div class="flex items-center mb-3">
                                    <input class="mr-2" value="Thanh toán qua VNPay" name="payment" type="radio" id="vnpay"/>
                                    <span>Ví điện tử VNPAY</span>
                                    <img alt="VNPAY logo" class="ml-auto" src="{{ asset('assets/client/images/vnpay.png') }}" width="80"/>
                                </div>
                            </div>
                        </div>
                        <button class="w-full bg-red-600 text-white p-4 rounded-lg mt-4"  type="submit">Thanh toán</button>
                    </div>

                    <!-- Right Column -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-4">Thông tin sản phẩm</h2>
                        @php
                            $subtotal = 0; 
                        @endphp
                        @foreach ($cartItems->items as $item)
                            @php
                                $subtotal += $item['price_at_purchase'] * $item['quantity']; // Cộng dồn giá trị
                            @endphp
                            <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">
                            <input type="hidden" name="variant_id[]" value="{{ $item['variant_id'] }}">
                            <input type="hidden" name="price[]" value="{{ $item['price_at_purchase'] }}">
                            <div class="flex items-center mb-4">
                                <img alt="Ảnh sản phẩm" class="w-16 rounded-lg"  src="{{asset($item->variant->image)}}" />
                                <div class="ml-4">
                                    <p>{{ $item->variant->product->name }} - {{ $item->variant->color->name }}, {{ $item->variant->size->name }}</p>
                                    <p>{{ number_format($item['price_at_purchase']) }} đ</p>
                                    <p>x{{ $item['quantity'] }}</p>
                                </div>
                            </div>
                        @endforeach

                        <div class="mb-4">
                            <label class="block text-gray-700">Mã giảm giá</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Nhập mã giảm giá" type="text"/>
                        </div>
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <span>Tạm tính</span>
                                <span>{{ number_format($subtotal) }} đ</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Vận chuyển</span>
                                <span>0 đ</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex justify-between font-bold">
                                <span>Tổng thanh toán</span>
                                <span>{{ number_format($subtotal ) }} đ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Địa chỉ giao hàng Modal -->
<div id="modal2" class="fixed inset-0 z-50 hidden" style="background: rgba(0, 0, 0, 0.3); overflow-y: auto;">
    <div onclick="event.stopPropagation()" class="mx-auto w-[631px] absolute max-h-screen top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <div class="relative w-full flex flex-col border-0 rounded-lg shadow-lg bg-white mt-[30px] pb-2.5">
            <div class="flex items-center justify-between rounded-t p-[20px]">
                <button class="modal2-close bg-transparent absolute right-0 pr-[12.5px] border-0 text-black float-right text-xl leading-none font-semibold outline-none focus:outline-none">
                    <span class="bg-transparent text-black h-[15px] w-[15px] block outline-none focus:outline-none">×</span>
                </button>
            </div>
            <div class="relative px-[15px] flex-auto">
                <h3 class="text-xl mb-8 font-semibold text-center text-black">Địa chỉ giao hàng</h3>
            </div>
            <div class="pt-[30px] pb-[50px]">
                <form class="bg-white rounded-lg ml-auto max-h-full" id="form_model2">
                    @csrf
                    <div class="py-[40px] px-[30px] border !rounded-[8px] border-dashed border-[#999]">
                        <!-- Chọn Tỉnh -->
                        <div class="mb-[20px] flex items-center">
                            <label class="text-right w-1/4 mr-[30px]">Tỉnh / thành phố</label>
                            <div class="rounded-full h-full relative flex-1">
                                <select id="province" name="province" class="border border-solid border-[#999] w-full h-full p-[6px] !rounded-[4px] bg-white">
                                    <option>Chọn tỉnh</option>
                                    @foreach($province as $address)
                                        <option value="{{ $address->id }}">{{ $address->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Chọn Quận/Huyện -->
                        <div class="mb-[20px] flex items-center">
                            <label class="text-right w-1/4 mr-[30px]">Quận / huyện</label>
                            <div class="rounded-full h-full relative flex-1">
                                <select name="district" id="district" disabled class="border border-solid border-[#999] w-full h-full p-[6px] !rounded-[4px] bg-white">
                                    <option value="">Chọn quận / huyện</option>
                                </select>
                            </div>
                        </div>

                        <!-- Chọn Xã -->
                        <div class="mb-[20px] flex items-center">
                            <label class="text-right w-1/4 mr-[30px]">Xã / phường</label>
                            <div class="rounded-full h-full relative flex-1">
                                <select name="commune" id="commune" disabled class="border border-solid border-[#999] w-full h-full p-[6px] !rounded-[4px] bg-white">
                                    <option value="">Chọn xã / phường</option>
                                </select>
                            </div>
                        </div>

                        <!-- Nhập địa chỉ cụ thể -->
                        <div class="mb-[20px] flex items-center">
                            <label class="text-right w-1/4 mr-[30px]">Địa chỉ</label>
                            <div class="relative flex-1">
                                <textarea name="address" rows="3" class="!rounded-[4px] w-full resize-none border border-solid border-[#999] p-[10px]" placeholder="Nhập địa chỉ"></textarea>
                            </div>
                        </div>
                        
                        <div class="text-center mt-8 lg:mt-[30px]">
                            <button type="button" class="modal2-close !rounded-[4px] border border-solid border-[#999] text-[#999] py-[7px] px-[30px] text-sm">Trở lại</button>
                            <button id="button-save" type="button" class="ml-[30px] !rounded-[4px] border border-solid border-[#999] bg-[#BB0000] text-white py-[7px] px-[30px] text-sm">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('checkoutForm');
        const vnpayRadio = document.getElementById('vnpay');
        const codRadio = document.getElementById('cod');
        const creditCardRadio = document.getElementById('creditCard');

        form.addEventListener('change', function () {
            if (vnpayRadio.checked) {
                // Nếu người dùng chọn VNPay, thay đổi action của form
                form.action = "{{ route('vnpay_payment') }}"; // Đảm bảo route này tồn tại trong web.php
            } else {
                // Nếu không chọn VNPay, sử dụng action mặc định
                form.action = "{{ route('post_checkout') }}";
            }
        });
    });
    // Mở modal khi người dùng nhấn vào "Chỉnh sửa"
    const openModalBtn = document.getElementById('open-modal1');
    const modal = document.getElementById('modal2');
    const closeModalBtn = document.querySelector('.modal2-close');
    const saveButton = document.getElementById('button-save');
    const addressInput = document.getElementById('new-address'); // Input cho địa chỉ trong form thanh toán

    // Khi người dùng nhấn vào "Chỉnh sửa", mở modal
    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Đóng modal khi người dùng nhấn nút đóng
    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Khi người dùng nhấn "Lưu", cập nhật địa chỉ và đóng modal
    saveButton.addEventListener('click', () => {
        const address = document.querySelector('textarea[name="address"]').value;
        if (address) {
            addressInput.value = address; // Cập nhật địa chỉ trong form thanh toán
            modal.classList.add('hidden'); // Đóng modal
        } else {
            alert('Vui lòng nhập địa chỉ giao hàng.');
        }
    });
    $(document).ready(function() {
    // Khi chọn tỉnh, lấy danh sách huyện
    $('#province').change(function() {
        var provinceId = $(this).val();

        if (provinceId) {
            $.ajax({
                url: '/districts/' + provinceId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var districtSelect = $('#district');
                    districtSelect.empty();
                    districtSelect.append('<option value="">Chọn quận / huyện</option>');
                    $.each(data, function(key, district) {
                        districtSelect.append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                    districtSelect.prop('disabled', false); // Kích hoạt select quận/huyện
                }
            });
        } else {
            $('#district').empty().append('<option value="">Chọn quận / huyện</option>').prop('disabled', true);
            $('#commune').empty().append('<option value="">Chọn xã / phường</option>').prop('disabled', true);
        }
    });

    // Khi chọn huyện, lấy danh sách phường
    $('#district').change(function() {
        var districtId = $(this).val();

        if (districtId) {
            $.ajax({
                url: '/communes/' + districtId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var communeSelect = $('#commune');
                    communeSelect.empty();
                    communeSelect.append('<option value="">Chọn xã / phường</option>');
                    $.each(data, function(key, commune) {
                        communeSelect.append('<option value="' + commune.id + '">' + commune.name + '</option>');
                    });
                    communeSelect.prop('disabled', false); // Kích hoạt select xã/phường
                }
            });
        } else {
            $('#commune').empty().append('<option value="">Chọn xã / phường</option>').prop('disabled', true);
        }
    });
});


    

</script>

@endsection

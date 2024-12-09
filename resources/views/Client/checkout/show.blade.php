@extends('Client.layout.layout')

@section('title', 'Thanh toán')
@section('content')
<hr>
<style>
    .suggestions {
    position: absolute;
    background: #1a1d24;
    width: 100%;
    max-height: 300px;
    overflow-y: auto;
   
    box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    z-index: 1000;
    display: none;
    margin-top: 3px;
    border: 1px solid #3f4451;
}

.suggestion-item {
    padding: 12px 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    color: white;
    border-bottom: 1px solid #3f4451;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    background: #292e3a;
}

.suggestion-item:last-child {
    border-bottom: none;
}

.suggestion-item:before {
    content: "😤 ";
    margin-right: 10px;
    font-size: 1.1em;
    transition: transform 0.3s ease;
}

.suggestion-item:hover {
    background: #3a4150;
    color: #ffffff;
    padding-left: 24px;
}

.suggestion-item:hover:before {
    transform: scale(1.2);
}

.suggestion-item:after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: var(--primary);
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.suggestion-item:hover:after {
    transform: scaleY(1);
}

.address-container {
    position: relative;
    margin-bottom: 20px;
}

/* Tùy chỉnh thanh cuộn */
.suggestions::-webkit-scrollbar {
    width: 8px;
}

.suggestions::-webkit-scrollbar-track {
    background: #1a1d24;
    border-radius: 8px;
}

.suggestions::-webkit-scrollbar-thumb {
    background: #3f4451;
    border-radius: 8px;
}

.suggestions::-webkit-scrollbar-thumb:hover {
    background: #4f5565;
}

#phone {
    filter: blur(5px)
}

</style>
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
                            <label class="block text-gray-700">Tên người nhận</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="name" placeholder="Tên khách hàng" type="text" value="{{Auth::user()->fullname}}"  />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Số điện thoại</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="phone" placeholder="Số điện thoại" type="text" value="{{Auth::user()->phone}}"      />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email của bạn</label>
                            <input class="w-full p-2 border border-gray-300 rounded mt-1" name="email" placeholder="Email của bạn" type="email" value="{{Auth::user()->email}}" readonly/>
                        </div>
                        <hr>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-bold">Địa chỉ của bạn</label>
                            <div class="mb-4">
                                <input type="text" id="address" name="address" class="w-full p-2 border border-gray-300 rounded mt-1" required placeholder="Nhập địa chỉ của bạn"
                                autocomplete="off" value="{{Auth::user()->address}}">   
                                <div id="ok" class="ok block "></div>
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
                       
                        @foreach ($cartItems->items as $item)
                           
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
                            <div class="flex justify-between">
                                <span>Tạm tính</span>
                                <span>{{ number_format($total_price) }} đ</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Vận chuyển</span>
                                @if($total_price >= 629000)
                                <span>0 đ</span>
                                @else
                                <span>30.000 đ</span>
                                @endif
                            </div>

                         

                            @if (session('discount'))
                            <div class="flex justify-between">
                                <span>Giảm giá</span>
                                {{ number_format(session('discount')) }} đ
                            </div>
                            @else   
                            <div class="flex justify-between">
                                <span>Giảm giá</span>
                                <span>0 đ</span>
                            </div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <div class="flex justify-between font-bold">
                                <span>Tổng thanh toán</span>
                                @if (session('subtotals'))
                                <span>  {{  number_format(session('subtotals')) }} đ</span>
                                <input type="hidden" name="subtotal" value="{{session('subtotals')}}">
                                @else   
                                <span>{{ number_format($total_price ) }} đ</span>
                                <input type="hidden" name="subtotal" value="{{$total_price}}">
                                @endif
                            </div>
                        </div>
                    </form>
                        <form action="{{route('coupon.apply')}}" method="POST">
                            @csrf
                                <label class="block text-gray-700">Mã giảm giá</label>
                                <input type="hidden" name="subtotal" value="{{$total_price}}">
                                <input type="text" class="border border-gray-500 rounded-md pl-1 w-8/12" id="code" name="code" placeholder="Nhập mã giảm giá">
                                <button type="submit" class="mt-2 ml-2 bg-gray-300 border-gray-500  text-white px-4 py-1 rounded" >Áp dụng</button>
                        </form>
                    
                    </div>
                </div>
            
            
        </div>
    </div>
</div>

<script>
    window.onbeforeunload = function() {
    // Gửi request đến Laravel để xóa session
    fetch('/clear-session', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    });
};

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
   
</script>

<script>
    const apiKey = '0ChWSfCbLYvwL5nNJke0tHln2QewXBUBTcpMnZdK'; 
    const addressInput = document.getElementById('address');
    const suggestionsContainer = document.getElementById('ok');
    const cityInput = document.getElementById('city');
    const districtInput = document.getElementById('district');
    const wardInput = document.getElementById('ward');
    let sessionToken = crypto.randomUUID();

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    const debouncedSearch = debounce((query) => {
        if (query.length < 2) {
            suggestionsContainer.style.display = 'none';
            return;
        }

        // đây là demo, các bạn nên dùng API từ backend để tăng bảo mật, có thể thêm cache và rate limit
        fetch(`https://rsapi.goong.io/Place/AutoComplete?api_key=${apiKey}&input=${encodeURIComponent(query)}&sessiontoken=${sessionToken}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'OK') {
                    suggestionsContainer.innerHTML = '';
                    suggestionsContainer.style.display = 'block';

                    data.predictions.forEach(prediction => {
                        const div = document.createElement('div');
                        div.className = 'suggestion-item';
                        div.textContent = prediction.description;
                        div.addEventListener('click', () => {
                            addressInput.value = prediction.description;
                            suggestionsContainer.style.display = 'none';

                            // Tự động điền các trường địa chỉ từ compound
                            if (prediction.compound) {
                                cityInput.value = prediction.compound.province || '';
                                districtInput.value = prediction.compound.district || '';
                                wardInput.value = prediction.compound.commune || '';
                            }
                        });
                        suggestionsContainer.appendChild(div);
                    });
                }
            })
            .catch(error => console.error('Lỗi:', error));
    }, 300);

    addressInput.addEventListener('input', (e) => debouncedSearch(e.target.value));

    document.addEventListener('click', function (e) {
        if (!suggestionsContainer.contains(e.target) && e.target !== addressInput) {
            suggestionsContainer.style.display = 'none';
        }
    });

   
</script>
@endsection

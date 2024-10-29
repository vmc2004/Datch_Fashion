@extends('Client.layout.layout')

@section('title', 'Chi tiết sản phẩm')


@section('content')
    <hr>
    <div class="max-w-screen-xl mx-auto ">
        <div class="container flex mx-auto flex">
            <div>
                <ul class="flex container mx-auto pt-2 pb-2 text-sm ">
                    <li>
                        <a class="hover:underline cursor-pointer" href="/">
                            Datch Fashion
                        </a>
                    </li>
                    <li>
                        <span class="mx-4">&gt;</span>
                        <a class="hover:underline cursor-pointer" href="">Danh mục</a>
                    </li>
                    <li>
                        <span class="mx-4">&gt;</span>
                        <a class="hover:underline cursor-pointer" href="">Tên sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex">
            <!-- Left Section: Product Images -->
            <div class="w-1/2">
                <div class="relative">
                    <img alt="Men's Pajama Set - Navy Blue Top and Plaid Bottom" class="w-full" height="800"
                        src="https://storage.googleapis.com/a1aa/image/j54k2qhP484TKFkrNxHgwTiQFQUfHJGlclpWwQoeqCf7hZWnA.jpg"
                        width="600" />
                    <button class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md">
                        <i class="fas fa-chevron-left">
                        </i>
                    </button>
                    <button class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md">
                        <i class="fas fa-chevron-right">
                        </i>
                    </button>
                </div>
                <div class="flex mt-4 space-x-2">
                    <img alt="Thumbnail 1" class="w-20 h-20 border" height="100"
                        src="https://storage.googleapis.com/a1aa/image/Hqw3oYq6PHYLClEzBTLgCPZHSiTkWautoX4xCzuKa7JQMz6E.jpg"
                        width="100" />
                    <img alt="Thumbnail 2" class="w-20 h-20 border" height="100"
                        src="https://storage.googleapis.com/a1aa/image/4dxlZxj00RYEDlrkGsQcsuXnQQvi2Z3xOeBwyQyKMIf8wMrTA.jpg"
                        width="100" />
                    <img alt="Thumbnail 3" class="w-20 h-20 border" height="100"
                        src="https://storage.googleapis.com/a1aa/image/OTLPYtklyIoSOdcP38ekcua52AmydmDffsWSubaZAEd8hZWnA.jpg"
                        width="100" />
                    <img alt="Thumbnail 4" class="w-20 h-20 border" height="100"
                        src="https://storage.googleapis.com/a1aa/image/6d1uNCPB5Np4HpKOUAFQklnXen8n4ZM1VLcoPfWLjg5CxMrTA.jpg"
                        width="100" />
                    <img alt="Thumbnail 5" class="w-20 h-20 border" height="100"
                        src="https://storage.googleapis.com/a1aa/image/egxzgfObV1pBqkfGASTE4eGo6YEw22PBmZOZsr4ln5bHEzsOB.jpg"
                        width="100" />
                </div>
            </div>
            <!-- Right Section: Product Details -->
            <div class="w-1/2 pl-8">
                <h1 class="text-2xl font-bold">
                    Bộ mặc nhà nam
                </h1>
                <p class="text-gray-500">
                    Mã sp: 8LS24W001-SB060
                </p>
                <p class="text-2xl font-bold text-red-600 mt-2">
                    599.000 đ
                </p>
                <div class="bg-red-600 text-white text-center py-2 mt-4">
                    <i class="fas fa-shipping-fast">
                    </i>
                    FREESHIP TOÀN BỘ ĐƠN HÀNG Khi chọn mua sản phẩm
                </div>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <!-- Trường ẩn chứa ID của sản phẩm -->
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Chọn Màu Sắc -->
                    <div class="mt-4">
                        <label class="font-bold">Màu sắc:</label>
                        <select name="color_id" class="mt-2 border border-gray-300 rounded p-2">
                            @foreach ($product->ProductVariants->unique('color_id') as $variant)
                                <option value="{{ $variant->color_id }}">{{ $variant->color->color_code }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Chọn Kích Cỡ -->
                    <div class="mt-4">
                        <label class="font-bold">Kích cỡ:</label>
                        <select name="size_id" class="mt-2 border border-gray-300 rounded p-2">
                            @foreach ($product->ProductVariants->unique('size_id') as $variant)
                                <option value="{{ $variant->size_id }}">{{ $variant->size->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Số Lượng -->
                    <div class="mt-4">
                        <label class="font-bold">Số lượng:</label>
                        <input type="number" name="quantity" min="1" value="1"
                            class="mt-2 border border-gray-300 rounded p-2 w-20">
                    </div>

                    <!-- Nút Thêm vào Giỏ Hàng -->
                    <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">
                        Thêm vào Giỏ Hàng
                    </button>
                </form>

                <div class="mt-4">
                    <h2 class="font-bold">
                        Mô tả
                    </h2>
                    <p class="text-gray-700 mt-2">
                        Bộ mặc nhà nam thiết kế vừa vặn một cách hoàn hảo, với chất liệu cotton spandex mềm mại mang lại sự
                        thoải mái, dễ chịu cho người mặc.
                    </p>
                </div>
                <div class="mt-4">
                    <h2 class="font-bold">
                        Chất liệu
                    </h2>
                    <p class="text-gray-700 mt-2">
                        Bộ mặc nhà nam thiết kế vừa vặn một cách hoàn hảo, với chất liệu cotton spandex mềm mại mang lại sự
                        thoải mái, dễ chịu cho người mặc.
                    </p>
                </div>
                <div class="mt-4">
                    <h2 class="font-bold">
                        Hướng dẫn sử dụng
                    </h2>
                    <p class="text-gray-700 mt-2">
                        Giặt máy ở chế độ nhẹ, nhiệt độ thường.
                        Không sử dụng hóa chất tẩy có chứa Clo.
                        Phơi trong bóng mát.
                        Sấy khô ở nhiệt độ thấp.
                        Là ở nhiệt độ thấp 110 độ C.
                        Giặt với sản phẩm cùng màu.
                        Không là lên chi tiết trang trí.
                    </p>
                </div>
            </div>
        </div>

        {{-- Ưu đãi cảm kết  --}}
        <div class="flex justify-between items-center space-x-12 py-8 ">
            <!-- First Item -->
            <div class="flex items-center space-x-4">
                <div class="bg-red-100 p-2 rounded">
                    <i class="fas fa-hand-holding-usd text-red-500"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Thanh toán khi nhận hàng (COD)</p>
                    <p class="text-gray-500">Giao hàng toàn quốc.</p>
                </div>
            </div>
            <div class="border-r border-gray-300 h-12"></div>
            <!-- Second Item -->
            <div class="flex items-center space-x-4">
                <div class="bg-red-100 p-2 rounded">
                    <i class="fas fa-truck text-red-500"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Miễn phí giao hàng</p>
                    <p class="text-gray-500">Với đơn hàng trên 599.000 đ.</p>
                </div>
            </div>
            <div class="border-r border-gray-300 h-12"></div>
            <!-- Third Item -->
            <div class="flex items-center space-x-4">
                <div class="bg-red-100 p-2 rounded">
                    <i class="fas fa-box-open text-red-500"></i>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Đổi hàng miễn phí</p>
                    <p class="text-gray-500">Trong 30 ngày kể từ ngày mua.</p>
                </div>
            </div>
        </div>
        {{-- Gợi ý mua cùng  --}}
        <div class="container mx-auto p-4 pt-10">
            <h2 class="text-2xl font-semibold mb-4">
                Gợi ý mua cùng
            </h2>
            <div class="grid grid-cols-4 gap-4">
                <!-- Product 1 -->
                <div class="text-center">
                    <img alt="Blue shorts" class="w-full" height="400"
                        src="https://storage.googleapis.com/a1aa/image/52NeunZ9h3T3H6B21OSOe9ORccAIfpExFG4R781opB3feoZdC.jpg"
                        width="300" />
                    <div class="flex justify-center mt-2">
                        <div class="w-4 h-4 bg-blue-800 rounded-full border border-gray-300">
                        </div>
                    </div>
                    <p class="mt-2 text-gray-700">
                        Quần mặc nhà nam cạp chun dáng suông
                    </p>
                    <p class="text-lg font-semibold">
                        99.000 đ
                    </p>
                    <p class="text-gray-500 line-through">
                        139.000 đ
                    </p>
                    <p class="text-red-600">
                        -50%
                    </p>
                </div>
                <!-- Product 2 -->
                <div class="text-center">
                    <img alt="Boy wearing a long sleeve raglan shirt" class="w-full" height="400"
                        src="https://storage.googleapis.com/a1aa/image/ZaFeLEDqWBwzS60abY9RjCraDvW7o1BeavZKurUBRdqtHNrTA.jpg"
                        width="300" />
                    <div class="flex justify-center mt-2">
                        <div class="w-4 h-4 bg-gray-300 rounded-full border border-gray-300">
                        </div>
                    </div>
                    <p class="mt-2 text-gray-700">
                        Áo phông dài tay bé trai cotton USA raglan
                    </p>
                    <p class="text-lg font-semibold">
                        249.000 đ
                    </p>
                </div>
                <!-- Product 3 -->
                <div class="text-center">
                    <img alt="Woman wearing a green turtleneck" class="w-full" height="400"
                        src="https://storage.googleapis.com/a1aa/image/oLAZufBFHvxsVC33B3gusDkUoBqQw8OvAJxfPM7ePqHcPaWnA.jpg"
                        width="300" />
                    <div class="flex justify-center mt-2 space-x-2">
                        <div class="w-4 h-4 bg-green-800 rounded-full border border-gray-300">
                        </div>
                        <div class="w-4 h-4 bg-pink-200 rounded-full border border-gray-300">
                        </div>
                        <div class="w-4 h-4 bg-gray-300 rounded-full border border-gray-300">
                        </div>
                        <div class="w-4 h-4 bg-black rounded-full border border-gray-300">
                        </div>
                    </div>
                    <p class="mt-2 text-gray-700">
                        Áo giữ nhiệt nữ cổ cao
                    </p>
                    <p class="text-lg font-semibold">
                        299.000 đ
                    </p>

                </div>
                <!-- Product 4 -->
                <div class="text-center">
                    <img alt="Man wearing a blue long sleeve shirt" class="w-full" height="400"
                        src="https://storage.googleapis.com/a1aa/image/F8YCjfkEoyWUF63emxmEwMDtvSUtOf0ofMjfAlMQtmca9oZdC.jpg"
                        width="300" />
                    <div class="flex justify-center mt-2 space-x-2">
                        <div class="w-4 h-4 bg-blue-800 rounded-full border border-gray-300">
                        </div>
                        <div class="w-4 h-4 bg-black rounded-full border border-gray-300">
                        </div>
                    </div>
                    <p class="mt-2 text-gray-700">
                        Áo body nam cổ tròn
                    </p>
                    <p class="text-lg font-semibold">
                        279.000 đ
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        let selectedColor = null;
        let selectedSize = null;

        function selectColor(colorCode, size, element) {
            selectedColor = colorCode;

            // Làm nổi bật màu đã chọn
            const colorOptions = document.querySelectorAll('.color-option');
            colorOptions.forEach(option => {
                option.classList.remove('border-blue-500'); // Xóa bỏ lớp nổi bật
            });
            element.classList.add('border-blue-500'); // Thêm lớp nổi bật vào màu đã chọn

            // Cập nhật thông tin hiển thị
            document.getElementById('selected-color').innerHTML =
                `Màu sắc: <span class="text-gray-500">${colorCode}</span>`;
            if (size) {
                document.getElementById('selected-size').innerHTML = `Kích cỡ: <span class="text-gray-500">${size}</span>`;
            }
        }

        function selectSize(size, element) {
            selectedSize = size;

            // Làm nổi bật kích cỡ đã chọn
            const sizeOptions = document.querySelectorAll('.size-option');
            sizeOptions.forEach(option => {
                option.classList.remove('border-blue-500'); // Xóa bỏ lớp nổi bật
            });
            element.classList.add('border-blue-500'); // Thêm lớp nổi bật vào kích cỡ đã chọn

            // Cập nhật thông tin hiển thị
            document.getElementById('selected-size').innerHTML = `Kích cỡ: <span class="text-gray-500">${size}</span>`;
        }

        function changeQuantity(delta) {
            const quantityInput = document.getElementById('quantity');
            let currentQuantity = parseInt(quantityInput.value);

            // Cập nhật số lượng
            currentQuantity += delta;

            // Đảm bảo số lượng không nhỏ hơn 1
            if (currentQuantity < 1) {
                currentQuantity = 1;
            }

            quantityInput.value = currentQuantity; // Cập nhật giá trị vào input
        }

        function addToCart() {
            if (!selectedColor || !selectedSize) {
                alert('Vui lòng chọn màu sắc và kích cỡ trước!');
                return;
            }

            axios.post('/gio-hang/add', {
                product_id: PRODUCT_ID, // Thay bằng ID sản phẩm hiện tại
                color_id: selectedColor,
                size_id: selectedSize,
                quantity: 1 // Hoặc số lượng tùy chọn của người dùng
            }).then(response => {
                alert('Đã thêm vào giỏ hàng');
            }).catch(error => {
                console.error(error);
                alert('Có lỗi xảy ra khi thêm vào giỏ hàng');
            });
        }
    </script>
@endsection

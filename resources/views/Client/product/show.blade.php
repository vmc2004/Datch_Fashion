@extends('Client.layout.layout')

@section('title', 'Chi tiết sản phẩm')


@section('content')
    <hr>
    <div class="max-w-screen-xl mx-auto ">
        <div class="container flex mx-auto flex">
            <div class="mb-5">
                <ul class="flex container mx-auto pt-2 pb-2 text-sm ">
                    <li>
                        <a class="hover:underline cursor-pointer" href="/">
                            Datch Fashion
                        </a>
                    </li>
                    <li>
                        <span class="mx-4">&gt;</span>
                        <a class="hover:underline cursor-pointer" href="">{{ $product->category->name }}</a>
                    </li>
                    <li>
                        <span class="mx-4">&gt;</span>
                        <a class="hover:underline cursor-pointer" href="">{{ $product->name }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex  rounded">
            <!-- Left Section: Product Images -->
            <div class="w-6/12 ">
                <div class="flex">
                    <!-- Ảnh lớn hiển thị chính -->
                    <div class="relative image-container w-4/6 h-screen ml-8">
                        <img alt="Ảnh sản phẩm" class="zoom-image w-96 object-cover" src="{{ asset($product->image) }}" />

                        <!-- Nút Trái -->
                        <button
                            class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md left-arrow">
                            <i class="fas fa-chevron-left"></i>
                        </button>

                        <!-- Nút Phải -->
                        <button
                            class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md right-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                    <!-- Ảnh biến thể -->
                    <div class="flex flex-col space-y-2 ml-4">
                        @foreach ($product->ProductVariants as $variant)
                            <img 
                                alt="Ảnh biến thể" 
                                class="w-28 border thumbnail cursor-pointer" 
                                src="{{ asset($variant->image) }}" 
                                data-color-id="{{ $variant->color->id }}" 
                                style="display: {{ $loop->first ? 'block' : 'none' }};" />
                        @endforeach
                    </div>
                    
                </div>

            </div>
            <!-- Right Section: Product Details  2-->
            <div class="w-7/12 mr-4">
                <h1 class="text-2xl font-bold flex">
                    {{ $product->name }}
                    <button class="action action-wishlist action towishlist ml-8 wishlist-button"
                        data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-slug="{{ $product->slug }}"
                        data-image="{{ asset($product->image) }}" {{-- Giả sử bạn lấy giá từ product variant --}}
                        data-price="{{ $product->ProductVariants->first()->price }}"
                        data-color_code="{{ $product->ProductVariants->first()->color->color_code }}">
                        <!-- Lấy mã màu của sản phẩm -->
                        <i class="fa-regular fa-heart fa-xl"></i>
                    </button>
                </h1>
                <p class="text-gray-500">
                    Mã sản phẩm: {{ $product->code }}
                </p>


                <p class="text-2xl font-bold text-red-600 mt-2">
                    {{ number_format($product->ProductVariants->first()?->price ?? 0) }} đ
                </p>
                @if ($product->ProductVariants->first()->price > 599000)
                    <div class="bg-red-600 text-white text-center py-2 mt-4">
                        <i class="fas fa-shipping-fast">
                        </i>
                        FREESHIP TOÀN BỘ ĐƠN HÀNG Khi chọn mua sản phẩm
                    </div>
                @endif
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="selectedColorId" name="color_id" value="">
                    <input type="hidden" id="selectedSizeId" name="size_id" value="">

                    <!-- Màu sắc -->
                    
                    <div class="mt-4">
                        <p class="font-bold">Màu sắc:
                            <span id="selectedColorName" class="text-gray-500">
                                {{ $product->ProductVariants->first()->color->name }}
                            </span>
                        </p>
                        <div class="flex space-x-2 mt-2">
                            @php
                                $uniqueColors = $product->ProductVariants->unique('color_id');
                            @endphp
                            @foreach ($uniqueColors as $variant)
                                <button type="button"
                                    class="color-button w-8 h-8 border border-gray-300 rounded-full outline outline-4 outline-offset-2 outline-white"
                                    style="background-color: {{ $variant->color->color_code }};"
                                    data-color-id="{{ $variant->color->id }}"
                                    data-color-name="{{ $variant->color->name }}" 
                                    onclick="selectColor(this)">
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Kích cỡ -->
                    <div class="mt-4">
                        <p class="font-bold">
                            Kích cỡ:
                        </p>
                        <div class="flex space-x-2 mt-2" id="sizeContainer">
                            <div class="flex space-x-2 mt-2">
                                <!-- Danh sách các size mặc định -->
                                @foreach ($sizes as $size)
                                    @php
                                        $matchingVariant = $product->ProductVariants->firstWhere('size_id', $size->id);
                                    @endphp
                                    <button type="button" name="size"
                                        class="size-option w-10 h-10 border border-gray-300 rounded"
                                        data-size="{{ $size->id }}"
                                        data-color-id="{{ $matchingVariant->color_id ?? '' }}"
                                        onclick="highlightSize(this)">
                                        {{ $size->name }}
                                    </button>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="mt-4 mb-4">
                        <p>
                            Chỉ còn
                            <span id="stockQuantity" class="text-red-500 font-bold">
                                {{ $product->ProductVariants->first()->quantity }}
                            </span>
                            sản phẩm trong kho!
                        </p>
                    </div>


                    <!-- Số lượng -->
                    <p class="font-bold">Số lượng:</p>
                    <div class="flex items-center space-x-4 mt-2">
                        <div class="flex items-center border rounded-lg px-1 py-1">
                            <button type="button" class="text-gray-500" onclick="decrement()">−</button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1"
                                class="mx-2 w-10 text-center appearance-none">
                            <button type="button" class="text-gray-500" onclick="increment()">+</button>
                        </div>
                    </div>

                    <!-- Nút hành động -->
                    <div class="mt-4 flex space-x-4">
                        <button class="bg-red-600 text-white rounded-lg px-4 py-2" type="submit">Thêm vào giỏ
                            hàng</button>
                    </div>
                </form>



                <div class="mt-4" id="descriptionSection">
                    <h2 class="font-bold text-gray-500 cursor-pointer flex items-center justify-between" onclick="toggleContent(this)">
                        <span>Mô tả</span>
                        <span class="ml-2 text-2xl	">+</span>
                    </h2>
                    <div class="text-gray-700 mt-2 hidden">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                
                <div class="mt-4" id="materialSection">
                    <h2 class="font-bold text-gray-500 cursor-pointer flex items-center justify-between" onclick="toggleContent(this)">
                        <span>Chất liệu</span>
                        <span class="ml-2 text-2xl	">+</span>
                    </h2>
                    <div class="text-gray-700 mt-2 hidden">
                        <p>{{ $product->material }}</p>
                    </div>
                </div>
                
                <div class="mt-4" id="usageGuideSection">
                    <h2 class="font-bold text-gray-500 cursor-pointer flex items-center justify-between" onclick="toggleContent(this)">
                        <span>Hướng dẫn sử dụng</span>
                        <span class="ml-2 text-2xl	">+</span>
                    </h2>
                    <div class="text-gray-700 mt-2 hidden">
                        <p>Giặt máy ở chế độ nhẹ, nhiệt độ thường.<br>
                        Không sử dụng hóa chất tẩy có chứa Clo.<br>
                        Phơi trong bóng mát.<br>
                        Sấy khô ở nhiệt độ thấp.<br>
                        Là ở nhiệt độ thấp 110 độ C.<br>
                        Giặt với sản phẩm cùng màu.<br>
                        Không là lên chi tiết trang trí.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto p-4 pt-10">
            <div id="toast" class="toast">Bình luận của bạn đã được gửi thành công!</div>
            <h2 class="text-2xl font-semibold mb-4 t">
                Bình luận sản phẩm
            </h2>

            <p class="mt-2"><span class="font-bold">Đánh giá trung bình:</span> {{ round($avgRating, 1) }}/5 <i
                    class="fa-solid fa-star text-warning"></i></p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach ($comments as $comment)
                    @if ($comment->rating != '' && $comment->status == 'approved')
                        <div class="">
                            <p><span class="font-bold">Đăng bởi:</span> {{ $comment->user->fullname }} vào ngày
                                {{ $comment->created_at->format('d/m/Y') }}</p>
                            <p><span class="font-bold">Nội dung:</span> {{ $comment->content }}</p>
                            <p><span class="font-bold">Đánh giá:</span> {{ $comment->rating }} sao</p>
                        </div>
                    @elseif ($comment->rating == '' && $comment->status == 'approved')
                        <div class="">
                            <p><span class="font-bold">Đăng bởi:</span> {{ $comment->user->fullname }} vào ngày
                                {{ $comment->created_at->format('d/m/Y') }}</p>
                            <p><span class="font-bold">Nội dung:</span> {{ $comment->content }}</p>
                        </div>
                    @endif
                @endforeach
                {{ $comments->links() }}
            </div>
            <hr class="mb-3">

            @if (Auth::check())
                <form action="{{ route('comments.sendComment', $product->id) }}" method="POST"
                    class="comment-form w-100">
                    @csrf
                    {{-- <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1">&#9733;</label>
                </div> --}}
                    <textarea name="content" placeholder="Viết bình luận của bạn..." required></textarea>
                    <button type="submit" class="submit-button">Gửi bình luận</button>
                </form>
            @else
                <div class=""></div>
            @endif
        </div>



        {{-- gợi ý mua cùng --}}
        <div class="container mx-auto p-4 pt-10">
            <h2 class="text-2xl font-semibold mb-4">
                Gợi ý mua cùng
            </h2>
            <div class="grid grid-cols-4 gap-4">
                <!-- Product 1 -->
                @foreach ($related_products as $hihi)
                    <div class="text-center">
                        <a href="/product/{{ $hihi->slug }}">
                            <img alt="Ảnh sản phẩm gợi ý" class="w-full" height="400" src="{{ asset($hihi->image) }}"
                                width="300" />
                        </a>
                        <div class="flex justify-center mt-2">
                            @foreach ($hihi->ProductVariants->unique('color_id') as $variant)
                                <div class="w-4 mr-1 h-4 rounded-full border border-gray-300"
                                    style="background-color: {{ $variant->color->color_code }}">
                                </div>
                            @endforeach

                        </div>
                        <p class="mt-2 text-gray-700">
                            {{ $hihi->name }}
                        </p>
                        @if ($hihi->ProductVariants->first()?->sale_price != 0)
                            <p class="text-lg font-semibold">
                                {{ number_format($hihi->ProductVariants->first()?->sale_price ?? 0) }} đ
                            </p>
                            <p class="text-gray-500 line-through">
                                {{ number_format($hihi->ProductVariants->first()?->price ?? 0) }} đ
                            </p>
                        @else
                            <p class="text-gray-500 ">
                                {{ number_format($hihi->ProductVariants->first()?->price ?? 0) }} đ
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

    @endsection

    @section('javascript')
        <script>
            const imageContainer = document.querySelector('.image-container');
            const zoomImage = document.querySelector('.zoom-image');
            const productVariants = @json($product->ProductVariants);

            imageContainer.addEventListener('mousemove', (e) => {
                const rect = imageContainer.getBoundingClientRect();
                const x = e.clientX - rect.left; // Vị trí X tương đối trong container
                const y = e.clientY - rect.top; // Vị trí Y tương đối trong container

                const moveX = (x / rect.width) * 100;
                const moveY = (y / rect.height) * 100;

                zoomImage.style.transformOrigin = `${moveX}% ${moveY}%`;
            });

            imageContainer.addEventListener('mouseleave', () => {
                zoomImage.style.transformOrigin = "center center"; // Đưa ảnh về trung tâm khi rời chuột
            });

            function selectColor(button) {
            // Lấy color_id và color name từ thuộc tính của button
            let selectedColorId = button.getAttribute('data-color-id');
            let selectedColorName = button.getAttribute('data-color-name');

            // Gán giá trị vào trường ẩn để submit form
            document.getElementById('selectedColorId').value = selectedColorId;

            // Hiển thị tên màu được chọn
            document.getElementById('selectedColorName').textContent = selectedColorName;

            // Làm nổi bật nút màu được chọn
            document.querySelectorAll('.color-button').forEach(element => {
                element.classList.remove('border-4', 'border-black');
            });
            button.classList.add('border-4', 'border-black');

            // Reset kích cỡ và cập nhật trạng thái các size phù hợp
            resetSizes();
            updateSizeOptions(selectedColorId);

            // Reset giá trị của kích cỡ
            document.getElementById('selectedSizeId').value = '';
            document.getElementById('quantity').value = 1;

            // Hiển thị các ảnh tương ứng với màu đã chọn
            document.querySelectorAll('.thumbnail').forEach(image => {
                const imageColorId = image.getAttribute('data-color-id');
                if (imageColorId == selectedColorId) {
                    image.style.display = 'block';
                } else {
                    image.style.display = 'none';
                }
            });
        }


            function highlightSize(selectedButton) {
                // Nếu kích cỡ bị vô hiệu hóa, không cho phép chọn
                if (selectedButton.disabled) {
                    return;
                }

                // Xóa các viền trước đó
                document.querySelectorAll('.size-option').forEach(element => {
                    element.classList.remove('border-4', 'border-blue-500');
                });

                // Làm nổi bật nút kích cỡ được chọn
                selectedButton.classList.add('border-4', 'border-blue-500');

                // Lấy size_id từ thuộc tính data
                const sizeId = selectedButton.getAttribute('data-size');

                // Cập nhật giá trị của input ẩn
                document.getElementById('selectedSizeId').value = sizeId;

                // Cập nhật số lượng tồn kho dựa trên biến thể được chọn
                updateStockQuantity();
                document.getElementById('quantity').value = 1;
            }

            function increment() {
                let quantityInput = document.getElementById('quantity');
                let currentValue = parseInt(quantityInput.value);

                // Lấy số lượng tồn kho từ biến thể đã chọn
                const stockQuantity = getSelectedVariantStock();

                if (currentValue < stockQuantity) {
                    quantityInput.value = currentValue + 1;
                } else {
                    toastr.warning("Sản phẩm vượt quá số lượng tồn kho.", "Thông báo", {
                        closeButton: true,
                        progressBar: true
                    });
                }
            }

            function decrement() {
                let quantityInput = document.getElementById('quantity');
                let currentValue = parseInt(quantityInput.value);

                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            }

            function resetSizes() {
                // Reset tất cả các size (bỏ làm mờ và cho phép chọn)
                document.querySelectorAll('.size-option').forEach(element => {
                    element.classList.remove('opacity-50', 'cursor-not-allowed', 'border-4', 'border-blue-500');
                    element.disabled = false;
                });
            }

            function updateSizeOptions(selectedColorId) {
                // Làm mờ và vô hiệu hóa các size không thuộc màu được chọn
                document.querySelectorAll('.size-option').forEach(element => {
                    const sizeId = element.getAttribute('data-size');
                    const sizeColorMatch = productVariants.some(variant =>
                        variant.color_id == selectedColorId && variant.size_id == sizeId
                    );

                    if (!sizeColorMatch) {
                        element.classList.add('opacity-50', 'cursor-not-allowed');
                        element.disabled = true;
                    }
                });
            }

            function updateStockQuantity() {
                const stockQuantity = getSelectedVariantStock();
                document.getElementById('stockQuantity').textContent = stockQuantity || 0;
            }

            function getSelectedVariantStock() {
                const selectedColorId = document.getElementById('selectedColorId').value;
                const selectedSizeId = document.getElementById('selectedSizeId').value;

                if (!selectedColorId || !selectedSizeId) {
                    return 0;
                }

                const selectedVariant = productVariants.find(variant =>
                    variant.color_id == selectedColorId && variant.size_id == selectedSizeId
                );

                return selectedVariant ? selectedVariant.quantity : 0;
            }

            console.log("Script loaded successfully.");





            async function handleSubmit(event) {
                event.preventDefault();

                let form = event.target;
                let formData = new FormData(form);

                // Log tất cả các trường và giá trị của chúng
                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }

                try {
                    let response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    if (response.ok) {
                        showToast1();
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    } else {
                        console.error('Lỗi khi thêm sản phẩm vào giỏ');
                        let errorData = await response.json();
                        console.error('Chi tiết lỗi:', errorData);
                    }
                } catch (error) {
                    console.error('Đã xảy ra lỗi:', error);
                }
            }

            function showToast1() {
                const toast1 = document.getElementById('toast1');
                toast1.classList.add('show');

                setTimeout(() => {
                    toast1.classList.remove('show');
                }, 3000);
            }
            document.addEventListener("DOMContentLoaded", () => {
                const mainImage = document.querySelector(".zoom-image");
                const thumbnails = document.querySelectorAll(".thumbnail");
                let currentIndex = 0; // Chỉ số ảnh to hiện tại

                // Hàm cập nhật ảnh chính và ảnh con
                function updateImages(newIndex) {
                    // Hoán đổi ảnh to và ảnh con tại vị trí mới
                    const tempSrc = mainImage.src;
                    mainImage.src = thumbnails[newIndex].src;
                    thumbnails[newIndex].src = tempSrc;

                    // Cập nhật chỉ số ảnh to hiện tại
                    currentIndex = newIndex;
                }

                // Sự kiện khi nhấn vào ảnh con
                thumbnails.forEach((thumbnail, index) => {
                    thumbnail.addEventListener("click", () => {
                        updateImages(index);
                    });
                });

                // Sự kiện khi nhấn nút trái
                document.querySelector(".left-arrow").addEventListener("click", () => {
                    const newIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
                    updateImages(newIndex);
                });

                // Sự kiện khi nhấn nút phải
                document.querySelector(".right-arrow").addEventListener("click", () => {
                    const newIndex = (currentIndex + 1) % thumbnails.length;
                    updateImages(newIndex);
                });
            });

            // Lấy danh sách yêu thích từ localStorage
            function getWishlist() {
                return JSON.parse(localStorage.getItem('wishlist')) || [];
            }

            // Lưu danh sách yêu thích vào localStorage
            function saveWishlist(wishlist) {
                localStorage.setItem('wishlist', JSON.stringify(wishlist));
            }

            // Kiểm tra xem sản phẩm có trong danh sách yêu thích không
            function isInWishlist(productId) {
                return getWishlist().some(product => product.id === productId);
            }

            // Thêm hoặc xóa sản phẩm khỏi danh sách yêu thích
            function toggleWishlist(product) {
                let wishlist = getWishlist();
                const index = wishlist.findIndex(item => item.id === product.id);

                if (index !== -1) {
                    // Nếu sản phẩm đã có trong danh sách yêu thích, xóa nó
                    wishlist.splice(index, 1);
                    toastr.info('Đã xóa khỏi danh sách yêu thích!');
                } else {
                    // Nếu sản phẩm chưa có trong danh sách yêu thích, thêm nó
                    wishlist.push(product);
                    toastr.success('Đã thêm vào danh sách yêu thích!');
                }

                saveWishlist(wishlist);
            }

            // Cập nhật biểu tượng trái tim
            function updateWishlistIcon(button, productId) {
                const icon = button.querySelector('i');
                if (isInWishlist(productId)) {
                    icon.classList.remove('fa-regular');
                    icon.classList.add('fa-solid', 'text-red-500');
                } else {
                    icon.classList.remove('fa-solid', 'text-red-500');
                    icon.classList.add('fa-regular');
                }
            }

            // Gắn sự kiện cho các nút yêu thích
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.wishlist-button').forEach(button => {
                    const product = {
                        id: parseInt(button.dataset.id),
                        name: button.dataset.name, // Giả sử bạn lưu tên sản phẩm vào data-name
                        slug: button.dataset.slug, // Giả sử bạn lưu slug sản phẩm vào data-slug
                        image: button.dataset.image, // Giả sử bạn lưu image sản phẩm vào data-image
                        price: parseFloat(button.dataset
                            .price), // Giả sử bạn lưu price sản phẩm vào data-price
                        color_code: button.dataset
                            .color_code // Giả sử bạn lưu color_code sản phẩm vào data-color_code
                    };

                    // Cập nhật trạng thái biểu tượng khi tải trang
                    updateWishlistIcon(button, product.id);

                    // Xử lý sự kiện click
                    button.addEventListener('click', function() {
                        toggleWishlist(product);
                        updateWishlistIcon(button, product.id);
                    });
                });
            });
            function toggleContent(header) {
                const content = header.nextElementSibling;
                const toggleIcon = header.querySelector('span.ml-2');
                content.classList.toggle('hidden');
                if (content.classList.contains('hidden')) {
                    toggleIcon.textContent = '+';
                } else {
                    toggleIcon.textContent = '-'; 
                }
            }
        </script>
        <style>
            .image-container {
                position: relative;
                overflow: hidden;

                height: 500px;
                cursor: url('https://example.com/search-icon.png'), auto;
                /* Thay đổi biểu tượng trỏ chuột */
            }


            .zoom-image {
                width: 100%;
                height: 100%;
                transition: transform 0.3s ease;
                transform-origin: center;
                position: absolute;
                left: 0;
                top: 0;
            }

            .image-container:hover .zoom-image {
                transform: scale(1.5);
                /* Phóng to ảnh khi hover */
            }

            .rounded {
                padding: 0;
            }

            .wishlist-button i {
                transition: color 0.3s ease, transform 0.3s ease;
            }

            .wishlist-button i.fa-solid {
                color: #ef4444;
                /* Màu đỏ khi yêu thích */
            }

            .wishlist-button:hover i {
                transform: scale(1.2);
                /* Hiệu ứng phóng to khi hover */
            }

            .size-option.disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }
        </style>
    @endsection

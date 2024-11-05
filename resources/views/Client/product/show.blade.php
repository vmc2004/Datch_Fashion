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
                <a class="hover:underline cursor-pointer" href="">{{$product->category->name}}</a>
                </li>
                <li>
                    <span class="mx-4">&gt;</span>
                    <a class="hover:underline cursor-pointer" href="">{{$product->name}}</a>
                    </li>
            </ul>
         </div>
   </div>

<div class="flex  shadow p-4 rounded">
    <!-- Left Section: Product Images -->
                    <div class="w-1/2">
                        <div class="relative">
                         <img alt="Ảnh sản phẩm" class="w-full border" height="800" src="{{asset('/storage/'. $product->image)}}" width="600"/>
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
                           @php
                           // Loại bỏ các biến thể có màu trùng lặp bằng cách chỉ lấy các biến thể có id màu sắc duy nhất
                           $uniqueVariants = $product->ProductVariants->unique('color_id');
                       @endphp
                       @foreach ($uniqueVariants as $variant)
                           <img alt="Ảnh biến thể" class="w-20 h-20 border" src="{{ asset('/storage/' . $variant->image) }}" width="100" height="100"/>
                       @endforeach
                        </div>
                       </div>
                       <!-- Right Section: Product Details -->
                       <div class="w-1/2 pl-8">
                        
                       
                        <h1 class="text-2xl font-bold flex">
                         {{$product->name}} 
                         <button class="action action-wishlist action towishlist action towishlist ml-8	">
                            <i class="fa-regular fa-heart fa-xl"></i>
                        </button>
                        </h1>
                        <p class="text-gray-500">
                         Mã sản phẩm: {{$product->code}}
                        </p>
                    
                        
                        <p class="text-2xl font-bold text-red-600 mt-2">
                           {{ number_format($product->ProductVariants->first()?->price ?? 0) }} đ
                        </p>
                        @if($product->ProductVariants->first()->price > 599000)
                        <div class="bg-red-600 text-white text-center py-2 mt-4">
                           <i class="fas fa-shipping-fast">
                           </i>
                           FREESHIP TOÀN BỘ ĐƠN HÀNG Khi chọn mua sản phẩm
                          </div>
                        @endif
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <!-- Trường ẩn chứa ID của sản phẩm -->
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mt-4">
                           <p class="font-bold">
                               Màu sắc:
                               <span id="selectedColorName" class="text-gray-500">
                                   {{$product->ProductVariants->first()->color->name}}
                               </span>
                           </p>
                           
                           <div class="flex space-x-2 mt-2">
                               @php
                               // Loại bỏ các màu trùng lặp bằng cách chỉ lấy các biến thể có id màu sắc duy nhất
                               $uniqueColors = $product->ProductVariants->unique('color_id');
                           @endphp
                           
                           @foreach ($uniqueColors as $variant)
                               <label class="cursor-pointer">
                                   <input type="radio" name="color" value="{{ $variant->color->id }}" class="hidden color-radio" data-color-name="{{ $variant->color->name }}" onchange="highlightColor(this)">
                                   <div class="color-option w-8 h-8 border border-gray-300 rounded-full" 
                                        style="background-color: {{ $variant->color->color_code }}">
                                   </div>
                               </label>
                           @endforeach
                           
                           </div>
                        </div>
                        <div class="mt-4">
                         <p class="font-bold">
                          Kích cỡ:
                         </p>
                         <div class="flex space-x-2 mt-2">
                           @foreach ($product->ProductVariants as $variant)
                           <input type="button" name="size" 
                                  class="size-option w-10 h-10 border border-gray-300 rounded" 
                                  value="{{ $variant->size->name }}" 
                                  onclick="highlightSize(this)">
                           @endforeach
                         </div>
                        </div>
                        <p class="font-bold">
                           Số lượng:
                          </p>
                          <div class="flex items-center space-x-4">
                           <div class="flex items-center border rounded-lg px-1 py-1">
                               <button class="text-gray-500" onclick="decrement()">−</button>
                               <input type="number" id="quantity" value="1" min="0" class="mx-2 w-10 text-center appearance-none   ">
                               <button class="text-gray-500" onclick="increment()">+</button>
                           </div>
                       </div>
                       
                       
                        <div class="mt-4 flex space-x-4 ">
                           <button class="border border-red-500 rounded-lg px-4 py-2 text-black" type="submit">Thêm vào giỏ hàng</button>
                         <button class="bg-red-600 text-white py-2 px-4 rounded">
                          Mua ngay
                         </button>
                        </div>
                </form>
     
     <div class="mt-4">
      <h2 class="font-bold">
       Mô tả
      </h2>
      <p class="text-gray-700 mt-2">
        {{$product->description}}
    </p>
     </div>
     <div class="mt-4">
        <h2 class="font-bold">
         Chất liệu
        </h2>
        <p class="text-gray-700 mt-2">
        {{$product->material}}
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

   <div class="container mx-auto p-4 pt-10">
    <div id="toast" class="toast">Bình luận của bạn đã được gửi thành công!</div>
    <h2 class="text-2xl font-semibold mb-4 t">
        Bình luận sản phẩm
    </h2>

    <p class="mt-2"><span class="font-bold">Đánh giá trung bình:</span> {{round($avgRating,1)}}/5 <i class="fa-solid fa-star text-warning"></i></p>

        <div class="row">
            @foreach ($comments as $comment)
            @if ($comment->status=='approved')
            <div class="comment my-2 col-sm-4 col-md-4">
                <p><span class="font-bold">Đăng bởi:</span> {{ $comment->user->fullname }} vào ngày {{ $comment->created_at->format('d/m/Y') }}</p>
                <p><span class="font-bold">Nội dung:</span> {{ $comment->content }}</p>
                <p><span class="font-bold">Đánh giá:</span> {{ $comment->rating }} sao</p> 
            </div>
            @else
                <div></div>
            @endif
        @endforeach
        {{$comments->links()}}
        </div>
        <hr class="mb-3">

    @if (Auth::check())
    <form action="{{route('comments.sendComment',$product->id)}}" method="POST" class="comment-form w-100">
        @csrf
        <div class="star-rating">
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
        </div>

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
                    <img alt="Ảnh sản phẩm gợi ý" class="w-full" height="400"
                        src="{{ asset('/storage/' . $hihi->image) }}" width="300" />
                    <div class="flex justify-center mt-2">
                        <div class="w-4 h-4 bg-blue-800 rounded-full border border-gray-300">
                        </div>
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

                    <p class="text-red-600">
                        -50%
                    </p>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        // Hiệu ứng chọn cho màu 
        function highlightColor(selectedInput) {
            const colorName = selectedInput.getAttribute('data-color-name');
            document.getElementById('selectedColorName').textContent = colorName;
            // Loại bỏ viền từ tất cả các tùy chọn màu
            document.querySelectorAll('.color-option').forEach(element => {
                element.classList.remove('border-4', 'border-gray-500', 'p-2'); // bỏ border khi không được chọn
            });

            // Thêm viền cho tùy chọn màu đã chọn
            selectedInput.nextElementSibling.classList.add('border-4', 'border-gray-500', 'p-2');
        }
        // Hiệu ứng chọn cho size 
        function highlightSize(selectedButton) {
            // Loại bỏ viền nổi bật từ tất cả các nút kích thước
            document.querySelectorAll('.size-option').forEach(element => {
                element.classList.remove('border-4', 'border-blue-500'); // loại bỏ border khi không được chọn
            });

            // Thêm viền nổi bật cho nút kích thước đã chọn
            selectedButton.classList.add('border-4', 'border-blue-500');
        }

        function increment() {
            // Lấy giá trị hiện tại của ô nhập
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);

            // Tăng giá trị lên 1
            quantityInput.value = currentValue + 1;
        }

        function decrement() {
            // Lấy giá trị hiện tại của ô nhập
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);

            // Kiểm tra nếu giá trị lớn hơn 0 thì mới giảm
            if (currentValue > 0) {
                quantityInput.value = currentValue - 1;
            }
        }

        function handleSubmit(event) {
        event.preventDefault(); // Ngăn chặn form gửi bình luận theo cách mặc định

        // Gửi bình luận bằng AJAX hoặc xử lý logic tại đây, nếu cần

        // Hiển thị thông báo thành công
        showToast();
    }

    function showToast() {
        const toast = document.getElementById('toast');
        toast.classList.add('show');

        // Tự động ẩn thông báo sau 3 giây
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }
</script>
@endsection


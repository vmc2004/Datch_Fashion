@extends('Client.layout.layout')

@section('title', "Đánh giá")


@section('content')
<div class="max-w-screen-xl mx-auto ">

    <div class="mt-12 md:grid grid-cols-5 gap-8">
        <!-- Sidebar -->
        @include('Client.layout.profile_sidebar')
        <div id="toast" class="fixed top-0 right-0 m-4 p-4 bg-green-500 text-white rounded-lg shadow-lg hidden">
            {{ session('success') }}
        </div>
        
        <div id="error-toast" class="fixed top-0 right-0 m-4 p-4 bg-red-500 text-white rounded-lg shadow-lg hidden">
            {{ session('error') }}
        </div>
        
        <div class="col-span-4">
            <div>
                <h3
                    class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                    <strong>Đánh giá</strong>
                </h3>
     
                    {{-- <div class="flex items-center ml-auto text-sm">
                        <label class="mr-2">Sắp xếp:</label>
                        <form>
                            <div class="inline-block w-[80px] md:w-48">
                                <div class="h-full">
                                    <select
                                        class="md:w-full md:h-full w-16 rounded-full border border-solid border-current py-1 px-2.5">
                                        <option value="-createdAt">Được tạo gần đây</option>
                                        <option value="createdAt">Cũ nhất được tạo trước</option>
                                        <option value="updatedAt">Cập nhật gần đây</option>
                                        <option value="-updatedAt">Cũ nhất cập nhật trước</option>
                                        <option value="totalPrice">Giá cao tới thấp</option>
                                        <option value="-totalPrice">Giá thấp tới cao</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div> --}}

            <div>
                <div class="p-3 text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border border-gray-300 text-center">Mã đơn Hàng</th>
                                <th class="px-4 py-2 border border-gray-300 text-center">Tên Hàng</th>
                                <th class="px-4 py-2 border border-gray-300 text-center">Ảnh sản phẩm</th>
                                <th class="px-4 py-2 border border-gray-300 text-center">Màu</th>
                                <th class="px-4 py-2 border border-gray-300 text-center">Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border border-gray-300 text-center" style="max-width:130px;">{{$variant->product->code}}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center" style="max-width:150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $variant->product->name }}
                                </td>
                                <td class="px-4 py-2 border border-gray-300 text-center">
                                    <img src="{{asset($variant->image)}}" alt="" width="100">
                                </td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{$variant->color->name }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{$variant->size->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="border border-gray-300 rounded-lg shadow-lg">
                    <form action="{{ route('comments.sendComment', $variant->product->id) }}" method="POST" class="comment-form w-100 my-3">
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
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="product_id" value="{{$variant->product->id}}">
                        <textarea name="content" placeholder="Viết bình luận của bạn..." required></textarea>
                        <button type="submit" class="submit-button">Đánh giá</button>
                    </form>
                </div>
            </div>
            <div class="flex space-x-4 mt-3">
                <a href="/account/orders">
                    <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Quay lại
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    @if(session('success'))
        const toast = document.getElementById('toast');
        toast.classList.remove('hidden');
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 3000); // 3s
    @endif

    @if(session('error'))
        const errorToast = document.getElementById('error-toast');
        errorToast.classList.remove('hidden');
        setTimeout(() => {
            errorToast.classList.add('hidden');
        }, 3000); // 3s
    @endif
</script>





@endsection
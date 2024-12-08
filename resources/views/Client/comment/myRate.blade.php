@extends('Client.layout.layout')

@section('title', "Đánh giá của tôi")


@section('content')
<div class="max-w-screen-xl mx-auto ">

    <div class="mt-12 md:grid grid-cols-5 gap-8">
        <!-- Sidebar -->
        @include('Client.layout.profile_sidebar')

        <div class="col-span-4">
            <div>
                <h3
                    class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                    <strong>Đánh giá của tôi</strong>
                </h3>
                @if (session()->has('message'))
                    <div class="alert alert-success text-white slide-in" id="success-message">
                        {{ session()->get('message') }}
                    </div>
                @endif
     
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
                <div class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 text-left">Tên sản phẩm</th>
                                <th class="py-2 px-4 text-left">Hình ảnh</th>
                                <th class="py-2 px-4 text-left">Nội dung bình luận</th>
                                <th class="py-2 px-4 text-left">Đánh giá</th>
                                <th class="py-2 px-4 text-left">Ngày đăng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listRate as $rate)
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4">{{$rate->product->name}}</td>
                                <td class="py-2 px-4"><img src="{{asset($rate->product->image)}}" width="100px" alt=""></td>
                                <td class="py-2 px-4">{{$rate->content}}</td>
                                <td class="py-2 px-4">{{$rate->rating}}<i class="fa-solid fa-star text-warning"></i></td>
                                <td class="py-2 px-4">{{$rate->created_at->format('d/m/Y')}}</td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$listRate->links()}}
        </div>
    </div>
</div>

<script>
    const message = document.getElementById('success-message');

    // Hiển thị thông báo với hiệu ứng cuộn từ từ từ trái qua phải
    setTimeout(function() {
        message.classList.add('show');
    }, 100); // Thêm một chút trễ để hiệu ứng diễn ra mượt mà

    // Ẩn thông báo sau 2 giây với hiệu ứng cuộn từ phải qua trái
    setTimeout(function() {
        message.classList.remove('show');
        message.classList.add('hide', 'slide-out');

        // Sau khi hiệu ứng kết thúc, hoàn toàn ẩn thông báo
        setTimeout(function() {
            message.style.display = 'none';
        }, 500); // Độ trễ của hiệu ứng cuộn 0.5 giây
    }, 2000); // Thời gian hiển thị thông báo 2 giây
</script>
@endsection
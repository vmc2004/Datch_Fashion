@extends('Client.layout.layout')

@section('title', "Đơn hàng của tôi")


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
                    <strong>Chi tiết đơn mua</strong>
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
                                <th class="px-4 py-2 border border-gray-300 text-center">Đơn Giá</th>
                                <th class="px-4 py-2 border border-gray-300 text-center">Số Lượng</th>
                                <th class="px-4 py-2 border border-gray-300 text-center">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->OrderDetails as $detail)
                            @if ($order->status == 'Đã giao hàng')
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border border-gray-300 text-center">{{$detail->variant->product->code}}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center" style="max-width:200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $detail->variant->product->name }}
                                </td>
                                <td class="px-4 py-2 border border-gray-300 text-center">
                                    <img src="{{asset($detail->variant->image)}}" alt="" width="100">
                                </td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ $detail->variant->color->name }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ $detail->variant->size->name }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ number_format($detail->variant->price) }} ₫</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{$detail->quantity}}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ number_format($detail->quantity * $detail->variant->price) }} ₫</td>
                                <td class="px-4 py-2 border border-gray-300 text-center"><a href="{{route('sendRate',['variant_id'=>$detail->variant->id])}}" class="btn btn-danger">Đánh giá</a></td>
                            </tr>
                            @else
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border border-gray-300 text-center">{{$detail->variant->product->code}}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center" style="max-width:200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $detail->variant->product->name }}
                                </td>
                                <td class="px-4 py-2 border border-gray-300 text-center">
                                    <img src="{{asset($detail->variant->image)}}" alt="" width="100">
                                </td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ $detail->variant->color->name }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ $detail->variant->size->name }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ number_format($detail->variant->price) }} ₫</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{$detail->quantity}}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ number_format($detail->quantity * $detail->variant->price) }} ₫</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="border border-gray-300 rounded-lg shadow-lg">
                    <div class="bg-gray-100 p-4 text-lg font-semibold flex items-center space-x-2">
                        <i class="fas fa-user"></i> 
                        <span>Người nhận</span>
                    </div>
                    <div class="p-4">
                        <div class="mb-4">
                            <label for="receiverName" class="block text-gray-700 font-medium">Tên người nhận:</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded-md" id="receiverName" value="{{$order->fullname}}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="receiverPhone" class="block text-gray-700 font-medium">Số điện thoại:</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded-md" id="receiverPhone" value="{{$order->phone}}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="receiverAddress" class="block text-gray-700 font-medium">Địa chỉ:</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded-md" id="receiverAddress" value="{{$order->address}}" disabled>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="flex space-x-4 mt-3">
                @if ($order->status == 'Chờ xác nhận')
                    <form action="{{ URL('huy-don', $order->code) }}" method="POST">
                        @csrf
                        <input type="hidden" name="code" value="{{ $order->code }}">
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-md shadow-md hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Hủy đơn hàng
                        </button>
                    </form>
                @endif
            
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
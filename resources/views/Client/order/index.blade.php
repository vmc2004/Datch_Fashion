@extends('Client.layout.layout')

@section('title', "Đơn hàng của tôi")


@section('content')
<div class="max-w-screen-xl mx-auto ">

    <div class="mt-12 md:grid grid-cols-5 gap-8">
        <!-- Sidebar -->
        @include('Client.layout.profile_sidebar')

        <div class="col-span-4">
            <div>
                <h3
                    class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                    <strong>Đơn mua</strong>
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
                <div class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 text-left">Mã đơn hàng</th>
                                <th class="py-2 px-4 text-left">Ngày tạo</th>
                                <th class="py-2 px-4 text-left">Tổng tiền</th>
                                <th class="py-2 px-4 text-left">Trạng thái thanh toán</th>
                                <th class="py-2 px-4 text-left">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4"><a href="{{URL('acount/orders/edit', $order->code)}}" class="font-bold">{{$order->code}}</a></td>
                                <td class="py-2 px-4">{{$order->created_at->format('d/m/Y')}}</td>
                                <td class="py-2 px-4">{{number_format($order->total_price)}}</td>
                                <td class="py-2 px-4"   >
                                    @if($order->payment == 'Thanh toán qua VNPay')
                                    <p class="text-green-500">Đã thanh toán</p>
                                    @elseif ($order->payment == 'Thanh toán khi nhận hàng')
                                    <p class="text-rose-500">Chưa thanh toán</p>
                                    @endif
                                </td>
                                <td class="py-2 px-4">
                                    @if ($order->status == "Chờ xác nhận")
                                        Chờ xác nhận
                                    @elseif ($order->status == "Đã xác nhận")
                                        Đã xác nhận
                                    @elseif ($order->status == "Đang chuẩn bị hàng")
                                        Đang chuẩn bị hàng
                                    @elseif ($order->status == "Đang giao hàng")
                                        Đang giao hàng
                                    @elseif ($order->status == "Đã giao hàng")
                                       <p class="text-green-500"> Giao hàng thành công</p>
                                    @elseif ($order->status == "Đơn hàng đã hủy")
                                        <p class="text-red-500">Đơn hàng đã hủy</p>
                                    @else
                                        Trạng thái không xác định
                                    @endif
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$orders->links()}}
        </div>
    </div>
</div>


                   


@endsection
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
                <div class="md:mb-12 md:px-8 md:py-12 bg-white">
                    <div class="flex mb-5 border-b overflow-x-auto ">
                        <div
                            class="text-[#BB0000] border-b border-solid border-[#BB0000] cursor-pointer p-4 text-sm font-semibold text-center outline-none relative md:mr-5">
                            <span class="inline-block w-[100px] md:w-full">Tất cả</span>
                            <span
                                class="absolute left-15 bottom-8 md:inline-block w-4 h-4 text-xs border border-solid border-[#BB0000] rounded-full bg-[#BB0000] text-white hidden">1</span>
                        </div>
                        <div
                            class="text-[#BB0000] cursor-pointer p-4 text-sm font-semibold text-center outline-none relative">
                            <span class="inline-block w-[100px] md:w-full">Chờ thanh toán</span>
                            <span
                                class="absolute left-15 bottom-8 md:inline-block w-4 h-4 text-xs border border-solid border-[#BB0000] rounded-full bg-[#BB0000] text-white hidden">1</span>
                        </div>
                        <div
                            class="text-[#BB0000] cursor-pointer p-4 text-sm font-semibold text-center outline-none relative">
                            <span class="inline-block w-[100px] md:w-full">Đang sử lý</span>
                        </div>
                        <div
                            class="text-[#BB0000] cursor-pointer p-4 text-sm font-semibold text-center outline-none relative">
                            <span class="inline-block w-[100px] md:w-full">Chờ nhận hàng</span>
                        </div>
                        <div
                            class="text-[#BB0000] cursor-pointer p-4 text-sm font-semibold text-center outline-none relative">
                            <span class="inline-block w-[100px] md:w-full">Đánh giá</span>
                        </div>
                        <div
                            class="text-[#BB0000] cursor-pointer p-4 text-sm font-semibold text-center outline-none relative">
                            <span class="inline-block w-[100px] md:w-full">Khiếu nại</span>
                        </div>
                        <div
                            class="text-[#BB0000] cursor-pointer p-4 text-sm font-semibold text-center outline-none relative">
                            <span class="inline-block w-[100px] md:w-full">Đơn bị hủy</span>
                        </div>

                        <div
                            class="text-[#BB0000] cursor-pointer p-4 text-sm font-semibold text-center outline-none relative">
                            <span class="inline-block w-[100px] md:w-full">Hoàn thành</span>
                        </div>
                    </div>

                </div>
                <div class="flex md:mb-12 mb-6">
                    <h3 class="text-xl font-bold text-slate-800">1 sản phẩm</h3>
                    <div class="flex items-center ml-auto text-sm">
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
                    </div>
                </div>

            </div>
            <div>
                <div class="bg-white mb-12">
                    <div>
                        <div class="bg-white mb-12">
                            <div class="flex p-12 border-t border-black-100">
                                <div class="w-10/12 pr-8">
                                    <div class="flex relative">
                                        <div class="Account_wrapImageListing__UEJRD"><img
                                                src="https://static.oreka.vn/500-500_1507882b-443d-4b4a-b390-ef85739e131b"
                                                width="150" height="150" alt="" style="object-fit: cover;"></div>
                                        <div class="flex flex-1 ml-8">
                                            <div><a class="Account_title_product_order__dOTST font-bold text-18 text-black-600 mb-4 inline-block"
                                                    href="/mua-ban-sach/kim-binh-mai----lan-lang-tieu-tieu-sinh---tron-bo-2-tap--detail/85203">Kim
                                                    Bình Mai - Lan Lăng Tiếu Tiếu Sinh ( trọn bộ 2 tập)</a>
                                                <p class="mb-4 text-black-500"><span>
                                        <div class="flex"><span>Tình trạng: Tốt</span>
                                            <div class="ml-6">
                                                <div class="cursor-pointer"><svg aria-hidden="true"
                                                                                 focusable="false" data-prefix="fal"
                                                                                 data-icon="question-circle"
                                                                                 class="svg-inline--fa fa-question-circle fa-w-16 "
                                                                                 role="img" xmlns="http://www.w3.org/2000/svg"
                                                                                 viewBox="0 0 512 512">
                                                        <path fill="currentColor"
                                                              d="M256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28zm7.67-24h-16c-6.627 0-12-5.373-12-12v-.381c0-70.343 77.44-63.619 77.44-107.408 0-20.016-17.761-40.211-57.44-40.211-29.144 0-44.265 9.649-59.211 28.692-3.908 4.98-11.054 5.995-16.248 2.376l-13.134-9.15c-5.625-3.919-6.86-11.771-2.645-17.177C185.658 133.514 210.842 116 255.67 116c52.32 0 97.44 29.751 97.44 80.211 0 67.414-77.44 63.849-77.44 107.408V304c0 6.627-5.373 12-12 12zM256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>Số lượng: 1
                                    </span><a class="styles_detail_text__iFUMZ">(Chi tiết)</a></p>
                                                <div>
                                                                <span class="text-amber-600">
                                                                    <label>Đã thanh toán</label>
                                                                    <svg class="overflow-visible w-1.5 inline-block mx-2"
                                                                         viewBox="0 0 256 512">
                                                                        <path fill="currentColor"
                                                                              d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                    <span class="text-slate-400">
                                                                    <label>Đang xử lý</label>
                                                                    <svg class="overflow-visible w-1.5 inline-block mx-2"
                                                                         viewBox="0 0 256 512">
                                                                        <path fill="currentColor"
                                                                              d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                    <span class="text-slate-400">
                                                                    <label>Chờ nhận hàng</label>
                                                                    <svg class="overflow-visible w-1.5 inline-block mx-2"
                                                                         viewBox="0 0 256 512">
                                                                        <path fill="currentColor"
                                                                              d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                    <span class="text-slate-400">
                                                                    <label>Hoàn Thành</label>
                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-2/12 pr-4 mb-8 flex flex-col items-end">
                                    <p class="float-right">180,000 vnđ</p>
                                </div>
                            </div>
                            <div class="px-12 py-4 border-b border-black-100 flex justify-between">
                                <div class="w-7/12">
                                    <div class="Order_noti_text__DJnBk">Chờ người bán xác nhận đơn hàng.</div>
                                </div>
                                <div class="w-5/12">
                                    <div class="">
                                        <div class="">
                                            <div class=""><button
                                                    class="mr-4  float-right Order_cancel_btn__jxx1i Button_normal__CPyCb Button_button--common__joLB8 ">Hủy đơn hàng</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>


@endsection
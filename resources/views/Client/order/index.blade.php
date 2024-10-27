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
                            <div class="px-12 py-4 border-b border-black-100 flex justify-between"><span
                                    class="styles_hover_cursor__q9jnf custom-cursor-on-hover"><span class="px-2"><img
                                            src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTMiIGhlaWdodD0iMTQiIHZpZXdCb3g9IjAgMCAxMyAxNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzEwXzEzNjYyKSI+CjxwYXRoIGQ9Ik03LjE3NDYyIDAuNUM3LjIxNDA3IDAuODIxMDkxIDcuMjU3MTUgMS4xNDIxOCA3LjI5MjA1IDEuNDYzMjdDNy4zODMwNyAyLjI5MzkzIDcuNDY4MDMgMy4xMjQ5MiA3LjU1NTQyIDMuOTU1NThDNy41ODc4OSA0LjI2Mjg2IDcuNjI2MTIgNC41NjkxOCA3LjY1MDM5IDQuODc2NzlDNy42OTU5MSA1LjQ1NDc1IDcuMjUxNjkgNS45NzEwNiA2LjcwNDkyIDUuOTc0MjhDNi41MDQzNSA1Ljk3NDI4IDYuMjk4MDIgNS45ODUxOSA2LjEwNDQzIDUuOTQyMTdDNS42MTUwMSA1LjgzMDc1IDUuMzEyNDkgNS4zMjQzOSA1LjM3Mjg3IDQuNzk4NDRDNS40Njc1NCAzLjk3Mzg4IDUuNTQ3MzQgMy4xNDczOSA1LjYzMzgyIDIuMzIxODdDNS42OTQ1MSAxLjczNDI3IDUuNzU2NTEgMS4xNDY3OCA1LjgxOTgyIDAuNTU5NDAyQzUuODI0OCAwLjUzODg5NiA1LjgzMjQ2IDAuNTE5MjI2IDUuODQyNTggMC41MDA5NjNMNy4xNzQ2MiAwLjVaIiBmaWxsPSIjNjE2MTYxIi8+CjxwYXRoIGQ9Ik01LjE3NjU4IDAuNTAwMDc3QzUuMTIxMzYgMS4wNTA3NSA1LjA2NzY1IDEuNjAxNDIgNS4wMTAzIDIuMTUyMDlDNC45MzU2NiAyLjg3MTk3IDQuODU4NTkgMy41OTEyMiA0Ljc4MTgyIDQuMzExMUM0Ljc0OTM2IDQuNjE4MDcgNC43MjM1NyA0LjkyNTY3IDQuNjg1NjQgNS4yMzE5OUM0LjY2MTUzIDUuNDM3NzUgNC41NjcwMiA1LjYyNzAzIDQuNDE5OTggNS43NjQwNUM0LjI3Mjk0IDUuOTAxMDggNC4wODM1NSA1Ljk3NjM1IDMuODg3NjMgNS45NzU2NEMzLjc0MTM4IDUuOTc3MjQgMy41OTU0MyA1Ljk3ODIxIDMuNDQ5MTggNS45NzU2NEMyLjk0NjA5IDUuOTY2IDIuNTU4MzIgNS40NTYxMSAyLjY4ODQ5IDQuOTQyMDVDMy4wMTAxMiAzLjY3NDA2IDMuMzQ3MjIgMi40MTA1NyAzLjY3NzY2IDEuMTQ1MTVDMy43MzM4OSAwLjkzMTA4NyAzLjc4OTUyIDAuNzE1OTU3IDMuODQ0NTQgMC40OTk3NTZMNS4xNzY1OCAwLjUwMDA3N1oiIGZpbGw9IiM2MTYxNjEiLz4KPHBhdGggZD0iTTkuMTcyMDcgMC41QzkuNTQ4OTMgMS45Mzk1NiA5LjkyNTU4IDMuMzc5NDMgMTAuMzAyIDQuODE5NjNDMTAuNDcyMyA1LjQ3MDQ4IDEwLjExMDkgNS45NzkwOSA5LjQ3NjEgNS45NzU1NkM5LjI5NTg3IDUuOTc1NTYgOS4xMTE5OSA1Ljk4NDU1IDguOTM1NyA1Ljk0NTdDOC43NzYyOSA1LjkxMDIxIDguNjMxNzEgNS44MjE4OCA4LjUyMjk3IDUuNjkzNTJDOC40MTQyMiA1LjU2NTE2IDguMzQ2OTcgNS40MDM0NyA4LjMzMDk3IDUuMjMxOTFDOC4yMzQ0OCA0LjM0MzEzIDguMTQ1NTggMy40NTM3MSA4LjA1MjEyIDIuNTY0NjFDNy45ODcxOSAxLjk0NTU1IDcuOTE5MjIgMS4zMjY0OSA3Ljg1MzM4IDAuNzA3NDI0QzcuODQ2MSAwLjYzODcxMSA3Ljg0NDU4IDAuNTY5MzU1IDcuODQwMzMgMC41MDAzMjFMOS4xNzIwNyAwLjVaIiBmaWxsPSIjNjE2MTYxIi8+CjxwYXRoIGQ9Ik0xMC44MzczIDAuNUMxMS4xMzkyIDAuNTk0NzIyIDExLjI4ODIgMC44MzQyNTUgMTEuNDA4IDEuMTI1MTZDMTEuOTAwNSAyLjMyMDU4IDEyLjM5MTQgMy41MTY5NyAxMi45MSA0LjY5OTU1QzEzLjE5OTcgNS4zNjAwMyAxMi43NDg4IDYuMDE0NDEgMTIuMTI2MiA1Ljk3NzE3QzExLjk5NTcgNS45Njk0NiAxMS44NjA0IDUuOTg5NjkgMTEuNzM0NSA1Ljk2MTQzQzExLjQwNjggNS44ODc5IDExLjE5MjkgNS42NzI0NSAxMS4xMDE4IDUuMzI3MjhDMTAuNzQyNiAzLjk1OTIyIDEwLjM4MzEgMi41OTEyNiAxMC4wMjM1IDEuMjIzNDJDOS45NjAwNSAwLjk4MjkyIDkuODk5OTcgMC43NDE3ODEgOS44MzgzOCAwLjVIMTAuODM3M1oiIGZpbGw9IiM2MTYxNjEiLz4KPHBhdGggZD0iTTMuMTc4MzkgMC41MDAxNTRDMi44ODAwMiAxLjY0MjU5IDIuNTgxNTUgMi43ODUwNCAyLjI4Mjk4IDMuOTI3NDhDMi4xNjc2OCA0LjM2ODAxIDIuMDUxMTYgNC44MDc5MSAxLjkzNjc3IDUuMjQ4NzZDMS44MDU2OSA1Ljc1Mzg0IDEuNTMzODIgNS45Nzc5NiAxLjA0NDA5IDUuOTc1NzFDMC45MTM5MiA1Ljk3NTcxIDAuNzc5ODA2IDUuOTc5MjUgMC42NTM4ODQgNS45NTA2N0MwLjMyNDM2MyA1Ljg3NTUzIDAuMTE2ODE5IDUuNjU1OTEgMC4wMzAzNDI2IDUuMzA4NDlDMC4wMjIyMTk5IDUuMjg0NjYgMC4wMTIwNjM3IDUuMjYxNjYgMCA1LjIzOTc3VjUuMDE1MDFDMC4wNDIxNzYzIDQuODk2ODUgMC4wNzk0OTc3IDQuNzc2NDQgMC4xMjc3NDIgNC42NjE4MUMwLjYyMTcyMSAzLjQ4MjEyIDEuMTIyMDcgMi4zMDU2NSAxLjYwOTM3IDEuMTIzMDdDMS43MjkyMyAwLjgzMjE2MiAxLjg3OTczIDAuNTk1MTk3IDIuMTc5NTEgMC40OTk1MTJMMy4xNzgzOSAwLjUwMDE1NFoiIGZpbGw9IiM2MTYxNjEiLz4KPHBhdGggZD0iTTcuOTQ0MjUgNi4wMTA3M0M4LjQ1NzA0IDYuODc3NjcgMTAuMTc2NiA2Ljg5NTY2IDEwLjcxODggNi4wMzgwMkMxMS4wNDM0IDYuNDYzMTUgMTEuNDYzNyA2LjY3NTcxIDExLjk5MzIgNi42NTcwOEMxMS45OTY1IDYuNzI3NzIgMTIuMDAxMSA2Ljc4NTUyIDEyLjAwMTEgNi44NDE3MUMxMi4wMDExIDguOTAxNCAxMi4wMDExIDEwLjk2MTMgMTIuMDAxMSAxMy4wMjE0QzEyLjAwMTEgMTMuMzkxIDExLjg5ODIgMTMuNDk5OSAxMS41NTE0IDEzLjQ5OTlINS44NjAwMVY4LjUyMjk0QzUuODYwMDEgOC4xMjEyNiA1Ljc2ODk4IDguMDI1NTcgNS4zODU0NSA4LjAyNTU3SDMuMDU1MTRDMi43NDk4OSA4LjAyNTU3IDIuNjMzMDcgOC4xNDc5MSAyLjYzMzA3IDguNDY4MzZDMi42MzMwNyAxMC4wNzM4IDIuNjMzMDcgMTEuNjgwMSAyLjYzMzA3IDEzLjI4NzNWMTMuNDg5M0MyLjU3OTA2IDEzLjQ5MzEgMi41MzU2NyAxMy40OTg5IDIuNDkxOTggMTMuNDk4OUMyLjEzMzk0IDEzLjQ5ODkgMS43NzU1OSAxMy40OTg5IDEuNDE3NTUgMTMuNDk4OUMxLjE0MDUyIDEzLjQ5ODkgMS4wMTg1NCAxMy4zNzQgMS4wMTczMyAxMy4wODE1QzEuMDE0NiAxMi40NTY5IDEuMDE3MzMgMTEuODMyNyAxLjAxNzMzIDExLjIwODJWNi42NjA2MkMxLjU0MTk1IDYuNjcyNSAxLjk2ODI3IDYuNDczNDIgMi4yOTcxOCA2LjAzNTc3TDIuMzkwOTQgNi4xNDM2NkMyLjY3NTI1IDYuNDY4OTMgMy4wMjMyOCA2LjY0OTA2IDMuNDQ1MDQgNi42NTI1OUMzLjY2NjU0IDYuNjU0NTIgMy44OTA3NyA2LjY2NTExIDQuMTA5MjQgNi42MzQ2MUM0LjUwNzM0IDYuNTc4NzQgNC44MjE2OSA2LjM1NTU4IDUuMDY5NTkgNi4wMDk3N0M1LjQ0Nzk2IDYuNDgzNyA1LjkyODU5IDYuNjYxNTggNi41MDMyOCA2LjY2MTlDNy4wNzc5NyA2LjY2MjIyIDcuNTYxNjMgNi40OTMwMSA3Ljk0NDI1IDYuMDEwNzNaTTcuNDc2NjcgOS43NDE0OEM3LjQ3NjY3IDEwLjE2ODIgNy40NzY2NyAxMC41OTQ5IDcuNDc2NjcgMTEuMDIxN0M3LjQ3NjY3IDExLjMxNTEgNy41OTI4OCAxMS40MzkxIDcuODczMjUgMTEuNDM5MUM4LjU3OTQyIDExLjQ0MTIgOS4yODUyOSAxMS40NDEyIDkuOTkwODYgMTEuNDM5MUMxMC4yNjg1IDExLjQzOTEgMTAuMzgyOSAxMS4zMTA3IDEwLjM4MzIgMTEuMDE1NkMxMC4zODMyIDEwLjE2MjEgMTAuMzgzMiA5LjMwODU0IDEwLjM4MzIgOC40NTQ4N0MxMC4zODMyIDguMTU0NjUgMTAuMjYxOCA4LjAyNjIyIDkuOTc4NzIgOC4wMjU4OUM5LjI3NzgxIDguMDI1ODkgOC41NzY4OSA4LjAyNTg5IDcuODc1OTggOC4wMjU4OUM3LjYwMTM4IDguMDI1ODkgNy40Nzc1OCA4LjE1NTk0IDcuNDc2NjcgOC40NDMzMUM3LjQ3NDg1IDguODc3MTEgNy40NzY2NyA5LjMwOTI5IDcuNDc2NjcgOS43NDE0OFoiIGZpbGw9IiM2MTYxNjEiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8xMF8xMzY2MiI+CjxyZWN0IHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="
                                            alt="svg" class="w-8 float-left"></span><span
                                        class="px-4 font-bold custom-cursor-on-hover">Ngựa</span></span><span>16-10-2024
                    22:11</span></div>
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
                                                    class="mr-4 float-right Order_cancel_btn__jxx1i Button_normal__CPyCb Button_button--common__joLB8">Hủy đơn hàng</button></div>
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
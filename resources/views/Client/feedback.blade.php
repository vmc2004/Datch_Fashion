@extends('Client.layout.layout')

@section('title', "Đóng góp ý kiến")

@section('content')
<div class="max-w-screen-xl mx-auto ">

    <div class="mt-12 md:grid grid-cols-5 gap-8">
        <!-- Sidebar -->
        @include('Client.layout.profile_sidebar')
        <div class="col-span-4">
            <h3
                class="p-3 bg-white text-slate-800 text-black text-lg md:mb-12 mb-2 border border-solid border-transparent rounded-lg shadow-md shadow-gray-300 hidden md:block">
                <strong>Đóng góp ý kiến</strong>
            </h3>
            <div class="mt-6">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="text-gray-600 mb-4">
                        Nếu bạn cảm thấy khó khăn khi sử dụng dịch vụ của chúng tôi, vui lòng cho chúng tôi biết tại biểu mẫu này. Chúng tôi sẽ xử lý và kiểm tra nhanh nhất có thể. Chân thành cảm ơn bạn đã dành thời gian quý giá cho Vietmira.
                    </p>
                    <form action="" method="POST">
                        @csrf 
                        <div class="mb-4">
                            <label class="block text-gray-700" for="feedback">
                                Ý kiến của bạn
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea class="w-full border rounded-lg p-2 mt-1" id="feedback" rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">
                                Ảnh đính kèm
                            </label>
                                <div class="flex flex-col border-dashed border-2 border-orange-500 rounded-lg mt-1 flex items-center justify-center text-orange-500 cursor-pointer w-36 h-36">
                                    <label for="fileInput" class="flex flex-col items-center justify-center h-full">
                                        <input id="fileInput" accept="image/*,video/*" multiple type="file" class="hidden">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjYiIGhlaWdodD0iMjYiIHZpZXdCb3g9IjAgMCAyNiAyNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgaWQ9IkZyYW1lIiBjbGlwLXBhdGg9InVybCgjY2xpcDBfNzAwXzY5NDIpIj4KPGcgaWQ9Ikdyb3VwIj4KPHBhdGggaWQ9IlZlY3RvciIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMS45NzU5IDIuMTQ2NDhWMTEuODA1SDIuMzE3MzhWMTMuOTUxNEgxMS45NzU5VjIzLjYwOTlIMTQuMTIyM1YxMy45NTE0SDIzLjc4MDhWMTEuODA1SDE0LjEyMjNWMi4xNDY0OEgxMS45NzU5WiIgZmlsbD0iI0VCNkUzNCIvPgo8L2c+CjwvZz4KPGRlZnM+CjxjbGlwUGF0aCBpZD0iY2xpcDBfNzAwXzY5NDIiPgo8cmVjdCB3aWR0aD0iMjUuNzU2MSIgaGVpZ2h0PSIyNS43NTYxIiBmaWxsPSJ3aGl0ZSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4xNzA4OTgpIi8+CjwvY2xpcFBhdGg+CjwvZGVmcz4KPC9zdmc+Cg==" alt="plus-icon">
                                        <div class="text-orange-500 mt-4">Thêm ảnh / video</div>
                                    </label>
                                </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">
                                Để lại số điện thoại nếu có thể
                            </label>
                            <div class="flex items-center border rounded-lg p-2 mt-1">
                                <span class="text-gray-700 mr-2">+84</span>
                                <input class="flex-1 border-none focus:ring-0" placeholder="Nhập số điện thoại" type="text"/>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-4 mb-4">
                            <button type="reset" class="border-2 border-orange-500 text-gray-700 px-4 py-2  rounded-full pe-7 ps-7" >
                                Huỷ
                            </button>
                            <button class="bg-orange-500 text-white px-4 py-2 rounded-full pe-7 ps-7 ">
                                Gửi
                            </button>
                        </div>
                    </form>
                </div>   
            </div>
        </div>
        </div>
    </div>
</div>


@endsection

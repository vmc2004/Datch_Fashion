@extends('Client.layout.layout')

@section('title', "Hồ sơ của tôi")

@section('content')
<div class="max-w-screen-xl mx-auto ">

    <div class="mt-12 md:grid grid-cols-5 gap-8">
        <!-- Sidebar -->
        @include('Client.layout.profile_sidebar')
        <div class="col-span-4">
            <form action="/tai-khoan" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <h3 class="text-lg p-4 bg-white text-black mb-8 shadow-md shadow-gray-300 rounded-md " style="width: 920px;">
                    <strong>Hồ sơ của tôi</strong>
                </h3>
                @if(session('success'))
                      <div id="toast" class="fixed top-20 right-5 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg flex items-center space-x-2 transition-opacity opacity-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                <div class="shadow-md shadow-gray-300 mb-8 text-black">
                    <div class="bg-white md:p-12">
                        <div class="flex">
                            <div class="flex-1 md:mr-12">
                                <div class="flex items-center mb-8">
                                    <div class="text-right md:mr-8 md:w-40"></div>
                                    <div class="flex items-center">
                                        <!-- Avatar -->
                                        <section>
                                            <div role="presentation" tabindex="0" class="outline-none">
                                                <input id="avatarInput" name="avatar" accept="image/*" multiple="" type="file" tabindex="-1" style="display: none;">
                                                <div class="inline-block ml-auto relative group">
                                                    <img id="avatarPreview" src="{{ $user->avatar ? '/uploads/' . $user->avatar : '/assets/images/no-avatar.svg' }}" 
                                                        class="rounded-full" alt="" style="width: 108px; height: 108px; object-fit: cover; cursor: pointer;">
                                                    <span class="bottom-0 rounded-b-3xl h-14 absolute flex b-0 l-0 w-full items-center justify-center cursor-pointer"
                                                        style="background: hsla(0, 0%, 77%, .8); border-radius: 0 0 60px 60px;"
                                                        onclick="document.getElementById('avatarInput').click();">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="camera" 
                                                            class="overflow-visible w-8 text-3xl" role="img" xmlns="http://www.w3.org/2000/svg" 
                                                            viewBox="0 0 512 512">
                                                            <path fill="currentColor"
                                                                d="M324.3 64c3.3 0 6.3 2.1 7.5 5.2l22.1 58.8H464c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h110.2l20.1-53.6c2.3-6.2 8.3-10.4 15-10.4h131m0-32h-131c-20 0-37.9 12.4-44.9 31.1L136 96H48c-26.5 0-48 21.5-48 48v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48h-88l-14.3-38c-5.8-15.7-20.7-26-37.4-26zM256 408c-66.2 0-120-53.8-120-120s53.8-120 120-120 120 53.8 120 120-53.8 120-120 120zm0-208c-48.5 0-88 39.5-88 88s39.5 88 88 88 88-39.5 88-88-39.5-88-88-88z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </section>
                                        
                                        <!-- /Avatar -->
                                        <div class="flex-1 ml-4">
                                            <h3 class="font-bold text-2xl text-black">{{ $user->fullname }}</h3>
                                            <div class="flex items-center">
                                                <div class="flex items-center">
                                                    ID tài khoản
                                                    <div class="mr-2.5 ml-1.5">
                                                        <div class="cursor-pointer">
                                                            <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                                                data-icon="question-circle"
                                                                class="overflow-visible w-3.5" role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                    d="M256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28zm7.67-24h-16c-6.627 0-12-5.373-12-12v-.381c0-70.343 77.44-63.619 77.44-107.408 0-20.016-17.761-40.211-57.44-40.211-29.144 0-44.265 9.649-59.211 28.692-3.908 4.98-11.054 5.995-16.248 2.376l-13.134-9.15c-5.625-3.919-6.86-11.771-2.645-17.177C185.658 133.514 210.842 116 255.67 116c52.32 0 97.44 29.751 97.44 80.211 0 67.414-77.44 63.849-77.44 107.408V304c0 6.627-5.373 12-12 12zM256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{ $user->email }}
                                            </div>
                                            @error('avatar')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="flex items-center mb-8">
                                    <label class="md:w-40 pl-10 md:pl-0 text-right mr-8">Tên</label>
                                    <div class="relative">
                                        <input type="text" name="fullname"
                                            class="text-blue-900 border border-blue-900 w-full h-9 rounded-3xl py-2.5 px-3.5"
                                            placeholder="Nhập họ và tên" value="{{ $user->fullname }}">
                                    </div>
                                    @error('fullname')
                                        <div class="text-red-500 text-sm mt-1 ml-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="relative mb-8">
                                    <div class="flex flex-wrap items-center">
                                        <label class="mr-8 text-right pl-10 md:w-40 md:pl-0">Giới tính</label>
                                        <div class="flex items-center cursor-pointer mr-8">
                                            <input type="radio" name="gender" value="Nam" class="mr-2" @if ($user->gender == 'Nam') checked @endif> Nam
                                        </div>
                                        <div class="flex items-center cursor-pointer mr-8">
                                            <input type="radio" name="gender" value="Nữ"  class="mr-2"  @if ($user->gender == 'Nữ') checked @endif> Nữ
                                        </div>
                                        <div class="flex items-center cursor-pointer mr-8">
                                            <input type="radio" name="gender" value="Khác" class="mr-2"  @if ($user->gender == "Khác") checked @endif> Khác
                                        </div>
                                    </div>
                                    @error('gender')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="flex items-center mb-8">
                                    <label class="mr-8 text-right pl-10 md:pl-0 md:w-40">Ngày sinh</label>
                                    <div class="relative">
                                        <div class="!w-full inline-block p-0 border-0">
                                            <p class="mr-8">
                                            <div class="relative inline-block w-full">
                                                <input id="birthday" name="birthday" type="text" placeholder="Chọn ngày"
                                                    class="border border-slate-400 w-full rounded-full h-9 py-2.5 px-3.5"
                                                    value="{{ $user->birthday }}">
                                            </div>
                                            </p>
                                            @error('birthday')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                            data-icon="calendar-minus"
                                            class="text-black overflow-visible w-3.5 absolute top-1/2 right-2.5 -translate-y-1/2 inline-block h-3.5"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                d="M400 64h-48V12c0-6.6-5.4-12-12-12h-8c-6.6 0-12 5.4-12 12v52H128V12c0-6.6-5.4-12-12-12h-8c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h352c8.8 0 16 7.2 16 16v48H32v-48c0-8.8 7.2-16 16-16zm352 384H48c-8.8 0-16-7.2-16-16V192h384v272c0 8.8-7.2 16-16 16zm-92-128H140c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12z">
                                            </path>
                                        </svg>
                                    </div>
<<<<<<< HEAD

                                    <!-- Date of Birth -->
                                    <div class="flex items-center mb-8">
                                        <label class="mr-8 text-right pl-10 md:pl-0 md:w-40">Ngày sinh</label>
                                        <div class="relative">
                                            <input type="date" name="birthday" class="text-blue-900 border border-blue-900 w-full h-9 rounded-3xl py-2.5 px-3.5" value="{{ old('birthday', $user->birthday) }}">
                                        </div>
                                    </div>

                                    <div class="flex items-center mb-8">
                                        <label class="mr-8 text-right pl-10 md:pl-0 md:w-40">Ngôn ngữ</label>
                                        <div class="rounded-full h-full relative">
                                            <select name="language" class="text-blue-900 border border-blue-900 w-36 h-full rounded-full p-1.5">
                                                <option value="vietnam" {{ old('language', $user->language) == 'vi' ? 'selected' : '' }}>Việt Nam</option>
                                                <option value="english" {{ old('language', $user->language) == 'en' ? 'selected' : '' }}>English</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex items-center mb-8">
                                        <label class="md:w-40 text-right mr-8 py-2.5 pl-10 md:pl-0">Địa chỉ</label>
                                        <div class="relative">
                                            <input type="text" name="address" class="text-blue-900 border border-blue-900 w-full h-9 rounded-3xl py-2.5 px-3.5" placeholder="Nhập địa chỉ" value="{{ old('address', $user->address) }}">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="flex mb-8 mr-24">
                                        <label class="mr-8 text-right pl-10 md:pl-0 md:w-40">Giới thiệu</label>
                                        <div class="flex-1 relative">
                                            <textarea name="introduction" rows="5" class="w-full border border-slate-400 rounded-lg resize-none p-2.5" placeholder="Nhập giới thiệu">{{ old('introduction', $user->introduction) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="button" id="saveProfileButton" class="text-white bg-red-700 rounded-full py-2 px-8">Lưu thay đổi</button>
                                    </div>

                                 
                    
                                </form>
=======
                                </div>
                                
>>>>>>> 5b9357366cba58837fa369d92d838ae44cc80355
                            </div>
                            

                        </div>
                        <div class="flex items-center mb-8">
                            <label class="w-40 text-right mr-8 ">Địa chỉ email</label>
                            <div class="flex items-center ">
                                <p class="mr-8">
                                    <input type="text"  name="email"
                                    class="text-blue-900 border border-blue-900 w-full h-9 rounded-3xl py-2.5 px-3.5 mr-4"
                                    placeholder="Nhập họ và tên" value="{{ $user->email }}">
                                    {{-- <span class="text-green-300">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="check"
                                            class="overflow-visible w-3.5 inline-block" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z">
                                            </path>
                                        </svg>
                                        Đã xác minh
                                    </span> --}}
                                </p>
                                @error('email')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center mb-8" >
                            <label class="w-40 text-right mr-8">Số điện thoại</label>
                            <div class="flex items-center">
                                <p class="mr-8">
                                <input type="text"  name="phone"
                                class="text-blue-900 border border-blue-900 w-full h-9 rounded-3xl py-2.5 px-3.5 mr-4"
                                placeholder="Nhập số điện thoại" value="{{ $user->phone }}">
                                {{-- <span class="cursor-pointer text-blue-900 hover:underline">{{ $user->phone }}</span> --}}
                                </p>
                            </div>
                            @error('phone')
                                <div class="text-red-500 text-sm mt-1 ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex mb-8">
                            <label class="md:w-40 text-right mr-8 py-2.5 pl-10 md:pl-0">Địa chỉ</label>
                            <div class="flex-1 mr-24">
                                <div class="py-2.5 cursor-pointer">
                                    <p class="mr-8">
                                        <input type="text"  name="address"
                                        class="text-blue-900 border border-blue-900 w-10/12 h-9 rounded-3xl py-2.5 px-3.5 mr-4"
                                        placeholder="Nhập địa chỉ" value="{{ $user->address }}">
                                        {{-- <span class="cursor-pointer text-blue-900 hover:underline">{{ $user->phone }}</span> --}}
                                        </p>
                                </div>
                            </div>
                        </div>
                        
                       
                        <div class="text-center">
                            <button type="submit" class="text-white bg-red-700 rounded-full py-2 px-8">Lưu thay
                                đổi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
<<<<<<< HEAD
    document.getElementById('saveProfileButton').addEventListener('click', function() {
        // Thu thập dữ liệu từ form
        const formData = new FormData(document.getElementById('profileForm'));

        // Gửi yêu cầu AJAX
        fetch("{{ route('Client.account.updateProfile') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Cập nhật các trường thông tin trong form bằng dữ liệu mới từ máy chủ
                document.querySelector('input[name="fullname"]').value = data.user.fullname;
                document.querySelector('input[name="gender"][value="' + data.user.gender + '"]').checked = true;
                document.querySelector('input[name="birthday"]').value = data.user.birthday;
                document.querySelector('select[name="language"]').value = data.user.language;
                document.querySelector('input[name="address"]').value = data.user.address;
                document.querySelector('textarea[name="introduction"]').value = data.user.introduction;
                if (data.user.avatar_url) {
                    document.getElementById('avatarPreview').src = data.user.avatar_url;
                }


                alert("Lưu thay đổi thành công!");
            } else {
                alert("Không thể lưu thay đổi.");
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert("Có lỗi xảy ra. Vui lòng thử lại.");
=======
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#birthday", {
                dateFormat: "Y-m-d", 
                defaultDate: "{{ $user->birthday }}", 
                minDate: "1900-01-01", 
                maxDate: "today", 
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
    const toast = document.getElementById('toast');
    if (toast) {
        // Hiển thị toast
        toast.classList.remove('opacity-0');
        toast.classList.add('opacity-100');

        // Ẩn toast sau 3 giây
        setTimeout(() => {
            toast.classList.remove('opacity-100');
            toast.classList.add('opacity-0');
        }, 3000);
    }
});
        document.getElementById('avatarInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('avatarPreview').src = e.target.result; // Xem trước ảnh
                };
                reader.readAsDataURL(file);
            }
>>>>>>> 5b9357366cba58837fa369d92d838ae44cc80355
        });
</script>

@endsection

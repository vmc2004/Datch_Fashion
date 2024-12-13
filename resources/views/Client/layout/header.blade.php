<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{asset('assets/admin/img/logoDatch.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{asset('assets/clinet/css/styles.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <title>@yield('title') - Datch</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{asset('assets/client/css/styles.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/client/assets/css/styles-be.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <!-- Thêm vào trong <head> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Thêm vào trước thẻ </body> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <style>
    .border-blue-500 {
      border-color: #3B82F6;
      /* Màu xanh lam */
    }

    .color-option:hover,
    .size-option:hover {
      cursor: pointer;
      opacity: 0.8;
      /* Hiệu ứng khi di chuột */
    }

    .bird-container {
      width: 100%;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      pointer-events: none;
    }

    #suggestions {
      position: absolute;
      /* Đặt vị trí tuyệt đối */
      top: 100%;
      /* Để nó nằm ngay dưới ô tìm kiếm */
      left: 0;
      width: 100%;
      /* Đảm bảo độ rộng bằng với ô tìm kiếm */
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 8px;
      max-height: 200px;
      /* Giới hạn chiều cao */
      overflow-y: auto;
      /* Cuộn khi có quá nhiều kết quả */
      z-index: 21;
      /* Đảm bảo nó nằm trên các phần tử khác */
    }

    .menucha {
      z-index: 21;
    }

    #loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
    }

    /* Logo animation */
    #loading-logo {
      width: 100px;
      animation: rotate 2s linear infinite;
    }

    /* Rotate animation */
    @keyframes rotate {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .chat-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background-color: #2c3e50;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        z-index: 1000;
    }

    .chat-icon img {
        width: 30px;
        height: 30px;
    }

    .notification-badge {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: #e74c3c;
        color: white;
        font-size: 12px;
        font-weight: bold;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Cửa sổ chat */
    .chat-popup {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 300px;
        background: white;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .chat-header {
        padding: 10px;
        background: #2c3e50;
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .chat-header h3 {
        margin: 0;
    }

    .chat-body {
        padding: 10px;
        max-height: 200px;
        overflow-y: auto;
    }

    .chat-footer {
        padding: 10px;
        text-align: center;
    }

    .chat-footer button {
        padding: 10px 20px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .chat-footer button:hover {
        background: #2980b9;
    }
  </style>

</head>

<body>

  <div class="max-w-screen-xl mx-auto ">
    <div class="header">
      <nav class="flex items-center justify-between">
        <div class="flex items-center space-x-8">
          <div class="">
            <a href="/">
              <img src="{{asset('assets/admin/img/Datch.png')}}" alt="" width="50px" class="mb-1">
            </a>
          </div>
          <a href="/" class="text-gray-800 font-semibold">Trang chủ</a>
          <div class="relative group">
            <!-- Liên kết "Danh mục sản phẩm" -->
            <a href="/cua-hang" class="text-gray-800 font-semibold">
                Danh mục sản phẩm
            </a>

            

            <!-- Dropdown menu -->
            <div class="dropdown-menu hidden absolute bg-white shadow-lg rounded-lg left-0  w-[400px] group-hover:block z-50"
                id="menu-container" onmouseenter="showDropdownMenu()" onmouseleave="hideDropdownMenu()">
                <div class="flex">
                    <!-- Lề bên trái - Danh mục chính -->
                    <ul class="py-2 w-1/4 text-sm text-gray-700 border-r border-gray-300">
                        @foreach ($categories as $cat)
                            <li class="hover:bg-gray-100 relative"
                                onmouseenter="showSubcategories({{ $cat->id }}, '{{ $cat->name }}')">
                                <a href="/cua-hang/danh-muc/{{ $cat->id }}"
                                    class="font-bold block px-4 py-2">
                                    @if ($cat->parent_id == 0)
                                        {{ $cat->name }}
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Lề bên phải - Danh mục con -->
                    <ul id="subcategory-list" class="py-2 w-3/4">
                        <!-- Các danh mục con sẽ được hiển thị tại đây -->
                    </ul>
                </div>
            </div>
        </div>
      
                    <a href="/sale" class="text-gray-800 font-semibold">Sale</a>
                    <a href="/bai-viet" class="text-gray-800 font-semibold">Tin hot</a>
                    <a href="/lien-he" class="text-gray-800 font-semibold">Liên hệ</a>
                </div>
                <div class="flex items-center space-x-4">
                  <form action="{{ route('search') }}" method="GET">
                    <div class="relative">
                      <input type="text" placeholder="Tìm kiếm" class="pl-10 pr-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-gray-300" id="search-box" name="query" autocomplete="off">
                      <button type="submit">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                      </button>
                      <!-- Gợi ý hiển thị dưới ô tìm kiếm -->
                      <div id="suggestions" class="absolute bg-white border border-gray-200 rounded-lg mt-1 w-full max-h-60 overflow-y-auto z-10 hidden"></div>
                    </div>
                  </form>
        
                  @if (Auth::check())
                  <div class="relative group menucha">
                    <!-- User profile link -->
                    <a href="/tai-khoan" class="flex items-center text-gray-800 group" class="group-hover:opacity-100 group-hover:block opacity-0 hidden">
                      <img src="{{ Auth::user()->avatar ? asset('uploads/' . Auth::user()->avatar) : asset('assets/client/images/no-avatar.svg') }}" alt="Avatar User"  class="rounded-full w-8 h-8 mr-2" >
                      <span class="text-sm">{{ Auth::user()->fullname }}</span>
                    </a>
                    
                    <!-- Dropdown Menu -->
                    <div class="menu absolute left-0  w-48 bg-white shadow-lg rounded-lg z-20 opacity-0 transition-opacity duration-300 group-hover:opacity-100 group-hover:block hidden">
                      <ul class="py-2">
                        <li><a href="/tai-khoan" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                          <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user-circle" class="overflow-hidden svg-vertical inline-block w-[14px] h-[14px]" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                            <path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm128 421.6c-35.9 26.5-80.1 42.4-128 42.4s-92.1-15.9-128-42.4V416c0-35.3 28.7-64 64-64 11.1 0 27.5 11.4 64 11.4 36.6 0 52.8-11.4 64-11.4 35.3 0 64 28.7 64 64v13.6zm30.6-27.5c-6.8-46.4-46.3-82.1-94.6-82.1-20.5 0-30.4 11.4-64 11.4S204.6 320 184 320c-48.3 0-87.8 35.7-94.6 82.1C53.9 363.6 32 312.4 32 256c0-119.1 96.9-216 216-216s216 96.9 216 216c0 56.4-21.9 107.6-57.4 146.1zM248 120c-48.6 0-88 39.4-88 88s39.4 88 88 88 88-39.4 88-88-39.4-88-88-88zm0 144c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z"></path>
                        </svg>
                          Hồ sơ của tôi</a>
                        </li>
                        <li><a href="/account/favorites" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                          <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="overflow-hidden svg-vertical inline-block w-[14px] h-[14px]" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M462.3 62.7c-54.5-46.4-136-38.7-186.6 13.5L256 96.6l-19.7-20.3C195.5 34.1 113.2 8.7 49.7 62.7c-62.8 53.6-66.1 149.8-9.9 207.8l193.5 199.8c6.2 6.4 14.4 9.7 22.6 9.7 8.2 0 16.4-3.2 22.6-9.7L472 270.5c56.4-58 53.1-154.2-9.7-207.8zm-13.1 185.6L256.4 448.1 62.8 248.3c-38.4-39.6-46.4-115.1 7.7-161.2 54.8-46.8 119.2-12.9 142.8 11.5l42.7 44.1 42.7-44.1c23.2-24 88.2-58 142.8-11.5 54 46 46.1 121.5 7.7 161.2z"></path>
                        </svg>
                          Yêu thích</a>
                        </li>
                        <li><a href="/account/points" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                          <i class="fa-solid fa-hand-holding-medical"></i>
                          Tích điểm</a>
                        </li>
                        <li><a href="/account/orders" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                          <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="shopping-cart" class="overflow-hidden svg-vertical inline-block w-[15.75px] h-[14px]" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M551.991 64H129.28l-8.329-44.423C118.822 8.226 108.911 0 97.362 0H12C5.373 0 0 5.373 0 12v8c0 6.627 5.373 12 12 12h78.72l69.927 372.946C150.305 416.314 144 431.42 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-17.993-7.435-34.24-19.388-45.868C506.022 391.891 496.76 384 485.328 384H189.28l-12-64h331.381c11.368 0 21.177-7.976 23.496-19.105l43.331-208C578.592 77.991 567.215 64 551.991 64zM240 448c0 17.645-14.355 32-32 32s-32-14.355-32-32 14.355-32 32-32 32 14.355 32 32zm224 32c-17.645 0-32-14.355-32-32s14.355-32 32-32 32 14.355 32 32-14.355 32-32 32zm38.156-192H171.28l-36-192h406.876l-40 192z"></path>
                        </svg>
                          Đơn mua</a>
                        </li>
                        <li><a href="Danh-gia-cua-toi" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                          <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="star" class="w-[15px] h-[14px] overflow-hidden svg-vertical inline-block mr-2.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM405.8 317.9l27.8 162L288 403.5 142.5 480l27.8-162L52.5 203.1l162.7-23.6L288 32l72.8 147.5 162.7 23.6-117.7 114.8z"></path>
                        </svg>
                          Đánh giá của tôi</a>
                        </li>
                        <div class="mx-[15px] my-[20px] mb-[20px] text-[#333] text-[16px] font-bold">Cài đặt</div>
                        <li><a href="/tro-giup" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                          <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="question" class="overflow-hidden svg-vertical inline-block w-[10.5px] h-[14px]" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path fill="currentColor" d="M200.343 0C124.032 0 69.761 31.599 28.195 93.302c-14.213 21.099-9.458 49.674 10.825 65.054l42.034 31.872c20.709 15.703 50.346 12.165 66.679-8.51 21.473-27.181 28.371-31.96 46.132-31.96 10.218 0 25.289 6.999 25.289 18.242 0 25.731-109.3 20.744-109.3 122.251V304c0 16.007 7.883 30.199 19.963 38.924C109.139 360.547 96 386.766 96 416c0 52.935 43.065 96 96 96s96-43.065 96-96c0-29.234-13.139-55.453-33.817-73.076 12.08-8.726 19.963-22.917 19.963-38.924v-4.705c25.386-18.99 104.286-44.504 104.286-139.423C378.432 68.793 288.351 0 200.343 0zM192 480c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64zm50.146-186.406V304c0 8.837-7.163 16-16 16h-68.292c-8.836 0-16-7.163-16-16v-13.749c0-86.782 109.3-57.326 109.3-122.251 0-32-31.679-50.242-57.289-50.242-33.783 0-49.167 16.18-71.242 44.123-5.403 6.84-15.284 8.119-22.235 2.848l-42.034-31.872c-6.757-5.124-8.357-14.644-3.62-21.677C88.876 60.499 132.358 32 200.343 32c70.663 0 146.089 55.158 146.089 127.872 0 96.555-104.286 98.041-104.286 133.722z"></path>
                        </svg>
                          Trung tâm trợ giúp</a>
                        </li>
                        <li><a href="/feedback" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                          <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle" class="overflow-hidden svg-vertical inline-block w-[15.75px] h-[14px]" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.054-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.952 83.154 0l239.94 416.028zm-27.658 15.991l-240-416c-6.16-10.678-21.583-10.634-27.718 0l-240 416C27.983 466.678 35.731 480 48 480h480c12.323 0 19.99-13.369 13.859-23.996zM288 372c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28zm-11.49-212h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM288 372c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z"></path>
                        </svg>
                          Đóng góp ý kiến</a>
                        </li>
                        <li><a href="{{ route('Client.account.logout') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">
                          <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sign-out" class="w-[14px] h-[14px] overflow-hidden svg-vertical inline-block mr-2.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M48 64h132c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H48c-8.8 0-16 7.2-16 16v288c0 8.8 7.2 16 16 16h132c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48zm279 19.5l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l132 131.4H172c-6.6 0-12 5.4-12 12v10c0 6.6 5.4 12 12 12h279.9L320 404.4c-4.7 4.7-4.7 12.3 0 17l7.1 7.1c4.7 4.7 12.3 4.7 17 0l164.5-164c4.7-4.7 4.7-12.3 0-17L344 83.5c-4.7-4.7-12.3-4.7-17 0z"></path>
                        </svg>
                          Đăng xuất</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  @else
                  <a href="{{ route('Client.account.login') }}" class="flex flex-col items-center text-gray-800">
                    <button class="text-sm bg-red-500 p-2 rounded-lg px-3 text-white">Đăng nhập</button>
                  </a>
                  @endif
        
        
        
        
                  <a href="/gio-hang" class="flex flex-col items-center text-gray-800 relative">
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="shopping-cart" class="overflow-hidden svg-vertical inline-block w-[22.5px] h-[20px] text-[20px]" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M551.991 64H129.28l-8.329-44.423C118.822 8.226 108.911 0 97.362 0H12C5.373 0 0 5.373 0 12v8c0 6.627 5.373 12 12 12h78.72l69.927 372.946C150.305 416.314 144 431.42 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-17.993-7.435-34.24-19.388-45.868C506.022 391.891 496.76 384 485.328 384H189.28l-12-64h331.381c11.368 0 21.177-7.976 23.496-19.105l43.331-208C578.592 77.991 567.215 64 551.991 64zM240 448c0 17.645-14.355 32-32 32s-32-14.355-32-32 14.355-32 32-32 32 14.355 32 32zm224 32c-17.645 0-32-14.355-32-32s14.355-32 32-32 32 14.355 32 32-14.355 32-32 32zm38.156-192H171.28l-36-192h406.876l-40 192z"></path>
                    </svg>
                    <span class="absolute bottom-3 left-3 bg-red-600 text-white text-xs rounded-full px-1"> {{$totalCart}} </span>
                  </a>
                </div>
              </nav>
            </div>
            </nav>
            <div class="chat-widget">
              <div class="chat-icon" id="chatIcon">
                  <img src="{{ asset('users->image') }}" alt="Chat">
                  <div class="notification-badge" id="notificationBadge" style="display: none;">0</div>
              </div>
              <!-- Cửa sổ chat -->
              <div class="chat-popup" id="chatPopup" style="display: none;">
                  <div class="chat-header">
                      <h3>Xin chào 👋</h3>
                      <p>Hãy hỏi bất cứ điều gì hoặc chia sẻ phản hồi của bạn.</p>
                  </div>
                  <div class="chat-body">
                      <h4>Danh sách hội thoại</h4>
                      <div class="chat-conversation">
                          <p><strong>DATCH FASHION</strong></p>
                          <p>Xin chào 👋, Datch Fashion có thể giúp.</p>
                      </div>
                  </div>
                  <div class="chat-footer">
                      <button id="newConversation">Hội thoại mới</button>
                  </div>
              </div>
          </div>
  <!-- Loading overlay -->
  <div id="loading-overlay">
    <img src="{{asset('assets/admin/img/logDatch.png')}}" alt="" width="300px" id="loading-logo">
  </div>

  <!-- Nội dung trang web -->
  <div id="content" style="display:none;">
    <!-- Nội dung chính của trang -->
  </div>

  <script>
    // Script để ẩn overlay sau khi trang tải xong
    window.addEventListener("load", function() {
      document.getElementById("loading-overlay").style.display = "none";
      document.getElementById("content").style.display = "block";
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const chatIcon = document.getElementById('chatIcon');
        const chatPopup = document.getElementById('chatPopup');

        // Hiển thị/ẩn popup chat khi nhấp vào biểu tượng
        chatIcon.addEventListener('click', function () {
            if (chatPopup.style.display === 'none') {
                chatPopup.style.display = 'block';
            } else {
                chatPopup.style.display = 'none';
            }
        });

        // Tải số lượng tin nhắn chưa đọc
        fetch('/account/chat/unread-count')
            .then(response => response.json())
            .then(data => {
                const badge = document.getElementById('notificationBadge');
                if (data.unread_count > 0) {
                    badge.style.display = 'flex';
                    badge.innerText = data.unread_count;
                }
            });
    });
    document.getElementById('newConversation').addEventListener('click', function () {
    window.location.href = '/account/chat'; // Chuyển đến giao diện chat đầy đủ
});
document.getElementById('chatIcon').addEventListener('click', function() {
    var chatBubble = document.getElementById('chatBubble');
    if (chatBubble.style.display === 'block') {
        chatBubble.style.display = 'none';
    } else {
        chatBubble.style.display = 'block';
    }
});

</script>


        </div>
        



   



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#search-box').on('keyup', function() {
        let query = $(this).val();

        if (query.length > 1) {
          $.ajax({
            url: "{{ route('autocomplete') }}", // Đảm bảo đây là đường dẫn đúng tới API autocompletion
            type: "GET",
            data: {
              query: query
            },
            success: function(data) {
              let suggestions = $('#suggestions');
              suggestions.empty().show();

              if (data.length > 0) {
                data.forEach(function(product) {
                  // Làm nổi bật từ khóa trong tên sản phẩm
                  let highlightedName = product.name.replace(
                    new RegExp(query, "gi"),
                    (match) => `<strong>${match}</strong>`
                  );

                  // Sử dụng slug thay vì id để tạo đường dẫn
                  suggestions.append(`
                  <div style="padding: 10px; border-bottom: 1px solid #eee;">
                    <a href="/product/${product.slug}" class="flex items-center">
                      <img src="${product.image}" alt="${product.name}" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
                      <div>
                        <div class="search-price">${highlightedName}</div>
                        <div style="color:#d70018">${product.price}đ</div>
                      </div>
                    </a>
                  </div>
                `);
                });
              } else {
                suggestions.append('<div style="padding: 10px;">Không tìm thấy sản phẩm</div>');
              }
            }
          });
        } else {
          $('#suggestions').hide();
        }
      });
    });
    document.getElementById('dropdownHoverButton').addEventListener('mouseenter', showDropdownMenu);

document.querySelector('.dropdown').addEventListener('mouseleave', hideDropdownMenu);

function showDropdownMenu() {
    document.getElementById('menu-container').classList.remove('hidden');
}

function hideDropdownMenu() {
    document.getElementById('menu-container').classList.add('hidden');
}

// Hiển thị danh mục con khi di chuột vào danh mục cha
function showSubcategories(categoryId, categoryName) {
    const subcategoryList = document.getElementById('subcategory-list');
    subcategoryList.innerHTML = '';

    // Tạo tiêu đề danh mục cha
    const parentCategoryItem = document.createElement('li');    
    parentCategoryItem.className = 'font-bold px-4 py-2 text-gray-700';
    parentCategoryItem.textContent = categoryName;
    subcategoryList.appendChild(parentCategoryItem);

    // Lấy danh sách danh mục con
    const categories = @json($categories);
    const parentCategory = categories.find(cat => cat.id === categoryId);
    if (parentCategory && parentCategory.sub) {
        parentCategory.sub.forEach(subcat => {
            const li = document.createElement('li');
            li.className = 'hover:bg-gray-100';
            
            const a = document.createElement('a');
            a.href = `/cua-hang/danh-muc/${subcat.id}`;
            a.className = 'block px-4 py-2 text-gray-700';
            a.textContent = subcat.name;
            
            li.appendChild(a);
            subcategoryList.appendChild(li);
        });
    }
}

  </script>
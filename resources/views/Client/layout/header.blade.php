<!doctype html>
<html>
    
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{asset('assets/clinet/css/styles.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <title>@yield('title') - Datch</title>
  <link rel="icon" type="image/x-icon" href="/favicon.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{asset('assets/client//assets/css/styles.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/assets/css/styles-be.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

</head>

<body>
  <div class="max-w-screen-xl mx-auto ">
        <div class="header">
          <nav class="flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <div class="">
                    <img src="{{asset('assets/admin/img/Datch.png')}}" alt="" width="150px" >
                </div>
                <a href="#" class="text-gray-800 font-semibold">SALE</a>
                <a href="#" class="text-gray-800 font-semibold">SẢN PHẨM MỚI</a>
                <a href="#" class="text-gray-800 font-semibold">NỮ</a>
                <a href="#" class="text-gray-800 font-semibold">NAM</a>
                <a href="#" class="text-gray-800 font-semibold">BÉ GÁI</a>
                <a href="#" class="text-gray-800 font-semibold">BÉ TRAI</a>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Tìm kiếm" class="pl-10 pr-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-gray-300">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <a href="/cua-hang" class="flex flex-col items-center text-gray-800">
                  <i class="fa-solid fa-shop"></i>
                    <span class="text-sm">Cửa hàng</span>
                </a>
                <a href="/tai-khoan" class="flex flex-col items-center text-gray-800">
                    <i class="fas fa-user text-xl"></i>
                    <span class="text-sm">Tài khoản</span>
                </a>
                <a href="/gio-hang" class="flex flex-col items-center text-gray-800 relative">
                    <i class="fas fa-shopping-bag text-xl"></i>
                    <span class="text-sm">Giỏ hàng</span>
                    <span class="absolute top-0 right-0 bg-red-600 text-white text-xs rounded-full px-1">0</span>
                </a>
            </div>
        </nav>
        </div>
  </div>
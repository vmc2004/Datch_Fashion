<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{asset('assets/admin/img/logDatch.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{asset('assets/clinet/css/styles.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <title>@yield('title') - Datch</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{asset('assets/client//assets/css/styles.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/assets/css/styles-be.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

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
  </style>

</head>

<body>

  <div class="max-w-screen-xl mx-auto ">

    <div class="header">
      <nav class="flex items-center justify-between">
        <div class="flex items-center space-x-8">
          <div class="">
            <a href="/">
              <img src="{{asset('assets/admin/img/Datch.png')}}" alt="" width="150px">
            </a>
          </div>
          <a href="/" class="text-gray-800 font-semibold">Trang chủ</a>
          <a href="/cua-hang" class="text-gray-800 font-semibold">Danh mục sản phẩm</a>
          <a href="#" class="text-gray-800 font-semibold">Sale</a>
          <a href="/blog" class="text-gray-800 font-semibold">Tin hot</a>
          <a href="/lien-he" class="text-gray-800 font-semibold">Liên hệ</a>
        </div>
        <div class="flex items-center space-x-4">
          <form action="{{ route('search') }}" method="GET">
            <div class="relative">
              <input type="text" placeholder="Tìm kiếm" class="pl-10 pr-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-gray-300" id="search-box" name="query" autocomplete="off">
              <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
              <button type="submit">Tìm kiếm</button>

            </div>
          </form>


          <div id="suggestions" style="border: 1px solid #ccc; max-width: 300px;"></div>
          @if (Auth::check())
          <a href="/tai-khoan" class="flex flex-col items-center text-gray-800">
            <i class="fas fa-user text-xl"></i>
            <span class="text-sm">Tài khoản</span>
          </a>
          @else
          <a href="{{ route('Client.account.login') }}" class="flex flex-col items-center text-gray-800">
            <i class="fas fa-user text-xl"></i>
            <span class="text-sm">Đăng nhập</span>
          </a>
          @endif

          <a href="/gio-hang" class="flex flex-col items-center text-gray-800 relative">
            <i class="fas fa-shopping-bag text-xl"></i>
            <span class="text-sm">Giỏ hàng</span>
            <span class="absolute top-0 right-0 bg-red-600 text-white text-xs rounded-full px-1">0</span>
          </a>
        </div>
      </nav>
    </div>


    </nav>
  </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#search-box').on('keyup', function() {
        let query = $(this).val();

        if (query.length > 1) {
          $.ajax({
            url: "{{ route('autocomplete') }}",
            type: "GET",
            data: {
              query: query
            },
            success: function(data) {
              let suggestions = $('#suggestions');
              suggestions.empty().show();

              if (data.length > 0) {
                data.forEach(function(product) {
                  suggestions.append(`<div><a href="/product/${product.id}">${product.name}</a></div>`);
                });
              } else {
                suggestions.append('<div>Không tìm thấy sản phẩm</div>');
              }
            }
          });
        } else {
          $('#suggestions').hide();
        }
      });
    });
  </script>
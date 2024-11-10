<!doctype html>
<html>

<head>
<<<<<<< HEAD
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
  <!-- Thêm vào trong <head> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

  <!-- Thêm vào trước thẻ </body> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

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
      z-index: 10;
      /* Đảm bảo nó nằm trên các phần tử khác */
    }
  </style>
=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/logDatch.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/clinet/css/styles.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>@yield('title') - Datch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/client/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/assets/css/styles-be.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
>>>>>>> bb2eaedb373b40a161075eb4034afec7a872947b

</head>

<body>
<<<<<<< HEAD

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
              <button type="submit">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
              </button>
              <!-- Gợi ý hiển thị dưới ô tìm kiếm -->
              <div id="suggestions" class="absolute bg-white border border-gray-200 rounded-lg mt-1 w-full max-h-60 overflow-y-auto z-10 hidden"></div>
            </div>
          </form>

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
  </script>
=======
    <div class="max-w-screen-xl mx-auto ">
        <div class="header">
            <nav class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <div class="">
                        <a href="/">
                            <img src="{{ asset('assets/admin/img/Datch.png') }}" alt="" width="150px">
                        </a>
                    </div>
                    <a href="/" class="text-gray-800 font-semibold">Trang chủ</a>
                    <a href="/cua-hang" class="text-gray-800 font-semibold">Danh mục sản phẩm</a>
                    <a href="#" class="text-gray-800 font-semibold">Sale</a>
                    <a href="/blog" class="text-gray-800 font-semibold">Tin hot</a>
                    <a href="/lien-he" class="text-gray-800 font-semibold">Liên hệ</a>
                </div>
<<<<<<< HEAD
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Tìm kiếm"
                            class="pl-10 pr-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-gray-300">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>

                    @if (Auth::check())
                        <a href="/tai-khoan" class="flex flex-col items-center text-gray-800">
                            <i class="fas fa-user text-xl"></i>
                            <span class="text-sm">Tài khoản</span>
                        </a>
                    @else
                        @if (Auth::check())
                            <a href="{{ route('Client.account.login') }}"
                                class="flex flex-col items-center text-gray-800">
                                <i class="fas fa-user text-xl"></i>
                                <span class="text-sm">{{ Auth::user()->fullname }}</span>
                            </a>
                        @else
                            <a href="{{ route('Client.account.login') }}"
                                class="flex flex-col items-center text-gray-800">
                                <i class="fas fa-user text-xl"></i>
                                <span class="text-sm">Đăng nhập</span>
                            </a>
                        @endif

                    @endif
                    <a href="/gio-hang" class="flex flex-col items-center text-gray-800 relative">
                        <i class="fas fa-shopping-bag text-xl"></i>
                        <span class="text-sm">Giỏ hàng</span>
                        <span class="absolute top-0 right-0 bg-red-600 text-white text-xs rounded-full px-1">0</span>
                    </a>
=======
                <a href="/" class="text-gray-800 font-semibold">Trang chủ</a>
                <a href="/cua-hang" class="text-gray-800 font-semibold">Danh mục sản phẩm</a>
                <a href="#" class="text-gray-800 font-semibold">Sale</a>
                <a href="{{route('client.blog')}}" class="text-gray-800 font-semibold">Tin hot</a>
                <a href="/lien-he" class="text-gray-800 font-semibold">Liên hệ</a>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Tìm kiếm" class="pl-10 pr-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-gray-300">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
>>>>>>> d992d9b8f4bb5b3a5cee2b8c5a894eb96c187446
                </div>
            </nav>
        </div>
    </div>
>>>>>>> bb2eaedb373b40a161075eb4034afec7a872947b

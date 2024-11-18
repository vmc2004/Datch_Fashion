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

  <link rel="stylesheet" href="{{asset('assets/client//assets/css/styles.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/assets/css/styles-be.css')}}">

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

    /* Để menu ẩn mặc định */
    .menu {
      opacity: 0;
      visibility: hidden;
      top: 20px;
      left: 5px;
    }

    .menu.show {
      opacity: 1;
      visibility: visible;
    }
  </style>

</head>

<body>

  <!-- Loading overlay -->
  <div id="loading-overlay">
    <img src="{{asset('assets/admin/img/Datch.png')}}" alt="" width="300px" id="loading-logo">
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

          <div class="max-w-screen-xl mx-auto ">

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
              <div class="relative menucha" id="accountMenu">
                <!-- Link hồ sơ người dùng -->
                <a href="/tai-khoan" class="flex items-center text-gray-800">
                  <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/client/images/no-avatar.svg') }}" alt="Avatar User" width="30">
                  <span class="text-sm">{{ Auth::user()->fullname }}</span>
                </a>
                <!-- Menu Dropdown -->
                <div class="menu absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg z-20 opacity-0 invisible transition-opacity duration-300" id="dropdownMenu">
                  <ul class="py-2">
                    <li><a href="/ho-so-cua-toi" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Hồ sơ của tôi</a></li>
                    <li><a href="/tin-nhan" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Tin nhắn</a></li>
                    <li><a href="/tien-cua-ban" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Tiền của bạn</a></li>
                    <li><a href="/yeu-thich" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Yêu thích</a></li>
                    <li><a href="/don-mua" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Đơn mua</a></li>
                    <li><a href="/danh-gia-cua-toi" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Đánh giá của tôi</a></li>
                    <li><a href="/tro-giup" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Trung tâm trợ giúp</a></li>
                    <li><a href="/dong-gop-y-kien" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Đóng góp ý kiến</a></li>
                  </ul>
                </div>
              </div>
              @else
              <a href="{{ route('Client.account.login') }}" class="flex flex-col items-center text-gray-800">
                <button class="text-sm bg-red-500 p-2 rounded-lg px-3 text-white">Đăng nhập</button>
              </a>
              @endif




              <a href="/gio-hang" class="flex flex-col items-center text-gray-800 relative">
                <i class="fas fa-shopping-bag fa-xl"></i>
                <span class="absolute bottom-1 left-3 bg-red-600 text-white text-xs rounded-full px-1"> {{$totalCart}} </span>
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

    document.addEventListener('DOMContentLoaded', function() {
      const accountMenu = document.getElementById('accountMenu');
      const dropdownMenu = document.getElementById('dropdownMenu');

      // Hiển thị menu khi chuột vào
      accountMenu.addEventListener('mouseenter', function() {
        dropdownMenu.classList.add('show');
      });

      // Ẩn menu khi chuột rời khỏi toàn bộ vùng
      accountMenu.addEventListener('mouseleave', function() {
        dropdownMenu.classList.remove('show');
      });
    });
  </script>
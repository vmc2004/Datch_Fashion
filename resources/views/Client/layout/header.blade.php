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
          <a href="#" class="text-gray-800 font-semibold">SALE</a>
          <a href="#" class="text-gray-800 font-semibold">SẢN PHẨM MỚI</a>
          <a href="#" class="text-gray-800 font-semibold">NỮ</a>
          <a href="#" class="text-gray-800 font-semibold">NAM</a>
          <a href="#" class="text-gray-800 font-semibold">BÉ GÁI</a>
          <a href="#" class="text-gray-800 font-semibold">BÉ TRAI</a>
        </div>
        <div class="flex items-center space-x-4">
          <div class="relative">
            <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm..." autocomplete="off" class="pl-10 pr-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-gray-300">
            <div id="suggestions" style="border: 1px solid #ccc; max-width: 300px;"></div>
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
          </div>
          <a href="/cua-hang" class="flex flex-col items-center text-gray-800 mt-2">
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#search-input').on('keyup', function() {
        let query = $(this).val();
        if (query.length > 1) { // Gợi ý sau khi người dùng nhập từ 2 ký tự trở lên
          $.ajax({
            url: "{{ route('products.autocomplete') }}",
            type: 'GET',
            data: {
              query: query
            },
            success: function(data) {
              $('#suggestions').empty(); // Xóa gợi ý cũ
              if (data.length > 0) {
                data.forEach(product => {
                  $('#suggestions').append(`<p>${product.name}</p>`);
                });
              } else {
                $('#suggestions').append('<p>Không có kết quả</p>');
              }
            }
          });
        } else {
          $('#suggestions').empty(); // Xóa gợi ý nếu từ khóa quá ngắn
        }
      });

      // Ẩn gợi ý khi nhấn ngoài vùng tìm kiếm
      $(document).on('click', function(event) {
        if (!$(event.target).closest('#search-input').length) {
          $('#suggestions').empty();
        }
      });
    });
  </script>
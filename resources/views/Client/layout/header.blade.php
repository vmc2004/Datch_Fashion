<!doctype html>
<html>

<head>
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

</head>

<body>
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
                    <div class="relative group">
                        <!-- Liên kết "Danh mục sản phẩm" -->
                        <a href="/cua-hang" class="text-gray-800 font-semibold">
                            Danh mục sản phẩm
                        </a>
                    
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu hidden absolute bg-white shadow-lg rounded-lg left-0  w-[400px] group-hover:block" id="menu-container" onmouseenter="showDropdownMenu()" onmouseleave="hideDropdownMenu()">
                            <div class="flex">
                                <!-- Lề bên trái - Danh mục chính -->
                                <ul class="py-2 w-1/4 text-sm text-gray-700 border-r border-gray-300">
                                    @foreach ($categories as $cat)
                                    <li class="hover:bg-gray-100 relative" onmouseenter="showSubcategories({{ $cat->id }}, '{{ $cat->name }}')">
                                        <a href="/cua-hang/danh-muc/{{$cat->id}}" class="font-bold block px-4 py-2">
                                            @if ($cat->parent_id == 0)
                                                {{$cat->name}}
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
                    
                    <a href="#" class="text-gray-800 font-semibold">Sale</a>
                    <a href="/blog" class="text-gray-800 font-semibold">Tin hot</a>
                    <a href="/lien-he" class="text-gray-800 font-semibold">Liên hệ</a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Tìm kiếm"
                            class="pl-10 pr-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-gray-300">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>

                    {{-- @if (Auth::check())
                        <a href="/tai-khoan" class="flex flex-col items-center text-gray-800">
                            <i class="fas fa-user text-xl"></i>
                            <span class="text-sm">Tài khoản</span>
                        </a>
                    @else --}}
                        @if (Auth::check())
                            <a href="/tai-khoan"
                                class="flex  items-center text-gray-800 ">
                                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/client/images/no-avatar.svg') }}" alt="Avatar User" width="30">
                                <span class="text-sm">{{ Auth::user()->fullname }}</span>
                            </a>
                        @else
                            <a href="{{ route('Client.account.login') }}"
                                class="flex flex-col items-center text-gray-800">
                                <button class="text-sm bg-red-500 p-2 rounded-lg px-3 text-white">Đăng nhập</button>
                            </a>
                        @endif

                        <a href="/gio-hang" class="flex flex-col items-center text-gray-800 relative">
                            <i class="fas fa-shopping-bag fa-xl"></i>
                            <span class="absolute bottom-1 left-3 bg-red-600 text-white text-xs rounded-full px-1"> {{$totalCart}} </span>
                        </a>
{{-- =======
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
>>>>>>> d992d9b8f4bb5b3a5cee2b8c5a894eb96c187446 --}}
                </div>
            </nav>
        </div>
    </div>
<script>
      // Hiển thị menu khi di chuột vào "Danh mục sản phẩm"
document.getElementById('dropdownHoverButton').addEventListener('mouseenter', showDropdownMenu);

// Ẩn menu khi chuột rời khỏi toàn bộ dropdown
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/logoDatch.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/logDatch.png') }}">

    <title>@yield('title')</title>

    @yield('style')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    
    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/admin/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    
    <!-- Datepicker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    
    <!-- Morris.js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    
    <!-- Perfect Scrollbar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.3/css/perfect-scrollbar.min.css">
    
    <style>
        /* Hide overflow for the sidebar */
        .nav .collapse {
            transition: max-height 0.3s ease-out;
            overflow: hidden;
        }
    </style>
</head>


<body class="g-sidenav-show bg-light">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 fixed-start "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('admin.index') }}" target="_blank">
                <img src="{{ asset('assets/admin/img/Datch.png') }}" class="navbar-brand-img" alt="main_logo"
                    width="50
        ">
        <span class="ms-1 font-weight-bold">Datch Admin</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse h-auto w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('admin.index')}}">
            <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target="#productManagement" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 512">
                            <path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0l12.6 0c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7 480 448c0 35.3-28.7 64-64 64l-192 0c-35.3 0-64-28.7-64-64l0-250.3-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0l12.6 0z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý sản phẩm</span>
                </div>
            </a>
            <ul class="nav flex-column ms-4 collapse" id="productManagement">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                <path d="M40 48C26.7 48 16 58.7 16 72l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24L40 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM16 232l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Danh mục</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('brands.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                                <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM199.4 312.6c-31.2-31.2-31.2-81.9 0-113.1s81.9-31.2 113.1 0c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9c-50-50-131-50-181 0s-50 131 0 181s131 50 181 0c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0c-31.2 31.2-81.9 31.2-113.1 0z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Thương hiệu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/products') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="17.5" viewBox="0 0 640 512">
                                <path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0l12.6 0c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7 480 448c0 35.3-28.7 64-64 64l-192 0c-35.3 0-64-28.7-64-64l0-250.3-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0l12.6 0z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Sản phẩm</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('comments.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9l.3-.5z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Bình luận</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target="#attributeManagement" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512">
                            <path d="M0 80L0 229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7L48 32C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý thuộc tính</span>
                </div>
            </a>
            <ul class="nav flex-column ms-4 collapse" id="attributeManagement">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('colors.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 384 512">
                                <path d="M192 512C86 512 0 426 0 320C0 228.8 130.2 57.7 166.6 11.7C172.6 4.2 181.5 0 191.1 0l1.8 0c9.6 0 18.5 4.2 24.5 11.7C253.8 57.7 384 228.8 384 320c0 106-86 192-192 192zM96 336c0-8.8-7.2-16-16-16s-16 7.2-16 16c0 61.9 50.1 112 112 112c8.8 0 16-7.2 16-16s-7.2-16-16-16c-44.2 0-80-35.8-80-80z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Màu sắc</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sizes.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 448 512">
                                <path d="M0 80L0 229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7L48 32C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Kích thước</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('orders.index')}}">
                <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                        <path d="M64 256l0-96 160 0 0 96L64 256zm0 64l160 0 0 96L64 416l0-96zm224 96l0-96 160 0 0 96-160 0zM448 256l-160 0 0-96 160 0 0 96zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32z"/>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">Đơn hàng</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target="#blogManagement" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý bài viết</span>
                </div>
            </a>
            <ul class="nav flex-column ms-4 collapse" id="blogManagement">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blogs.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg class="text-dark" width="16px" height="16px" viewBox="0 0 512 512">
                                <path d="M512 56V456c0 4.4-3.6 8-8 8H8c-4.4 0-8-3.6-8-8V56c0-4.4 3.6-8 8-8h496c4.4 0 8 3.6 8 8zm-200 296H56V160h256v192zm80-192h56v192h-56V160zM56 448h336V352H56v96zM456 352v96H168v-96h288z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Danh sách bài viết</span>

                    </a>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs.create') }}">
                    <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                            <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Tạo bài viết</span>
                </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target="#customerManagement" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512">
                            <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý khách hàng</span>
                </div>
            </a>
            <ul class="nav flex-column ms-4 collapse" id="customerManagement">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512">
                                <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Danh sách khách hàng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.create') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Thêm thành viên mới</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target="#BannerManagement" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                            <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý Banner</span>
                </div>
            </a>
            <ul class="nav flex-column ms-4 collapse" id="BannerManagement">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('banners.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="15.75" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z"/></svg>
                        </div>
                        <span class="nav-link-text ms-1">Banner</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('banners.create') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Tạo Banner</span>
                    </a>
                </li>
            </ul>
        </li>

        
        
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target="#CounponsManagement" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512">
                            <path d="M64 64C28.7 64 0 92.7 0 128l0 64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320l0 64c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-64c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.9 15.7-18.6l0-64c0-35.3-28.7-64-64-64L64 64zm512 128l0 32c0 5.7-3.7 10.8-8.9 12.8c-12.5 4.5-22.1 12.6-28.2 22.7c-8.7 15.6-14.3 33.8-14.3 52.4c0 18.7 5.4 37.6 14.3 53.2c6.1 10.1 15.7 18.2 28.2 22.7c5.2 2 8.9 7.1 8.9 12.8l0 32H64l0-32c0-5.7 3.7-10.8 8.9-12.8C85.5 294.9 96 277 96 256s-10.5-38.9-23.1-45.4c-5.2-2-8.9-7.1-8.9-12.8l0-32l448 0z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý Giảm giá</span>
                </div>
            </a>
            <ul class="nav flex-column ms-4 collapse" id="CounponsManagement">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coupons.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512">
                                <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Danh sách Giảm giá</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coupons.create') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Thêm Giảm giá</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target="#RolesManagement" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        
                    </div>
                    <span class="nav-link-text ms-1">Quản lý phân quyền</span>
                </div>
            </a>
            <ul class="nav flex-column ms-4 collapse" id="RolesManagement">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <div class="icon icon-shape border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 640 512">
                                <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Phân quyền</span>
                    </a>
                </li>
                
            </ul>
        </li>
        

        
            </ul>
        </div>

    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">@yield('title-page')
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">@yield('single-page')</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            @if (Auth::check())
                                <img src="{{ Auth::user()->avatar ? '/uploads/' . Auth::user()->avatar : '/assets/images/no-avatar.svg' }}" alt="Avatar Admin"
                                    class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                <a href="/admin/users/profile" class="nav-link text-white font-weight-bold px-0">
                                    {{ Auth::user()->fullname }} <!-- Hiển thị tên người dùng -->
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link text-white font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    Đăng nhập
                                </a>
                            @endif
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <i class="fa fa-cog"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        
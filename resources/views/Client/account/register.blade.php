<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <style>
        /* Tùy chỉnh khung */
        .login-frame {
            border: 2px solid #d1d5db;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }
    </style>
</head>

<body>
    <div class="font-[sans-serif] bg-gray-100 min-h-screen flex items-center justify-center">
        <!-- Khung bao quanh toàn bộ nội dung -->
        <div class="login-frame bg-white md:h-auto md:w-3/4 lg:w-1/2 flex flex-col md:flex-row items-center md:items-stretch">
            <!-- Phần hình ảnh -->
            <div class="p-4 bg-gray-50 w-full md:w-1/2 flex items-center">
                <img src="https://readymadeui.com/signin-image.webp" class="lg:max-w-[90%] w-full h-full object-contain block mx-auto" alt="login-image" />
            </div>

            <!-- Form đăng ký nhỏ gọn -->
            <div class="flex items-center p-6 h-full w-full md:w-1/2">
                <form action="{{ route('showRegisterForm') }}" method="POST" class="max-w-sm w-full mx-auto">
                    @csrf
                    <div class="mb-8 text-center">
                        <h3 class="text-blue-500 text-2xl font-extrabold">Đăng kí</h3>
                    </div>

                    @if (session('message'))
                    <div class="{{ session('message_type') == 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700' }} px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">{{ session('message_type') == 'success' }}</strong>
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif

                    <div class="mt-3">
                        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Họ tên *</label>
                        <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="fullname" required="">
                    </div>
                    <div class="mt-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email *</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com" required="">   
                    </div>

                    <div class="mt-3">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu *</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        
                    </div>
                    <div class="mt-3">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Xác nhận mật khẩu *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        
                    </div>

                    <div class="flex items-center mt-6">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 rounded" />
                        <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                            Tôi chấp nhận các <a href="javascript:void(0);" class="text-blue-500 font-semibold hover:underline">Điều khoản và Điều kiện</a>
                        </label>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full py-2 px-4 text-sm font-semibold rounded-md bg-blue-600 hover:bg-blue-700 text-white focus:outline-none">
                            Đăng kí
                        </button>
                        <p class="text-sm mt-6 text-gray-800 text-center">Đã có tài khoản ? <a href="{{ route('Client.account.login') }}" class="text-blue-500 font-semibold hover:underline">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<div class="text-sm hidden md:block">
    
    <a class="flex my-1.5 text-black hover:text-blue-700 items-center rounded-r-full bg-white sidebar-nav sidebar-nav-active" href="/tai-khoan">
        <img
            class="w-14 h-14 object-cover rounded-full mr-2"
            src="{{ Auth::user()->avatar ? '/uploads/' . Auth::user()->avatar : '/assets/images/no-avatar.svg' }}"
            alt="Avatar"
        >
        <span class="py-2 font-bold">
            {{Auth::user()->fullname}}
        </span>
    </a>
    <a class="flex my-1.5 text-black hover:text-blue-700 items-center sidebar-nav" href="/tai-khoan">
        <span class="mr-2.5 ml-4">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user-circle" class="overflow-hidden svg-vertical inline-block w-[14px] h-[14px]" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm128 421.6c-35.9 26.5-80.1 42.4-128 42.4s-92.1-15.9-128-42.4V416c0-35.3 28.7-64 64-64 11.1 0 27.5 11.4 64 11.4 36.6 0 52.8-11.4 64-11.4 35.3 0 64 28.7 64 64v13.6zm30.6-27.5c-6.8-46.4-46.3-82.1-94.6-82.1-20.5 0-30.4 11.4-64 11.4S204.6 320 184 320c-48.3 0-87.8 35.7-94.6 82.1C53.9 363.6 32 312.4 32 256c0-119.1 96.9-216 216-216s216 96.9 216 216c0 56.4-21.9 107.6-57.4 146.1zM248 120c-48.6 0-88 39.4-88 88s39.4 88 88 88 88-39.4 88-88-39.4-88-88-88zm0 144c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z"></path>
            </svg>
        </span>
        <span class="py-2">
            Hồ sơ của tôi
        </span>
    </a>
    <a class="flex my-1.5 text-black hover:text-blue-700 items-center sidebar-nav" href="/account/orders">
        <span class="mr-2.5 ml-4">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="shopping-cart" class="overflow-visible w-3.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M551.991 64H129.28l-8.329-44.423C118.822 8.226 108.911 0 97.362 0H12C5.373 0 0 5.373 0 12v8c0 6.627 5.373 12 12 12h78.72l69.927 372.946C150.305 416.314 144 431.42 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-17.993-7.435-34.24-19.388-45.868C506.022 391.891 496.76 384 485.328 384H189.28l-12-64h331.381c11.368 0 21.177-7.976 23.496-19.105l43.331-208C578.592 77.991 567.215 64 551.991 64zM240 448c0 17.645-14.355 32-32 32s-32-14.355-32-32 14.355-32 32-32 32 14.355 32 32zm224 32c-17.645 0-32-14.355-32-32s14.355-32 32-32 32 14.355 32 32-14.355 32-32 32zm38.156-192H171.28l-36-192h406.876l-40 192z"></path></svg>
        </span>
        <span class="py-2">
            Đơn mua
        </span>
    </a>
     {{-- <a class="flex my-1.5 text-black hover:text-blue-700 items-center sidebar-nav" href="/account/chat">

        <span class="mr-2.5 ml-4">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="comments" class="overflow-visible w-3.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M532 386.2c27.5-27.1 44-61.1 44-98.2 0-80-76.5-146.1-176.2-157.9C368.4 72.5 294.3 32 208 32 93.1 32 0 103.6 0 192c0 37 16.5 71 44 98.2-15.3 30.7-37.3 54.5-37.7 54.9-6.3 6.7-8.1 16.5-4.4 25 3.6 8.5 12 14 21.2 14 53.5 0 96.7-20.2 125.2-38.8 9.1 2.1 18.4 3.7 28 4.8 31.5 57.5 105.5 98 191.8 98 20.8 0 40.8-2.4 59.8-6.8 28.5 18.5 71.6 38.8 125.2 38.8 9.2 0 17.5-5.5 21.2-14 3.6-8.5 1.9-18.3-4.4-25-.5-.4-22.6-24.2-37.9-54.9zM142.2 311l-11.4 7.4c-20.1 13.1-50.5 28.2-87.7 32.5 8.8-11.3 20.2-27.6 29.5-46.4L83 283.7l-16.5-16.3C50.7 251.9 32 226.2 32 192c0-70.6 79-128 176-128s176 57.4 176 128-79 128-176 128c-17.7 0-35.4-2-52.6-6l-13.2-3zm303 103.4l-11.4-7.4-13.2 3.1c-17.2 4-34.9 6-52.6 6-65.1 0-122-25.9-152.4-64.3C326.9 348.6 416 278.4 416 192c0-9.5-1.3-18.7-3.3-27.7C488.1 178.8 544 228.7 544 288c0 34.2-18.7 59.9-34.5 75.4L493 379.7l10.3 20.7c9.4 18.9 20.8 35.2 29.5 46.4-37.1-4.2-67.5-19.4-87.6-32.4zm-37.8-267.7c.1.2.1.4.2.6-.1-.2-.1-.4-.2-.6z"></path></svg>
        </span>
        <span class="py-2">
            Tin nhắn
        </span>
    </a>  --}}
    
    <a href="{{ route('notifications.index') }}" class="flex my-1.5 text-black hover:text-blue-700 items-center sidebar-nav">
        <span class="mr-2.5 ml-4">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bell" class="overflow-visible w-3.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M224 480c-17.66 0-32-14.38-32-32.03h-32c0 35.31 28.72 64.03 64 64.03s64-28.72 64-64.03h-32c0 17.65-14.34 32.03-32 32.03zm209.38-145.19c-27.96-26.62-49.34-54.48-49.34-148.91 0-79.59-63.39-144.5-144.04-152.35V16c0-8.84-7.16-16-16-16s-16 7.16-16 16v17.56C127.35 41.41 63.96 106.31 63.96 185.9c0 94.42-21.39 122.29-49.35 148.91-13.97 13.3-18.38 33.41-11.25 51.23C10.64 404.24 28.16 416 48 416h352c19.84 0 37.36-11.77 44.64-29.97 7.13-17.82 2.71-37.92-11.26-51.22zM400 384H48c-14.23 0-21.34-16.47-11.32-26.01 34.86-33.19 59.28-70.34 59.28-172.08C95.96 118.53 153.23 64 224 64c70.76 0 128.04 54.52 128.04 121.9 0 101.35 24.21 138.7 59.28 172.08C421.38 367.57 414.17 384 400 384z"></path>
            </svg>
        </span>
        <span class="py-2">
            Thông báo
        </span>
        @if (isset($unreadNotificationsCount) && $unreadNotificationsCount > 0)
            <span class="ml-2 text-xs font-semibold text-red-500 bg-red-200 rounded-full px-2 py-1">
                {{ $unreadNotificationsCount }}
            </span>
        @endif
    </a>
    <a class="flex my-1.5 text-black hover:text-blue-700 items-center sidebar-nav" href="{{route('rate.list')}}">
        <span class="mr-2.5 ml-4">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="star" class="overflow-visible w-3.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM405.8 317.9l27.8 162L288 403.5 142.5 480l27.8-162L52.5 203.1l162.7-23.6L288 32l72.8 147.5 162.7 23.6-117.7 114.8z"></path></svg>
        </span>
        <span class="py-2">
            Đánh giá của tôi
        </span>
    </a>
 
    <h3 class="text-black mt-5 pt-5 border-t border-black">
        <strong>Cài đặt</strong>
    </h3>
    
    <a class="flex my-1.5 text-black hover:text-blue-700 items-center sidebar-nav" href="/feedback">
        <span class="mr-2.5 ml-4">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle" class="overflow-visible w-3.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.054-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.952 83.154 0l239.94 416.028zm-27.658 15.991l-240-416c-6.16-10.678-21.583-10.634-27.718 0l-240 416C27.983 466.678 35.731 480 48 480h480c12.323 0 19.99-13.369 13.859-23.996zM288 372c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28zm-11.49-212h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM288 372c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z"></path></svg>
        </span>
        <span class="py-2">
            Đóng góp ý kiến
        </span>
    </a>
    <a class="flex my-1.5 text-black hover:text-blue-700 items-center sidebar-nav" href="{{ route('Client.account.logout') }}">
        <span class="mr-2.5 ml-4">
            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sign-out" class="overflow-visible w-3.5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M48 64h132c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H48c-8.8 0-16 7.2-16 16v288c0 8.8 7.2 16 16 16h132c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48zm279 19.5l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l132 131.4H172c-6.6 0-12 5.4-12 12v10c0 6.6 5.4 12 12 12h279.9L320 404.4c-4.7 4.7-4.7 12.3 0 17l7.1 7.1c4.7 4.7 12.3 4.7 17 0l164.5-164c4.7-4.7 4.7-12.3 0-17L344 83.5c-4.7-4.7-12.3-4.7-17 0z"></path></svg>
        </span>
        <span class="py-2">
            Đăng xuất
        </span>
    </a>
</div>

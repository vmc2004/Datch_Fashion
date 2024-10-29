@extends('Client.layout.layout')

@section('title', "Trang chủ")


@section('content')
@include('Client.layout.slide')
<div class="max-w-screen-xl mx-auto py-8">
    <h2 class="text-2xl font-semibold text-left">Danh mục bạn yêu thích</h2>
    <div class="relative">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
          @foreach ($category as $cat)
          <div class="text-center">
            <div class="w-24 h-24 mx-auto rounded-full bg-white shadow-lg flex items-center justify-center">
                <img src="{{asset($cat->image)}}" alt="Ảnh danh mục {{$cat->name}}" class="w-16 h-16">
            </div>
            <p class="mt-2">{{$cat->name}}</p>
        </div>
          @endforeach
        </div>
    </div>
</div>
<div class="max-w-screen-xl mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4">Sản phẩm mới đăng</h2>
    <div class="relative">
        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($newPro as $new)
            <div class="h-full rounded-lg relative shadow-xl">
                <div class="absolute -left-[3.2px] top-2 z-10">
                    <div
                        class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                        <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                            <path fill="currentColor"
                                  d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                            </path>
                        </svg>
                        Freeship
                    </div>
                    <div
                        class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                    </div>
                </div>
                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                    <div class="overflow-hidden h-48">
                        <a href="/product/{{$new->slug}}">
                            <img class="hover:scale-110 duration-100"
                                 src="{{ asset('storage/' . $new->image) }}" alt="{{$new->slug}}">
                        </a>
                    </div>
                    <div class="bg-white p-2 flex flex-col space-y-2">
                        <div class="">
                            <div class="cursor-pointer">
                                <a class="text-slate-800" href=""> {{$new->name}} </a>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-slate-800">
                                {{ number_format($new->ProductVariants->first()?->price ?? 0) }} đ
                            </p>
                            <div class="flex gap-2 text-xs text-slate-700">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="size-4">
                                    <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                Hà Nội
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="max-w-screen-xl mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4">Sản phẩm nổi bật</h2>
    <div class="relative">
        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($Proview as $view)
            <div class="h-full rounded-lg relative shadow-xl">
                <div class="absolute -left-[3.2px] top-2 z-10">
                    <div
                        class="text-white text-xs bg-[#06a5a8] border border-solid border-transparent rounded-sm inline-block px-2">
                        <svg class="overflow-visible w-4 inline-block" viewBox="0 0 640 512">
                            <path fill="currentColor"
                                  d="M632 384h-24V275.9c0-16.8-6.8-33.3-18.8-45.2l-83.9-83.9c-11.8-12-28.3-18.8-45.2-18.8H416V78.6c0-25.7-22.2-46.6-49.4-46.6H49.4C22.2 32 0 52.9 0 78.6v290.8C0 395.1 22.2 416 49.4 416h16.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16h195.2c-1.1 5.2-1.6 10.5-1.6 16 0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H632c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM460.1 160c8.4 0 16.7 3.4 22.6 9.4l83.9 83.9c.8.8 1.1 1.9 1.8 2.8H416v-96h44.1zM144 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm63.6-96C193 364.7 170 352 144 352s-49 12.7-63.6 32h-31c-9.6 0-17.4-6.5-17.4-14.6V78.6C32 70.5 39.8 64 49.4 64h317.2c9.6 0 17.4 6.5 17.4 14.6V384H207.6zM496 480c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-128c-26.1 0-49 12.7-63.6 32H416v-96h160v96h-16.4c-14.6-19.3-37.5-32-63.6-32z">
                            </path>
                        </svg>
                        Freeship
                    </div>
                    <div
                        class="size-0 border-2 border-[#098E91] border-l-transparent border-b-transparent">
                    </div>
                </div>
                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                    <div class="overflow-hidden h-48">
                        <a href="/product/{{$view->slug}}">
                            <img class="hover:scale-110 duration-100"
                                 src="{{ asset('storage/' . $view->image) }}" alt="{{$view->slug}}">
                        </a>
                    </div>
                    <div class="bg-white p-2 flex flex-col space-y-2">
                        <div class="">
                            <div class="cursor-pointer">
                                <a class="text-slate-800" href=""> {{$view->name}} </a>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="font-semibold text-slate-800">
                                {{ number_format($view->ProductVariants->first()?->price ?? 0) }} đ
                            </p>
                            <div class="flex gap-2 text-xs text-slate-700">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="size-4">
                                    <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                Hà Nội
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
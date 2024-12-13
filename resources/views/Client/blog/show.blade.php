@extends('Client.layout.layout')

@section('title', 'Chi tiết bài viết')


@section('content')
<div class="max-w-screen-xl mx-auto ">
        
    <div class="container mx-auto ">
        <div class="mb-5">
            <ul class="flex container mx-auto py-2">
                <li>
                    <a class="hover:underline hover:text-red-700 cursor-pointer" href="/">Datch Fashion</a>
                </li>
                <li>
                    <span class="mx-3">&gt;</span>
                    <a class="hover:underline hover:text-red-700 cursor-pointer" href="/bai-viet">Bài Viết</a>
                </li>
                <li>
                    <span class="mx-3">&gt;</span>
                    <a class="hover:underline hover:text-red-700 cursor-pointer" href="">{{ $blog->title }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
    <div class="mt-[28px] mx-auto w-[1400px]">
        <!-- Phần content top -->
        <div class="grid grid-cols-[1fr_4fr_1fr] ">
            <div class="pt-[40px] mb-[20px] "></div>
            <div class="">
                <!-- Phần content chính -->
                <div class="">
                    <h2 class="text-[36px] font-bold mb-2">{{ $blog->title }}</h2>
                    <span class="text-slate-500 ">Ngày đăng: {{ $blog->created_at }} </span>
                    <img class="w-full my-8" src="{{ asset($blog->image) }}" alt="">
                    <div class="mb-[20px]">
                        {!! $blog->content !!}
                    </div>
                </div>

            </div>

        </div>
        <hr>
        <div class="mx-auto p-4 pt-10">
            <h2 class="text-center text-[36px] font-bold mb-8">Tin liên quan</h2>
            <div class="mt-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach ($related_blog as $blog)
                    <div class="h-full rounded-lg relative shadow-xl">
                        <div class="h-full rounded-lg overflow-hidden flex flex-col">
                            <div class="overflow-hidden h-80">
                                <a href="/bai-viet/{{ $blog->slug }}">
                                    <img class="" src="{{ asset($blog->image) }}" alt="{{ $blog->slug }}">
                                </a>
                            </div>
                            <div class="bg-white p-2 flex flex-col space-y-2">
                                <div class="">
                                    <div class="cursor-pointer">
                                        <a class="text-slate-800" href="/bai-viet/{{ $blog->slug }}"> {{ $blog->title }}
                                        </a>
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
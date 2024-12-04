@extends('Client.layout.layout')

@section('title', 'Bài Viết')


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
            </ul>
        </div>
    </div>
    <h1 class="text-center p-5 border shadow-xl rounded-lg text-2xl font-bold">Bài viết</h1>
</div>
<div class="max-w-screen-xl mx-auto py-8">
    <div class="relative">
        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-3 gap-6 mb-5">
            @foreach ($blogs as $blog)
            <div class="h-full rounded-lg relative shadow-xl">
                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                    <!-- Hình ảnh bài viết -->
                    <div class="overflow-hidden h-80">
                        <a href="/bai-viet/{{$blog->slug}}">
                            <img class="" src="{{ asset( $blog->image) }}" alt="{{$blog->slug}}">
                        </a>
                    </div>
                    <!-- Nội dung bài viết -->
                    <div class="bg-white p-2 flex flex-col space-y-2">
                        <div class="flex flex-col">
                            <!-- Tiêu đề bài viết -->
                            <div class="mb-2">
                                <a class="" href="/bai-viet/{{$blog->slug}}">
                                    <h3 class="font-bold text-lg leading-tight">{{$blog->title}}</h3>
                                </a>
                            </div>
                            <!-- Thời gian bài viết -->
                            <div class="mt-2">
                                <span class="text-slate-500 text-sm block">{{$blog->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            @endforeach
        </div>
        {{$blogs->links()}}
    </div>
</div>
@endsection




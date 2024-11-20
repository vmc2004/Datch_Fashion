@extends('Client.layout.layout')

@section('title', 'Chi tiết sản phẩm')


@section('content')
<div class="container flex mx-auto flex">
    <div>
       <ul class="flex container mx-auto pt-4 text-sm ">
          <li>
                <a class="hover:underline cursor-pointer" href="/">
                   Datch Fashion
                </a>
          </li>
          <li>
                <span class="mx-4">&gt;</span>
                <a class="hover:underline cursor-pointer" href="{{route('client.blog')}}">Bài viết</a>
          </li>
       </ul>
    </div>
</div>
<hr>
<div class="max-w-screen-xl mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4">BÀI VIẾT</h2>
    <div class="relative">
        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-3 gap-6">
            @foreach ($blogs as $blog)
            <div class="h-full rounded-lg relative shadow-xl">
                <div class="h-full rounded-lg overflow-hidden flex flex-col">
                    <div class="overflow-hidden h-80">
                        <a href="/bai-viet/{{$blog->slug}}">
                            <img class=""
                                 src="{{ asset( $blog->image) }}" alt="{{$blog->slug}}">
                        </a>
                    </div>
                    <div class="bg-white p-2 flex flex-col space-y-2">
                        <div class="">
                            <div class="cursor-pointer">
                                <a class="text-slate-800" href="/bai-viet/{{$blog->slug}}"> {{$blog->title}} </a>
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


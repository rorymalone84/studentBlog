@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-2xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message'));
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{session()->get('message')}}
        </p>
    </div>
@endif


@foreach ($posts as $post)
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">

    <!-- If the post count is above 0, display posts / else display no posts notification -->
    @if(count($posts) > 0)
    <div>
        @if (is_null($post->image_path))
            <img src="images/defaultPost.jpg" class="block w-40 h-40 rounded-full mx-auto" alt="">
        @else
            <img class="h-3/4 w-3/4" 
            src="https://martins-blog-bucket.s3.eu-west-2.amazonaws.com/blogPostImages/{{$post->image_path}}" 
            width="" height="" alt=""
            >
        @endif        
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-3xl pb-4 pt-2">
            {{$post->title}}
        </h2>

        <span class="text-gray-500">
            By: <span class="font-bold italic text-gray-600">{{$post->user->name}}</span>, Posted: {{$post->created_at->diffForHumans()}}
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{$post->excerpt}}
        </p>

        <a href="/blog/{{$post->slug}}" class="uppercase bg-pink-800 text-gray-100 text-lg font-extrabold py-3 px-3 rounded-3xl">Read post</a>
        
        @else
        <!--If the count of posts are not greater than 0, this notification appears -->
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                No posts have been made yet
            </p>
        @endif

        <!-- edit button appears if logged in -->
        @auth
            @if(Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a href="/blog/{{$post->slug}}/edit"
                        class="text-gray-700 italic hover-text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>
                
                <span class="float-right">
                    <form action="/blog/{{$post->slug}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="text-red-500 pr-3" type="submit">
                            Delete
                        </button>
                    </form>
                </span>  
            @endif            
        @endauth

    </div>
</div>
@endforeach

@endsection
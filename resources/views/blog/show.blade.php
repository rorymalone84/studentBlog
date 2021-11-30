@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-2xl">
            {{$post->title}}    
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By: <span class="font-bold italic text-gray-800">{{$post->user->name}}</span>
    </span>
    <span class="text-gray-500 pt-20">
       -  Posted: {{$post->created_at->diffForHumans()}}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        <span class="text-gray-500 pt-20">
            {{$post->excerpt}}
         </span>
    </p>
    
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        <!-- Char escape used for the wysiwyg format being returned -->
        {!! $post->description !!}
    </p>
</div>
    
@endsection
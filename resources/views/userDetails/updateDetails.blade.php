@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-2xl">
            Change your home page details content
        </h1>
    </div>
</div>

@if ($errors->any())
<div class="w-4/5 m-auto">
    <ul>
        @foreach ($errors->all() as $error)
            <li class="w-1/5 mb-4 text-red-700 bg-gray-100 py-4">
                {{$error}}
            </li>
        @endforeach
    </ul>
</div>
@endif

@foreach ($details as $detail)
<div class="w-4/5 m-auto pt-20">
    <form action="/details/{{$detail->id}}" method="post" enctype="multipart/form-data">
        @csrf

        <input 
            type="text" 
            name="welcome_message" 
            value="{{$detail->welcome_message}}" 
            placeholder="Enter welcome message"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>
        
        <input 
            type="text" 
            name="about_me" 
            value="{{$detail->about_me}}"
            placeholder="Describe yourself"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >
        
        <br>

        <input 
        type="text" 
        name="current_work"
        value="{{$detail->current_work}}"
        placeholder="Enter what you're currently doing"
        class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>

        <input 
        type="text" 
        name="past_work" 
        value="{{$detail->past_work}}"
        placeholder="Enter what you done previously"
        class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>
            <!-- Iterates for values in the skills array -->
            @for ($i = 0; $i < count($detail->skills); $i++)        
            <input 
            type="text" 
            name="skills[]"
            value="{{$detail->skills[$i]}}"
            placeholder="Enter what skills you have"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
            >
            @endfor
        <br>

        <div class="bg-grey-lighter pt-15">
            <label 
                class="w-44 flex flex-col items-centered px-2 py-3 
                bg-white-rounded-lg shadow-lg tracking-wide uppercase
                border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal"> 
                        upload profile image
                    </span>
                    <input 
                    type="file"
                    name="profile_image_path"
                    class="hidden">
            </label>
        </div>
        
        <button
        type="submit"
        class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl"
        >
        Post
        </button>
    
    </form>
</div>
@endforeach

@endsection
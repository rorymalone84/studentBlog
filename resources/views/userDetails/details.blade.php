@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-2xl">
            Create your home page details content
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

<div class="w-4/5 m-auto pt-20">
    <form action="/details" method="post" enctype="multipart/form-data">
        @csrf

        <input 
            type="text" 
            name="welcome_message" 
            id="" 
            placeholder="Enter welcome message"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>
        
        <input 
            type="text" 
            name="about_me" 
            id="" 
            placeholder="Describe yourself"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >
        
        <br>

        <input 
        type="text" 
        name="current_work" 
        placeholder="Enter what you're currently doing"
        class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>

        <input 
        type="text" 
        name="past_work" 
        placeholder="Enter what you done previously"
        class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>

        <input 
        type="text" 
        name="skills[]" 
        placeholder="Enter what skills you have"
        class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

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

        <br>
        
        <button
        type="submit"
        class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl"
        >
        Post
        </button>
    
    </form>
</div>

@endsection
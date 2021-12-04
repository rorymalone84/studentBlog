@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-2xl">
            Change your home page details    
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
            name="welcome-message" 
            id="" 
            placeholder="Enter title of Blog post"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>
        
        <input 
            type="text" 
            name="about-me" 
            id="" 
            placeholder="Enter a short description of the subject"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >
        
        <br>

        <input 
        type="text" 
        name="current-work" 
        placeholder="Enter a short description of the subject"
        class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <input 
        type="text" 
        name="past-work" 
        placeholder="Enter a short description of the subject"
        class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <input 
        type="text" 
        name="skills[]" 
        placeholder="Enter a short description of the subject"
        class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >
        
        <button
        type="submit"
        class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl"
        >
        Post
        </button>
    
    </form>
</div>

@endsection
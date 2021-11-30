@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-2xl">
            Edit post    
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
    <form action="/blog/{{$post->slug}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input 
            type="text" 
            name="title" 
            placeholder="Enter title of Blog post"
            value="{{$post->title}}"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>
        
        <input 
            type="text" 
            name="excerpt" 
            placeholder="Enter a short description of the subject"
            value="{{$post->excerpt}}"
            class="bg-gray-0 block border-b-2 w-full h-10 w-6xl outline-none"
        >

        <br>
        
        <!-- CK Editor is required in the class attribute for WYSIWYG editor-->
        <textarea 
            name="description"
            placeholder="description"
            value=""
            class="ckeditor py-20 bg-white-rounded-lg w-full block border-b-2 h-60 text-xl outline-none"
            >{{$post->description}}
        </textarea>

        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>

        <div class="bg-grey-lighter pt-15">
            <label 
                class="w-44 flex flex-col items-centered px-2 py-3 
                bg-white-rounded-lg shadow-lg tracking-wide uppercase
                border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal"> 
                        upload file
                    </span>
                    <input 
                    type="file"
                    name="image"
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
    
@endsection
@extends('layouts.app')

@section('content')

<!-- if the owner has already entered the welcome screen details -->
@if(count($details) > 0)

@foreach ($details as $detail)
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-900 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m- w-4/5 block text-center">
                <h1 class="text-white text-5xl uppercase font-bold text-shadow-md pb-14">                     
                    {{$detail->welcome_message}}                   
                </h1>

                <div class="pb-14">
                    @if (is_null($detail->profile_image_path))
                        <img src="images/default.jpg" class="block w-40 h-40 rounded-full mx-auto">
                    @else
                        <img 
                        src="https://martins-blog-bucket.s3.eu-west-2.amazonaws.com/detailsImage/{{$detail->profile_image_path}}" 
                        class="block w-40 h-40 rounded-full mx-auto" 
                        width="400" 
                        height="auto"
                        >
                    @endif
                </div>

                <a 
                href="/blog"
                class="
                text-center bg-gray-50 text-purple-700 py-2 px-4 font-bold text-xl uppercase
                rounded"
                >See my Posts</a>

                @auth
                    @if(count($details) < 1)
                    <a href="/details" class="text-center bg-gray-50 text-purple-700 py-2 px-4 font-bold text-xl uppercase
                    rounded">Add Details</a>                            
                    @else
                    <a href="/details/{{$detail->id}}" class="text-center bg-gray-50 text-purple-700 py-2 px-4 font-bold text-xl uppercase
                        rounded">Change Details</a>   
                    @endif
                @endauth
            </div>
        </div>
    </div>
    
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-20 border-b border-gray-200">
        <div class="pb-14">
            <h2 class="text-4xl font-extrabold text-gray-600" id="about">About me</h2>
            <p class="py-8 text-gray-500 text-s pt-9">
                {{$detail->about_me}}    
            </p>
        </div>

        <div class="pb-14">
            <span class="text-4xl font-extrabold text-gray-500">
                Blog
            </span>

            <h2 class="text-2xl text-gray-400 py-10">
                Latest posts
            </h2>

            @if (count($posts)< 1 )
                Nothing has been posted yet.
            @else
                @foreach ($posts as $post)           
                    <a href="blog/{{$post->slug}}">
                    <p class="m-auto text-purple-500 text-2xl pb-2">{{$post->title}}</p>
                    </a>
                    <p>Posted: {{$post->created_at->diffForHumans()}}</p>
                @endforeach
            @endif
        </div>

        <div class="text-center p-15 bg-purple-900 text-white">
            <h2 class="2xl pb-5 text-lg">
                What im doing currently...
            </h2>

            <span class="font-extrabold block text-4xl py-1">
                {{$detail->current_work}}    
            </span>

            <br>
            <hr>
            <br>

            <h2 class="2xl pb-5 text-lg">
                Previous...
            </h2>

            <span class="font-extrabold block text-4xl py-1">
                {{$detail->past_work}} 
            </span>
        </div>

        <div class="text-center p-15">
            
        </div>        
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-blue-500 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    Skills
                </span>

                <h3 class="text-xl font-bold py-10">
                    <ul class="flex block space-x-4">
                        @for ($i = 0; $i < count($detail->skills); $i++)
                            <li>{{$detail->skills[$i]}}</li>
                        @endfor
                    </ul>
                </h3>

                <a href="" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">Find out more</a>
            </div>
        </div>

        <div>
            <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGxhcHRvcHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" width="700" alt="">
        </div>
    </div>
    @endforeach

    @else <!-- if no details have been added yet -->
        <div class="m-auto pt-8 pb-16 sm:m- w-4/5 block text-center">
            <h1 class="text-black text-1xl uppercase font-bold text-shadow-md pb-14">
                The blog owner hasn't registered, and/or hasn't added any details yet.                                      
            </h1>
            <a href="/details" class="text-center bg-gray-50 text-purple-700 py-2 px-4 font-bold text-xl uppercase
            rounded">Add Details</a>
        </div>

    
@endif


@endsection
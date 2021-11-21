@extends('layouts.app')

@section('content')

    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-900 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m- w-4/5 block text-center">
                <h1 class="text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Welcome to Martin's Blog.
                </h1>
                <a 
                href="/blog"
                class="
                text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase
                "
                >Read More</a>
            </div>
        </div>
    </div>
    
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGxhcHRvcHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left width-4/5 block">
            <h2 class="text-4xl font-extrabold text-gray-600" id="about">About me</h2>
            <p class="py-8 text-gray-500 text-s pt-9">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur natus officia maxime repellat adipisci. Explicabo sit impedit sunt voluptates labore praesentium doloremque porro, dicta totam molestiae, molestias est. Consequatur, quis.
            </p>

            <p class="py-8 text-gray-500 text-s pt-9">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur natus officia maxime repellat adipisci. Explicabo sit impedit sunt voluptates labore praesentium doloremque porro, dicta totam molestiae, molestias est. Consequatur, quis.
            </p>

            <a href="/blog" class="uppercase bg-purple-700 text-gray-100 text-l font-extrabold py-3 px-8 rounded">Find out more</a>
        </div>

        <div class="text-center p-15 bg-purple-900 text-white">
            <h2 class="2xl pb-5 text-lg">
                Currently study...
            </h2>

            <span class="font-extrabold block text-4xl py-1">
                MSc Bioinformatics at University of Aberdeen
            </span>

            <br>
            <hr>
            <br>

            <h2 class="2xl pb-5 text-lg">
                Previous...
            </h2>

            <span class="font-extrabold block text-4xl py-1">
                BSc (Hons) Biomedical sciences at Bangor University
            </span>
        </div>

        <div class="text-center p-15">
            <span class="uppercase text-s text-gray-400">
                Blog
            </span>

            <h2 class="text-4xl font-bold py-10">
                Latest posts
            </h2>

            <p class="m-auto w-4/5 text-gray-500">Lorem ipsum dolor sit amet consectetur.</p>
        </div>        
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-blue-500 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    PHP
                </span>

                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ex maiores possimus qui ea inventore neque praesentium, nisi fugiat deleniti! Voluptatum perspiciatis fugit distinctio sint nisi quos ea earum velit.
                </h3>

                <a href="" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">Find out more</a>
            </div>
        </div>

        <div>
            <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGxhcHRvcHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80" width="700" alt="">
        </div>
    </div>

@endsection
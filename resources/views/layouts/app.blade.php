<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navBar.js') }}" defer></script>

    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/navBar.js') }}" defer></script>


    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-purple-900 bg-opacity-75 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        Bio-Infor-Martin
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-3 ">            

                <nav class="space-x-4 text-gray-300 text-sm sm:text-base" id="nav-content">
                    <a class="no-underline hover:underline" href="/">Home</a>
                    <a class="no-underline hover:underline" href="/blog">Blog</a>
                    @auth
                    <a href="/blog/create" class="o-underline hover:underline">Create Post</a>
                    @endauth
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                           
                        @endif
                    @else
                        <span>{{ Auth::user()->name}}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest

                    </div>
                </nav>

                <!-- Mobile menu button -->
				<div class="md:hidden ">
					<button class="outline-none mobile-menu-button">
						<svg class=" w-6 h-6 text-gray-100 hover:text-green-500 "
							x-show="!showMenu"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
				    </button>
				</div>             
            </div>
        </header>

         <!-- mobile menu -->
        <div class="hidden mobile-menu bg-purple-900 bg-opacity-75">
            <ul class="pl-4">
                <li><a href="/" class="block text-sm px-2 py-4 text-white hover:bg-purple-500 font-semibold">Home</a></li>
                <li><a href="/blog" class="block text-sm px-2 py-4 text-white hover:bg-purple-500 transition duration-300">Blog</a></li>
            @auth
                <li><a href="/blog/create" class="block text-sm px-2 py-4 text-white hover:bg-purple-500 transition duration-300">Create Post</a></li>
                <li><a href="{{ route('logout') }}" class="block text-sm px-2 py-4 text-white hover:bg-purple-500 transition duration-300" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a></li>                    
            @endauth
            @guest
                <li><a href="/login" class="block text-sm px-2 py-4 text-white hover:bg-purple-500 transition duration-300">Login</a></li>
            @endguest
            </ul>
        </div>

        <div>
            @yield('content');
        </div>
        
        <div>
            @include('layouts.footer');
        </div> 
        

    </div>
</body>
</html>

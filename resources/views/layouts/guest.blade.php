<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>SEDEBAT</title>
        <link rel="icon" href="{{asset('img/logosedeba.png')}}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/tailwind.css')}}">
        @vite(['resources/css/app.css','resources/js/app.js'])
        @livewireStyles

    </head>
    <body class="font-sans text-gray-900 dark:bg-gray-800 dark:text-gray-100 antialiased">
        {{-- navegador --}}
        <nav class="dark:bg-gray-600 top-0 fixed z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-white shadow">
            <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a class=" flex text-blueGray-700 text-2xl font-bold leading-relaxed mr-4 py-2 whitespace-nowrap uppercase" 
                    href="{{ url('/') }}">
                    <img src="{{asset('img/logosedeba.png')}}" class="h-10 flex-initial mr-3">
                    <span class="flex-initial dark:text-white"> SEDEBAT</span>
                </a>
                <button data-collapse-toggle="navbar-dropdown" onclick="toggleNavbar('example-collapse-navbar')" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button> 
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden" id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center dark:bg-gray-600">
                <li class="inline-block relative">
                    <a class=" dark:text-gray-300 dark:hover:text-white hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                    href="{{ url('/') }}">
                    Inicio
                    </a>
                </li>
                <li class="inline-block relative">
                    <a class=" dark:text-gray-300 dark:hover:text-white hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                    href="{{ url('/blog') }}">
                    Blog
                    </a>
                </li>
                
                <li >  
                    @if (Route::has('login'))
                    <nav class=" flex flex-1 justify-end">
                    @auth
                    <a
                    href="{{ url('/dashboard') }}"
                    class=" dark:text-gray-300 dark:hover:text-white hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                >
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class=" dark:text-gray-300 dark:hover:text-white hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                >
                                    Inicia sesión 
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class=" dark:text-gray-300 dark:hover:text-white hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                    >
                                        Registrate
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </li>

                <li class="flex items-center">
                    <a class=" dark:text-gray-300 hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdemos.creative-tim.com%2Fnotus-js%2F"
                        target="_blank">
                        <i class="text-blueGray-400 dark:hover:text-white hover:text-blueGray-800 fab fa-facebook text-lg leading-lg"></i>
                    </a>
                    <a class=" dark:text-gray-300 hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fdemos.creative-tim.com%2Fnotus-js%2F&text=Start%20your%20development%20with%20a%20Free%20Tailwind%20CSS%20and%20JavaScript%20UI%20Kit%20and%20Admin.%20Let%20Notus%20JS%20amaze%20you%20with%20its%20cool%20features%20and%20build%20tools%20and%20get%20your%20project%20to%20a%20whole%20new%20level."
                        target="_blank">
                        <i class="text-blueGray-400 dark:hover:text-white hover:text-blueGray-800 fab fa-twitter text-lg leading-lg"></i>
                    </a>
                    <a class=" dark:text-gray-300 hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="https://github.com/creativetimofficial/notus-js?ref=njs-index"
                        target="_blank">
                        <i class="text-blueGray-400 dark:hover:text-white  hover:text-blueGray-800 fab fa-instagram text-lg leading-l"></i>
                    </a>

                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 dark:hover:text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 dark:hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        {{ $slot }}

        @livewireScripts
        <script src="{{asset('js/plantilla.js')}}"> </script> 
        <script src="{{asset('js/dark.js')}}"></script>
        <script src="{{asset('js/darkButton.js')}}"></script>
    </body>
    
     {{-- footer --}}
     <footer class="relative bg-blueGray-100 pt-8 pb-6 dark:bg-gray-800">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20" style="transform: translateZ(0)">
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-blueGray-100 dark:text-gray-800 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>

        <div class="container mx-auto px-4">
          <div class="flex flex-wrap text-center lg:text-left">
            <div class="w-full lg:w-6/12 px-4">
              <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
              <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
                Find us on any of these platforms, we respond 1-2 business days.
              </h5>
              <div class="mt-6 lg:mb-0 mb-6">
                <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                  type="button">
                  <i class="fab fa-twitter"></i>
                </button>
                <button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                  type="button">
                  <i class="fab fa-facebook-square"></i>
                </button>
                <button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                  type="button">
                  <i class="fab fa-dribbble"></i>
                </button>
                <button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                  type="button">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="flex flex-wrap items-top mb-6">
                <div class="w-full lg:w-4/12 px-4 ml-auto">
                  <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">
                    Useful Links
                  </span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://www.creative-tim.com/presentation?ref=njs-index">
                        About Us
                      </a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://blog.creative-tim.com?ref=njs-index">
                        Blog
                      </a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://www.github.com/creativetimofficial?ref=njs-index">
                        Github
                      </a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-index">
                        Free Products
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                  <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">
                    Other Resources
                  </span>
                  <ul class="list-unstyled">
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-index">
                        MIT License
                      </a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/terms?ref=njs-index">
                        Terms & Conditions
                      </a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/privacy?ref=njs-index">
                        Privacy Policy
                      </a>
                    </li>
                    <li>
                      <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="https://creative-tim.com/contact-us?ref=njs-index">
                        Contact Us
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-6 border-blueGray-300" />
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
              <div class="text-sm text-blueGray-500 font-semibold py-1">
                Copyright © <span id="get-current-year"></span> Notus Tailwind JS
                by
                <a href="https://www.creative-tim.com?ref=njs-index"
                  class="text-blueGray-500 hover:text-blueGray-800">
                  Creative Tim
                </a>
                .
              </div>
            </div>
          </div>
        </div>
    </footer>
</html>

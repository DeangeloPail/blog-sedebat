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
        <link href="https://fonts.bunny.net/css?family=bangers:400" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=bungee-shade:400" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=carter-one:400" rel="stylesheet" />
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
                      href="{{ url('/news') }}"
                      class=" dark:text-gray-300 dark:hover:text-white hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                  >
                                  Panel de control
                                  </a>
                              @else
                                  <a
                                      href="{{ route('login') }}"
                                      class=" dark:text-gray-300 dark:hover:text-white hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                  >
                                      Inicia sesión 
                                  </a>

                                  {{-- @if (Route::has('register'))
                                      <a
                                          href="{{ route('register') }}"
                                          class=" dark:text-gray-300 dark:hover:text-white hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                      >
                                          Registrate
                                      </a>
                                  @endif --}}
                              @endauth
                          </nav>
                      @endif
                  </li>

                  <li class="flex items-center">
                      <a class=" dark:text-gray-300 hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                          href="https://www.facebook.com/profile.php?id=100092425938573"
                          target="_blank">
                          <i class="text-blueGray-400 dark:hover:text-white hover:text-blueGray-800 fab fa-facebook text-lg leading-lg"></i>
                      </a>
                      <a class=" dark:text-gray-300 hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                          href="https://twitter.com/Sedebat_"
                          target="_blank">
                          <i class="text-blueGray-400 dark:hover:text-white hover:text-blueGray-800 fab fa-twitter text-lg leading-lg"></i>
                      </a>

                      <a class=" dark:text-gray-300 hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                          href="https://www.instagram.com/sedebat_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                          target="_blank">
                          <svg class="w-[28px] h-[28px] text-blueGray-400 dark:hover:text-white  hover:text-blueGray-800 fab fa-instagram text-lg leading-l" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                          </svg>
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
     <footer class="relative bg-blueGray-100 pt-8 mt-20 pb-6 dark:bg-gray-800">
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
              <h4 class="text-3xl font-semibold">BLOGSEDEBAT.COM</h4>
              <h5 class="text-lg mt-0 mb-2 text-blueGray-600 dark:text-gray-300">
                Diseñado por <a href="https://github.com/DeangeloPail" class="text-blue-700 dark:text-blue-500 underline hover:no-underline font-medium">DeangeloPail</a> y <a href="https://github.com/Noodleman9570" class="text-blue-700 dark:text-blue-500 underline hover:no-underline font-medium">Noodleman9570</a>.
              </h5>
              <div class="mt-6 lg:mb-0 mb-6">
                <a href="https://www.facebook.com/profile.php?id=100092425938573">
                  <button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                    type="button">
                    <i class="fab fa-facebook-square"></i>
                  </button>
                </a>
                
                <a href="https://twitter.com/Sedebat_">
                  <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                    type="button">
                    <i class="fab fa-twitter"></i>
                  </button>
                </a>
                
                <a href="https://www.instagram.com/sedebat_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                  <button class="bg-white shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2">
                    <i class="fab fa-instagram text-pink-500 font-black"></i>
                  </button>                
                </a>
                {{-- <button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                  type="button">
                  <i class="fab fa-github"></i>
                </button> --}}
              </div>
            </div>
          </div>
          {{-- <hr class="my-6 border-blueGray-300" />
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
          </div> --}}
        </div>
    </footer>
</html>

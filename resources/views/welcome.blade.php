<x-guest-layout>
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

        {{-- titulo de landing --}}
        <div class=" mt-28 container mx-auto items-center">
          <h1 class="text-5xl text-center font-extrabold dark:text-white">BLOG SEDEBAT</h1>
          <p class="text-sm text-center  mt-3 font-light dark:text-white">Do quis aliqua ex qui et ad. Amet excepteur nisi incididunt duis ex reprehenderit. Aliquip in sunt adipisicing pariatur veniam. Aute esse sint incididunt aliqua cupidatat commodo deserunt exercitation enim aliquip. Incididunt labore non proident incididunt nostrud enim anim officia nisi est commodo nisi deserunt. Nostrud consectetur laborum esse Lorem ullamco laborum anim adipisicing excepteur. Eiusmod labore fugiat aliquip exercitation dolor Lorem cillum consequat ad deserunt.</p>
        </div>
        

        {{-- seccion noticias destacadas--}}
        <section class="mt-[30em] md:mt-[10em] lg:mt-4 header relative items-center flex h-screen max-h-860-px">
          <div class="container mx-auto items-center flex flex-wrap">
            <div class="w-full px-4 lg:mt-0">
              <h4 class="text-2xl font-bold text-center mb-10 dark:text-white">Articulos destacados</h4>
              <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 grid-rows-auto gap-4">
                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 dark:border-gray-500">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Need a help in asdasd asdasd asds  sdfsdf fsdfsd sdfsdf  sfdsdfsdf sfsdf Claim?</h5>
                  <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline process on how to certify for your weekly benefits: Laborum quis aute sit aliquip veniam dolor esse consectetur irure esse id dolore. Anim est do ea excepteur sit cillum anim ullamco </p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>
                
                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 lg:row-span-2 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 dark:border-gray-500">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Need a help in Claim?</h5>
                  <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 dark:border-gray-500">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Need a help in Claim?</h5>
                  <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 dark:border-gray-500">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Need a help in Claim?</h5>
                  <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </section>

        {{-- seccion ultimas noticias --}}
        <section class="mt-[35em] md:mt-[20em] lg:mt-16 pb-10 relative bg-blueGray-200 dark:bg-gray-500">
          <div class="-mt-20 top-0 bottom-auto left-0 right-0 w-full absolute h-20"
            style="transform: translateZ(0)">
            <svg class="absolute bottom-0 overflow-hidden"
              xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0" >
                <polygon class="text-blueGray-200 dark:text-gray-500 fill-current"
                    points="2560 0 2560 100 0 100">
                </polygon>
            </svg>
          </div>
          {{-- ultima noticia--}}
          <div class="container mx-auto w-full">
            <div class="items-center flex flex-wrap">
              <h3 class="text-3xl font-bold ml-6 mt-10 -mb-6 dark:text-white">Ultimo articulo</h3>
                <a href="#" class=" transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 flex flex-col mt-16 w-full mx-5 items-center bg-white border border-gray-200 rounded-lg shadow lg:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                  <img class="object-cover w-full h-full rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="">
                  <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                          Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                          Aliqua aliquip Lorem sunt veniam voluptate dolor. Minim mollit aute consectetur ea ex laborum consequat labore deserunt qui nisi. Ad id commodo officia enim ullamco esse id sint minim eiusmod. Voluptate ad consectetur ullamco ipsum nostrud officia excepteur anim veniam. In commodo mollit id do aliquip veniam ipsum occaecat elit. Esse elit consequat eiusmod magna labore dolor reprehenderit magna labore.
                    </p>
                    <div class="flex items-center  mt-5 justify-between">
                      <div class="flex items-center">
                          <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                          <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                      </div>
                      <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                    </div>
                  </div>
                </a>
            </div>
          </div>
        
          {{-- ultimas noticias de la semana--}}
          <div class="container mx-auto overflow-hidden pb-20">
            <div class="items-center flex flex-wrap">
              {{-- titulo --}}
              <h3 class="text-3xl font-bold mt-20 ml-6 mb-10 dark:text-white">Ultimos articulos de la semana</h3>

              {{-- notias --}}
              <div class="grid ml-6 sm:grid-cols-2 lg:grid-cols-3 grid-cols-1 grid-rows-auto gap-4">

                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>
                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>
                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>

                <a href="#" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                  dark:border-gray-500">
                  <img class="rounded-t-lg" src="https://img.freepik.com/foto-gratis/colores-arremolinados-interactuan-danza-fluida-sobre-lienzo-que-muestra-tonos-vibrantes-patrones-dinamicos-que-capturan-caos-belleza-arte-abstracto_157027-2892.jpg" alt="" />
                  <div class="p-5">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-7 h-7 rounded-full shadow-lg" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg" alt="">
                        <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">@usuario</span>
                    </div>
                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">12-18-2018</span>
                  </div>
                </a>


              </div>
            </div>
          </div>
        </section>
</x-guest-layout>

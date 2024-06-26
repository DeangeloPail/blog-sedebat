<x-guest-layout>
        {{-- titulo de landing --}}
        <div class="absolute top-0 w-full h-full bg-center bg-white opacity-35 bg-cover pb-[210em]" style="background-image: url('{{asset('img/fotoInicio.jpg')}}');">
          <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
        <div class=" mt-28 container mx-auto items-center " style="transform: translateZ(0px)">
          <h1 class="text-5xl font-carter-one text-center font-extrabold dark:text-white">EL GOCHO DICE</h1>
          <p class="text-lg text-center mt-10 font-semibold dark:text-white">"El Gocho Dice" es un vibrante blog que sirve como plataforma para la promoción y exposición de autores y escritores originarios del estado Táchira, Venezuela. En este espacio digital, exploramos la riqueza literaria y cultural de la región, destacando las voces locales y sus contribuciones al mundo de la literatura. Desde la poesía hasta la prosa, desde los relatos cortos hasta las novelas, "El Gocho Dice" celebra la diversidad de estilos y géneros que caracterizan el panorama literario tachirense. Únete a nosotros mientras descubrimos y compartimos las historias y perspectivas únicas que emergen de esta tierra de talento literario inigualable.</p>
          {{-- seccion autores--}}
          <div class=" mt-28 mb-28 container mx-auto items-center">
            <livewire:autors>
          </div>
        </div>
        

        {{-- seccion ultimas noticias --}}
        <section class="md:mt-[20em] lg:mt-16 pb-10 relative bg-blueGray-200 dark:bg-gray-500">
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
              @if (isset($latestNews))
                <a href="{{ route('news.guestShow', $latestNews->id) }}" class=" transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-100 duration-300 flex flex-col mt-16 w-full mx-5 items-center bg-white border border-gray-200 rounded-lg shadow lg:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                  <div class='overflow-hidden max-w-[30vw]'>
                    <img class="object-cover w-full h-full  rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg" src="{{ asset("storage/public/images/news/{$latestNews->img}") }}" alt="">
                  </div>
                  <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $latestNews->titulo}}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ summary($latestNews->contenido, 300) }}
                    </p>
                    <div class="flex items-center  mt-5 justify-between">
                      <div class="flex items-center">
                          <img class="w-7 h-7 rounded-full shadow-lg" src="{{ config('app.app_url').  '/storage/' .$latestNews->writerImg }}" alt="">
                          <span class="ml-2 text-sm mr-3 font-normal text-gray-500 dark:text-gray-400">{{ $latestNews->name}}</span>
                      </div>
                      <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ formatearFecha($latestNews->created_at) }}</span>
                    </div>
                  </div>
                </a>
              @else
                <p class="mt-44 items-center">no hay articulos disponibles</p>
              @endif
            </div>
          </div>
        
          {{-- ultimas noticias de la semana--}}
          <div class="container mx-auto overflow-hidden pb-20">
            <div class="items-center flex flex-wrap">
              {{-- titulo --}}
              <h3 class="text-3xl font-bold mt-20 ml-6 mb-10 dark:text-white">Ultimos articulos de la semana</h3>

              {{-- notias --}}
              <div class="grid ml-6 sm:grid-cols-2 lg:grid-cols-3 grid-cols-1 grid-rows-auto gap-4">

                
                @forelse ($latestWeekNews as $news)  
                  <a href="{{ route('news.guestShow', $news->id) }}" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300  hover:dark:bg-gray-700 hover:dark:border-gray-600 hover:bg-gray-200 hover:border-gray-100 grid  gap-4 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 
                    dark:border-gray-500">
                    <div class="w-full h-full overflow-hidden">
                      <img class="rounded-t-lg" src="{{ asset("storage/public/images/news/{$news->img}") }}" alt="" />
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ summary($news->titulo, 80) }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ summary($news->contenido, 200) }}</p>
                    </div>
                    <div class="flex p-6 items-center justify-between">
                      <div class="flex items-center ">
                          <img class="w-7 h-7 object-cover rounded-full shadow-lg" src="{{ config('app.app_url').  '/storage/' .$news->writerImg }}" alt="">
                          <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $news->name }}</span>
                      </div>
                      <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ formatearFecha($news->created_at) }}</span>
                    </div>
                  </a>
                @empty
                <p class="mt-44">no hay articulos disponibles</p>
                @endforelse



              </div>
            </div>
          </div>
        </section>
</x-guest-layout>

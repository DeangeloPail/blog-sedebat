
<div>
    <section class="relative block h-500-px ">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('{{asset('img/IMG_7122.jpg')}}');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
            style="transform: translateZ(0px)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-blueGray-200 dark:text-gray-900 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    <section class="relative py-16 bg-blueGray-200 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-600 w-full mb-6 shadow-xl rounded-lg -mt-64">
                <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full px-4 lg:order-2 flex justify-center">
                                <div class="relative w-60 h-60 max-md:w-40 max-md:h-40">
                                    <img src="{{ asset('storage/'.$writer->img)}}"
                                        class="shadow-xl rounded-full w-full h-full object-cover align-middle border-none -mt-28 max-md:-mt-20  " />
                                </div>
                            </div>
                        </div>
                        <div class="text-center -mt-10">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 dark:text-gray-300 text-blueGray-700 ">
                                {{ $writer->name }} {{ $writer->last_name }}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 dark:text-gray-300 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-envelope text-lg mr-2 dark:text-gray-300 text-blueGray-400"></i>
                                {{ $writer->email }}
                            </div>
                            <div class="flex flex-wrap justify-center items-center mt-10">
                                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 text-sm leading-normal mt-0 mb-2 dark:text-gray-300 text-blueGray-400 font-bold uppercase">
                                    <i class="fas fa-map-marker-alt mr-2 text-lg dark:text-gray-300 text-blueGray-400"></i>
                                    {{ $writer->location }}
                                </div>
                                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 mb-2 dark:text-gray-300 text-blueGray-600">
                                    <i class="fas fa-briefcase mr-2 text-lg dark:text-gray-300 text-blueGray-400"></i> {{ $writer->profession }}
                                </div>
                                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 mb-2 dark:text-gray-300 text-blueGray-600">
                                    <i class="fas fa-university mr-2 text-lg dark:text-gray-300 text-blueGray-400"></i>{{ $writer->studies }}
                                </div>
                            </div> 
                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed dark:text-gray-300 text-blueGray-700">
                                        {{ $writer->description }}
                                    </p>
                                </div>
                            </div>
                        </div>



                    
                </div>
            </div>
            <div class="mt-10  text-center">
                        <div class="w-full p-6 py-14 pb-32 bg-white border-gray-300 border-2 rounded-lg shadow dark:bg-gray-500 dark:border-gray-600">
                            <h5 class="mb-9 text-5xl font-bold tracking-tight text-gray-900 dark:text-white">Articulos de  {{ $writer->name }} {{ $writer->last_name }}</h5>
                
                            {{-- buscador --}}
                            <div class="max-w-md mx-auto">
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" id="default-search" wire:model.live="searchingNews"
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Busca tu articulo" required />
                                
                                </div>
                    
                            </div>
                    
                            {{-- articulos --}}
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 mt-10">
                                @foreach ($news as $new)
                                    <a href="{{ route('news.guestShow', $new->id) }}" class="transition realative ease-in-out delay-150 hover:-translate-y-5 hover:scale-100 duration-30">
                                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                            <img class="rounded-t-lg" src="{{ asset("storage/public/images/news/{$new->img}") }}" alt="" />
                                            <div class="p-5">
                                                <h5 class="mb-4 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $new->titulo }}</h5>
                                                <div class="flex items-center justify-between">
                                                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">fecha:</span>
                                                    <span class="text-xs font-normal text-gray-500 dark:text-gray-400">{{ formatearFecha($new->created_at) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class='pt-8'>
                                {{ $news->links('vendor.livewire.tailwind') }}
                            </div>
                        </div>    
                    </div>
        </div>
    </section>
    
</div>

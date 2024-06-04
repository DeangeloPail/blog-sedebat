<x-app-layout>
    {{-- @vite(['resources/css/uploadNews.css', 'resources/css/animationSVG.css', 'resources/js/uploadNews.js']) --}}
    <x-slot name="header">
        <div class="grid grid-cols-2 my-auto">
            <h2 class="font-semibold inline text-xl text-gray-800 dark:text-gray-200 leading-tight my-auto">
                {{ __('Noticias') }}
            </h2>
            <a type="submit" href="{{ Route('news.create') }}" id="submit"
                class="my-auto ml-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-26 sm:w-26 px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                    class="bi bi-cloud-upload"></i> &nbsp;Crear Noticia</a>

        </div>


    </x-slot>

    <style>
        .active {
            color: #facc15;
        }
    </style>
    <div class="flex flex-wrap w-full column lg:h-full gap-4 content-center">
        @forelse ($News as $New)
            <div class="md:max-w-sm rounded-lg dark:bg-[#2e384e] overflow-hidden w-full shadow-xl mx-4 mb-4">
                <div class="bg-cover h-64 relative">

                    <button onclick="insIdToModal({{ $New->id }})" type="submit" data-modal-target="popup-modal"
                        data-modal-toggle="popup-modal"
                        class="mt-4 text-3xl absolute z-40 right-6 text-red-500 hover:text-4xl hover:text-red-400 ease-in duration-75 font-bold"><i
                            class="bi bi-x-square-fill"></i></button>
                    @if (Auth::user()->name == 'Admin')
                        <div class="star-contain z-40">
                            <a href="{{ route('news.stared', $New->id) }} ">
                                <div
                                    class="text-gray-400 starred absolute z-30 left-3 top-3 focus:outline-none font-xl text-xl p-2.5 text-center inline-flex items-center dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:focus:ring-yellow-800 dark:hover:bg-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="text-gray-400 w-6 {{ $New->destacada ? 'active' : 'no-active' }} active:text-yellow-400 h-auto hover:text-yellow-400 hover:scale-125 fill-current ease-in duration-75 hover:stroke-yellow-500/50"
                                        wire:click="giveRating(1)" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                        </path>
                                    </svg>

                                    <span class="sr-only">Icon description</span>
                                </div>
                            </a>
                        </div>
                    @endif


                    <a href="{{ Route('news.show', $New->id) }}">
                        <img class="h-full w-full ease-in duration-75 hover:opacity-30 hover:cursor-pointer"
                            src="{{ asset("storage/public/images/news/{$New->img}") }}"
                            alt="Strumble head lighthouse overlooking the sea" />
                    </a>

                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-2xl dark:text-gray-200 mb-2 text-gray-700">
                        {{ $New->titulo }}
                    </div>

                </div>
                <div class="px-6 mt-2 py-2">
                    <p class="text-sm dark:text-gray-300"> Fecha de creación: <br> {{ $New->created_at }}</p>
                    <a href="{{ Route('news.show', $New->id) }}"
                        class="w-full inline-block py-2 text-right border-t-2 border-gray-400 text-yellow-500 font-bold text-lg hover:text-yellow-700 active:text-black"><i
                            class="bi bi-eye-fill"></i> Visualizar</a>
                </div>
            </div>


        @empty
            <div class="w-full">
                <p class="mx-auto text-gray-700">No hay registros</p>
            </div>
        @endforelse

        <div class="md:max-w-sm rounded-lg overflow-hidden w-full shadow-xl mx-4 mb-4">
            <a href="{{ Route('news.create') }}">

                <div class="bg-cover h-full relative bg-gray-300 hover:bg-gray-200 ease-in duration-75">
                    <div class="absolute right-40 top-44 opacity-50 ">

                        <img class="h-20 w-20 z-20 hover:cursor-pointer"
                            src="{{ asset('storage/assets/add.png') }}"
                            alt="Strumble head lighthouse overlooking the sea" />


                    </div>


                </div>
            </a>
        </div>
    </div>
    <div class="flex justify-end pr-8">
        {{ $News->links() }}
    </div>

    @if (isset($New))
        <div id="popup-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200 rotating-svg"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Está seguro que desea
                            eliminar esta noticia?</h3>



                        <form id="deleteForm" action="{{ route('news.destroy', $New->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button data-modal-hide="popup-modal" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Si, Estoy seguro &nbsp;<i class="bi bi-trash"></i>
                            </button>
                        </form>


                        <button data-modal-hide="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, Cancelar &nbsp;<i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function insIdToModal(id) {
            var route = "{{ route('news.index') }}"
            route = route + '/' + id
            $('#deleteForm').attr("action", route)
        }

        var $destacadas = $(".active").toArray().length;
        console.log($destacadas)
        if ($destacadas >= 5) {
            $(".no-active").parent().parent().addClass('prevent');
        }
        console.log($(".pointer-events-none"));

        $(".prevent").on("click", function(e) {
            e.preventDefault();
            alert("No se pueden destacar mas de 3 noticias")
        });
    </script>
</x-app-layout>

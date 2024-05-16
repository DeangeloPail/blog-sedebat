

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/uploadNews.css', 'resources/js/uploadNews.js'])
    <title>SEDEBAT</title>

    <!--Cdns Pagina cliente -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/logosedeba.png') }}">

    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.css') }}">

    @extends('layouts.tailImport')



</head>

<div class="h-36">
    @extends('layouts.nav')
</div>
    <style>
        .active {
            color: #facc15;
        }
    </style>
    <div class="flex flex-wrap w-full column lg:h-full gap-4 content-center">
        @forelse ($News as $New)
            <div class="md:max-w-sm rounded-lg overflow-hidden w-full shadow-xl mx-4 mb-4">
                <div class="bg-cover h-64 relative">

                    
                       
                    
                     <a href="{{ Route('news.guestShow', $New->id) }}">
                        <img class="h-full w-full ease-in duration-75 hover:opacity-30 hover:cursor-pointer"
                            src="{{ asset("storage/images/news/{$New['img']}") }}"
                            alt="Strumble head lighthouse overlooking the sea" />
                    </a>

                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-2xl mb-2 text-gray-700">
                        {{ $New['titulo'] }}
                    </div>

                </div>
                <div class="px-6 mt-2 py-2">
                    <p class="text-sm"> Fecha de creación: <br> {{ $New['created_at'] }}</p>
                    <a href="{{ Route('news.guestShow', $New->id) }}"
                        class="w-full inline-block py-2 text-right border-t-2 border-gray-400 text-yellow-500 font-bold text-lg hover:text-yellow-700 active:text-black"><i
                            class="bi bi-eye-fill"></i> ver</a>
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
                                src="{{ asset("storage/images/assets/add.png") }}"
                                alt="Strumble head lighthouse overlooking the sea" />
                        

                </div>
                

            </div>
            </a>
        </div>
    </div>
    <div class="flex justify-end pr-8">
        {{ $News->links() }}   
    </div>

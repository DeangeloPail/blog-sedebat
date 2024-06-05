<x-guest-layout>


<body class="bg-white py-10">
    <div class="flex mt-20 ">
        <!-- Contenido principal -->
        <div class="w-full lg:w-4/5 px-5">

            <div class="mx-auto max-w-screen-lg px-3 py-6">
                <h1 class="text-center text-5xl font-bold">{{ $news->titulo }}</h1>
                <div class="mx-auto mt-5 max-w-screen-lg flex flex-col items-center justify-center">
                    <div class="mt-2 w-11/12 pb-2 text-start text-sm text-gray-400">{{ ucfirst($news->name) }} /
                        {{ formatearFecha($news->created_at) }}</div>
                    <div class="aspect-w-3 aspect-h-2 w-11/12 overflow-hidden">
                        <img class="h-full w-full rounded-lg object-cover object-center"
                            src={{ asset("storage/public/images/news/{$news->img}") }} alt="Image post 2" loading="lazy">
                    </div>
                    <div class="prose prose-invert mt-2 text-sm w-11/12 text-start text-gray-600 prose-img:rounded-lg">
                        <p>
                            {{ $news->descripcion_img }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-screen-lg px-3 py-6">
                <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
                    <div>

                        <p class="mt-3 text-black dark:text-gray-100 text-justify"><?= $news->contenido ?></p>
                    </div>

                </div>
            </div>

            <!-- Repite el div 'news-item' para cada noticia -->
        </div>

        <!-- Barra lateral -->
        <aside class="w-full lg:w-1/4 px-2 z-50 fixed max-lg:hidden top-36 -right-4">
            <!-- Noticias relacionadas -->
            <div class="related-news mb-6">
                <h3 class="text-xl font-bold ">Otros Articulos</h3>

                <!-- Repite el div 'related-news-item' para cada noticia relacionada -->
            </div>
            <div class="flex flex-col gap-8">
                <div
                    class="max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="w-full h-52 overflow-hidden">
                        <a href="{{ route('news.guestShow', $firstNews['id']) }}">
                            <img class="rounded-t-lg object-contain" src="{{ asset("storage/public/images/news/{$firstNews['img']}") }}"
                                alt="" />
                        </a>
                    </div>
                    <div class="px-5 py-2">
                        <a href="{{ route('news.guestShow', $firstNews['id']) }}">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $firstNews['titulo'] }}</h5>
                        </a>
                        <div class='w-full flex justify-end'>
                            <a href="{{ route('news.guestShow', $firstNews['id']) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ver noticia
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>

                @if ($secondNews != null)
                    <div
                        class="max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="w-full h-52 overflow-hidden">
                            <a href="{{ route('news.guestShow', $secondNews['id']) }}">
                                <img class="rounded-t-lg object-contain" src="{{ asset("storage/public/images/news/{$secondNews['img']}") }}"
                                    alt="" />
                            </a>
                        </div>
                        <div class="px-5 py-2">
                            <a href="{{ route('news.guestShow', $secondNews['id']) }}">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $secondNews['titulo'] }}</h5>
                            </a>
                            <div class='w-full flex justify-end'>
                                <a href="{{ route('news.guestShow', $secondNews['id']) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Ver noticia
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </aside>

        

    </div>
</body>


</x-guest-layout>

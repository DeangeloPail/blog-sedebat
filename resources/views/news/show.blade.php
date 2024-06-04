<x-app-layout>
    {{-- @vite(['resources/css/uploadNews.css', 'resources/js/uploadNews.js']) --}}
    <x-slot name="header">
        <div class="grid grid-cols-2 my-auto">
            <h1 class="font-semibold inline text-xl text-gray-800 dark:text-gray-200 leading-tight my-auto">
                {{ __('Noticias') }}
            </h1>
            <a type="submit" href="{{ Route('news.create') }}" id="submit"
                class="my-auto ml-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-26 sm:w-26 px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                    class="bi bi-cloud-upload"></i> &nbsp;Crear Noticia</a>

        </div>


    </x-slot>
    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
    <style>
        #output {
            display: hidden;
        }

        #finput {
            display: hidden;
        }
    </style>

    <body class="bg-gray-200 py-10 px-5 relative">
        <form action="{{ route('news.update', $news['id']) }}" enctype="multipart/form-data" method="post">
            @csrf

            @method('put')

            <div class="flex mx-20 mt-10">
                <!-- Contenido principal -->
                <div class="w-full lg:w-3/4 px-5 mx-auto ">
                    <!-- Aquí es donde irían tus noticias, cada una dentro de un div con la clase 'news-item' -->
                    <div class="news-item bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden mb-6">
                        {{-- <img src="{{ asset("images/news/{$news['img']}") }}" class=" object-contain w-full h-full"> --}}
                        <div class="img_container relative hover:opacity-50 hover:cursor-pointer ease-in duration-100">
                            <img src="{{ asset('storage/images/assets/add.png') }}"
                                class="absolute w-40 right-4 bottom-4 " alt=" asdfasd">
                            <img id="img" onclick="Upload()" class=" object-contain w-full "
                                src="{{ asset("storage/public/images/news/{$news['img']}") }}">
                            <canvas id= "can1" class="hidden object-contain w-full" onclick="Upload()">
                            </canvas>
                        </div>

                        <div class="p-6">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900  dark:text-white">Titulo de la
                                noticia</label>
                            <input type="text" name="titulo" id="titulo" value="{{ $news['titulo'] }}"
                                class="bg-gray-50  border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Titulo" required>
                            {{-- @forelse ($news['contenido'] as $parrafo)
                                <?php// echo $parrafo; ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?>
                            @empty
                                <p class="text-gray-700">No hay contenido para mostrar</p>
                            @endforelse --}}

                            <p class="hidden">

                                <input type="file" name="img" multiple id = "finput">

                            </p>

                            {{-- <input type="text" id="img" name="img" value="{{ $news['img'] }}"> --}}

                            <div class="container mx-auto pt-4">
                                <div class=" rounded-lg py-4 px-2">
                                    <div class="mb-4 bg-gray-100 dark:bg-gray-600 rounded-md">
                                        <button id="boldButton"
                                            class=" text-black  p-2 font-bold rounded hover:text-gray-400">Negrita</button>
                                        <button id="italicButton"
                                            class="text-black p-2 italic rounded hover:text-gray-400">Cursiva</button>
                                        <button id="underlineButton"
                                            class="text-black p-2 underline rounded hover:text-gray-400">Subrayado</button>
                                    </div>
                                    <label for="first_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                                    <div contenteditable="true" id="editor"
                                        class="bg-gray-50 overflow-y-auto overflow-x-clip p-2 border-4 rounded h-[40vh] w-full">
                                        <?= $news['contenido'] ?>
                                    </div>
                                </div>
                            </div>

                            <div class="container mx-auto p-4">
                                <textarea id="output" name="contenido" class="bg-gray-100 p-0 m-0 hidden rounded w-full" readonly>{{ $news['contenido'] }}</textarea>
                            </div>

                            <div class="flex gap-4">
                                <button type="submit"
                                    class="px-6 py-3.5 text-base font-medium text-white bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Editar</button>
                                <button type="button"ype="submit" data-modal-target="popup-modal"
                                    data-modal-toggle="popup-modal"
                                    class="px-6 py-3.5 text-base font-medium text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                            </div>

                        </div>
                    </div>



                    <!-- Repite el div 'news-item' para cada noticia -->
                </div>


            </div>


        </form>
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



                        <form id="deleteForm" action="{{ route('news.destroy', $news['id']) }}" method="POST">
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
    </body>

    <script>
        const boldButton = document.getElementById("boldButton");
        const italicButton = document.getElementById("italicButton");
        const underlineButton = document.getElementById("underlineButton");
        const editor = document.getElementById("editor");
        const output = document.getElementById("output");


        boldButton.addEventListener("click", (e) => {
            e.preventDefault();
            document.execCommand("bold", false, null);
            updateOutput();
        });

        italicButton.addEventListener("click", (e) => {
            e.preventDefault();
            document.execCommand("italic", false, null);
            updateOutput();
        });

        underlineButton.addEventListener("click", (e) => {
            e.preventDefault();
            document.execCommand("underline", false, null);
            updateOutput();
        });

        editor.addEventListener("input", () => {
            updateOutput();
        });

        function updateOutput() {
            const content = editor.innerHTML;
            output.value = content;
        }

        // funcion de subir imagen

        window.addEventListener('load', function() {
            var cc1 = document.getElementById("can1");
            var fileinput = document.getElementById("finput");
            var image = new SimpleImage(fileinput);
            image.drawTo(cc1);
        });



        function Upload() {
            $('#finput').click();

        }

        $('#finput').change(function() {
            $('#img').addClass('hidden');
            $('#can1').removeClass('hidden');
            var cc1 = document.getElementById("can1");
            var fileinput = document.getElementById("finput");
            var image = new SimpleImage(fileinput);
            image.drawTo(cc1);
        });
    </script>
</x-app-layout>

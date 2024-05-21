<x-app-layout>
    {{-- @vite(['resources/css/uploadNews.css', 'resources/js/uploadNews.js']) --}}
    <x-slot name="header">
        <div class="grid grid-cols-2 my-auto">
            <h2 class="font-semibold inline text-xl text-gray-800 dark:text-gray-200 leading-tight my-auto">
                {{ __('Nueva Noticia') }}
            </h2>
            <a type="submit" href="{{ Route('news.index') }}" id="submit"
                class="my-auto ml-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-26 sm:w-26 px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                    class="bi bi-arrow-left"></i> &nbsp;Volver</a>
        </div>
    </x-slot>

    <style>
        #output {
            display: none;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                                <form action="{{ Route('news.store') }}" enctype="multipart/form-data" method="POST"
                                    class="grid grid-flow-row-dense grid-cols-2 max-sm:grid-cols-1">

                                    @csrf

                                    <div class="col-span-1 mx-auto w-80 max-sm:w-full  md:w-full lg:w-full"
                                        id="wrapper">
                                        <h1>Suelta la imagen</h1>
                                        <span>o</span>
                                        <br />
                                        <label for="file-upload">Buscar</label>
                                        <input type="file" name="img" id="file-upload" multiple>
                                        <br />


                                        <div id="file-count"></div>
                                        <div id="file-preview">
                                        </div>
                                    </div>
                                    <div class="col-span-1 my-auto w-full max-sm:pl-0 pl-20 mx-auto mr-0">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input value="{{ $news['title'] }}" type="text" id="titulo"
                                                name="titulo"class=" font-bold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " requigreen>
                                            <label for="titulo"
                                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Título</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <div class="container mx-auto pt-4">
                                                <div class=" rounded-lg py-4 px-2">
                                                    <div class="mb-4 bg-gray-100 rounded-md">
                                                        <button id="boldButton"
                                                            class=" text-black  p-2 font-bold rounded hover:text-gray-400">Bold</button>
                                                        <button id="italicButton"
                                                            class="text-black p-2 italic rounded hover:text-gray-400">Italic</button>
                                                        <button id="underlineButton"
                                                            class="text-black p-2 underline rounded hover:text-gray-400">Underline</button>
                                                    </div>
                                                    <div contenteditable="true" value="{{ $news['contenido'] }}" id="editor"
                                                        class="bg-gray-50 overflow-auto p-2 border-4 rounded ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container mx-auto p-4">
                                                <textarea id="output" name="contenido" class="bg-gray-100 p-0 m-0 rounded " readonly></textarea>
                                            </div>
                                            <label for="contenido"
                                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contenido</label>
                                        </div>
                                        <button type="submit" id="submit"
                                            class="text-white bg-green-700  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-full py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                                                class="bi bi-cloud-upload"></i> &nbsp;Subir Noticia</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

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
    </script>
</x-app-layout>

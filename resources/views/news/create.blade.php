<x-app-layout>
    {{-- @vite(['resources/css/uploadNews.css', 'resources/js/uploadNews.js']) --}}
    <x-slot name="header">
        <div class="grid grid-cols-2 my-auto">
            <h2 class="font-semibold inline text-xl text-gray-800 dark:text-gray-200 leading-tight my-auto">
                {{ __('Nueva Noticia') }}
            </h2>
            <a type="submit" href="{{ Route('news.index') }}" id="submit"
                class="my-auto ml-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-26 sm:w-26 px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                    class="bi bi-arrow-left"></i> &nbsp;Volver
            </a>
        </div>
    </x-slot>

    <style>
        #output {
            display: none;
        }

        @import url('https://fonts.googleapis.com/css?family=Muli:400,700');

        * {
            box-sizing: border-box;
        }


        #submit {
            background: green;
            border: none;
            padding: 10px 20px;
            color: #fff;
            border-radius: 20px;
            margin-top: 15px;
        }

        #submit:hover {
            cursor: pointer;
            background: darkgreen;
        }

        #wrapper {

            padding: 5rem;
            background: #f1f1f1;
            display: flex;
            justify-content: center;
            flex-direction: column;
            border-radius: 20px;
            text-align: center;
            position: relative;
        }

        #wrapper:before {
            content: '';
            position: absolute;
            ;
            width: 110%;
            height: 110%;
            left: -25px;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            border-radius: 20px;
            z-index: -1;
            border: 2px dashed #f1f1f1;
        }

        #wrapper.highlight:before {
            border: 2px dashed #e1e1e1;
        }

        #wrapper.highlight {
            background: #d1d1d1;
        }

        #file-preview img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            display: inline-block;
            position: relative;
            margin: 5px;
        }

        #file-preview img:hover {
            cursor: pointer;
            opacity: .5;
        }

        #file-preview img:after {
            content: 'asfa';
            position: absolute;
            width: 100%;
            height: 100%;
            margin: auto;
            background: rgba(0, 0, 0, .6);
            z-index: 2;
        }

        input[type="file"] {
            display: none;
        }

        label[for="file-upload"] {
            padding: 10px 25px;
            border: 1px solid #a1a1a1;
            border-radius: 20px;
            font-size: 12px;
        }

        label[for="file-upload"]:hover {
            cursor: pointer;
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
                                        <input type='text' name='descripcion_img' placeholder='Descripcion de la imagen'>
                                    </div>
                                    <div class="col-span-1 my-auto w-full py-2 max-sm:pl-0 pl-20 mx-auto mr-0">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" id="titulo"
                                                name="titulo"class=" font-bold	 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
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
                                                    <div contenteditable="true" id="editor"
                                                        class="bg-gray-50 overflow-auto p-2 border-4 rounded h-40 w-full">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container mx-auto p-4">
                                                <textarea id="output" name="contenido" class="bg-gray-100 p-0 m-0 rounded w-full" readonly></textarea>
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




        (function() {
            const wrapper = document.getElementById('wrapper');
            const form = document.getElementById('form');
            const fileUpload = document.getElementById('file-upload');
            const fileCount = document.getElementById('file-count');
            const preview = document.getElementById('file-preview');
            const regex = /\.(jpg|png|jpeg)$/;
            let files = [];

            const dragEvents = ['dragstart, dragover', 'dragend', 'dragleave', 'drop'];
            dragEvents.forEach((eventTarget) => {
                wrapper.addEventListener(eventTarget, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('fired');
                });
            });

            window.addEventListener('drop', (e) => {
                e.preventDefault();
                e.stopImmediatePropagation();
            });
            window.addEventListener('dragover', (e) => {
                e.preventDefault();
                e.stopImmediatePropagation();
            });

            function dragstart() {
                wrapper.classList.add('highlight');
                console.log('dragstart');
            }

            function dragover() {
                wrapper.classList.add('highlight');
                console.log('dragover');
            }

            function dragend() {
                wrapper.classList.remove('highlight');
            }

            function dragleave() {
                wrapper.classList.remove('highlight');
            }

            function checkFile(selectedFiles) {
                for (let file of selectedFiles) {
                    if (regex.test(file.name)) {
                        files.push(file);
                    } else {
                        alert('You can only upload images');
                    }
                }
                createPreview(files);
            }

            function dropFiles(e) {
                console.log('drop');
                const transferredFiles = e.dataTransfer.files;
                checkFile(transferredFiles);
                console.log(files);
            }

            function createPreview(filelist) {
                preview.innerHTML = "";
                fileCount.innerHTML = "";
                let count = document.createElement('p');
                count.textContent = `${files.length} ${files.length <= 1 ? 'file' : 'files'} selected `;

                fileCount.appendChild(count);
                filelist.forEach((file) => {
                    const img = new Image();
                    img.setAttribute('src', URL.createObjectURL(file));
                    img.addEventListener('click', () => {
                        console.log('clicked');
                        files = files.filter((file) => file !== files[img.getAttribute('data-file')]);
                        createPreview(files);
                    });
                    img.dataset.file = filelist.indexOf(file);
                    preview.appendChild(img);
                });
            }

            wrapper.addEventListener('dragstart', dragstart);
            wrapper.addEventListener('dragover', dragover);
            wrapper.addEventListener('dragend', dragend);
            wrapper.addEventListener('dragleave', dragleave);
            wrapper.addEventListener('drop', dropFiles);

            fileUpload.addEventListener('change', (e) => {
                const files = e.target.files;
                checkFile(files);
            });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const formData = new FormData();

                if (files.length > 0) {
                    files.forEach((file) => {
                        formData.append('file', file);
                    });
                } else {
                    alert('You have not uploaded a file');
                }

                console.log('FILES: ', formData.getAll('file'));
            });

        })();
    </script>
</x-app-layout>

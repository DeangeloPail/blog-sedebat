<div>
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
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ Route('news.store') }}" enctype="multipart/form-data" method="POST"
                    class="grid grid-flow-row-dense  max-sm:grid-cols-1">
                    @csrf
                    <div class="p-6 text-gray-900 dark:text-gray-100" x-data="{
                        selectedWriter: '',
                        selected: 1,
                        total: 4,
                        canAdvance: false,
                        errorMessage: '',
                        previous() {
                            if (this.selected > 1) {
                                this.selected--;
                                this.updateCanAdvance();
                            }
                        },
                        next() {
                            this.updateCanAdvance();
                            if (this.canAdvance) {
                                if (this.selected < this.total) {
                                    this.selected++;
                                    this.errorMessage = '';
                                }
                            }
                        },
                        updateCanAdvance() {
                            if (this.selected === 1) {
                                this.canAdvance = this.selectedWriter !== '';
                                this.errorMessage = this.selectedWriter === '' ? 'Por favor, selecciona un escritor' : '';
                            } else if (this.selected === 2) {
                                const titulo = document.getElementById('titulo').value.trim();
                                const photo = document.getElementById('photo').files.length > 0;
                                this.canAdvance = titulo !== '' && photo;
                                this.errorMessage = titulo === '' ? 'Por favor, ingresa un título' : (photo ? '' : 'Por favor, selecciona una imagen');
                            } else if (this.selected === 3) {
                                const contenido = document.getElementById('output').value.trim();
                                this.canAdvance = contenido !== '';
                                this.errorMessage = contenido === '' ? 'Por favor, ingresa el contenido' : '';
                            } else {
                                this.canAdvance = true;
                                this.errorMessage = '';
                            }
                        }
                    }">

                        <ol
                            class="flex items-center w-full justify-center p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                            <li :class="selected >= 1 ? 'text-blue-600 dark:text-blue-500' : ''"
                                class="flex items-center ">
                                <span
                                    :class="selected >= 1 ? 'border-blue-600 dark:border-blue-500' :
                                        'border-gray-500 dark:border-gray-400'"
                                    class="flex items-center justify-center w-5 h-5 me-2 text-xs border  rounded-full shrink-0 ">
                                    <i x-text="selected <= 1 ? '1' : '' "
                                        :class="selected > 1 ? 'bi bi-check text-lg' : ''"></i>
                                </span>
                                Paso 1
                                <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                                </svg>
                            </li>
                            <li :class="selected >= 2 ? 'text-blue-600 dark:text-blue-500' : ''"
                                class="flex items-center">
                                <span
                                    :class="selected >= 2 ? 'border-blue-600 dark:border-blue-500' :
                                        'border-gray-500 dark:border-gray-400'"
                                    class="flex items-center justify-center w-5 h-5 me-2 text-xs border  rounded-full shrink-0 ">
                                    <i x-text="selected <= 2 ? '2' : '' "
                                        :class="selected > 2 ? 'bi bi-check text-lg' : ''"></i>
                                </span>
                                Paso 2
                                <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                                </svg>
                            </li>
                            <li :class="selected > 2 ? 'text-blue-600 dark:text-blue-500' : ''"
                                class="flex items-center">
                                <span
                                    :class="selected > 2 ? 'border-blue-600 dark:border-blue-500' :
                                        'border-gray-500 dark:border-gray-400'"
                                    class="flex items-center justify-center w-5 h-5 me-2 text-xs border rounded-full shrink-0 ">
                                    <i x-text="selected <= 3 ? '3' : '' "
                                        :class="selected > 3 ? 'bi bi-check text-lg' : ''"></i>
                                </span>
                                Paso 3
                            </li>
                        </ol>
                        <div class="max-w-2xl mx-auto my-10">


                            <div x-show="selected === 1" x-transition:enter="transition ease-out duration-800"
                                x-transition:enter-start="opacity-0 translate-x-full"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Escritor</label>
                                <div class="relative my-5 ">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search"  wire:model.live='searchWriters'
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Elije al escritor" />
                                </div>

                                <div class="flex w-full gap-5 flex-wrap justify-center">

                                    <input x-bind:value="selectedWriter" hidden name="writer_id">



                                    @forelse($writers as $writer)
                                        <div @click="selectedWriter = {{ $writer->id }} "
                                            x-on:click="errorMessage = ''"
                                            :class="[selectedWriter == {{ $writer->id }} ?
                                                'dark:border-blue-800 bg-blue-300 border-blue-200 scale-110 dark:bg-blue-700' :
                                                'bg-gray-200 dark:bg-gray-700', errorMessage ?
                                                'dark:border-red-600 border-red-600 bg-red-200 dark:bg-transparent' : ''
                                            ]"
                                            class="flex justify-between items-centern w-52 gap-4  cursor-pointer hover:scale-110 ease-in duration-200 py-2 px-3 rounded-lg">

                                            <div>
                                                <img src="{{ asset("storage/{$writer->img}") }}" alt=""
                                                    class="rounded-full h-10 w-10 object-cover">
                                            </div>

                                            <div class="flex flex-col w-32 justify-center items-center">

                                                <h5 class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $writer->name }} {{ $writer->last_name }}</h5>
                                                <span
                                                    class="text-xs text-gray-500 dark:text-gray-400">{{ $writer->email }}</span>
                                            </div>

                                        </div>


                                    @empty
                                    @endforelse
                                    <a href={{ route('writers') }}>
                                        <div
                                            class="flex hover:scale-110 ease-in duration-200 justify-center items-centern w-52 gap-4 bg-green-300 dark:bg-green-600 py-2 px-3 rounded-lg">

                                            <div class="text-4xl">
                                                <i class="bi bi-plus"></i>
                                            </div>

                                            <div class="flex flex-col justify-center items-center">

                                                <h5 class="text-sm font-medium text-gray-900 dark:text-white">
                                                    Registrar escritor
                                                </h5>
                                            </div>

                                        </div>
                                    </a>

                                </div>
                                <div class='pt-8'>
                                    {{ $writers->links('vendor.livewire.tailwind') }}
                                </div>

                                <p x-text="errorMessage" class="text-red-500 mt-2"></p>
                            </div>

                            <div x-show="selected === 2" x-transition:enter="transition ease-out duration-800"
                                x-transition:enter-start="opacity-0 translate-x-full"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" id="titulo"
                                        x-on:input="errorMessage = errorMessage.replace('Por favor, ingresa un título', '')"
                                        x-bind:class="[errorMessage == 'Por favor, ingresa un título' ? 'border-red-500' :
                                            'border-gray-300 dark:border-gray-600  '
                                        ]"
                                        name="titulo"class=" font-bold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 appearance-none dark:text-white dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " requigreen>
                                    <label for="titulo"
                                        x-bind:class="[errorMessage == 'Por favor, ingresa un título' ? 'text-red-500' :
                                            'text-gray-500 dark:text-gray-400'
                                        ]"
                                        class="peer-focus:font-medium absolute text-sm  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Título</label>
                                </div>

                                <div x-data="{ photoName: null, photoPreview: null }" class="flex flex-col"
                                    x-on:writer-created.window='photoName = null; photoPreview = null; $refs.photo.value = null;'>

                                    <div class='flex w-full'>


                                        <div class="col-span-6 sm:col-span-4 w-full">
                                            <!-- Profile Photo File Input -->
                                            <input type="file" id="photo" class="hidden" name="img"
                                                accept="image/png, image/jpeg"
                                                x-on:writer-created='photoName = null, photoPreview = null, $refs.photo.value = null;'
                                                x-ref="photo"
                                                x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                            console.log($refs.photo.files[0])
                                            " />


                                            <x-label for="photo" value="{{ __('Imagen de la portada') }}" />

                                            <div class='text-orange-300 ' x-on:click.prevent="$refs.photo.click()">

                                                <!-- Current Profile Photo -->
                                                <div class="mt-2 relative cursor-pointer p-4"
                                                    x-on:writer-created="!photoPreview" x-show="! photoPreview">

                                                    <div x-bind:class="[errorMessage == 'Por favor, selecciona una imagen' ?
                                                        'border-red-600 border-2' : ''
                                                    ]"
                                                        class="flex items-center justify-center border-solid  rounded-lg  w-full">
                                                        <label for="dropzone-file"
                                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 p-10 pb-6">
                                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                                </svg>
                                                                <p
                                                                    class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                                    <span class="font-semibold">Click para subir una
                                                                        imagen</span>

                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                                            </div>

                                                        </label>
                                                    </div>



                                                </div>

                                                <!-- New Profile Photo Preview -->
                                                <div class="mt-2 relative p-4 cursor-pointer w-full hover:opacity-40 ease-in duration-100"
                                                    x-show="photoPreview" style="display: none;">
                                                    <span
                                                        class="block rounded-lg  w-[20xw] h-[37vh] bg-cover bg-no-repeat bg-center"
                                                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                                    </span>

                                                </div>



                                            </div>



                                            <p x-text="errorMessage" class="text-red-500 mt-2"></p>
                                        </div>

                                    </div>


                                </div>

                            </div>

                            <div x-show="selected === 3" x-transition:enter="transition ease-out duration-800"
                                x-transition:enter-start="opacity-0 translate-x-full"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <div class="col-span-1 my-auto w-full ">

                                    <div class="relative z-0 w-full group">
                                        <div class="container mx-auto pt-4">
                                            <div class=" rounded-lg py-4 px-2">
                                                <div class="mb-4 bg-gray-100 rounded-md  dark:bg-gray-600">
                                                    <button id="boldButton"
                                                        class=" text-black  p-2 font-bold dark:text-white ease-in duration-100 dark:hover:text-gray-400 rounded hover:text-gray-400">Bold</button>
                                                    <button id="italicButton"
                                                        class="text-black p-2 italic rounded dark:text-white ease-in duration-100 dark:hover:text-gray-400 hover:text-gray-400">Italic</button>
                                                    <button id="underlineButton"
                                                        class="text-black p-2 underline rounded dark:text-white ease-in duration-100 dark:hover:text-gray-400 hover:text-gray-400">Underline</button>
                                                </div>
                                                <div contenteditable="true" id="editor"
                                                    x-bind:class="[errorMessage ? 'border-red-600 border-2 borderl-solid' : '']"
                                                    class="bg-gray-200  overflow-auto p-2 text-black border-2 rounded h-48 w-full">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container mx-auto ">
                                            <textarea id="output" name="contenido" class=" p-0 m-0 rounded w-full" readonly></textarea>
                                        </div>

                                        <label for="contenido"
                                            class="peer-focus:font-medium  absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contenido</label>
                                    </div>
                                    <p x-text="errorMessage" class="text-red-500 mt-2"></p>
                                </div>
                            </div>

                            <div x-show="selected > 3" x-transition:enter="transition ease-out duration-800"
                                x-transition:enter-start="opacity-0 translate-x-full"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <div class="flex items-center">
                                    <svg class="flex-shrink-0 w-4 h-4 me-2 dark:text-gray-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300">
                                        ¿Estás seguro de subir el articulo?
                                    </h3>
                                </div>
                                <div class="mt-2 mb-4 text-sm text-gray-800 dark:text-gray-300">
                                    Estas apunto de subir este articulo asegurate que esta todo correcto, posteriormente
                                    podras editar el articulo en el modulo de edicion.
                                </div>
                                <div class="flex">
                                    <button type="submit"
                                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-800">
                                        <i class="bi mr-2 text-lg bi-check2-circle"></i>
                                        Si, estoy seguro!
                                    </button>
                                    <button type="button" @click="selected = 1"
                                        class="text-gray-800 bg-transparent border border-gray-700 hover:bg-gray-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:ring-gray-800 dark:text-gray-300 dark:hover:text-white"
                                        data-dismiss-target="#alert-additional-content-5" aria-label="Close">
                                        Volver al primer paso
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="text-center my-2 flex w-full justify-center gap-40">
                            <button type="button" @click="previous"
                                class="rounded text-5xl duration-200 hover:text-blue-600 p-2"
                                :class="selected === 1 ? 'hidden' : ''"><i
                                    class="bi bi-arrow-left-short"></i></button>

                            <button type="button" @click="next"
                                class="rounded text-5xl ease-in duration-200 hover:text-blue-600 p-2"
                                :class="selected === total ? 'hidden' : ' '"><i
                                    class="bi bi-arrow-right-short"></i></button>
                        </div>

                </form>
                {{-- <form action="{{ Route('news.store') }}" enctype="multipart/form-data" method="POST"
                                    class="grid grid-flow-row-dense  max-sm:grid-cols-1">

                                    @csrf

                                    <div class="col-span-1 mx-auto border-2 border-solid dark:border-slate-700 border-slate-200 bg-gray-50 dark:bg-gray-600 w-80 max-sm:w-full max-w-[50vw] mb-10 h-[40vh] md:w-full lg:w-full"
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
                                        <input class="rounded-lg dark:bg-gray-700" type='text' name='descripcion_img' placeholder='Descripcion de la imagen'>
                                    </div>
                                    <div class="col-span-1 my-auto w-full py-2 max-sm:pl-0 pl-20 mx-auto -ml-10">
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
                                                    <div class="mb-4 bg-gray-100 rounded-md  dark:bg-gray-600">
                                                        <button id="boldButton"
                                                            class=" text-black  p-2 font-bold dark:text-white ease-in duration-100 dark:hover:text-gray-400 rounded hover:text-gray-400">Bold</button>
                                                        <button id="italicButton"
                                                            class="text-black p-2 italic rounded dark:text-white ease-in duration-100 dark:hover:text-gray-400 hover:text-gray-400">Italic</button>
                                                        <button id="underlineButton"
                                                            class="text-black p-2 underline rounded dark:text-white ease-in duration-100 dark:hover:text-gray-400 hover:text-gray-400">Underline</button>
                                                    </div>
                                                    <div contenteditable="true" id="editor"
                                                        class="bg-gray-200 overflow-auto p-2 text-black dark:border-gray-500 border-2 rounded h-80 w-full">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container mx-auto p-4">
                                                <textarea id="output" name="contenido" class=" p-0 m-0 rounded w-full" readonly></textarea>
                                            </div>

                                            <label for="contenido"
                                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contenido</label>
                                        </div>
                                        <button type="submit" id="submit"
                                            class="text-white bg-green-700  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-full py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                                                class="bi bi-cloud-upload"></i> &nbsp;Subir Noticia</button>

                                    </div>

                                </form> --}}



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
</div>

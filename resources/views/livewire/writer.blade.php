<div x-data="{ showCard: true }">

    <x-button @click="showCard = ! showCard">Toggle</x-button>

    <div class='flex'>

        <div x-show="showCard" x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 -translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            
            class="bg-white mb-8 dark:bg-gray-800 dark:text-gray-200 shadow w-full rounded-lg py-4">
            <form x-data x-on:submit.prevent class="mx-4">

                <div class="flex gap-5">
                    <div class="mb-4 w-full">
                        <x-label>
                            Nombre
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="Pedro"
                            wire:model.live='writerCreated.name' />
                        <x-input-error for="writerCreated.name" />
                    </div>

                    <div class="mb-4 w-full">
                        <x-label>
                            Apellido
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="Peréz"
                            wire:model.live='writerCreated.last_name' />
                        <x-input-error for="writerCreated.last_name" />
                    </div>
                </div>

                <div class="flex gap-5">
                    <div class="mb-4 w-full">
                        <x-label>
                            Email
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="pedro@gmail.com"
                            wire:model.live='writerCreated.email' />
                        <x-input-error for="writerCreated.email" />
                    </div>

                    <div class="mb-4 w-full">
                        <x-label>
                            Direccion
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="Estado y ciudad"
                            wire:model.live='writerCreated.location' />
                        <x-input-error for="writerCreated.location" />
                    </div>
                </div>

                <div class="flex gap-5">
                    <div class="mb-4 w-full">
                        <x-label>
                            Profesion
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="Poeta"
                            wire:model.live='writerCreated.profession' />
                        <x-input-error for="writerCreated.profession" />
                    </div>

                    <div class="mb-4 w-full">

                        <livewire:tags-input label="Estudios" placeholder="Ingresa los estudios"
                            wire:model.live="arrayTags">
                            <p id="tags-helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                Separa los estudios con comas y presiona enter</p>

                            <x-input-error for="writerCreated.studies" />

                    </div>
                </div>

                <div x-data="{ photoName: null, photoPreview: null }" class="flex flex-col gap-5"
                    x-on:writer-created.window='photoName = null; photoPreview = null; $refs.photo.value = null;'>

                    <div class='flex gap-5 w-full'>


                        <div class="col-span-6 sm:col-span-4 w-full">
                            <!-- Profile Photo File Input -->
                            <input type="file" id="photo" class="hidden"
                                x-on:writer-created='photoName = null, photoPreview = null, $refs.photo.value = null;'
                                wire:model.live="writerCreated.image" x-ref="photo"
                                x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                " />


                            <x-label for="photo" value="{{ __('Foto del Escritor') }}" />

                            <div class='flex gap-4 justify-around align-end curson-pointer text-orange-300'
                                x-on:click.prevent="$refs.photo.click()">

                                <!-- Current Profile Photo -->
                                <div class="mt-2 relative cursor-pointer" x-on:writer-created="!photoPreview"
                                    x-show="! photoPreview">
                                    <img src="{{ asset('img/profile_img.png') }}" alt=""
                                        class="rounded-full h-32 w-32 object-cover">
                                    <span class="text-4xl absolute -top-2 -right-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </span>
                                </div>

                                <!-- New Profile Photo Preview -->
                                <div class="mt-2 relative cursor-pointer" x-show="photoPreview" style="display: none;">
                                    <span class="block rounded-full h-32 w-32 bg-cover bg-no-repeat bg-center"
                                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                    <span class="text-4xl absolute -top-2 -right-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </span>
                                </div>



                            </div>



                            <x-input-error for="photo" class="mt-2" />
                        </div>


                        <div class="w-full">
                            <x-label>
                                Descripcion
                            </x-label>
                            <x-textarea class="w-full mt-2 max-h-28 min-h-10 px-2 h-28" placeholder="Descripción"
                                wire:model.live='writerCreated.description'></x-textarea>
                            <x-input-error for="writerCreated.description" />

                        </div>

                    </div>

                    <div class="flex justify-end">
                        <x-button type='button' wire:click="save">
                            crear
                        </x-button>
                    </div>
                </div>
            </form>

        </div>

        <div x-show="!showCard" x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            
            class="w-full">

            <div
                class="flex items-center  justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 dark:bg-gray-900">
                {{-- <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        <span class="sr-only">Action button</span>
                        Action
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                        </div>
                    </div>
                    </div> --}}
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block pt-2 ps-10 text-sm bg-white text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar escritores">
                </div>
            </div>

            <div class="relative shadow-md overflow-x-auto sm:rounded-lg">

                <table class="w-full shadow text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Profesion
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Direccion
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($writers as $writer)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <div>
                                        <img src="{{ asset("storage/{$writer->img}") }}" alt=""
                                            class="rounded-full h-12 w-12 object-cover">
                                    </div>
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $writer->name }}
                                            {{ $writer->last_name }}
                                        </div>
                                        <div class="font-normal text-gray-500">{{ $writer->email }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $writer->profession }}
                                </td>
                                <td class="px-6 py-4">
                                    <p>
                                        {{ $writer->location }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-8 justify-center">
                                        <!-- Modal toggle -->
                                        <p class=" text-yellow-400 text-md font-black cursor-pointer" x-data
                                            x-on:click="$dispatch('open-modaledit')"
                                            wire:click="edit( {{ $writer->id }} )">
                                            Editar
                                        </p>

                                        <!-- Modal toggle -->
                                        <p class=" text-red-500 text-md font-black cursor-pointer" x-data"
                                            x-on:click="$dispatch('writer-delete-warning', { writerId: '{{ $writer->id }}'})">
                                            Eliminar
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <x-modal id='Edit' maxWidht='lg' title='Editar Información'>

        <div class="p-2 pt-5">
            <form class="mx-4">

                <div class="flex gap-5">
                    <div class="mb-4 w-full">
                        <x-label>
                            Nombre
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="Pedro"
                            wire:model.live='writerEdit.name' />
                        <x-input-error for="writerEdit.name" />
                    </div>

                    <div class="mb-4 w-full">
                        <x-label>
                            Apellido
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="Peréz"
                            wire:model.live='writerEdit.last_name' />
                        <x-input-error for="writerEdit.last_name" />
                    </div>
                </div>

                <div class="flex gap-5">
                    <div class="mb-4 w-full">
                        <x-label>
                            Email
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="pedro@gmail.com"
                            wire:model.live='writerEdit.email' />
                        <x-input-error for="writerEdit.email" />
                    </div>

                    <div class="mb-4 w-full">
                        <x-label>
                            Direccion
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="Estado y ciudad"
                            wire:model.live='writerEdit.location' />
                        <x-input-error for="writerEdit.location" />
                    </div>
                </div>

                <div class="flex gap-5">
                    <div class="mb-4 w-full">
                        <x-label>
                            Profesion
                        </x-label>
                        <x-input class="w-full mt-2 h-8 px-2" placeholder="Poeta"
                            wire:model.live='writerEdit.profession' />
                        <x-input-error for="writerEdit.profession" />
                    </div>

                    <div class="mb-4 w-full">

                        <livewire:tags-input label="Estudios" placeholder="Ingresa los estudios"
                            wire:model.live="writerEdit.arrayTags">
                            <p id="tags-helper-text-explanation"
                                class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                Separa los estudios con comas y presiona enter</p>

                            <x-input-error for="writerCreated.studies" />

                    </div>
                </div>

                <div x-data="{ photoName: null, photoPreview: null }" class="flex flex-col gap-5"
                    x-on:writer-updated.window='photoName = null; photoPreview = null; $refs.photo.value = null;'>

                    <div class='flex gap-5 w-full'>


                        <div class="col-span-6 sm:col-span-4 w-full">
                            <!-- Profile Photo File Input -->
                            <input type="file" id="photo" class="hidden" wire:model.live='writerEdit.image'
                                x-ref="photo"
                                x-on:change="
                                                    photoName = $refs.photo.files[0].name;
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => {
                                                        photoPreview = e.target.result;
                                                    };
                                                    reader.readAsDataURL($refs.photo.files[0]);
                                        " />


                            <x-label for="photo" value="{{ __('Foto de Perfil') }}" />

                            <div class='flex gap-4 justify-around align-end curson-pointer text-orange-300'
                                x-on:click.prevent="$refs.photo.click()">

                                <!-- Current Profile Photo -->
                                <div class="mt-2 relative cursor-pointer" x-on:writer-created="!photoPreview"
                                    x-show="! photoPreview">
                                    <img src="{{ asset($writerEdit->oldImage) }}" alt=""
                                        class="rounded-full h-32 w-32 object-cover">
                                    <span class="text-4xl absolute -top-2 -right-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </span>
                                </div>

                                <!-- New Profile Photo Preview -->
                                <div class="mt-2 relative cursor-pointer" x-show="photoPreview"
                                    style="display: none;">
                                    <span class="block rounded-full h-32 w-32 bg-cover bg-no-repeat bg-center"
                                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                    <span class="text-4xl absolute -top-2 -right-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </span>
                                </div>



                            </div>



                            <x-input-error for="photo" class="mt-2" />
                        </div>


                        <div class="w-full">
                            <x-label>
                                Descripcion
                            </x-label>
                            <x-textarea class="w-full mt-2 max-h-28 min-h-10 px-2 h-28" placeholder="Descripción"
                                wire:model.live='writerEdit.description'></x-textarea>
                            <x-input-error for="writerEdit.description" />

                        </div>

                    </div>

                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t mt-8 border-gray-200 rounded-b dark:border-gray-600">
                    <x-button type="button" wire:click="update" x-on:click="$dispatch('close-modaledit')"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</x-button>
                    <button x-on:click="$dispatch('close-modaledit')" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </form>

        </div>

    </x-modal>


    @script
        <script>
            $wire.on('writer-created', () => {
                Swal.fire({
                    position: "top-end",
                    title: "Escritor registrado",
                    toast: true,
                    timer: 1500,
                    background: "#66997c",
                    icon: "success",
                    showConfirmButton: false,
                    timerProgressBar: true,
                    showCloseButton: true
                });
            });

            $wire.on('writer-updated', () => {
                Swal.fire({
                    position: "top-end",
                    title: "Escritor actualizado",
                    toast: true,
                    timer: 1500,
                    background: "#66997c",
                    icon: "success",
                    showConfirmButton: false,
                    timerProgressBar: true,
                    showCloseButton: true
                });
            });

            $wire.on('writer-delete-warning', (writerId) => {
                Swal.fire({
                    title: "¿Estas seguro de eliminar al escritor?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, estoy seguro",
                    customClass: {
                        popup: 'bg-gray-100 dark:bg-gray-700 rounded-lg',
                        title: 'text-gray-700 dark:text-white',
                    },
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.dispatch('delete-writer', {
                            writerId: writerId
                        });
                        Swal.fire({
                            title: "Eliminación exitosa",
                            icon: "success",
                            customClass: {
                                popup: 'bg-gray-100 dark:bg-gray-700 rounded-lg',
                                title: 'text-gray-700 dark:text-white',
                            },
                        });
                    }
                });
            });
        </script>
    @endscript
</div>
</div>

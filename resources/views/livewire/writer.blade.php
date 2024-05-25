<div>
    <div class="bg-white mb-8 dark:bg-gray-800 dark:text-gray-200 shadow rounded-lg py-4">
        <form class="mx-4" wire:submit="save">
            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>
                <x-input class="w-full" wire:model.live='postCreated.title' />
                <x-input-error for="postCreated.title" />
            </div>

            <div>
                <x-label>
                    contenido
                </x-label>
                <x-textarea class="w-full" wire:model.live='postCreated.content'></x-textarea>
                <x-input-error for="postCreated.content" />

            </div>

            <div class="mb-4">
                <x-label>
                    Categoria
                </x-label>

                <x-select class="w-full" wire:model='postCreated.category_id'>
                    <option value="" disabled>Seleleccione una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="postCreated.category_id" />

            </div>

            <div class="mb-4">
                <x-label>
                    Etiquetas
                </x-label>

                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model='postCreated.tags' value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
                <x-input-error for="postCreated.tags" />

            </div>

            <div class="flex justify-end">
                <x-button>
                    crear
                </x-button>
            </div>
        </form>

    </div>

    <div class="bg-white p-6 dark:bg-gray-800 dark:text-gray-200 shadow rounded-lg py-4">
        <ul class="list-disc list-inside space-y-2">

            @foreach ($posts as $post)
                <li class="flex justify-between" wire:key="post-{{ $post->id }}">
                    {{ $post->title }}

                    <div>
                        <x-button wire:click="edit( {{ $post->id }} )">
                            Editar
                        </x-button>

                        <x-danger-button wire:click="destroy({{ $post->id }})">
                            Eliminar
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>


    {{-- formulario de edicion --}}


    <form class="mx-4" wire:submit="update">
        <x-dialog-modal wire:model="postEdit.open">

            <x-slot name="title">
                Actualizar Post
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label>
                        Nombre
                    </x-label>
                    <x-input class="w-full" wire:model.live='postEdit.title' />
                    <x-input-error for="postEdit.title" />
                </div>

                <div>
                    <x-label>
                        contenido
                    </x-label>
                    <x-textarea class="w-full" wire:model.live='postEdit.content'></x-textarea>
                    <x-input-error for="postEdit.content" />
                </div>

                <div class="mb-4">
                    <x-label>
                        Categoria
                    </x-label>

                    <x-select class="w-full" wire:model='postEdit.category_id'>
                        <option value="" disabled>Seleleccione una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="postEdit.category_id" />

                </div>

                <div class="mb-4">
                    <x-label>
                        Etiquetas
                    </x-label>

                    <ul>
                        @foreach ($tags as $tag)
                            <li>
                                <label>
                                    <x-checkbox wire:model='postEdit.tags' value="{{ $tag->id }}" />
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <x-input-error for="postEdit.tags" />

                </div>

            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-danger-button class="mr-2" wire:click="$set('postEdit.open', false)">
                        Cancelar
                    </x-danger-button>
                    <x-button>
                        actualizar
                    </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </form>

    @push('js')
        <script>
            Livewire.on('post-created', function(comment) {
                console.log(comment);
            });
        </script>
    @endpush

</div>
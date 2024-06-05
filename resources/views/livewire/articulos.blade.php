<div class=" mt-28 container mx-auto items-center">
    <div
        class="w-full p-6 py-14 pb-32 bg-blueGray-200 border-gray-300 border-2 rounded-lg shadow dark:bg-gray-500 dark:border-gray-600">
        <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white">Blogs</h5>

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
                <input wire:model.live='searchingNews' type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Busca tu articulo" required />
               
            </div>

        </div>

        {{-- articulos --}}
            <div class="flex flex-col max-lg:w-full">
            
            @foreach ($news as $new)
                <a href="{{ route('news.guestShow', $new->id) }}"
                    class="transition realative max-lg:flex-col max-lg:h-full max-lg:w-full mx-auto ease-in-out h-64 delay-150 hover:-translate-y-5 hover:scale-100 duration-300 flex flex-col mt-16 w-4/5 items-center bg-white border border-gray-200 rounded-lg shadow lg:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="overflow-hidden max-lg:w-full rounded-lg w-2/5 h-full">
                    
                        <img class="object-cover w-[40vw] h-[40vh] max-lg:h-64 max-lg:w-full rounded-l-lg"
                            src="{{ asset("storage/public/images/news/{$new->img}") }}" alt="">
                        
                    </div>
                    <div class="flex flex-col w-3/5 h-full max-lg:w-full justify-between p-4 overflow-hidden leading-normal">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $new->titulo }}</h5>
                        <p class="mb-3  text-gray-700 overflow-hidden dark:text-gray-400">
                            {{ summary($new->contenido, 280) }}
                        </p>
                        <div class="flex items-center  mt-5 justify-between">
                            <div class="flex items-center">
                                <img class="w-7 h-7 rounded-full shadow-lg"
                                    src="{{ config('app.app_url') . '/storage/' . $new->writerImg }}"
                                    alt="">
                                <span
                                    class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $new->name }}</span>
                            </div>
                            <span class="text-xs font-normal text-gray-500 dark:text-gray-400">{{ formatearFecha($new->created_at) }}</span>
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

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

   <livewire:create-articulo>


</x-app-layout>

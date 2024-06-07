<div class="w-full p-4 bg-white border border-gray-200   rounded-lg shadow sm:p-8 dark:bg-gray-800  dark:border-gray-700">
    <div class="flex items-center justify-center mb-14">
        <h5 class="font-bold text-5xl text-center leading-none text-gray-900 dark:text-white">Nuestros autores</h5>
   </div>
   <div class="flow-root">
       <div class=" mx-auto w-7/12 ">   
           <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Busca a un escritor</label>
           <div class="relative">
               <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                   <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                   </svg>
               </div>
               <input type="search" wire:model.live='searchWriters' id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Busca a un escritor" required />
           </div>
       </div>
        <div role="list" class="mt-12 grid grid-cols-1    max-sm:grid-cols-2 lg:grid-cols-6 gap-6 xl:grid-cols-7 row-auto col-span-3 divide-gray-200 dark:divide-gray-700">
            @foreach ($writers as $writer)
               <a href="{{ route('autorProfile', $writer->id) }}" title="{{ $writer->name }} {{ $writer->last_name }}"class="group transition ease-in-out delay-50 hover:-translate-y-2 hover:scale-100 duration-200 flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="{{ asset("storage/{$writer->img}") }}" class="ml-2 w-16 shadow-xl h-16 object-cover mb-3 rounded-full ">
                    <p class="text-center dark:text-white font-bold  text-sm mt-1">{{ $writer->name }} {{ $writer->last_name }}</p>
                    <p class="text-xs text-gray-500 text-center">{{ $writer->profession }}</p>
                </a>
            @endforeach
        </div> 

        
        <div class='pt-8'>
            {{ $writers->links('vendor.livewire.tailwind') }}
        </div>
   </div>
</div>
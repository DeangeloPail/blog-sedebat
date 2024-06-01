<div>
    <x-label>
        {{ $label }}
    </x-label>

    <x-input class="w-full mt-2 h-8 px-2" placeholder="{{ $placeholder }}" wire:model.live='stringTags'
        wire:keydown.enter='tagsLoad' />



    <div id="tags-container " class="mt-2 flex flex-wrap gap-2">
        @forelse ($arrayTags as $key => $tag)
            <p wire:click='deleteTag({{ $key }})'
                class="dark:text-white bg-gray-200 dark:bg-gray-600 rounded-md p-2 flex text-sm hover:bg-slate-400 ease-in duration-100 cursor-pointer">
                <span class="pr-2">{{ $tag }}</span>
                <i class="bi bi-x"></i>
            </p>
        @empty
            <p></p>
        @endforelse
    </div>

    
</div>

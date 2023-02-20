<div>
    <div class="h-max-full">
        <div class="relative">
            <img src="{{ $photo->getFirstMedia()->getUrl() }}" srcset="{{ $photo->getFirstMedia()->getSrcset() }}"
                alt="{{ $photo->name }}" class="w-full">
            <div class="absolute top-0 left-0 w-1/2 h-full cursor-w-resize">
                <img wire:click="leftclick()" src="{{ url('images/empty.png') }}" alt="Overlay Image"
                    class="w-full h-full">
            </div>
            <div wire:click="rightclick()" class="absolute top-0 right-0 w-1/2 h-full cursor-e-resize">
                <img src="{{ url('images/empty.png') }}" alt="Overlay Image" class=" w-full h-full">
            </div>


        </div>
        <div class="text-semibold text-2xl text-right mt-4">
            {{ $currentIdx + 1 . '/' . $maxIdx + 1 }}
        </div>
    </div>
</div>

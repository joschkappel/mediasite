<div>
    <div class="grid md:grid-cols-2 gap-8 p-2 h-screen">
        @if ($current_photo != null)
            <div class="h-max-full">
                <div class="relative">
                    <img src="{{ $current_photo->getFirstMedia()->getUrl() }}"
                        srcset="{{ $current_photo->getFirstMedia()->getSrcset() }}" alt="{{ $current_photo->name }}"
                        class="w-full">
                    <div class="absolute top-0 left-0 w-1/2 h-full cursor-w-resize">
                        <img wire:click="leftclick()" src="{{ url('images/empty.png') }}" alt="Overlay Image"
                            class="w-full h-full">
                    </div>
                    <div wire:click="rightclick()" class="absolute top-0 right-0 w-1/2 h-full cursor-e-resize">
                        <img src="{{ url('images/empty.png') }}" alt="Overlay Image" class=" w-full h-full">
                    </div>


                </div>
                <div class="text-semibold text-2xl text-right mt-4">
                    {{ $current_key + 1 . '/' . $max_key + 1 }}
                </div>
            </div>
        @endif
        <div flex flex-row>
            <div class="text-semibold
                text-2xl text-left mt-4">
                {{ $photos->where('gallery_tag', 'pic1')->first()->name }}
            </div>
            <div class=" text-md text-left mt-4">
                {{ $photos->where('gallery_tag', 'pic1')->first()->description }}
            </div>
            <div class="text-md text-left mt-24">
                {{ $project->info_en }}
            </div>
            <div class="relative">
                <img src="{{ $photos->where('gallery_tag', 'pic1')->first()->getFirstMedia()->getUrl() }}"
                    srcset="{{ $photos->where('gallery_tag', 'pic1')->first()->getFirstMedia()->getSrcset() }}"
                    alt="{{ $photos->where('gallery_tag', 'pic1')->first()->name }}" class="w-full">
            </div>

        </div>
    </div>
</div>

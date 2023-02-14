<div>
    <div class="grid md:grid-cols-2 gap-8 p-2 h-screen">
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
                {{ $current_key + 1 . '/' . $photos->count() }}
            </div>
        </div>
        <div>
            <div class="text-semibold
                text-2xl text-left mt-4">
                {{ $current_photo->name }}
            </div>
            <div class=" text-md text-left mt-4">
                {{ $current_photo->description }}
            </div>
            <div class="text-md text-left mt-24">
                {{ $project->info_en }}
            </div>
            <div class="grid grid-cols-8 gap-2 mt-12">
                @foreach ($photos as $key => $p)
                    <img wire:click="getphoto({{ $key }})"
                        class="w-24 h-24 object-cover drop-shadow-md
                    @if ($key == $current_key) blur-sm @else blur-none @endif"
                        src="{{ $p->thumbnail }}" alt="{{ $p->name }}">
                @endforeach
            </div>
        </div>
    </div>
</div>

<div>
    <div class="grid md:grid-cols-2 gap-8 p-2 h-screen">
        <x-gallery.carousel :current-idx="$current_key" :photo="$current_photo" :max-idx="$max_key">
        </x-gallery.carousel>
        <div>
            <div class="text-semibold
                text-2xl text-left mt-4">
                {{ $current_photo->name }}
            </div>
            <div class=" text-md text-left mt-4">
                {!! $current_photo->description !!}
            </div>
            <div class="text-md text-left mt-24">
                {!! $project->info_en !!}
            </div>
        </div>
    </div>
</div>

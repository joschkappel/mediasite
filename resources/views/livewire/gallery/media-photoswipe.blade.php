<div>
    <div class="grid grid-cols-1 md:grid-cols-4 m-4 gap-4">
        <div class="col-start-1 px-8 text-left">
            <!-- projcet details -->
            <p class="text-2xl font-extrabold">{{ $project->name }}</p>
            <p class="mt-4  font-semibold">{{ $project->info_time }}</p>
            <p class="mt-4 font-semibold">{{ $project->info_de }}</p>
            <p class="mt-4 font-semibold">{{ $project->info_en }}</p>
            <div class="flex mt-8">
                <div class="text-left ext-swiper-pagination"></div>
                <div class="text-right swiper-pagination-fraction"></div>
            </div>
        </div>
        <!-- photo wall main container -->
        <div class="pswp-gallery col-span-3 grid grid-cols-1 md:grid-cols-3 gap-8" id="media-gallery">
            @foreach ($carousel as $p)
                <a href="{{ $p->getFirstMedia()->getUrl() }}" target="_blank"
                    data-pswp-srcset="{{ $p->getFirstMedia()->getSrcSet() }}" data-pswp-width="{{ $p->width }}"
                    data-pswp-height="{{ $p->height }}">
                    <img src="{{ $p->getFirstMedia()->getUrl() }}" alt="{{ $p->name }}">
                    <span class="pswp-caption-content">
                        <p class="text-2xl font-semibold">{{ $p->name }}</p>
                        <p>{{ $p->description }}</p>
                    </span>
                </a>
            @endforeach
        </div>

    </div>

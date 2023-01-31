<div>
    <div class="aspect-video hover:border-2 p-2 text-justify">
        <div id="carouselExampleCaptions" class="carousel slide relative" data-bs-ride="carousel">
            <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
                @foreach ($photos as $photo)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}"
                        @if ($loop->first) class="active" aria-current="true" @endif
                        aria-label="Slide {{ $loop->index + 1 }}">
                    </button>
                @endforeach
            </div>
            <div class="carousel-inner relative w-full overflow-hidden rounded-2xl drop-shadow-xl">
                @foreach ($photos as $photo)
                    <div
                        class="carousel-item @if ($loop->first) active @endif relative float-left w-full">
                        @if ($photo->hasMedia())
                            <img src="{{ $photo->getFirstMedia()->getUrl() }}"
                                srcset="{{ $photo->getFirstMEdia()->getSrcset() }}" class="block max-w-full h-auto"
                                alt="..." />
                        @endif
                    </div>
                @endforeach
            </div>
            <button
                class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

</div>
<div id="app" class="flex flex-col h-screen w-screen p-4 gap-4">
    <div id="main" class="grid grid-cols-6 flex-grow gap-4 ">
        <div class="grid grid-rows-4 gap-4">
            <div id="owner" class="border-2 text-left p-2">owner</div>
            <div id="owner-info" class="row-span-3 border-2 text-left p-2">static menu</div>
        </div>
        <div id="menu" class="border-2 text-left p-2">project menu</div>
        <div id="info" class="border-2 text-left p-2">project info</div>
        <div id="carousel" class="col-span-3 border-2 border-red-200 p-2">
            <div class="aspect-video border-2 p-2 text-justify">
                <div id="carouselExampleCaptions" class="carousel slide relative" data-bs-ride="carousel">
                    <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
                        @foreach ($photos as $photo)
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $loop->index }}"
                                @if ($loop->first) class="active" aria-current="true" @endif
                                aria-label="Slide {{ $loop->index + 1 }}">
                            </button>
                        @endforeach
                    </div>
                    <div class="carousel-inner relative w-full overflow-hidden">
                        @foreach ($photos as $photo)
                            <div
                                class="carousel-item @if ($loop->first) active @endif relative float-left w-full">
                                @if ($photo->hasMedia())
                                    <img src="{{ $photo->getFirstMedia()->getUrl() }}"
                                        srcset="{{ $photo->getFirstMEdia()->getSrcset() }}"
                                        class="block max-w-full h-auto" alt="..." />
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
                <h5 class="text-xl">{{ $photo->name }}</h5>
                <p>{{ $photo->description }}.</p>
            </div>
            <div class="border-2 p-2 text-center my-4">nav</div>
        </div>
    </div>
    <div id="footer" class="border-2 text-center">footer</div>
</div>

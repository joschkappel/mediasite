<div>
    <div class="container mx-auto px-4 basis-full flex-nowrap">
        <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-4 lg:gap-8">
            <div class="p-4 bg-gray-100 rounded-md flex items-center justify-center">01</div>
            <div class="p-4 bg-gray-100 rounded-md flex items-center justify-center">02</div>
            <div class="p-4 bg-gray-100 rounded-md flex items-center justify-center">03</div>
            <div class="p-4 bg-gray-100 rounded-md flex items-center justify-center">04</div>


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
                            <img src="{{ $photo->getFirstMedia()->getUrl() }}"
                                srcset="{{ $photo->getFirstMEdia()->getSrcset() }}" class="block max-w-full h-auto"
                                alt="..." />
                            <div class="carousel-caption hidden md:block absolute text-center">
                                <h5 class="text-xl">{{ $photo->name }}</h5>
                                <p>{{ $photo->description }}.</p>
                            </div>
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

            <div class="p-4 bg-gray-100 rounded-md flex items-center justify-center">06</div>
            <div class="p-4 bg-gray-100 rounded-md flex items-center justify-center">07</div>
            <div class="p-4 bg-gray-100 rounded-md flex items-center justify-center">08</div>
            <div class="p-4 bg-gray-100 rounded-md flex items-center justify-center">09</div>
        </div>
    </div>
</div>

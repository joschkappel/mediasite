<div>
    <div class="grid grid-cols-1 md:grid-cols-6 m-4 gap-4">
        <div class="col-start-1 col-span-2 text-left">
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
        <!-- Slider main container -->
        <div class="col-span-4">
            <div class="swiper imgSwiper ">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper h-3/4">
                    <!-- Slides -->
                    @foreach ($carousel as $p)
                        <div class="swiper-slide">
                            <div class=" grid grid-cols-1 md:grid-cols-2 ">
                                <div class="swiper-zoom-container bg-white">
                                    <img src="{{ $p->getFirstMedia()->getUrl() }}" alt="{{ $p->name }}"
                                        class="">
                                </div>
                                <div class="w-full text-2xl text-left bg-white m-2 p-2">
                                    <p> {{ $p->name }} </p>
                                    <p class="text-gray-600 text-base"> {{ $p->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Update fraction pagination
            function updatePaginationFraction(swiper) {
                const total = swiper.slides.length;
                const current = swiper.realIndex + 1;
                document.querySelector('.swiper-pagination-fraction').innerHTML = `${current} / ${total}`;
            };

            const swiper = new Swiper('.imgSwiper', {
                init: true,
                grabCursor: true,
                slidesPerView: "1",
                centeredSlides: true,
                spaceBetween: 10,
                loop: true,
                // effect: "fade",
                pagination: {
                    el: ".ext-swiper-pagination",
                    clickable: true,
                    type: 'bullets',
                },
                /*                 mousewheel: {
                                    invert: true,
                                }, */
                // Display fraction pagination in the same container
                on: {
                    init: function() {
                        updatePaginationFraction(this);
                    },
                    slideChange: function() {
                        updatePaginationFraction(this);
                    },
                },
            });

        });
    </script>
@endpush

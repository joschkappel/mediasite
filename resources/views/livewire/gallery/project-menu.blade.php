<div>

    <!-- Project List -->
    <div
        class="flex sm:flex-nowrap sm:overflow-x-scroll xl:scrollbar-none scrollbar-thin scrollbar-gray-400  flex-col sm:flex-row items-center">
        @foreach ($projects as $p)
            <div
                class="w-96 h-full mx-4 my-2 flex flex-col justify-center items-center text-2xl font-semibold whitespace-no-wrap">
                <div class="relative block ">
                    <img class="p-2" src="{{ $p->photos()->first()->getFirstMedia()->getUrl() }}"
                        srcset="{{ $p->photos()->first()->getFirstMedia()->getSrcset() }}" alt="" />


                    <div class="p-2 ">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $p->name }}</h5>
                        <p class="text-gray-700 text-md font-strong mb-2">{{ $p->info_time }}</h5>
                        <p class="text-gray-700 text-base mb-4">
                            {{ Str::words($p->info_en, 20, ' ...') }}
                        </p>
                        <a href="{{ route('gallery.project', ['project' => $p]) }}"
                            class="text-md leading-tight lowercase hover:text-blue-700  transition duration-150 ease-in-out">{{ __('more') }}
                            <x-heroicon-o-arrow-right class="w-6 h-6 text-gray-500 inline" />
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

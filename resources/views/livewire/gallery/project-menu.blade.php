<div>
    <div id="menu" class="row-span-10 p-2 overflow-auto h-screen">
        <div id="menu" class="">
            <!-- Project List -->
            <nav class="bg-white border-b border-gray-100">
                <div class=" py-2 overflow-x-auto ">
                    <div class="flex ">
                        @foreach ($projects as $p)
                            <div class="justify-center mx-2 w-1/3 shrink-0">
                                <div class="  bg-white ">
                                    <a href="#!">
                                        <img class="p-4" src="{{ $p->photos()->first()->getFirstMedia()->getUrl() }}"
                                            srcset="{{ $p->photos()->first()->getFirstMedia()->getSrcset() }}"
                                            alt="" />
                                    </a>
                                    <div class="p-2 ">
                                        <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $p->name }}</h5>
                                        <p class="text-gray-700 text-md font-strong mb-2">{{ $p->info_time }}</h5>
                                        <p class="text-gray-700 text-base mb-4">
                                            {{ Str::words($p->info_en, 20, ' ...') }}
                                        </p>
                                        <a
                                            class="text-md underline underline-offset-4 leading-tight lowercase hover:text-blue-700  transition duration-150 ease-in-out">more...</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

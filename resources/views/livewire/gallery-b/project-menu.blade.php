<div>
    <!-- Project List -->
    <nav class="bg-white border-b border-gray-100">
        <div class=" my-auto py-2 ">
            <div class="flex ">
                @foreach ($projects as $p)
                    <div class="flex justify-center mx-2 w-1/2">
                        <div class="rounded-lg shadow-lg bg-white ">
                            <a href="#!">
                                <img class="rounded-t-lg" src="{{ $p->photos()->first()->getFirstMedia()->getUrl() }}"
                                    srcset="{{ $p->photos()->first()->getFirstMedia()->getSrcset() }}" alt="" />
                            </a>
                            <div class="p-6">
                                <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $p->name }}</h5>
                                <p class="text-gray-700 text-base mb-4">
                                    {{ Str::limit($p->info_en, 100) }}
                                </p>
                                <a
                                    class="text-xs leading-tight lowercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">more...</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </nav>
</div>

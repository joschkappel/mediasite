<div>
    <div class="bg-white px-1 absolute" id="projdct">
        <ul class="relative">
            @foreach ($projects as $name => $prj)
                @if ($prj->count() > 0)
                    <li class="relative" id="projects">
                        <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 cursor-pointer"
                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $name }}" aria-expanded="true"
                            aria-controls="collapse{{ $name }}">
                            <span class="text-lg">{{ $name }}</span>
                        </a>
                        <ul class="relative accordion-collapse collapse" id="collapse{{ $name }}"
                            aria-labelledby="{{ $name }}" data-bs-parent="#{{ $name }}Menu">
                            @foreach ($prj as $pp)
                                <li class="relative">
                                    <a href="#!" wire:click="$emit('setNewProject', {{ $pp->id }})"
                                        class="flex items-center text-md py-4 pl-12 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900">{{ $pp->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
            <li class="relative" id="projects">
                <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out cursor-pointer"
                    data-mdb-ripple="true" data-mdb-ripple-color="dark" wire:click="$emit('setNewProject')">
                    <span class="text-lg">{{ __('Home') }}</span>
                </a>
        </ul>
    </div>
</div>

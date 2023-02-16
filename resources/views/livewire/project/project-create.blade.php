<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Create new Project') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="save">
                <x-slot name="title">
                    {{ __('Project Description') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Add type and information of this project') }}
                </x-slot>

                <x-slot name="form">

                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Title') }}" />
                        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name"
                            autocomplete="name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                    <!-- Project type r-->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="type" value="{{ __('Type') }}" />
                        <select id="type"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model.defer="type">
                            @foreach (collect(App\Enums\ProjectType::cases()) as $type)
                                <option value="{{ $type->value }}">
                                    {{ $type->description() }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="type" class="mt-2" />
                    </div>
                    <!-- Gallery type r-->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="gallery_type" value="{{ __('Gallery Template') }}" />
                        <select id="gallery_type"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model.defer="gallery_type">
                            @foreach (collect(App\Enums\GalleryType::cases()) as $gtype)
                                <option value="{{ $gtype->value }}">
                                    {{ $gtype->description() }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="gallery_type" class="mt-2" />
                    </div>
                    <!-- Info Time -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="info_time" value="{{ __('Project Period') }}" />
                        <x-jet-input id="info_time" type="text" class="mt-1 block w-full"
                            wire:model.defer="info_time" autocomplete="info_time" />
                        <div class="text-sm text-gray-500 mt-1">When took the project place (e.g. '2022' or 'between
                            2020 and 2022',...</div>
                        <x-jet-input-error for="info_time" class="mt-2" />
                    </div>
                    <!-- Menu Position -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="menu_position" value="{{ __('Menu Position') }}" />
                        <div class="flex justify-center">
                            <ul class="flex list-style-none">
                                @foreach ($positions as $pos)
                                    @if ($set_positions->contains($pos))
                                        <li class="page-item disabled"><button type="button"
                                                class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300  text-red-500 pointer-events-none focus:shadow-none">{{ $pos }}
                                            </button>
                                        </li>
                                    @else
                                        @if ($menu_position == $pos)
                                            <li class="page-item active"><button type="button"
                                                    class="page-link relative block py-1.5 px-3 border-0 bg-blue-600 outline-none transition-all duration-300 rounded-full text-white hover:text-white hover:bg-blue-600 shadow-md focus:shadow-md"
                                                    wire:click="releasePosition()">{{ $pos }}<span
                                                        class="visually-hidden"
                                                        wire:model.defer="menu_position">{{ $pos }}</span></button>
                                            </li>
                                        @else
                                            <li class="page-item"><button type="button"
                                                    class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded-full text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none"
                                                    wire:click="setPosition({{ $pos }})">{{ $pos }}</button>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="text-sm text-gray-500 mt-1">select where you want to position this project in the
                            menu</div>
                        <x-jet-input-error for="menu_position" class="mt-2" />
                    </div>
                    <!-- Watermark -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="watermark" value="{{ __('Watermark') }}" />
                        <x-jet-input id="watermark" type="text" class="mt-1 block w-full"
                            wire:model.defer="watermark" autocomplete="watermark" />
                        <x-jet-input-error for="watermark" class="mt-2" />
                    </div>
                    <!-- Description german -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="info_de" value="{{ __('Description (german)') }}" />
                        <textarea id="info_de"
                            class="form-control block w-full px-3 py-1.5 text-base
                        font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out mt-1
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Describe your project" rows="10" wire:model.defer="info_de" autocomplete="info_de"></textarea>
                        <x-jet-input-error for="info_de" class="mt-2" />
                    </div>
                    <!-- Description english -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="info_en" value="{{ __('Description (english)') }}" />
                        <textarea id="info_en"
                            class="form-control block w-full px-3 py-1.5 text-base
                        font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out mt-1
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Describe your project" rows="10" wire:model.defer="info_en" autocomplete="info_en"></textarea>
                        <x-jet-input-error for="info_en" class="mt-2" />
                    </div>

                </x-slot>
                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>

                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>

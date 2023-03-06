<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Edit this Project') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="save">
                <x-slot name="title">
                    {{ __('Project Description') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Modify type and information of this project') }}
                </x-slot>

                <x-slot name="form">

                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.input label="{{ __('Title') }}" for="name" />
                    </div>
                    <!-- Project type r-->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.select label="{{ __('Type') }}" for="type">
                            @foreach (collect(App\Enums\ProjectType::cases()) as $type)
                                <option value="{{ $type->value }}">
                                    {{ $type->description() }}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    <!-- Gallery type r-->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.select label="{{ __('Gallery Template') }}" for="gallery_type">
                            @foreach (collect(App\Enums\GalleryType::cases()) as $gtype)
                                <option value="{{ $gtype->value }}">
                                    {{ $gtype->description() }}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    <!-- Active -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.checkbox label="{{ __('Active') }}" for="active" />
                    </div>

                    <!-- Menu Position -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="menu_position" value="{{ __('Menu Position') }}" />
                        <div class="flex justify-center">
                            <ul class="flex list-style-none">
                                @foreach ($positions as $pos)
                                    @if ($set_positions->contains($pos))
                                        <li class="page-item disabled"><button type="button"
                                                class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded text-red-500 pointer-events-none focus:shadow-none">{{ $pos }}
                                            </button>
                                        </li>
                                    @else
                                        @if ($menu_position == $pos)
                                            <li class="page-item active"><button type="button"
                                                    class="page-link relative block py-1.5 px-3 border-0 bg-info outline-none transition-all duration-300 rounded-full text-white hover:text-white hover:bg-primary shadow-md focus:shadow-md"
                                                    wire:click="releasePosition()"><span class="visually-hidden"
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
                    <!-- Info Time -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.input label="{{ __('Project Period') }}" for="info_time"
                            hints="When took the project place (e.g. '2022' or 'between
                        2020 and 2022',..." />
                    </div>
                    @if (config('mediasite.watermarking', false))
                        <!-- Watermark -->
                        <div class="col-span-6 sm:col-span-4">
                            <x-form.input label="{{ __('Watermark') }}" for="watermark" />
                        </div>
                    @endif
                    <!-- Description german -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.textarea label="{{ __('Description (german)') }}" for="info_de"
                            placeholder="Describe your project" rows="10" />
                    </div>
                    <!-- Description english -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.textarea label="{{ __('Description (english)') }}" for="info_en"
                            placeholder="Describe your project" rows="10" />
                    </div>

                </x-slot>
                <x-slot name="actions">
                    <x-form.action-toast class="mr-3" on="saved">
                        {{ __('Project Updated.') }}
                    </x-form.action-toast>

                    <x-form.button type="primary">
                        {{ __('Save') }}
                    </x-form.button>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>

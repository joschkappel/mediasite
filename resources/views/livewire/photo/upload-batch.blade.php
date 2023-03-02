<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Add Photos to Project ') . $project->name }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 x-data="{ adding: false, removing: false }">

            <x-jet-form-section submit="">
                <x-slot name="title">
                    {{ __('Picture Upload') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Select picture files') }}
                </x-slot>
                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4" x-data>
                        <!-- Profile Photo File Input -->
                        <input type="file" class="hidden" multiple wire:model.defer="selectedMedia" id="mediafiles"
                            x-ref="photobtn" />

                        <x-jet-secondary-button class="mt-2 mr-2" type="button"
                            x-on:click.prevent="$refs.photobtn.click()">
                            {{ __('Select Photos') }}
                        </x-jet-secondary-button>
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photos') }}
                        </x-jet-secondary-button>
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                </x-slot>
            </x-jet-form-section>
            <x-jet-form-section submit="">
                <x-slot name="title">
                    {{ __('Picture Assignment') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('Drag picture to assign them to the photo entries below') }}
                </x-slot>
                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4 flex">
                        @foreach ($selectedMedia as $index => $p)
                            @if (($assignedMedia[$index] ?? null) == null)
                                <img id="img{{ '@' . $index }}" src=" {{ $p->temporaryUrl() }}" class="inline p-2 w-20"
                                    :class="{ 'border-8 bg-red-700': dragging }" draggable="true"
                                    x-data="{ dragging: false }" x-on:dragend="dragging = false"
                                    x-on:dragstart.self="dragging = true;
                                event.dataTransfer.effectAllowed = 'move';
                                event.dataTransfer.setData('text/plain', event.target.id);">
                            @endif
                        @endforeach
                    </div>
                </x-slot>
            </x-jet-form-section>
            <x-jet-section-border />
            <x-jet-form-section submit="save">
                <x-slot name="title">
                    {{ __('Photo Data') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Assign picture and title') }}
                </x-slot>
                <x-slot name="form">
                    @foreach ($photos as $photo)
                        <div class="col-start-1 col-span-5 sm:col-span-4">
                            <x-jet-label for="gallery_tag" value="{{ __('Gallery Tag') }}" />
                            <input id="tag" type="text" readonly
                                class="read-only:bg-gray-100 rounded-sm mt-1 block w-full font-medium"
                                wire:model.defer="photos.{{ $loop->index }}.gallery_tag" />
                        </div>
                        <div class="block row-span-3">
                            <x-jet-label value="{{ 'Bild no. ' . $loop->index + 1 }}" />
                            @if (array_search($photo['id'], $assignedMedia) !== false)
                                <div id="dropbox"
                                    class="bg-white border-2 border-dashed border-gray-300 rounded-lg p-2 text-center flex">
                                    <img
                                        src=" {{ $selectedMedia[array_search($photo['id'], $assignedMedia)]->temporaryUrl() }}">
                                </div>
                            @else
                                <div id="dropbox" wire:key="{{ $loop->index }}" draggable="false"
                                    x-data="{ adding: false, assignedmedia: @entangle('assignedMedia') }" x-on:dragover.prevent="adding=true"
                                    x-on:dragleave.prevent="adding = false" x-on:drop="adding = false"
                                    x-on:drop.prevent="const id = event.dataTransfer.getData('text/plain');
                                const target = event.target.closest('div');
                                const element = document.getElementById(id);
                                target.appendChild(element);
                                assignedmedia[ id.split('@')[1] ] = event.target.id.split('@')[1];
                                "
                                    class="bg-white border-2 border-dashed border-gray-300 rounded-lg p-2 text-center flex"
                                    :class="{ 'border-red-800': adding }">
                                    <p id="drop-area{{ '@' . $photo['id'] }}" class="font_medium">Drag picture here</p>
                                </div>
                            @endif
                        </div>
                        <!-- Name -->
                        <div class="col-start-1 col-span-5 sm:col-span-4">
                            <x-jet-label for="name" value="{{ __('Title') }}" />
                            <x-jet-input id="name" wire:model.defer="photos.{{ $loop->index }}.name"
                                type="text" class="mt-1 block w-full" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>
                        <!-- Description -->
                        <div class="col-start-1  col-span-5 sm:col-span-4">
                            <x-jet-label for="description" value="{{ __('Description') }}" />
                            <x-jet-input id="description" type="text" class="mt-1 block w-full"
                                wire:model.defer="photos.{{ $loop->index }}.description" />
                            <x-jet-input-error for="description" class="mt-2" />
                        </div>
                        <div class="col-start-1  col-span-6 sm:col-span-6">
                            <div class="border-t border-blue-400"></div>
                        </div>
                    @endforeach

                </x-slot>
                <x-slot name="actions">
                    <x-jet-action-message class="mr-3 text-green-600 font-semibold" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>

                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>

        </div>
    </div>

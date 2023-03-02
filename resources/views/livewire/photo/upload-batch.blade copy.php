<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Add Photos to Project ') . $project->name }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

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
                        <input type="file" class="hidden" multiple wire:model="photos" id="photos"
                            x-ref="photobtn" />

                        <x-jet-label for="photos" value="{{ __('Photos') }}" />

                        <x-jet-secondary-button class="mt-2 mr-2" type="button"
                            x-on:click.prevent="$refs.photobtn.click()">
                            {{ __('Select Photos') }}
                        </x-jet-secondary-button>
                        @if (count($photos) > 0)
                            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                {{ __('Remove Photos') }}
                            </x-jet-secondary-button>
                        @endif
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                </x-slot>
            </x-jet-form-section>
            @if (count($photos) > 0)
                <x-jet-section-border />
                <x-jet-form-section submit="save">
                    <x-slot name="title">
                        {{ __('Photo Metadata') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Assign tags and title') }}
                    </x-slot>
                    <x-slot name="form">
                        @foreach ($photos as $p)
                            <div class="col-span-6 sm:col-span-4 rounded-sm outline outline-offset-8 outline-1 ">
                                <x-jet-label value="{{ 'Bild no. ' . $loop->index + 1 }}" />
                                <img class="h-20 p-2" src="{{ $p->temporaryUrl() }}">
                                <x-jet-label for="gallery_tag" value="{{ __('Gallery Tag') }}" />
                                <select id="gallery_tag" wire:model.defer="metadata.{{ $loop->index }}.tag"
                                    class="form-select                    block
                                    w-full
                                    mt-1
                                    rounded-md
                                    border-gray-300
                                    shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option></option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag }}">{{ $tag }}</option>
                                    @endforeach
                                </select>
                                <!-- Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Title') }}" />
                                    <x-jet-input id="name" type="text" class="mt-1 block w-full"
                                        wire:model.defer="metadata.{{ $loop->index }}.name" />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                                <!-- Description -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="description" value="{{ __('Description') }}" />
                                    <x-jet-input id="description" type="text" class="mt-1 block w-full"
                                        wire:model.defer="metadata.{{ $loop->index }}.description"
                                        autocomplete="description" />
                                    <x-jet-input-error for="description" class="mt-2" />
                                </div>
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
            @endif
        </div>
    </div>
</div>

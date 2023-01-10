<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Add Foto') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="">
                <x-slot name="title">
                    {{ __('Picture Upload') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Select a picture file') }}
                </x-slot>
                <x-slot name="form">
                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                        <!-- Profile Photo File Input -->
                        <input type="file" class="hidden"
                                    wire:model="photo" id="photo"
                                    x-ref="photo"
                                    x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                    " />

                        <x-jet-label for="photo" value="{{ __('Photo') }}" />

                        <!-- Photo Preview -->
                        @if ($photo)
                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                            <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center"
                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>
                        @endif

                        <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Select A New Photo') }}
                        </x-jet-secondary-button>

                        @if ($photo)
                            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                {{ __('Remove Photo') }}
                            </x-jet-secondary-button>
                        @endif
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                </x-slot>
            </x-jet-form-section>
            <x-jet-section-border />
            <x-jet-form-section submit="save">
                <x-slot name="title">
                    {{ __('Picture Metadata') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Add meta data used for display') }}
                </x-slot>

                <x-slot name="form">

                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Title') }}" />
                        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                    <!-- Description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="description" autocomplete="description" />
                        <x-jet-input-error for="description" class="mt-2" />
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

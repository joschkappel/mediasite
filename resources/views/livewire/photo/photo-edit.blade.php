<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Edit Photo') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if ($photo->hasMedia())
                <x-jet-form-section submit="">
                    <x-slot name="title">
                        {{ __('Picture') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Attached picture file') }}
                    </x-slot>
                    <x-slot name="form">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="photo" value="{{ __('Photo') }}" />

                            <!-- Photo Preview -->
                            <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center">
                                <img src="{{ $photo->getFirstMedia()->getUrl('preview') }}" />
                            </span>
                        </div>
                    </x-slot>
                </x-jet-form-section>
            @else
                <x-jet-form-section submit="">
                    <x-slot name="title">
                        {{ __('Picture (Upload)') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Select a picture file') }}
                    </x-slot>
                    <x-slot name="form">
                        <div class="col-span-6 sm:col-span-4">
                            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                                <!-- Profile Photo File Input -->
                                <input type="file" class="hidden" wire:model="photoimg" id="photoimg"
                                    x-ref="photoimg"
                                    x-on:change="
                                                photoName = $refs.photoimg.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photoimg.files[0]);
                                        " />

                                <x-jet-label for="photoimg" value="{{ __('Photo') }}" />

                                <!-- Photo Preview -->
                                @if ($photo)
                                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center"
                                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                        </span>
                                    </div>
                                @endif

                                <x-jet-secondary-button class="mt-2 mr-2" type="button"
                                    x-on:click.prevent="$refs.photoimg.click()">
                                    {{ __('Select A New Photo') }}
                                </x-jet-secondary-button>

                                @if ($photo)
                                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteMedia">
                                        {{ __('Remove Photo') }}
                                    </x-jet-secondary-button>
                                @endif
                                <x-jet-validation-errors class="mb-4" />
                            </div>
                        </div>
                    </x-slot>
                </x-jet-form-section>
            @endif
            <x-jet-section-border />
            <x-jet-form-section submit="update">
                <x-slot name="title">
                    {{ __('Picture Metadata') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Edit meta data used for display') }}
                </x-slot>

                <x-slot name="form">

                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Title') }}" />
                        <x-jet-input id="name" type="text" class="mt-1 block w-full"
                            wire:model.defer="name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                    <!-- Description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <x-jet-input id="description" type="text" class="mt-1 block w-full"
                            wire:model.defer="description" autocomplete="description" />
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>
                    <!-- Gallery type -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="gallery_type" value="{{ __('Gallery Template') }}" />
                        <x-jet-input id="gallery_type" type="text" :disabled="true"
                            class="mt-1 block w-full bg-gray-100" value="{{ $gallery_type }}" />
                    </div>
                    <!-- Gallery tag -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="gallery_tag" value="{{ __('Gallery Tag') }}" />
                        <select id="gallery_tag"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model.defer="gallery_tag">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag }}">
                                    {{ $tag }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="gallery_tag" class="mt-2" />
                    </div>
                    <!-- Show on Main -->
                    <div class="col-span-6 sm:col-span-4 text-md">
                        <div class="form-check">
                            <x-form.checkbox bindto="show_on_main" label="{{ __('Show on main') }}"
                                :disabled="isset($photoimg) == null and !$photo->hasMedia()" />
                        </div>
                    </div>
                    <!-- Active -->
                    <div class="col-span-6 sm:col-span-4 text-md">
                        <x-form.checkbox bindto="active" label="{{ __('Active') }}" :disabled="isset($photoimg) == null and !$photo->hasMedia()" />
                </x-slot>
                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Updated.') }}
                    </x-jet-action-message>

                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                    <x-jet-danger-button wire:click.prevent="cancel()">
                        {{ __('Cancel') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-form-section>

        </div>
    </div>
</div>

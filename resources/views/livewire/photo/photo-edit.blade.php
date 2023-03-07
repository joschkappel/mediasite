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
                            <!-- Photo Preview -->
                            <div class="avatar">
                                <div class="w-24 rounded">
                                    <img src="{{ $photo->getFirstMedia()->getUrl('preview') }}" />
                                </div>
                            </div>
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
                        <x-form.input label="{{ __('Title') }}" for="name" />
                    </div>
                    <!-- Description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.input label="{{ __('Description') }}" for="description" />
                    </div>
                    <!-- Gallery type -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.input label="{{ __('Gallery Template') }}" for="gallery_type" :disabled="true" />
                    </div>
                    <!-- Gallery tag -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.select label="{{ __('Gallery Tag') }}" for="gallery_tag">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag }}">
                                    {{ $tag }}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    <!-- Show on Main -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.checkbox label="{{ __('Show on main') }}" for="show_on_main" :disabled="isset($photoimg) and !$photo->hasMedia()" />
                    </div>
                    <!-- Active -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.checkbox label="{{ __('Active') }}" for="active" :disabled="isset($photoimg) and !$photo->hasMedia()" />
                </x-slot>
                <x-slot name="actions">
                    <x-form.action-toast class="mr-3" on="saved">
                        {{ __('Photo Updated.') }}
                    </x-form.action-toast>

                    <x-form.button type="btn-error" wire:click.prevent="cancel()">
                        {{ __('Cancel') }}
                    </x-form.button>

                    <x-form.button :submit="true">
                        {{ __('Save') }}
                    </x-form.button>

                </x-slot>
            </x-jet-form-section>

        </div>
    </div>
</div>

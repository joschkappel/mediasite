<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Edit Foto') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="">
                <x-slot name="title">
                    {{ __('Picture') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Edit Metadata for this picture') }}
                </x-slot>
                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="photo" value="{{ __('Photo') }}" />

                        <!-- Photo Preview -->
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center">
                            @if ($photo->hasMedia())
                                <img src="{{ $photo->getFirstMedia()->getUrl('preview') }}" />
                            @else
                                <div class="bold text-red-800">{{ __('MEDIA MISSING') }}</div>
                            @endif
                        </span>
                    </div>
                </x-slot>
            </x-jet-form-section>
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
                        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name"
                            autocomplete="name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                    <!-- Description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <x-jet-input id="description" type="text" class="mt-1 block w-full"
                            wire:model.defer="description" autocomplete="description" />
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>

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

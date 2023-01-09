<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Add Foto') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form wire:submit.prevent="save" >

                    @if ($photo)
                        Photo Preview:
                        <img src="{{ $photo->temporaryUrl() }}">
                    @endif

                    <x-jet-input id="photo" name="photo" class="block mt-1 w-full" required type="file" wire:model="photo"/>
                    <x-jet-button>Save Foto</x-jet-button>
                </form>
            </div>
        </div>
    </div>
</div>

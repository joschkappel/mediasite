<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Fotos') }}
        </h2>
    </x-slot>
    <div class="container p-4 flex m-auto grid grid-cols-1 justify-center">
        <div class="rounded-md items-center justify-center border-0 border-slate-800">
            <div class="py-2 bg-white shadow">
                <div class="max-w-7xl mx-auto">
                    <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @livewire('photo.photo-index')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

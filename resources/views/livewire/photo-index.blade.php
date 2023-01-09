<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Fotos') }}
        </h2>
{{--         <form method="GET" action="{{ route('foto.create') }}">
            @csrf
            <div class="flex justify-end mt-4">
                <x-jet-button>Upload New Foto</x-jet-button>
            </div>
        </form> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @livewire('photo-index')
            </div>
        </div>
    </div>
</x-app-layout>

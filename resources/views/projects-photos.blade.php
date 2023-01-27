<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Projects and Photos') }}
        </h2>
    </x-slot>

    <div class="container p-4 m-auto grid grid-cols-5 md:grid-cols-8 gap-2 justify-center">
        <div class="md:col-span-3 col-span-5 rounded-md items-center justify-center border-0 border-slate-800">
            @livewire('project.project-index')
        </div>
        <div class="md:col-span-5 col-span-5 rounded-md items-center justify-center border-0 border-slate-800">
            @livewire('project.photo-index')
        </div>
    </div>
</x-app-layout>

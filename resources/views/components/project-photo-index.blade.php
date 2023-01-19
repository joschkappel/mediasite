<div>
    <header class="container mx-auto bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-blue-800 leading-tight flex justify-between">
                {{ __('Photos of the selected Project ') }}
                <span
                    class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap  font-bold bg-blue-600 text-white rounded">
                    <a href="{{ route('photo.create') }}"
                        class="font-semibold text-sm ease-in-out mb-4 ">@lang('Add Photos')</a>
                </span>
            </h2>
        </div>
    </header>
    <main>
        <div class="py-2 bg-white shadow">
            <div class="max-w-7xl mx-auto">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @livewire('project.photo-index')
                </div>
            </div>
        </div>
    </main>

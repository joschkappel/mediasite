<div>
    <header class="container mx-auto bg-white shadow">
        <div class="mx-auto p-4">
            <h2 class="font-semibold text-xl text-blue-800 leading-tight flex justify-between">
                @isset($project->id)
                    {{ __('Photos of Project ') }} {{ '" ' . $project->name . ' "' }}
                    <div class="flex space-x-2 justify_end">
                        <span
                            class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap  font-bold bg-blue-600 text-white rounded">
                            <a href="{{ route('photo.create', ['project' => $project]) }}"
                                class="font-semibold text-sm ease-in-out mb-4 ">@lang('Add a Photo')</a>
                        </span>
                        <span
                            class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap  font-bold bg-blue-600 text-white rounded">
                            <a href="{{ route('photos.assign', ['project' => $project]) }}"
                                class="font-semibold text-sm ease-in-out mb-4 ">@lang('Upload Photos')</a>
                        </span>
                    </div>
                @else
                    {{ __('Select a Project to see its Photos') }}
                @endisset
            </h2>
        </div>
    </header>
    <main>
        <div class="bg-white shadow">
            <div class="mx-auto">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @livewire('project.photo-datatable')
                </div>
            </div>
        </div>
    </main>
</div>

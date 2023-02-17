<div>
    <header class="container mx-auto bg-white shadow">
        <div class="mx-auto p-4">
            <h2 class="font-semibold text-xl text-blue-800 leading-tight flex justify-between">
                {{ __('Projectlist') }}
                <span
                    class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap  font-bold bg-blue-600 text-white rounded">
                    <a href="{{ route('project.create') }}"
                        class="font-semibold text-sm ease-in-out mb-4 ">@lang('Create a new Project')</a>
                </span>
            </h2>
        </div>
    </header>

    <main>
        <div class=" bg-white shadow">
            <div class="mx-auto">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @livewire('project.project-datatable')
                </div>
            </div>
        </div>
    </main>
</div>

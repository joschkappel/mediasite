<div>
    <div class="pb-2 space-y-1 sm:block">
        <div class="text-bold text-2xl text-cyan-700">
            {{ $project->name }}
        </div>
        <div class="text-gray-700">
            {{ $project->info_time }}
        </div>
        <div class="text-gray-700">
            @if ($locale == 'en')
                {{ $project->info_en }}
            @else
                {{ $project->info_de }}
            @endif
        </div>
    </div>
</div>

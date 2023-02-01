<div>
    <!-- Navigation Menu -->
    <nav class="bg-white border-b border-gray-100">
        <div class=" mx-auto px-2 ">
            <div class="flex justify-between">
                <div class="block">
                    @foreach ($projects as $p)
                        <div class="pb-2 space-y-1">

                            <x-jet-nav-link href="#!" wire:click="$emit('getProject',{{ $p }})"
                                :active="isset($selected_prj) ? $selected_prj->id == $p->id : false">
                                {{ $p->name }}
                            </x-jet-nav-link>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</div>

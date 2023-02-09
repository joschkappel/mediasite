<div>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class=" mx-auto">
            <div class="flex justify-between">
                <div class="block">
                    <!-- Navigation Links -->
                    @foreach ($project_types as $pt)
                        <div class="pb-2">
                            <x-jet-nav-link href="#!" wire:click="$emit('getProjects',{{ $pt }})"
                                :active="isset($selected_type) ? $selected_type->value == $pt->value : false">
                                {{ $pt->description() }}
                            </x-jet-nav-link>
                        </div>
                    @endforeach
                </div>

                <div class="block ml-2">
                    @foreach ($projects as $p)
                        <div class="pb-2 space-y-1">

                            <x-jet-nav-link href="#!" wire:click="$emit('getProject',{{ $p }})"
                                :active="isset($selected_prj) ? $selected_prj->id == $p->id : false">
                                {{ $p->name }}
                            </x-jet-nav-link>

                        </div>
                    @endforeach
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            @foreach ($project_types as $pt)
                <div class="pb-2 space-y-1">
                    <x-jet-responsive-nav-link href="#!" wire:click="$emit('getProjects',{{ $pt }})"
                        :active="isset($selected_type) ? $selected_type->value == $pt->value : false">
                        {{ $pt->description() }}
                    </x-jet-responsive-nav-link>
                </div>
            @endforeach
        </div>


    </nav>
</div>

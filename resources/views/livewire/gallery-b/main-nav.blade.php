<div>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class=" mx-auto px-2 ">
            <div class="flex justify-between h-4">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center w-3/4">
                        <a href="{{ route('gallery') }}">
                            Lioba Kappel
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    @foreach ($project_types as $pt)
                        <div class="hidden space-x-2 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="#!" wire:click="$emit('getProjects',{{ $pt }})"
                                :active="isset($selected_type) ? $selected_type->value == $pt->value : false">
                                {{ Str::lower($pt->description()) }}
                            </x-jet-nav-link>
                        </div>
                    @endforeach

                    <div class="hidden space-x-2 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="#!">
                            {{ __('info') }}
                        </x-jet-nav-link>
                    </div>
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
                        {{ Str::lower($pt->description()) }}
                    </x-jet-responsive-nav-link>
                </div>
            @endforeach
            <div class="pb-2 space-y-1">
                <x-jet-responsive-nav-link href="#!">
                    {{ __('info') }}
                </x-jet-responsive-nav-link>
            </div>
        </div>


    </nav>
</div>

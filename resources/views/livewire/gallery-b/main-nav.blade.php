<div>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class=" mx-auto px-2 ">
            <div class="flex justify-between h-4">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('gallery') }}">
                            owner etc
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    @foreach ($project_types as $pt)
                        <div class="hidden space-x-2 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="#!" wire:click="$emit('getProjects',{{ $pt }})"
                                :active="isset($selected_type) ? $selected_type->value == $pt->value : false">
                                {{ $pt->description() }}
                            </x-jet-nav-link>
                        </div>
                    @endforeach
                </div>


                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <!-- Laguage Dropdown -->
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ app()->getLocale() }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Settings Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Set Language') }}
                                </div>

                                <x-jet-dropdown-link href="#!" wire:click="$emit('setLocale','en')">
                                    {{ __('EN') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="#!" wire:click="$emit('setLocale','de')">
                                    {{ __('DE') }}
                                </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
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
                        {{ $pt->description() }}
                    </x-jet-responsive-nav-link>
                </div>
            @endforeach
        </div>


    </nav>
</div>

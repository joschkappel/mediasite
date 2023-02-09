<div>
    <div class="flex justify-between h-4">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('gallery3') }}">
                owner etc
            </a>
        </div>

        <div class="flex">
            <!-- Laguage Dropdown -->
            <div class="ml-3 relative">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                {{ app()->getLocale() }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
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

    </div>
</div>

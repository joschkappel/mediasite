<header class="flex-shrink-0 flex items-center justify-between px-4 py-3 ">
    <div class="w-64 ">
        <p class="text-2xl font-bold tracking-wider">Lioba Kappel</p>
        <p class="text-md font-bold">photographer</p>
    </div>

    <!-- Navigation Links -->
    <nav class="hidden md:flex text-xl">
        @foreach ($project_types as $pt)
            <div class="px-4 py-2">
                <x-nav-link href="{{ route('gallery.projecttype', ['project_type' => $pt]) }}" :active="request()->is('gallery/projecttype/' . $pt->value) or request()->is('/') and $pt->value == 0">
                    {{ Str::lower($pt->description()) }} </x-nav-link>
            </div>
        @endforeach
        <div class="px-4 py-2 ">
            <x-nav-link href="{{ route('gallery.info') }}" :active="request()->routeIs('gallery.info')">
                {{ __('info') }}
            </x-nav-link>
        </div>
    </nav>

    <div x-data="{ open: false }" x-cloak @click.away="open = false" @keydown.escape.window="open = false">
        <button @click="open = !open" class="flex md:hidden items-center focus:outline-none">
            <svg class="h-6 w-6 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path x-show="!open" d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path x-show="open" d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

        <div x-show="open" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-lg z-10">
            @foreach ($project_types as $pt)
                <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                    href="{{ route('gallery.projecttype', ['project_type' => $pt]) }}">
                    {{ Str::lower($pt->description()) }}</a>
            @endforeach
            <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="{{ route('gallery.info') }}">
                {{ __('info') }}</a>
        </div>
    </div>
</header>

<div class="flex items-center justify-stretch">
    <div class="text-2xl w-8 py-2 w-96 font-bold tracking-wide">Lioba Kappel</div>

    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Navigation Links -->
        @foreach ($project_types as $pt)
            <x-nav-link class="hidden sm:inline-flex px-4 xl:px-8 py-2 md:text-xl xs:text-md"
                href="{{ route('gallery.projecttype', ['project_type' => $pt]) }}" :active="request()->is('gallery/projecttype/' . $pt->value) or request()->is('/') and $pt->value == 0">
                {{ Str::lower($pt->description()) }} </x-nav-link>
        @endforeach

        <x-nav-link class="hidden sm:inline-flex px-4 xl:px-8 py-2 md:text-xl xs:text-md"
            href="{{ route('gallery.info') }}" :active="request()->routeIs('gallery.info')">
            {{ __('info') }}
        </x-nav-link>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden md:text-xl xs:text-md">
            <x-nav-link @click="open = ! open" class="sm:hidden inline-flex px-4 py-2 md:text-xl xs:text-md">
                {{ __('menu') }} </x-nav-link>
        </div>


        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block mt-8': open, 'hidden': !open }" class="hidden sm:hidden">
            @foreach ($project_types as $pt)
                <div class="pb-2 space-y-1">
                    <x-nav-link href="{{ route('gallery.projecttype', ['project_type' => $pt]) }}" :active="isset($selected_type) ? $selected_type->value == $pt->value : false">
                        {{ Str::lower($pt->description()) }}
                    </x-nav-link>
                </div>
            @endforeach
            <div class="pb-2 space-y-1">
                <x-nav-link href="{{ route('gallery.info') }}" :active="request()->routeIs('gallery.info')">
                    {{ __('info') }}
                </x-nav-link>
            </div>

    </nav>
</div>

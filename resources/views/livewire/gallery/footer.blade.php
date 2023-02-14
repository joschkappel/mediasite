<footer class="flex-shrink-0 bottom-0 h-8 p-4 m-2 flex items-center justify-between px-4 py-3 ">
    <x-nav-link href="{{ route('gallery.info') }}" :active="request()->routeIs('gallery.info')">
        {{ __('info') }}
    </x-nav-link>
</footer>

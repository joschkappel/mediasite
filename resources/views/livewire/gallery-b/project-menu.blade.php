<div>
    <!-- Responsive Navigation Menu -->
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <div class=" mx-auto px-2 ">
            <div class="flex justify-between">
                <div class="hidden sm:block">
                    @foreach ($projects as $p)
                        <div class="pb-2 space-y-1">

                            <x-jet-nav-link href="#!" :active="false"
                                wire:click="$emit('getProject',{{ $p }})">
                                {{ $p->name }}
                            </x-jet-nav-link>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            @foreach ($projects as $p)
                <div class="pb-2 space-y-1">
                    <x-jet-responsive-nav-link href="#!" :active="false">
                        wire:click="$emit('getProject',{{ $p }})">
                        {{ $p->name }}
                    </x-jet-responsive-nav-link>
                </div>
            @endforeach
        </div>
    </nav>
</div>

<div id="app" class="flex flex-col h-screen w-screen p-4 gap-4">
    <div id="main" class="grid grid-cols-6 flex-grow gap-4 ">
        <div class="grid grid-rows-4 gap-4">
            <div id="owner" class="hover:border-2 text-left p-2">owner</div>
            <div id="owner-info" class="row-span-3 hover:border-2 text-left p-2">
                @livewire('gallery.gallery-menu')
            </div>
        </div>
        <div id="menu" class="hover:border-2 text-left p-2">
            @livewire('gallery.project-menu')
        </div>
        <div id="info" class="hover:border-2 text-left p-2">
            @livewire('gallery.project-info')
        </div>
        <div id="carousel" class="col-span-3 hover:border-2 border-red-200 p-2">
            @livewire('gallery.project-media')
            <div class="hover:border-2 p-2 text-center my-4">nav</div>
        </div>
    </div>
    <div id="footer" class="hover:border-2 text-center">
        @livewire('gallery.gallery-footer')
    </div>
</div>

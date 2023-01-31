<div id="app" class="flex flex-col h-screen w-screen p-4 gap-4">
    <div id="main" class="grid xs:grid-cols-1 md:grid-cols-4 xl:grid-cols-6 flex-grow gap-4 ">

        <div id="mainnavr" class="col-span-1 md:col-span-4 xl:col-span-6 p-2">
            @livewire('gallery-b.main-nav')
        </div>
        <div id="menu" class="col-start-1 xl:col-start-2 grid grid-cols-1 text-left p-2">
            <div id="menu" class="text-left p-2">
                @livewire('gallery-b.project-menu')
            </div>
            <div id="staticmenu" class="hidden md:flex text-left p-2 items-end">
                @livewire('gallery-b.gallery-menu')
            </div>
        </div>
        <div id="info" class="col-start-1 md:col-start-2 xl:col-start-3 text-left p-2">
            @livewire('gallery-b.project-info')
        </div>
        <div id="carousel" class="col-span-1 md:col-span-2 xl:col-span-3 p-2">
            @livewire('gallery-b.project-media')
            <div class=" p-2 text-center ">picture nav</div>
        </div>
        <div id="staticmenu" class="md:hidden text-left p-2">static</div>
    </div>

    <div id="footer" class="text-center">footer</div>
</div>

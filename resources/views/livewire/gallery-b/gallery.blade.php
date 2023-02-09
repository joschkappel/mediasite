<div id="app" class="flex flex-row h-screen w-screen p-4 gap-4">
    <div id="main" class="grid xs:grid-cols-1 md:grid-rows-12  flex-grow gap-4 h-8">
        <div id="mainnavr" class="p-2 ">
            @livewire('gallery-b.main-nav')
        </div>
        <div id="menu" class="row-span-10 p-2 overflow-auto h-screen">
            <div id="menu" class="p-2">
                @livewire('gallery-b.project-menu')
            </div>
        </div>

        <div id="footer" class="row-start-12 text-center h-8">footer</div>
    </div>

</div>

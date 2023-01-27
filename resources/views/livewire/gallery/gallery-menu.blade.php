<div>
    <button
        class="w-full text-left text-lg inline-block  py-2.5 bg-transparent text-gray-600 font-medium leading-tight rounded hover:bg-gray-100 focus:text-blue-700 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200 active:text-blue-800 transition duration-300 ease-in-out"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAbout"
        aria-controls="offcanvasAbout">About</button>
    <button
        class="w-full text-left text-lg  inline-block py-2.5 bg-transparent text-gray-600 font-medium leading-tight rounded hover:bg-gray-100 focus:text-blue-700 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200 active:text-blue-800 transition duration-300 ease-in-out"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasContact"
        aria-controls="offcanvasContact">Contact</button>

    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 right-0 border-none w-1/2"
        tabindex="-1" id="offcanvasAbout">
        <div class="offcanvas-header flex items-center justify-between p-4">
            <h5 class="offcanvas-title mb-0 leading-normal font-semibold" id="offcanvasAboutLabel">About...</h5>
            <button type="button"
                class="btn-close box-content w-4 h-4 p-2 -my-5 -mr-2 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow p-4 overflow-y-auto">
            ...
        </div>
    </div>
    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 right-0 border-none w-1/2"
        tabindex="-1" id="offcanvasContact" aria-labelledby="offcanvasContactLabel">
        <div class="offcanvas-header flex items-center justify-between p-4">
            <h5 class="offcanvas-title mb-0 leading-normal font-semibold" id="offcanvasContactLabel">Contact</h5>
            <button type="button"
                class="btn-close box-content w-4 h-4 p-2 -my-5 -mr-2 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow p-4 overflow-y-auto bg-cyan-200">
            ...
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/site.webmanifest">


    <title>{{ config('app.title', 'Laravel') }}</title>
    <meta name="description"
        content="Lioba Kappel Portrait Photographer.
    Find samples of my works. I'm available for jobs.">

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/mediasite.css'])

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @livewireStyles
</head>

<body class="font-diatype text-gray-900 antialiased flex flex-col h-screen bg-white">

    @livewire('gallery.main-nav')

    <section class="flex-1 flex  overflow-x-scroll py-12 overflow-y-auto" id="mainSection"
        @if (config('mediasite.show_back_to_top')) x-data
        @scroll="showToTopButton()" @endif>

        {{ $slot }}
        @if (config('mediasite.show_back_to_top'))
            <button id="topButton" x-data @click="section.scrollTo({top: 0, behavior: 'smooth' })"
                class="fixed  z-10  p-3 bg-gray-100 rounded-full shadow-md bottom-10 right-10 animate-bounce">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M5 10l7-7m0 0l7 7m-7-7v18">
                    </path>
                </svg>
            </button>
            <button id="leftButton" x-data @click="section.scrollTo({left: 0, behavior: 'smooth' })"
                class="fixed  z-10  p-3 bg-gray-100 rounded-full shadow-md bottom-10 right-20 animate-bounce">
                <x-heroicon-m-arrow-left class="w-8 h-8" />
            </button>
        @endif
    </section>


    @livewire('gallery.footer')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./node_modules/tw-elements/dist/js/index.min.js"></script>
    @if (config('mediasite.show_back_to_top'))
        <script>
            const topBtn = document.getElementById("topButton");
            const leftBtn = document.getElementById("leftButton");
            const section = document.getElementById("mainSection");


            function showToTopButton() {
                var currentScrollPosition = section.scrollTop;
                console.log(currentScrollPosition);

                if (currentScrollPosition > 200) {
                    console.log('show btn');
                    topBtn.classList.remove("hidden");
                } else {
                    console.log('hide btn');
                    topBtn.classList.add("hidden");
                }
                currentScrollPosition = section.scrollLeft;
                console.log(currentScrollPosition);

                if (currentScrollPosition > 500) {
                    console.log('show btn');
                    leftBtn.classList.remove("hidden");
                } else {
                    console.log('hide btn');
                    leftBtn.classList.add("hidden");
                }
            };
        </script>
    @endif

    @stack('scripts')
    @livewireScripts
</body>

</html>

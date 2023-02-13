<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

    @livewireStyles
</head>

<body>
    <div class="font-diatype text-gray-900 antialiased flex flex-col bg-white ">
        <header class="top-0 z-10 left-0 w-full  px-4 py-3 ">
            @livewire('gallery.main-nav')
        </header>

        <section class="flex-1 flex overflow-x-scroll py-12">
            {{ $slot }}
        </section>

        <footer class="w-full z-10 h-auto px-4">
            @livewire('gallery.footer')
        </footer>

    </div>
    @livewireScripts
</body>

</html>

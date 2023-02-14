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

<body class="font-diatype text-gray-900 antialiased flex flex-col h-screen bg-white ">
    @livewire('gallery.main-nav')

    <section class="flex-1 flex  overflow-x-scroll py-12">
        {{ $slot }}
    </section>


    @livewire('gallery.footer')

    @livewireScripts
</body>

</html>

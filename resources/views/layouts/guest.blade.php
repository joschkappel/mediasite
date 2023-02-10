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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
</head>

<body>
    <div class="font-diatype
     text-gray-900 antialiased">
        <div id="app" class="flex flex-row h-screen w-screen p-4 gap-4">
            <div id="main" class="grid xs:grid-cols-1 md:grid-rows-12  flex-grow gap-4 h-8">
                <div id="mainnav" class="p-2 ">
                    @livewire('gallery.main-nav')
                </div>
                {{ $slot }}

                <div id="footer" class="row-start-12 text-center h-8">footer</div>
            </div>

        </div>

    </div>
    @livewireScripts
</body>

</html>

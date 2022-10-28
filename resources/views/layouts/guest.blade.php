<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Antek') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles

        @stack('styles')

        @include('layouts.theme-setter')
    </head>
    <body>
        <div class="font-sans bg-white text-gray-900 antialiased dark:bg-gray-900 dark:text-gray-300">
            {{ $slot }}
        </div>

        @stack('scripts')
        @livewireScripts
    </body>
</html>

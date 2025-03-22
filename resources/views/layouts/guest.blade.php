<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 transition-colors duration-300">
            <!-- Logo Section -->
            <div class="text-center mb-6">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500 dark:text-gray-300 transition-colors duration-300" />
                </a>
            </div>

            <!-- Main Content Section -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md rounded-lg transition-all duration-300 transform hover:scale-105">
                {{ $slot }}
            </div>
        </div>

        <!-- Optional: Footer Section -->
        <footer class="bg-gray-800 text-center text-white py-4 mt-6">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </footer>
        
    </body>
</html>

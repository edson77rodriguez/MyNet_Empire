<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MyNet EMPIRE') }}</title>

    <!-- Estilos de Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fuentes y estilos personalizados -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">

    <!-- Encabezado -->
    <header class="bg-gray-800 text-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a href="/" class="text-2xl font-semibold">{{ config('app.name', 'MyNet EMPIRE') }}</a>
                @include('layouts.navigation')
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="flex-grow flex justify-center items-center px-4 py-8">
        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer class="bg-gray-800 text-gray-400 text-center py-4">
        © {{ date('Y') }} {{ config('app.name', 'MyNet EMPIRE') }}. Todos los derechos reservados.
    </footer>
</body>
</html>

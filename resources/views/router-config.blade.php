@extends('layouts.app')

@section('content')
<div class="w-full max-w-lg p-8 bg-gray-800 bg-opacity-50 rounded-xl shadow-lg">
    <h1 class="text-3xl font-semibold text-center text-white mb-4">
        Configurar Router
    </h1>
    <p class="text-gray-400 text-center mb-6">
        Actualiza la configuración de tu red Wi-Fi de manera sencilla.
    </p>

    <!-- Mensajes de éxito o error -->
    @if (session('success'))
        <div class="alert alert-success mb-4 bg-green-500 text-white p-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger mb-4 bg-red-500 text-white p-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <!-- Formulario -->
    <form action="{{ route('router.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="ssid" class="block text-lg text-white font-medium">Nuevo Nombre de Red (SSID)</label>
            <input type="text" name="ssid" id="ssid" class="w-full mt-2 p-3 rounded-lg bg-gray-700 text-white border-none focus:ring-2 focus:ring-indigo-500" value="{{ old('ssid') }}" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block text-lg text-white font-medium">Nueva Contraseña</label>
            <input type="password" name="password" id="password" class="w-full mt-2 p-3 rounded-lg bg-gray-700 text-white border-none focus:ring-2 focus:ring-indigo-500" required>
        </div>
        <button type="submit" class="w-full py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition duration-300">
            Actualizar
        </button>
    </form>
</div>
@endsection

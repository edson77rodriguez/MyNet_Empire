@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card bg-dark text-white p-4 shadow-lg border border-primary" 
         style="max-width: 400px; width: 100%; background: linear-gradient(135deg, #2c3e50, #3498db);">
        <div class="card-body">
            <h2 class="text-center mb-4 text-primary">{{ __('Recuperar Contraseña') }}</h2>

            <p class="mb-4 text-light">
                {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.') }}
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="needs-validation">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label text-primary">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" name="email" 
                           class="form-control form-control-lg border-primary" 
                           value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                        {{ __('Enviar Enlace de Restablecimiento') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

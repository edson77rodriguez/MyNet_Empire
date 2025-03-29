@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card bg-dark text-white p-4 shadow-lg border border-primary" 
         style="max-width: 400px; width: 100%; background: linear-gradient(135deg, #2c3e50, #3498db);">
        <div class="card-body">
            <h2 class="text-center mb-4 text-primary">{{ __('Crear Cuenta') }}</h2>

            <form method="POST" action="{{ route('register') }}" class="needs-validation">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label text-primary">{{ __('Nombre') }}</label>
                    <input id="name" type="text" name="name" 
                           class="form-control form-control-lg border-primary" 
                           value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label text-primary">{{ __('Correo electrónico') }}</label>
                    <input id="email" type="email" name="email" 
                           class="form-control form-control-lg border-primary" 
                           value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label text-primary">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" name="password" 
                           class="form-control form-control-lg border-primary" 
                           required autocomplete="new-password">
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-primary">{{ __('Confirmar contraseña') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" 
                           class="form-control form-control-lg border-primary" 
                           required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit button and login link -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="text-primary text-decoration-none">
                        {{ __('¿Ya tienes cuenta?') }}
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                        {{ __('Registrarse') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

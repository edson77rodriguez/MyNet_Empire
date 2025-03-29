@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card bg-dark text-white p-4 shadow-lg border border-primary" 
         style="max-width: 400px; width: 100%; background: linear-gradient(135deg, #2c3e50, #3498db);">
        <div class="card-body">
            <h2 class="text-center mb-4 text-primary">{{ __('Confirmar Contraseña') }}</h2>

            <p class="mb-4 text-light">
                {{ __('Esta es una zona segura de la aplicación. Por favor confirme su contraseña antes de continuar.') }}
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('password.confirm') }}" class="needs-validation">
                @csrf

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label text-primary">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" name="password" 
                           class="form-control form-control-lg border-primary" 
                           required autocomplete="current-password">
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                        {{ __('Confirmar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card bg-dark text-white p-4 shadow-lg border border-primary" 
         style="max-width: 400px; width: 100%; background: linear-gradient(135deg, #2c3e50, #3498db);">
        <div class="card-body">
            <h2 class="text-center mb-4 text-primary">{{ __('Verificación de correo electrónico') }}</h2>

            <p class="mb-4 text-light">
                {{ __('Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar? Si no recibiste el correo, con gusto te enviaremos otro.') }}
            </p>

            <!-- Status Message -->
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste durante el registro.') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mt-4">
                <!-- Resend Verification -->
                <form method="POST" action="{{ route('verification.send') }}" class="me-auto">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm rounded-pill">
                        {{ __('Reenviar correo de verificación') }}
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="ms-auto">
                    @csrf
                    <button type="submit" class="btn btn-link text-light text-decoration-none">
                        {{ __('Cerrar sesión') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

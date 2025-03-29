@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card bg-dark text-white p-4 shadow-lg border border-primary" 
         style="max-width: 400px; width: 100%; background: linear-gradient(135deg, #2c3e50, #3498db);">
        <div class="card-body">
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="needs-validation">
                @csrf
                
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label text-primary">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" 
                           class="form-control form-control-lg border-primary" 
                           value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label text-primary">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" 
                           class="form-control form-control-lg border-primary" 
                           required autocomplete="current-password">
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label text-primary">{{ __('Remember me') }}</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="text-primary text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

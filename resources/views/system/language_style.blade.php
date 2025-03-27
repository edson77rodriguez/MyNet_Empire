@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Configuración de Idioma y Estilo</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/system/language-style') }}">
            @csrf
            <div class="form-group">
                <label for="language">Idioma</label>
                <select class="form-control" name="language" id="language">
                    <option value="es" {{ old('language', $language) == 'es' ? 'selected' : '' }}>Español</option>
                    <option value="en" {{ old('language', $language) == 'en' ? 'selected' : '' }}>English</option>
                </select>
            </div>

            <div class="form-group">
                <label for="style">Estilo</label>
                <select class="form-control" name="style" id="style">
                    <option value="light" {{ old('style', $style) == 'light' ? 'selected' : '' }}>Claro</option>
                    <option value="dark" {{ old('style', $style) == 'dark' ? 'selected' : '' }}>Oscuro</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Configuración</button>
        </form>
    </div>
@endsection

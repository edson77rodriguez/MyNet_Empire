@extends('dashboard')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.password') }}">Contraseña del enrutador</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.ssh_access') }}">Acceso SSH</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.ssh_keys') }}">Claves SSH</a>
            </li>
        </ul>

        <div class="mt-4">
            <h2>Acceso SSH</h2>
            <p>Configura el acceso SSH al enrutador.</p>
            <!-- Contenido de configuración SSH -->
        </div>
    </div>
@endsection

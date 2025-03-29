@extends('dashboard')

@section('content')
    <div class="container">
        <!-- Menú de pestañas -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.password') }}">Contraseña del enrutador</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.ssh_access') }}">Acceso SSH</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.ssh_keys') }}">Claves SSH</a>
            </li>
        </ul>

        <!-- Contenido de la página -->
        <div class="mt-4">
            <h2>Contraseña del enrutador</h2>
            <p>Cambie la contraseña del administrador para acceder al dispositivo</p>

            <form action="{{ route('admin.update_password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmación</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">GUARDAR</button>
            </form>
        </div>
    </div>
@endsection

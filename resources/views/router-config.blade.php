@extends('dashboard')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [breadcrumb] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h1 class="text-white">Configuración del Sistema</h1>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Configuración del Sistema</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [breadcrumb] end -->

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg border-0 bg-dark text-white rounded-xl">
                    <div class="card-body">
                        <p class="text-center mb-4">
                            Ajusta los parámetros básicos del sistema de tu router.
                        </p>

                        <!-- Mostrar notificación de éxito -->
                        @if(session('success'))
                            <div id="success-notification" class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Formulario de Configuración General -->
                        <form action="{{ route('router.system.update') }}" method="POST">
                            @csrf

                            <!-- Hora Local -->
                            <div class="mb-4">
                                <label for="local_time" class="form-label">Hora Local</label>
                                <div class="input-group">
                                    <input type="text" id="local_time" class="form-control" value="{{ now()->format('Y-m-d H:i:s') }}" readonly>
                                    <button type="button" id="sync_browser" class="btn btn-primary">Sincronizar</button>
                                </div>
                            </div>

                            <!-- Sincronización con NTP -->
                            <div class="mb-4">
                                <label class="form-label">Sincronización con NTP</label>
                                <button type="button" id="sync_ntp" class="btn btn-success w-100">Sincronizar con Servidor NTP</button>
                            </div>

                            <!-- Nombre del Host -->
                            <div class="mb-4">
                                <label for="hostname" class="form-label">Nombre del Host</label>
                                <input type="text" name="hostname" id="hostname" class="form-control" value="{{ old('hostname') }}" required>
                            </div>

                            <!-- Descripción -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <!-- Notas -->
                            <div class="mb-4">
                                <label for="notes" class="form-label">Notas</label>
                                <textarea name="notes" id="notes" class="form-control">{{ old('notes') }}</textarea>
                            </div>

                            <!-- Zona Horaria -->
                            <div class="mb-4">
                                <label for="timezone" class="form-label">Zona Horaria</label>
                                <select name="timezone" id="timezone" class="form-control">
                                    @foreach(timezone_identifiers_list() as $timezone)
                                        <option value="{{ $timezone }}">{{ $timezone }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Botón de Enviar -->
                            <button type="submit" class="btn btn-indigo w-100">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Notificación de éxito (si existe)
    @if(session('success'))
        setTimeout(function() {
            document.getElementById('success-notification').style.display = 'none';
        }, 5000);  // Ocultar la notificación después de 5 segundos
    @endif

    document.getElementById('sync_browser').addEventListener('click', function() {
        document.getElementById('local_time').value = new Date().toISOString().slice(0, 19).replace('T', ' ');
    });

    document.getElementById('sync_ntp').addEventListener('click', function() {
        alert('Función de sincronización NTP aún no implementada');
    });
</script>
@endsection

@extends('dashboard')

@section('title', 'Tareas Programadas (Crontab)')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Configuración de Tareas Programadas</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="alert alert-warning">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Nota Importante</h5>
                Debe reiniciar manualmente el servicio si el archivo crontab estaba vacío antes de editar.
            </div>

            <form action="{{ route('admin.update_crontab') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Editor de Crontab</label>
                    <textarea name="crontab" class="form-control" rows="10" style="font-family: monospace">{{ $crontabContent ?? '# Agrega tus tareas aquí' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar cambios
                </button>
            </form>

            <form action="{{ route('admin.restart_crond') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-sync-alt"></i> Reiniciar Servicio Crond
                </button>
            </form>
        </div>
    </div>
@endsection

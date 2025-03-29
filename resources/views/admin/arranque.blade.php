@extends('dashboard')

@section('title', 'Configuración Arranque Local')

@section('content')
    <h2>Arranque</h2>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.startup')}}">Scripts de inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.arranque')}}">Arranque local</a>
        </li>
    </ul>

    <p class="mt-3">
    <div class="card-header">
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <div class="alert alert-info">
            <h5><i class="icon fas fa-info-circle"></i> Información</h5>
            Contenido de /etc/rc.local. Ponga sus propios comandos aquí (antes de 'exit 0') para ejecutarlos al final del proceso de inicio.
        </div>

        <form action="{{ route('admin.saveArranque') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Editor de rc.local</label>
                <textarea class="form-control" rows="10" style="font-family: monospace" name="rc_local_content">{{ $content ?? 'Contenido no disponible' }}</textarea>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar cambios
                </button>
                <button type="button" class="btn btn-default float-right" onclick="window.location.href='{{ route('admin.arranque') }}'">
                    <i class="fas fa-times"></i> Cancelar
                </button>
            </div>
        </form>
    </div>
@endsection

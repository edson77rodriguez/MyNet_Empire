@extends('dashboard')

@section('title', 'Tareas Programadas (Crontab)')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Configuración de Tareas Programadas</h3>
            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">
            <div class="alert alert-warning">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Nota Importante</h5>
                Debe reiniciar manualmente el servicio si el archivo crontab estaba vacío antes de editar.
            </div>

            <div class="form-group">
                <label>Editor de Crontab</label>
                <textarea class="form-control" rows="10" style="font-family: monospace" placeholder="# Ejemplo de tarea programada:
# * * * * * comando_a_ejecutar
# │ │ │ │ │
# │ │ │ │ └─── día de la semana (0 - 6) (0 es Domingo)
# │ │ │ └───── mes (1 - 12)
# │ │ └─────── día del mes (1 - 31)
# │ └───────── hora (0 - 23)
# └─────────── minuto (0 - 59)"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar cambios
            </button>
            <button type="button" class="btn btn-danger float-right">
                <i class="fas fa-sync-alt"></i> Reiniciar Servicio
            </button>
        </div>
    </div>


@endsection

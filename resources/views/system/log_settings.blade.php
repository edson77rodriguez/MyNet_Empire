@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Configuración de Registro del Sistema</h2>
        
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

        <form method="POST" action="{{ url('/system/log-settings') }}">
            @csrf
            <div class="form-group">
                <label for="buffer_size">Tamaño del Buffer (KiB)</label>
                <input type="number" class="form-control" name="buffer_size" id="buffer_size" value="{{ old('buffer_size', $buffer_size) }}">
            </div>

            <div class="form-group">
                <label for="log_server">Servidor Externo</label>
                <input type="text" class="form-control" name="log_server" id="log_server" value="{{ old('log_server', $log_server) }}">
            </div>

            <div class="form-group">
                <label for="log_port">Puerto del Servidor Externo</label>
                <input type="number" class="form-control" name="log_port" id="log_port" value="{{ old('log_port', $log_port) }}">
            </div>

            <div class="form-group">
                <label for="log_protocol">Protocolo del Servidor de Registro</label>
                <select class="form-control" name="log_protocol" id="log_protocol">
                    <option value="UDP" {{ old('log_protocol', $log_protocol) == 'UDP' ? 'selected' : '' }}>UDP</option>
                    <option value="TCP" {{ old('log_protocol', $log_protocol) == 'TCP' ? 'selected' : '' }}>TCP</option>
                </select>
            </div>

            <div class="form-group">
                <label for="log_file">Archivo de Registro</label>
                <input type="text" class="form-control" name="log_file" id="log_file" value="{{ old('log_file', $log_file) }}">
            </div>

            <div class="form-group">
                <label for="log_level">Nivel de Registro</label>
                <select class="form-control" name="log_level" id="log_level">
                    <option value="Debug" {{ old('log_level', $log_level) == 'Debug' ? 'selected' : '' }}>Depurar</option>
                    <option value="Info" {{ old('log_level', $log_level) == 'Info' ? 'selected' : '' }}>Información</option>
                    <option value="Warn" {{ old('log_level', $log_level) == 'Warn' ? 'selected' : '' }}>Advertencia</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cron_log_level">Nivel de Registro de Cron</label>
                <select class="form-control" name="cron_log_level" id="cron_log_level">
                    <option value="Debug" {{ old('cron_log_level', $cron_log_level) == 'Debug' ? 'selected' : '' }}>Depurar</option>
                    <option value="Info" {{ old('cron_log_level', $cron_log_level) == 'Info' ? 'selected' : '' }}>Información</option>
                    <option value="Warn" {{ old('cron_log_level', $cron_log_level) == 'Warn' ? 'selected' : '' }}>Advertencia</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Configuración</button>
        </form>
    </div>
@endsection

@extends('dashboard')

@section('content')
    <div class="container">
        <h2>Configuración de Sincronización Horaria</h2>

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

        <form method="POST" action="{{ url('/system/time-settings') }}">
            @csrf
            <div class="form-group">
                <label for="enable_ntp_client">Activar Cliente NTP</label>
                <input type="checkbox" name="enable_ntp_client" id="enable_ntp_client" value="1" {{ old('enable_ntp_client', $enable_ntp_client) ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                <label for="enable_ntp_server">Dar Servicio NTP</label>
                <input type="checkbox" name="enable_ntp_server" id="enable_ntp_server" value="1" {{ old('enable_ntp_server', $enable_ntp_server) ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                <label for="use_dhcp_servers">Usar Servidores Anunciados por DHCP</label>
                <input type="checkbox" name="use_dhcp_servers" id="use_dhcp_servers" value="1" {{ old('use_dhcp_servers', $use_dhcp_servers) ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                <label for="ntp_servers">Servidores NTP a Consultar</label>
                <textarea class="form-control" name="ntp_servers" id="ntp_servers" rows="4">{{ old('ntp_servers', $ntp_servers) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Configuración</button>
        </form>
    </div>
@endsection

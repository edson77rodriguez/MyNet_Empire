@extends('dashboard')

@section('title', 'Arranque')

@section('content')
    <h2>Arranque</h2>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.startup')}}">Scripts de inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.arranque') }}">Arranque local</a>
        </li>
    </ul>

    <p class="mt-3">
        Puede activar o desactivar los scripts de inicio instalados aquí. Los cambios se aplicarán después de que se reinicie el dispositivo.
        <strong class="text-danger">Advertencia:</strong> Si desactivas los scripts de inicio esenciales como <strong>"network"</strong>, ¡Tu dispositivo podría volverse inaccesible!
    </p>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Prioridad de inicio</th>
            <th>Nombre del script de inicio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @php
            $scripts = [
                ['prioridad' => '00', 'nombre' => 'sysfixtime'],
                ['prioridad' => '10', 'nombre' => 'boot'],
                ['prioridad' => '10', 'nombre' => 'system'],
                ['prioridad' => '11', 'nombre' => 'sysctl'],
                ['prioridad' => '12', 'nombre' => 'rpcd'],
                ['prioridad' => '19', 'nombre' => 'firewall'],
                ['prioridad' => '19', 'nombre' => 'dnsmasq'],
                ['prioridad' => '19', 'nombre' => 'dropbear'],
                ['prioridad' => '20', 'nombre' => 'network'],
                ['prioridad' => '20', 'nombre' => 'cron'],
                ['prioridad' => '50', 'nombre' => 'uhttpd'],
            ];
        @endphp
        @foreach ($scripts as $script)
            <tr>
                <td>{{ $script['prioridad'] }}</td>
                <td>{{ $script['nombre'] }}</td>
                <td><button class="btn btn-primary btn-sm">ACTIVADO</button></td>
                <td>
                    <form action="{{ route('admin.startScript', $script['nombre']) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-info btn-sm">INICIAR</button>
                    </form>
                    <form action="{{ route('admin.restartScript', $script['nombre']) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm">REINICIAR</button>
                    </form>
                    <form action="{{ route('admin.stopScript', $script['nombre']) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">DETENER</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

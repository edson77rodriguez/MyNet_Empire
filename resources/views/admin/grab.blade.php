@extends('dashboard')

@section('title', 'Operaciones de Grabado')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Operaciones de Grabado</h1>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <p>Pulse "Generar archivo" para descargar un archivo con extensión .tar con los archivos de configuración actuales.</p>

            <h3>Descargar copia de seguridad</h3>
            <button class="btn btn-primary mb-3" onclick="window.location.href='{{ route('generateBackup') }}'">Generar archivo</button>

            <p>Para restaurar los archivos de configuración, debe subir primero una copia de seguridad. Para reiniciar el firmware a sus configuraciones predeterminadas pulse "Realizar restablecimiento" (sólo posible con imágenes squashfs).</p>

            <h3>Reiniciar a configuraciones predeterminadas</h3>
            <form action="{{ route('resetToFactory') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mb-3">Realizar Restablecimiento</button>
            </form>

            <h3>Restaurar copia de seguridad</h3>
            <form action="{{ route('uploadFirmwareImage') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="firmware_image" class="form-control mb-3">
                <button type="submit" class="btn btn-success mb-3">Subir archivo...</button>
            </form>

            <p>Los archivos personalizados (certificados, scripts) pueden permanecer en el sistema. Para evitar esto, primero realice un restablecimiento de fábrica.</p>

            <p>Haga clic en "Guardar Múdblock" para descargar el archivo Múdblock especificado. (NOTA: ¡ESTA FUNCIÓN ES PARA PROFESIONALES!)</p>

            <table class="table table-bordered mb-3">
                <tr>
                    <td>Elegir Múdblock</td>
                    <td>bool</td>
                </tr>
                <tr>
                    <td>Descargar Múdblock</td>
                    <td><button class="btn btn-warning">Guardar Múdblock</button></td>
                </tr>
            </table>

            <p>Cargue aquí una imagen compatible con synupgrade para reemplazar el firmware en ejecución.</p>

            <table class="table table-bordered">
                <tr>
                    <td>Imagen</td>
                    <td><button class="btn btn-secondary">Crear Imagen...</button></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

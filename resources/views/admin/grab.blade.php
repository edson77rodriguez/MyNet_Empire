@extends('dashboard')

@section('title', 'Operaciones de Grabado')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Operaciones de grabado</h1>
        </div>
        <div class="card-body">
           
            <p>Pulse "Generar archivo" para descargar un archivo con extensión. 1ar con los archivos de configuración actuales.</p>

            <h3>Descargar copia de seguridad</h3>
            <button class="btn btn-primary mb-3">- GENERAR ARCHIVO</button>

            <p>Para restaurar los archivos de configuración, debe subir primero una copia de seguridad. Para reiniciar el firmware a sus configuraciones predeterminadas pulse "Realizar restablecimiento" (sólo posible con imágenes squashfs).</p>

            <h3>Reiniciar a configuraciones predeterminadas</h3>
            <button class="btn btn-danger mb-3">- REALIZAR RESTABLECIMIENTO</button>

            <h3>Restaurar copia de seguridad</h3>
            <button class="btn btn-success mb-3">- SUBIR ARCHIVO...</button>

            <p>Los archivos personalizados (certificados, scripts) pueden permanecer en el sistema. Para evitar esto, primero realice un restablecimiento de fábrica.</p>

            <p>Haga clic en "Guardar múdblock" para descargar el archivo múdblock especificado. (NOTA: ¡ESTA FUNCIÓN ES PARA PROFESIONALES!)</p>

            <table class="table table-bordered mb-3">
                <tr>
                    <td>Elegir múdblock</td>
                    <td>bool</td>
                </tr>
                <tr>
                    <td>Descargar múdblock</td>
                    <td><button class="btn btn-warning">GUARDAR MITOBLOCK</button></td>
                </tr>
            </table>

            <p>Cargue aquí una imagen compatible con synupgrade para reemplazar el firmware en ejecución.</p>

            <table class="table table-bordered">
                <tr>
                    <td>Imagen</td>
                    <td><button class="btn btn-secondary">GREARER IMAGEN...</button></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

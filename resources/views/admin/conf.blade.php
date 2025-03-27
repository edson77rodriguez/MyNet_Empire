@extends('dashboard')

@section('title', 'Configuración de LEDs')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Configuración de LEDs</h3>

        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Personaliza el comportamiento de los LEDs del dispositivo, si es posible.
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre del LED</th>
                        <th>Estado predeterminado</th>
                        <th>Disparador</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>wlan</td>
                        <td>greenwlan</td>
                        <td>
                            <span class="badge badge-secondary">Apagado</span>
                        </td>
                        <td>netdev</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">Editar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>wan</td>
                        <td>orangewan</td>
                        <td>
                            <span class="badge badge-secondary">Apagado</span>
                        </td>
                        <td>switch0</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">Editar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>lan</td>
                        <td>greenlan</td>
                        <td>
                            <span class="badge badge-secondary">Apagado</span>
                        </td>
                        <td>switch0</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">Editar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <hr>

            <h4 class="mt-4 mb-3"><i class="fas fa-plus-circle"></i> Añadir Acción LED</h4>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Ej: usb">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nombre del LED</label>
                        <input type="text" class="form-control" placeholder="Ej: blueusb">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Disparador</label>
                        <select class="form-control">
                            <option>Seleccionar...</option>
                            <option>netdev</option>
                            <option>switch0</option>
                            <option>timer</option>
                            <option>default-on</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="button" class="btn btn-success">
                <i class="fas fa-save"></i> Guardar y Aplicar
            </button>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
            <button type="button" class="btn btn-danger">
                <i class="fas fa-undo"></i> Restablecer
            </button>
        </div>
    </div>
@endsection

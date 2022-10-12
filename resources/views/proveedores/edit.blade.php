<x-app-layout>
    @section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Proveedor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('proveedor.index') }}">Lista de Proveedores</a></li>
                    <li class="breadcrumb-item active">Editar Proveedor</li>
                </ol>
            </div>
        </div>
    </div>
    @endsection
    @section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline bg-gradient-navy">
                    <div class="card-header text-center">
                        <h3>Formulario para editar proveedor</h3>
                    </div>
                    <div class="card-body bg-gradient-gray">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('proveedor.update', $proveedor) }}">
                            @csrf
                            @method('PUT')
                            <div class="row  mb-2">
                                <div class="col-12">
                                    <p><strong>Datos del vendedor</strong></p>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nombreProveedor">Nombre</label>
                                    <input type="text" class="form-control" name="nombreProveedor" value="{{ $proveedor->nombres }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="apellidosProveedor">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidosProveedor" value="{{ $proveedor->apellidos }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="telContacto">Teléfono de Contacto</label>
                                    <input type="text" class="form-control" name="telContacto" value="{{ $proveedor->telcontacto }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telAdicional">Teléfono Adicional</label>
                                    <input type="text" class="form-control" name="telAdicional" value="{{ $proveedor->tel_adicional }}">
                                    <small class="form-text text-muted">(Opcional)</small>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <p><strong>Datos de empresa</strong></p>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <div class="form-check">
                                        @if ($proveedor->isIndependiente == 1)
                                        <input type="checkbox" class="form-check-input" name="esIndependiente" value="1" checked>
                                        @else
                                        <input type="checkbox" class="form-check-input" name="esIndependiente" value="1">
                                        @endif
                                        <label for="esIndependiente">¿Es independiente?</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nombreEmpresa">Nombre de la empresa</label>
                                    <input type="text" class="form-control" name="nombreEmpresa" value="{{ $proveedor->nombre_empresa }}">
                                    <small class="form-text text-muted">(Opcional)</small>
                                    <small class="form-text text-muted">*Se registra si el proveedor no es
                                        independiente</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="direccionProveedor">Dirección</label>
                                    <input type="text" class="form-control" name="direccionProveedor" value="{{ $proveedor->direccion }}">
                                    <small class="form-text text-muted">(Opcional)</small>
                                    <small class="form-text text-muted">*Aplica tambien para proveedor
                                        independiente</small>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-block btn-warning">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('js')
        
    @endpush
</x-app-layout>
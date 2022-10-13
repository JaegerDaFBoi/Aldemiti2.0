<x-app-layout>
    @section('content-header')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nuevo Producto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inventario.index') }}">Inventario</a></li>
                        <li class="breadcrumb-item active">Nuevo Producto</li>
                    </ol>
                </div>
            </div>
        </div>
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card car-outline bg-gradient-navy">
                        <div class="card-header text-center">
                            <h3>Registro de nuevo producto</h3>
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
                            <form action="{{ route('inventario.store') }}" method="POST">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <p><strong>Clasificacion del producto</strong></p>
                                        <hr>
                                        <small>*Si la categoria no registra, puede crearla <ins><a
                                                    href="{{ route('categorias.index') }}">aquí</a></ins></small>
                                        <br>
                                        <small>*Si el proveedor no registra, puede crearlo <ins><a
                                                    href="{{ route('proveedor.create') }}">aquí</a></ins></small>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col-md-6">
                                        <label for="categoriaProducto">¿A que categoría pertenece el producto?</label>
                                        <select class="form-control" name="categoriaProducto">
                                            <option disabled selected>Seleccione una categoría</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="proveedorProducto">Proveedor</label>
                                        <select class="form-control" name="proveedorProducto">
                                            <option disabled selected>Seleccione un proveedor</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombres }} {{ $proveedor->apellidos }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <p><strong>Datos del producto</strong></p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col-md-5">
                                        <label for="codigoProducto">Código</label>
                                        <input type="text" class="form-control" id="codigoProducto"
                                            name="codigoProducto">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="nombreProducto">Nombre del Producto</label>
                                        <input type="text" class="form-control" id="nombreProducto"
                                            name="nombreProducto">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="unidadMedida">Unidad de Medida</label>
                                        <select class="form-control" name="unidadMedida">
                                            <option disabled selected>Seleccione la unidad de medida</option>
                                            <option value="Unidad">Unidad</option>
                                            <option value="Libra">Libra</option>
                                            <option value="Kilo">Kilo</option>
                                            <option value="Arroba">Arroba</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col-md-5">
                                        <label for="valorCompra">Valor de Producto</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" min="1" step="any"
                                                name="valorCompra">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="valorVenta">Valor de Venta</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" min="1" step="any"
                                                name="valorVenta">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col-md-6">
                                        <label for="stockInventario">Cantidad en Inventario</label>
                                        <input type="number" class="form-control" min="1" name="stockInventario">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-block btn-sm btn-warning">
                                            Guardar
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

<div>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline bg-gradient-navy">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header text-center">
                    <h3>Formulario para editar producto</h3>
                </div>
                <div class="card-body bg-gradient-gray">
                    <form wire:submit.prevent='editarProducto' method="POST">
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
                                <select class="form-control" name="categoriaProducto" wire:model='categoria'>
                                    <option disabled selected>Seleccione una categoría</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="proveedorProducto">Proveedor</label>
                                <select class="form-control" name="proveedorProducto" wire:model='proveedor'>
                                    <option disabled selected>Seleccione un proveedor</option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombres }}
                                            {{ $proveedor->apellidos }}
                                        </option>
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
                                <input type="text" class="form-control" id="codigoProducto" name="codigoProducto"
                                    wire:model='codigo'>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="nombreProducto">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombreProducto" name="nombreProducto"
                                    wire:model='nombre'>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="unidadMedida">Unidad de Medida</label>
                                <select class="form-control" name="unidadMedida" wire:model='unidadmedida'>
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
                                        name="valorCompra" wire:model='valorcompra'>
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
                                        name="valorVenta" wire:model='valorventa'>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="modificarCantidad"
                                        wire:model='editarCantidad'>
                                    <label for="modificarCantidad">¿Desea modificar la cantidad en inventario?</label>
                                </div>
                            </div>
                            @if ($editarCantidad)
                            <div class="form-group col-md-6">
                                <label for="stockInventario">Cantidad en Inventario</label>
                                <input type="number" class="form-control" min="1" name="stockInventario"
                                    wire:model='stock'>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-outline bg-gradient-warning">
                                    <div class="card-header text-danger">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Atención!
                                    </div>
                                    <div class="card-body">
                                        <p class="text-danger   ">Modificar la cantidad en inventario puede generar errores en el seguimiento de los ingresos y las ventas</p>
                                    </div>
                                </div>
                            </div>
                            @endif  
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

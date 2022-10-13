<div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card card-outline bg-gradient-navy">
                <div class="card-header text-center">
                    <h3>Lista de Productos</h3>
                </div>
                <div class="card-body bg-gradient-gray">
                    <div class="row">
                        @if ($formularioIngreso || $formularioRetiro)
                            <div class="col-md-9">
                            @else
                                <div class="col-md-12">
                        @endif
                        <div wire:ignore>
                            <table id="tablaProductos" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Medida</th>
                                        <th>Valor de compra</th>
                                        <th>Valor de venta</th>
                                        <th>Cantidad en inventario</th>
                                        <th>Proveedor</th>
                                        <th>Opciones</th>
                                        @if (!$formularioIngreso && !$formularioRetiro)
                                            <th>Ingresos/Retiros Productos</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->categoria->nombre }}</td>
                                            <td>{{ $producto->codigo }}</td>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->unidad_medida }}</td>
                                            <td>{{ $producto->valor_compra }}</td>
                                            <td>{{ $producto->valor_venta }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                            <td>
                                                @if (!is_null($producto->proveedor))
                                                    {{ $producto->proveedor->nombres }}
                                                    {{ $producto->proveedor->apellidos }}
                                                @else
                                                    Proveedor no registra
                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a href="{{ route('inventario.edit', $producto) }}">
                                                            <button type="button" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="{{ route('inventario.delete', $producto) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <button type="submit" class="btn btn-sm btn-info"
                                                            wire:click='mostrarFormulario({{ $producto->id }})'>
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            wire:click='mostrarFormularioRetiro({{ $producto->id }})'>
                                                            <i class="fas fa-minus-square"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($formularioIngreso)
                        <div class="col-md-3">
                            <div class="card card-outline bg-gradient-navy">
                                <div class="card-header">
                                    <h3 class="card-title">Ingreso de productos al inventario</h3>
                                    <button type="button" class="close" aria-label="Close"
                                        wire:click='cerrarFormulario'>
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body bg-gradient-dark">
                                    <form wire:submit.prevent='guardarIngreso' method="post">
                                        <label for="Producto">{{ $productoSeleccionado->codigo }} -
                                            {{ $productoSeleccionado->nombre }}</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="fechaIngreso">Fecha</label>
                                                <input type="date" class="form-control" name="fechaIngreso"
                                                    wire:model='fechaIngreso'>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="cantidad">Cantidad a Ingresar</label>
                                                <input type="number" class="form-control" name="cantidad"
                                                    wire:model='cantidad' wire:change='calcularValorTotal'>
                                                @if ($valortotal != 0)
                                                    <label>Valor Total</label>
                                                    <br>
                                                    {{ $valortotal }}
                                                @endif
                                            </div>
                                            <div class="col-md-6 align-self-end">
                                                <button type="submit" class="btn btn-sm btn-warning">
                                                    Guardar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($formularioRetiro)
                        <div class="col-md-3">
                            <div class="card card-outline bg-gradient-navy">
                                <div class="card-header">
                                    <h3 class="card-title">Retiro de productos del inventario</h3>
                                    <button type="button" class="close" aria-label="Close"
                                        wire:click='cerrarFormulario'>
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body bg-gradient-dark">
                                    <form wire:submit.prevent='guardarRetiro' method="post">
                                        <label for="Producto">{{ $productoSeleccionado->codigo }} -
                                            {{ $productoSeleccionado->nombre }}</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="fechaRetiro">Fecha</label>
                                                <input type="date" class="form-control" name="fechaRetiro"
                                                    wire:model='fechaRetiro'>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="cantidadRetiro">Cantidad Retiro</label>
                                                <input type="number" class="form-control" name="cantidad"
                                                    wire:model='cantidadRetiro' wire:change='calcularValorTotal'>
                                                @if ($valorretiro != 0)
                                                    <label>Valor Total</label>
                                                    <br>
                                                    {{ $valorretiro }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="observacion">Observación</label>
                                                <input type="text" class="form-control" name="observacion"
                                                    wire:model='observacion'>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6 align-self-start">
                                                <button type="submit" class="btn btn-sm btn-warning">
                                                    Guardar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>

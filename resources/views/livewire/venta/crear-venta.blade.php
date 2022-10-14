<div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card card-outline bg-gradient-navy">
                <div class="card-header text-center">
                    <h3>Formulario para registro de venta</h3>
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
                    <form wire:submit.prevent='guardarProductos' method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fechaVenta">Fecha de Venta</label>
                                <input type="date" class="form-control" name="fechaVenta" wire:model='fechaventa'>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div wire:ignore>
                                    <table id="tablaProductos" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Producto</th>
                                                <th>Valor de Venta</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                                <tr>
                                                    <td>{{ $producto->id }}</td>
                                                    <td>{{ $producto->nombre }}</td>
                                                    <td>{{ $producto->valor_venta }}</td>
                                                    <td>
                                                        <button type="button" class="btn bg-navy btn-sm"
                                                            wire:click='seleccionarProducto({{ $producto->id }})'>
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if ($mostrar)
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="producto">Producto a Añadir</label>
                                            <input readonly type="text" class="form-control"
                                                value="{{ $nombreproducto }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number" class="form-control" wire:model='cantidad'
                                                wire:change='calcularValorTotal'>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="valortotal">Valor Total</label>
                                            <input readonly type="number" class="form-control"
                                                value="{{ $valortotal }}">
                                        </div>
                                        <div class="col-md-3 mt-4 p-2">
                                            <button type="button" class="btn btn-sm bg-gradient-warning"
                                                wire:click='añadirProducto'>
                                                Añadir
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <div class="card card-outline bg-gradient-navy">
                                                <div class="card-header text-center">
                                                    <h3><span><i class="fas fa-shopping-basket"></i></span> Lista de
                                                        productos</h3>
                                                </div>
                                                <div class="card-body bg-gradient-dark">
                                                    @if (!empty($productosavender))
                                                        <ul class="list-group">
                                                            @foreach ($productosavender as $i => $producto)
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-cente">
                                                                    <h6><strong>Producto:</strong>
                                                                        {{ $producto['nombre'] }}</h6>
                                                                    <div class="d-flex w-100">
                                                                        <p class="mx-2"><strong>Cantidad:</strong>
                                                                            {{ $producto['cantidad'] }}</p>
                                                                        <p><strong>Valor total:</strong>
                                                                            {{ $producto['valortotal'] }}</p>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="btn btn-sm bg-gradient-danger"
                                                                        wire:click="quitarProducto({{ $i }})">
                                                                        Quitar
                                                                    </button>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-sm bg-gradient-warning">
                                                Guardar
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

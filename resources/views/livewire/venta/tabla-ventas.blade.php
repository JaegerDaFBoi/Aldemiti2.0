<div>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline bg-gradient-navy">
                <div class="card-header text-center">
                    <h3>Registro de ventas</h3>
                </div>
                <div class="card-body bg-gradient-gray">
                    <div class="row">
                        <div class="col-md-6">
                            <div wire:ignore>
                                <table id="tablaVentas" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID Venta</th>
                                            <th>Fecha de venta</th>
                                            <th>Valor Total</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ventas as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->fecha_venta }}</td>

                                                <td>{{ $item->productos->sum('pivot.valor_total') }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm bg-gradient-warning"
                                                        wire:click='mostrarDetalle({{ $item->id }})'>
                                                        Ver Detalle
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-outline bg-gradient-navy">
                                <div class="card-header text-center">
                                    <h3>Detalles de la venta</h3>
                                </div>
                                <div class="card-body bg-gradient-dark">
                                    @if ($mostrarDetalle)
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Valor de la Venta</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($venta->productos as $producto)
                                                    <tr>
                                                        <td>{{ $producto->nombre }}</td>
                                                        <td>{{ $producto->pivot->cantidad }}</td>
                                                        <td>{{ $producto->pivot->valor_total }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <label>Valor Total</label>
                                        <p>$ {{ $valortotal }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline bg-gradient-navy">
                <div class="card-header">
                    <h3>Ultimos Productos Agregados</h3>
                </div>
                <div class="card-body bg-gradient-gray">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad en Inventario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('inventario.index') }}" class="btn btn-block bg-gradient-warning">
                                <i class="fas fa-boxes"></i> Ir a Inventario de Productos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-outline bg-gradient-navy">
                <div class="card-header">
                    <h3>Ultimas Ventas Registradas</h3>
                </div>
                <div class="card-body bg-gradient-gray">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha de Venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ $venta->fecha_venta }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($venta->productos as $producto)
                                                        <li>{{ $producto->nombre }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('ventas.create') }}" class="btn btn-block bg-gradient-warning">
                                <i class="fas fa-wallet"></i> Ir a Registrar Venta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

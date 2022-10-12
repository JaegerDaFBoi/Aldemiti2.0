<x-app-layout>
    @section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Proveedores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Lista de Proveedores</li>
                </ol>
            </div>
        </div>
    </div>
    @endsection
    @section('content')
    <div class="container-fluid">
        @if (session("message"))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Notificacion: </strong>{{ session('message') }}
                    <button type="button" class="close bg-dark" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card card-outline bg-gradient-navy">
                    <div class="card-header text-center">
                        <h3>Lista de Proveedores</h3>
                    </div>
                    <div class="card-body bg-gradient-gray">
                        <table id="tablaProveedores" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre Proveedor</th>
                                    <th>Telefono de contacto</th>
                                    <th>Telefono Adicional</th>
                                    <th>Dirección</th>
                                    <th>¿Es independiente?</th>
                                    <th>Empresa</th>
                                    <td>Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                <tr>
                                    <td>{{ $proveedor->nombres }} {{ $proveedor->apellidos }}</td>
                                    <td>{{ $proveedor->telcontacto }}</td>
                                    <td>
                                        @if (!is_null($proveedor->tel_adicional))
                                        {{ $proveedor->tel_adicional }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if (!is_null($proveedor->direccion))
                                        {{ $proveedor->direccion }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($proveedor->isIndependiente == 1)
                                        SI
                                        @else
                                        NO
                                        @endif
                                    </td>
                                    <td>
                                        @if (!is_null($proveedor->nombre_empresa))
                                        {{ $proveedor->nombre_empresa }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('proveedor.edit', $proveedor) }}">
                                                    <button type="button" class="btn btn-sm bg-warning">
                                                        <i class="fas fa-user-edit"></i>
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('proveedor.delete', $proveedor) }}" method="post">
                                                  @method('DELETE')
                                                  @csrf
                                                  <button type="submit" class="btn btn-sm bg-danger">
                                                    <i class="fas fa-eraser"></i>
                                                  </button>
                                                </form>
                                              </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('js')
    <script>
        $(document).ready(function() {
      $('#tablaProveedores').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
        }
      });
    });
    </script>
    @endpush
</x-app-layout>
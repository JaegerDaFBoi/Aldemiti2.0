<x-app-layout>
    @section('content-header')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inventario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Inventario</li>
                    </ol>
                </div>
            </div>
        </div>
    @endsection
    @section('content')
        <div class="container-fluid">
            @if (session('message'))
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('inventario.create') }}">
                        <button type="button" class="btn btn-block btn-warning">
                            Añadir Producto
                        </button>
                    </a>
                </div>
            </div>
             <livewire:producto.tabla-productos :productos='$productos' />
        </div>
    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                $('#tablaProductos').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "scrollX": true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                    }
                });
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
    @endpush
</x-app-layout>

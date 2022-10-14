<x-app-layout>
    @section('content-header')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registro de ventas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Lista de Ventas</li>
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
                    <a href="">
                        <button type="button" class="btn btn-block btn-warning">
                            Registrar Venta
                        </button>
                    </a>
                </div>
            </div>
            <livewire:venta.tabla-ventas :ventas='$ventas' />
        </div>
    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                $('#tablaVentas').DataTable({
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

<x-app-layout>
    @section('content-header')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ingresos al inventario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Lista de Ingresos</li>
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
        <livewire:ingreso.lista-ingresos :ingresos='$ingresos' />
    </div>
    @endsection

    @push('js')
    <script>
        $(document).ready(function() {
          $('#tablaIngresos').DataTable({
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

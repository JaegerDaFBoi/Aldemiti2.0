<x-app-layout>
    @section('content-header')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Producto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inventario.index') }}">Inventario</a></li>
                        <li class="breadcrumb-item active">Editar Producto</li>
                    </ol>
                </div>
            </div>
        </div>
    @endsection
    @section('content')
        <div class="container-fluid">
            <livewire:producto.editar-producto :producto='$producto' />
        </div>
    @endsection

    @push('js')
    @endpush
</x-app-layout>

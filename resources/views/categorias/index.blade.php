<x-app-layout>
    @section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categorias</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Lista de Categorias</li>
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
            <div class="col-md-6">
                <div class="card card-outline bg-gradient-navy">
                    <div class="card-header text-center">
                        <h3>Categorias de productos</h3>
                    </div>
                    <div class="card-body bg-gradient-gray">
                        <table class="table table-hover table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td class="text-center">#</td>
                                    <td>Categoria</td>
                                    <td>Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td>
                                            <form action="{{ route('categorias.delete', $categoria) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm bg-danger">
                                                  <i class="fas fa-eraser"></i>
                                                </button>
                                              </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <livewire:categoria.crear-categoria />
            </div>
        </div>
    </div>
    @endsection

    @push('js')
        
    @endpush
</x-app-layout>
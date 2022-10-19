<x-app-layout>
    @section('content-header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('dist/img/logoaldemiti.png') }}" alt="logoaldemiti" width="80px" height="80px"><span></span>
            </div>
            <div class="col-md-3">
                <h1>ALDEMITI - Almacén de mi tienda</h1>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
    @endsection
    @section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <livewire:dashboard.dashboard />
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>

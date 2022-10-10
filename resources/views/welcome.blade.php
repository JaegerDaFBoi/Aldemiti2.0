<x-guest-layout>
    @section('header_contenido')
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain bg-white mt-8">
                        <div class="card-body">
                            <p class="display-4">Bienvenido a</p>
                            <p class="display-1 font-weight-bolder text-info text-gradient">Aldemiti</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url({{ asset('assets/img/fondomadera.jpg') }})"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-guest-layout>
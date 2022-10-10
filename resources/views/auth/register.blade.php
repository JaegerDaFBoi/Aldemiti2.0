<x-guest-layout>
    @section('header_contenido')
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/fondomadera.jpg');">
            <span class="mask bg-gradient-dark opacity-4"></span>
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Bienvenido!</h1>
                        <p class="text-lead text-white">Confirma los siguientes datos para registrarte.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            Registrarse
                        </div>
                        <div class="card-body">
                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" id="name" class="form-control" :value="old('name')" required autofocus autocomplete="name" placeholder="Nombre">
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password" placeholder="Contraseña">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="Confirme Contraseña">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-round bg-gradient text-red w-100 my-4 mb-2" style="background-color: #F67B16">Registrarse</button>
                            </div>
                            <p class="text-sm-mt-3 mb-0">¿Ya estás registrado? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Iniciar Sesión</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
</x-guest-layout>

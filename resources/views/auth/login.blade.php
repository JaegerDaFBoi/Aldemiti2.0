<x-guest-layout>
    @section('header_contenido')
    <div class="page-header min-vh-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8 bg-white">
                        <div class="card-header pb-0 text-left">
                            <p class="card-header font-weight-bolder text-info text-gradient">Bienvenido de vuelta!</p>
                            <p class="mb-0">Confirma tu correo electrónico y contraseña para acceder</p>
                        </div>
                        <div class="card-body">
                            <x-jet-validation-errors class="mb-4" />
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label for="email">Correo Electrónico</label>
                                <div class="mb-3">
                                    <input type="email" name="email" id="email" class="form-control"  aria-label="Email" aria-describedby="email-addon" :value="old('email')" required autofocus />
                                </div>
                                <label for="password">Contraseña</label>
                                <div class="mb-3">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"  aria-describedby="password-addon" required autocomplete="current-password" />
                                </div>
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input" checked="">
                                    <label for="remember_me" class="form-check-label font-weight-bold">Recuérdame</label>
                                </div>
                                <div class="text-center ">
                                    <button type="submit" class="btn btn-round bg-gradient text-red w-100 mt-4 mb-0 font-weight-bolder" style="background-color: #F67B16">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            @if (Route::has('password.request'))
                                <p class="mb-4 text-sm mx-auto">
                                    ¿Olvidaste tu contraseña?
                                    <a href="{{ route('password.request') }}" class="text-info text-gradient font-weight-bold">Recuperar Contraseña</a>
                                </p>
                            @endif
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
<x-guest-layout>
    @section('content')
        <div class="container-fluid m-0 vh-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-6 h-auto">
                    <div class="login-box mx-auto align-self-center shadow-lg">
                        <div class="card card-outline bg-gradient-navy">
                            <div class="card-header text-center">
                                <a href="#" class="h3"><b>Aldemiti</b></a>
                            </div>
                            <div class="card-body bg-gradient-gray">
                                <p class="login-box-msg">Registre sus datos para iniciar sesión</p>
                                <x-jet-validation-errors class="mb-4" />
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <label for="email">Correo Electrónico</label>
                                    <div class="input-group mb-3">
                                        <input type="email" name="email" id="email" class="form-control"
                                            :value="old('email')" required autofocus />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="password">Contraseña</label>
                                    <div class="input-group mb-3">
                                        <input type="password" id="password" name="password" class="form-control" required
                                            autocomplete="current-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="icheck-warning">
                                                <input type="checkbox" id="remember" name="remember">
                                                <label for="remember">
                                                    Recuerdame
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-warning btn-block">Iniciar Sesión</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="row mt-3">
                                    <div class="col">
                                        <p class="mb-1">
                                            <a href="{{ route('password.request') }}">
                                                He olvidado mi contraseña
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 h-100 my-0 mx-0 d-flex justify-items-center align-items-center"
                    style="background-image: url({{ asset('dist/img/fondo-madera.jpg') }}); background-size: cover;">
                    <img src="{{ asset('dist/img/logoaldemiti.png') }}" alt="logoaldemiti"
                        class="mx-auto d-block w-60 h-40 rounded">
                </div>
            </div>
        </div>
    @endsection
</x-guest-layout>

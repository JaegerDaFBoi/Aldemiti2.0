<x-guest-layout>
    @section('content')
        <div class="container-fluid m-0 vh-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-12 h-auto">
                    <div class="register-box mx-auto my-auto align-self-center shadow-lg">
                        <div class="card card-outline bg-gradient-navy">
                            <div class="card-header text-center">
                                <a href="#" class="h3"><b>Aldemiti</b></a>
                            </div>
                            <div class="card-body bg-gradient-gray">
                                <p class="login-box-msg">Registre sus datos para crear su cuenta</p>
                                <x-jet-validation-errors class="mb-4" />
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <label for="name">Nombre</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="name" name="name" class="form-control"
                                            :value="old('name')" required autofocus autocomplete="name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="email">Correo Electrónico</label>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" id="email" name="email"
                                            :value="old('email')" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="password">Contraseña</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="password" name="password" required
                                            autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="password_confirmation">Confirme contraseña</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning btn-block w-50 mx-auto">Registrarse</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-guest-layout>

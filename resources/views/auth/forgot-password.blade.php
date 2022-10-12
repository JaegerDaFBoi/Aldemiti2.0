<x-guest-layout>
    @section('content')
        <div class="container-fluid m-0 vh-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-12 h-auto">
                    <div class="login-box mx-auto my-auto align-self-center shadow-lg">
                        <div class="card card-outline bg-gradient-navy">
                            <div class="card-header text-center">
                                <a href="#" class="h3"><b>Aldemiti</b></a>
                            </div>
                            <div class="card-body bg-gradient-gray">
                                <p class="login-box-msg">
                                    ¿Olvidaste tu contraseña? Confirma tu correo electrónico y te enviaremos un correo con
                                    un enlace para resetearla
                                </p>
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <x-jet-validation-errors class="mb-4" />
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="email" id="email" name="email" class="form-control"
                                            :value="old('email')" required autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-warning btn-block w-50 mx-auto">Enviar Link</button>
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

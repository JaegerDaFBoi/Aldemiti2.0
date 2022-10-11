<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aldemiti') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dist/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-gray-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="brand-link">
                        <img src="{{ asset('dist/img/logoaldemiti.png') }}" alt="Logo Aldemiti"
                            class="brand-image img-circle elevation-3" style="opacity: .8">
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    <li class="nav-item d-none d-sm-inline-block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">
                                <i class="fas fa-user"></i>
                                Iniciar Sesión
                            </a>
                        @endauth
                    </li>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="fas fa-user-plus"></i>
                            Registrarse
                        </a>
                    @endif
                @endif
            </ul>
        </nav>
        
    </div>

    <!-- jQuery -->
    <script src="{{ asset('dist/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>

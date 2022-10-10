<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aldemiti') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link id="pagestyle" rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard.css') }}" />

    {{-- <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.2.2-dist/css/bootstrap.min.css') }}" /> --}}

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <!--DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
    
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="page-background-color">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg content-orange top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4"
                    style="border-radius: 60px">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-start">
                                <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 justify-items-center"
                                    href="{{ url('/dashboard') }}">
                                    <img src="{{ asset('assets/img/logoaldemiti.png') }}" alt="logoaldemiti" width="100%" height="100%">   
                                </a>
                                <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon mt-2">
                                        <span class="navbar-toggler-bar bar1"></span>
                                        <span class="navbar-toggler-bar bar2"></span>
                                        <span class="navbar-toggler-bar bar3"></span>
                                    </span>
                                </button>
                            </div>
                            <div class="col-md-8 d-flex justify-content-end flex-wrap align-content-center">
                                <div class="collapse navbar-collapse" id="navigation">
                                    <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                        @if (Route::has('login'))
                                        @auth
                                        <li class="nav-item">
                                            <a class="nav-link me-2" href="{{ url('/dashboard') }}">
                                                <i class="ni ni-box-2 opacity-6 text-dark me-1"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        @else
                                        <li class="nav-item">
                                            <a class="nav-link me-2" href="{{ route('login') }}">
                                                <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                                Iniciar Sesión
                                            </a>
                                        </li>
                                        @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link me-2" href="{{ route('register') }}">
                                                <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                                Registrarse
                                            </a>
                                        </li>
                                        @endif
                                        @endauth
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        @yield('header_contenido')
        @yield('contenido')
        @yield('footer_contenido')
    </main>


    <!-- jQuery -->
    <script src="{{ asset('assets/js/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Theme Core Scripts -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- Theme JS Scripts -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}"></script>
    <!-- Bootstrap 5 -->
    <script src="{{ asset('assets/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Moment JS -->
    <script src="{{ asset('assets/js/plugins/moment/moment.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/js/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>

    @livewireScripts

    @stack('js')
</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="page-background-color g-sidenav-show">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gray-500"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 text-left" href="{{ url('/dashboard') }}" target="_blank">
                <h3 class="font-weight-bold ms-1">Aldemiti</h3>
                <span class="ms-1 font-weight-bold">Inventario Facil</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item mb-2">
                    <a href="{{ url('/dashboard') }}" class="nav-link bg-gradient-light rounded">
                        <div class="icon icon-shape icon-sm shadow border-radius-md content-orange text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-columns" style="color: #C2430C"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link bg-gradient-light rounded" href="#">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md content-orange text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-shopping-basket" style="color: #C2430C"></i>
                        </div>
                        <span class="nav-link-text ms-1">Inventario</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="{{ route('profile.show') }}" class="nav-link text-body p-0">
                                <i class="fas fa-user-tie fixed-plugin-button-nav cursor-pointer"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-warning btn-sm mb-0 me-3">Cerrar
                                    Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4">
            @yield('content-header')
            <div class="container mt-3">
                @yield('content')
            </div>
        </div>
    </main>
    <footer class="footer pt-3 fixed-bottom">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-end">

                <div class="col-lg-6">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        SENA Centro de Automatización Industrial         
                    </div>
                </div>
            </div>
        </div>
    </footer>

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

    {{-- <!-- Bootstrap 5 -->
    <script src="{{ asset('assets/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js') }}"></script> --}}
    <!-- DataTables -->
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Moment JS -->
    <script src="{{ asset('assets/js/plugins/moment/moment.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/js/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>

    <!-- Theme JS Scripts -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}"></script>
    @livewireScripts

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    @stack('js')
</body>

</html>

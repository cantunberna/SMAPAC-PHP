{{--  {{  dd(auth()->user()->roles) }}  --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <meta content="ie=edge" http-equiv="x-ua-compatible">
                    <title>
                        SMAPAC @yield('title', 'Inicio')
                    </title>
                        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
                        {{-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
                        <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
                        <link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet">
                        <link href="/img/smapac-home.png" rel="shortcut icon">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                </meta>
            </meta>
        </meta>
    </head>

    {{-- <style>
        .active{
            text-decoration: none;
            color: green;
        }
    </style> --}}
    {{--  <h1> {{ request()->is('/') ? 'Estas en Home' : 'No estas'}}</h1>  --}}
    <?php function activeMenu($url){
        return request()->is($url) ? 'active' : '';
    } ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#">
                            <i class="fas fa-bars">
                            </i>
                        </a>
                    </li>
                </ul>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input aria-label="Search" class="form-control form-control-navbar" placeholder="Buscar" type="search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search">
                                    </i>
                                </button>
                            </div>
                        </input>
                    </div>
                </form>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a class="brand-link" href="/">
                    <div class="text-center">
                        <img alt="" class="rounded" src="/img/smapac-home.png" width="45%">
                        </img>
                    </div>
                </a>
                @if (auth()->check())
                    @if (auth()->user()->hasRoles(['admin']) )
                            @include('nav-bar.admin-nav')
                    @elseif (auth()->user()->hasRoles(['coordinador']) )
                            @include('nav-bar.coor-nav')
                    @elseif (auth()->user()->hasRoles(['titular']) )
                            @include('nav-bar.titular-nav')
                            @endif
                             {{--  <li class="nav-item">
                                <a class="nav-link" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                   {{ __('Logout') }} href="{{ route('logout') }}">
                                    <i class="nav-icon fas fa-clipboard-list">
                                    </i>
                                    <p>
                                        Cerrar Sesion
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>  --}}
                </div>


                @endif
                @if(auth()->guest())


                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                     <div class="image">
                            <img alt="User Image" class="img-circle elevation-2" src="/img/user.png">
                            </img>
                        </div>
                    <div class="info">
                        <a class="d-block" href="{{ route('login') }}">
                        Login
                        </a>
                    </div>
                </div>


                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                {{--
                                <h1 class="m-0 text-dark">
                                    Pagina Principal
                                </h1>
                                --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
                <div class="content">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    SMAPAC
                </div>
                <!-- Default to the left -->
                <strong>
                    Sistema Municipal de Agua Potable y Alcantarillado de Carmen
                </strong>
            </footer>
        </div>
        <!-- ./wrapper -->
        <script src="/js/app.js"></script>
        <script src="/js/261eef97ab.js"></script>
        <script src="/js/alerts.js"></script>
        <script src="/js/script.js"></script>
        <script src="/js/excel.js"></script>
        {{-- <script src="/js/number.js"></script> --}}
        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        @yield('script')
    </body>
</html>

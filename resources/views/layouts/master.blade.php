{{--  {{  dd(auth()->user()->roles) }}  --}}
<!DOCTYPE html>
<html lang="en">
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
                <!-- Sidebar -->
                @if (auth()->check())

                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->

                        <div class="dropdown mt-2">
                            <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle" src="/img/user.png" width="15%"> {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu user-info" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" role="menuitem" tabindex="1" href="/users/{{ auth()->id() }}">Mi Cuenta</a>
                                    <a class="dropdown-item" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                                  {{ __('Logout') }} href="{{ route('logout') }}">
                                  Cerrar Sesión
                                  </a>
                            </div>
                        </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">

                    @if (auth()->user()->hasRoles(['admin']) )
                            <li class="nav-item">
                                <a class="{{ activeMenu('users') }} nav-link" href="{{ route('users.index') }}">
                                    <i class="nav-icon fas fa-user-alt">
                                    </i>
                                    <p>
                                        Usuarios
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview menu-close">
                                <a href="" class="nav-link {{ activeMenu('coordinations')}}">
                                  <i class="nav-icon fas fa-building"></i>
                                  <p>
                                    Areas
                                    <i class="right fas fa-angle-left"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="{{ activeMenu('departments') }} nav-link" href="/departments">
                                            <i class="nav-icon fas fa-hotel">
                                            </i>
                                            <p>
                                                Departamentos
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('coordinations.index') }}">
                                            <i class="nav-icon fas fa-city">
                                            </i>
                                            <p>
                                                Coordinaciones
                                            </p>
                                        </a>
                                    </li>
                                  </ul>

                            </li>

                            <li class="nav-item">
                                <a class="{{ activeMenu('providers') }} nav-link" href="/providers">
                                    <i class="nav-icon fas fa-shipping-fast">
                                    </i>
                                    <p>
                                        Proveedores
                                    </p>
                                </a>
                            </li>
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{route('requisitions.index')}}" class="nav-link {{ activeMenu('requisitions')}}">
                                        <i class="nav-icon fas fa-sticky-note"></i>
                                        <p>
                                            Requisiciones
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('requisitions.load') }} nav-link" href="{{ route('requisitions.index') }}">
                                                <i class="nav-icon fas fa-clipboard">
                                                </i>
                                                <p>
                                                    Pendientes
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('requisitions.authorized') }} nav-link" href="{{route('requisitions.authorized')}}">
                                                <i class="nav-icon fas fa-clipboard-check q">
                                                </i>
                                                <p>
                                                    Autorizadas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('quotes.index') }} nav-link" href="{{route('quotes.index')}}">
                                                <i class="nav-icon fas fa-clipboard-list">
                                                </i>
                                                <p>
                                                    Cotizadas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('purchased.index') }} nav-link" href="{{route('purchased.index')}}">
                                                <i class="nav-icon fas fa-paste">
                                                </i>
                                                <p>
                                                    Compradas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            <li class="nav-item has-treeview menu-close">
                                <a href="/mir" class="nav-link {{ activeMenu('mir')}}">
                                  <i class="nav-icon fas fa-poll"></i>
                                  <p>
                                    MIR
                                    <i class="right fas fa-angle-left"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                      <a href="/mir" class="nav-link {{ activeMenu('mir')}}">
                                        <i class="fas fa-thumbtack nav-icon"></i>
                                        <p>Componentes</p>
                                      </a>
                                    </li>
                                  </ul>
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="/activities" class="nav-link {{ activeMenu('activities')}}">
                                      <i class="fas fa-align-left nav-icon"></i>
                                      <p>Actividades</p>
                                    </a>
                                  </li>
                                </ul>
                            </li>

                         @elseif (auth()->user()->hasRoles(['coordinador']) )
                         <li class="nav-item">
                            <a class="nav-link" href="/coordinations">
                                <i class="nav-icon fas fa-city">
                                </i>
                                <p>
                                    Coordinaciones
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/departments">
                                <i class="nav-icon fas fa-building">
                                </i>
                                <p>
                                    Departamentos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/providers">
                                <i class="nav-icon fas fa-user-alt">
                                </i>
                                <p>
                                    Proveedores
                                </p>
                            </a>
                        </li>
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{route('requisitions.index')}}" class="nav-link {{ activeMenu('requisitions')}}">
                                        <i class="nav-icon fas fa-sticky-note"></i>
                                        <p>
                                            Requisiciones
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('requisitions.load') }} nav-link" href="{{ route('requisitions.index') }}">
                                                <i class="nav-icon fas fa-clipboard">
                                                </i>
                                                <p>
                                                    Pendientes
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('requisitions.authorized') }} nav-link" href="{{route('requisitions.authorized')}}">
                                                <i class="nav-icon fas fa-clipboard-check q">
                                                </i>
                                                <p>
                                                    Autorizadas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('quotes.index') }} nav-link" href="{{route('quotes.index')}}">
                                                <i class="nav-icon fas fa-clipboard-list">
                                                </i>
                                                <p>
                                                    Cotizadas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('purchased.index') }} nav-link" href="{{route('purchased.index')}}">
                                                <i class="nav-icon fas fa-paste">
                                                </i>
                                                <p>
                                                    Compradas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                            @elseif (auth()->user()->hasRoles(['titular']) )
                                <li class="nav-item has-treeview menu-close">
                                    <a href="{{route('requisitions.index')}}" class="nav-link {{ activeMenu('requisitions')}}">
                                        <i class="nav-icon fas fa-sticky-note"></i>
                                        <p>
                                            Requisiciones
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('requisitions.load') }} nav-link" href="{{ route('requisitions.index') }}">
                                                <i class="nav-icon fas fa-clipboard">
                                                </i>
                                                <p>
                                                    Pendientes
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('requisitions.authorized') }} nav-link" href="{{route('requisitions.authorized')}}">
                                                <i class="nav-icon fas fa-clipboard-check q">
                                                </i>
                                                <p>
                                                    Autorizadas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('quotes.index') }} nav-link" href="{{route('quotes.index')}}">
                                                <i class="nav-icon fas fa-clipboard-list">
                                                </i>
                                                <p>
                                                    Cotizadas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="{{ activeMenu('purchased.index') }} nav-link" href="{{route('purchased.index')}}">
                                                <i class="nav-icon fas fa-paste">
                                                </i>
                                                <p>
                                                    Compradas
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
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

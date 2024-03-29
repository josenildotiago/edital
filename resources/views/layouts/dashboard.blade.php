<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Edital') }} | Dashboard</title>

    @yield('css')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/logo-prefeitura-mossoro-colorida.png" alt="AdminLTELogo"
                height="160" width="184">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('site') }}" class="nav-link">Site</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Procurar"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="dist/img/logo-prefeitura-mossoro-colorida.png" alt="{{ config('app.name', 'Edital') }} Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name', 'Edital') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->foto }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('profile') }}" class="d-block">{{ abrevName(Auth::user()->name) }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Procurar"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Opções
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">
                                        <i class="fas fa-home nav-icon"></i>
                                        <p>Home</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('register.edital') }}" class="nav-link">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Cadastrar Edital</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('items.edital') }}" class="nav-link">
                                        <i class="fas fa-sitemap"></i>
                                        <p>Cadastrar Items</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('update.password') }}" class="nav-link">
                                        <i class="fas fa-user-cog"></i>
                                        <p>Trocar senha</p>
                                    </a>
                                </li>
                                @can('admin', Model::class)
                                <li class="nav-item">
                                    <a href="{{ route('create.user') }}" class="nav-link">
                                        <i class="fas fa-users"></i>
                                        <p>Cadastrar Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('visualiza.solicitacao') }}" class="nav-link">
                                        <i class="fas fa-binoculars"></i>
                                        <p>Visualizar solicitações</p>
                                    </a>
                                </li>
                                @endcan
                                {{-- <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('partials.alerts')
            @yield('content')

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="https://prefeiturademossoro.com.br">Prefeitura de
                    Mossoró</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Versão</b> 3.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @yield('js')
    @yield('script')
</body>

</html>
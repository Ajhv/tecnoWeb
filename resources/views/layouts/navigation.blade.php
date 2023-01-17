<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css" title="main">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</head>

<body>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            @can('ver-modulo-usuarios')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users nav-icon"></i>
                        <p>
                            Usuarios
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('usuarios.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    {{ __('Usuarios') }}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                    {{ __('Roles') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('personas.index') }}" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    {{ __('Personal') }}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan


            @can('ver-modulo-activos')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database nav-icon"></i>
                        <p>
                            Activos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('activos.index') }}" class="nav-link">
                                <i class="fas fa-chart-pie nav-icon"></i>
                                <p>Activo</p>
                            </a>
                            <a href="{{ route('ambientes.index') }}" class="nav-link">
                                <i class="fas fa-building nav-icon"></i>
                                <p>Ambiente</p>
                            </a>
                            <a href="{{ route('categorias.index') }}" class="nav-link">
                                <i class="fas fa-quote-left nav-icon"></i>
                                <p>categoria</p>
                            </a>

                            {{-- <a href="{{ route('salidas.index') }}" class="nav-link">
                                <i class="fas fa-door-open nav-icon"></i>
                                <p>Salida de Activo</p>
                            </a> --}}

                            <a href="{{ route('traspasos.index') }}" class="nav-link">
                                <i class="fas fa-coins nav-icon"></i>
                                <p>Traspaso de Activo</p>
                            </a>

                            <a href="{{ route('movimientos.index') }}" class="nav-link">
                                <i class="fas fa-coins nav-icon"></i>
                                <p>Movimiento de Activo</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('ver-modulo-mantenimientos')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-screwdriver nav-icon"></i>
                        <p>
                            Mantenimientos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">

                        <li class="nav-item">

                            <a href="{{ route('mantenimientos.index') }}" class="nav-link">
                                <i class="fas fa-briefcase nav-icon"></i>
                                <p>Mantenimiento</p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{ route('detalles.index') }}" class="nav-link">
                                <i class="fas fa-rotate nav-icon"></i>
                                <p>Estado de Mantenimiento</p>
                            </a>
                        </li>

                    </ul>
                </li>
            @endcan

            @can('ver-modulo-seguimientos')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-check nav-icon"></i>
                        <p>
                        Reportes estadisticos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <a href="{{ route('graficos_persona.index') }}" class="nav-link">
                            <i class="fas fa-infinity nav-icon"></i>
                            <p>Estadistica: personal por ambiente</p>
                        </a>
    
                        <a href="{{ route('graficos_ambiente.index') }}" class="nav-link">
                            <i class="fas fa-infinity nav-icon"></i>
                            <p>Estadistica: Tipos de Ambientes</p>
                        </a>
    
                        <a href="{{ route('graficos_activo.index') }}" class="nav-link">
                            <i class="fas fa-infinity nav-icon"></i>
                            <p>Estadistica: Estado de Activos</p>
                        </a>
    
                        <a href="{{ route('graficos_asignacion.index') }}" class="nav-link">
                            <i class="fas fa-infinity nav-icon"></i>
                            <p>Estadistica: Activos por ambiente</p>
                        </a>
    
                        <a href="{{ route('reportes.index') }}" class="nav-link">
                            <i class="fas fa-infinity nav-icon"></i>
                            <p>Reportes por Tipo de Mantenimiento</p>
                        </a>
                    </ul>
                    






                    <li class="nav-item">
                        <a href="{{ route('visitas.index') }}" class="nav-link">
                            <i class="fas fa-eye nav-icon"></i>
                            <p>Visitas</p>
                        </a>
                    </li>
                </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tema-navegacion" data-bs-toggle="collapse" href="#">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Temas</p>
                </a>
                <ul id="tema-navegacion" class="nav nav-treeview" data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="dropdown-item change-style-menu-item" href="#" rel="cosmo">
                            <i class="bi bi-circle"></i><span>Modo dia</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="slate">
                            <i class="bi bi-circle"></i><span>Modo noche</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="lux">
                            <i class="bi bi-circle"></i><span>Adultos</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="simplex">
                            <i class="bi bi-circle"></i><span>Jovenes</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="sketchy">
                            <i class="bi bi-circle"></i><span>Niño</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

<script>
    function supports_html5_storage() {
        try {
            return 'localStorage' in window && window['localStorage'] !== null;
        } catch (e) {
            return false;
        }
    }

    var supports_storage = supports_html5_storage();

    function set_theme(theme) {
        $('link[title="main"]').attr('href', theme);
        if (supports_storage) {
            localStorage.theme = theme;
        }
    }
    jQuery(function($) {
        $('body').on('click', '.change-style-menu-item', function() {
            var theme_name = $(this).attr('rel');
            var theme = "//cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/" + theme_name +
                "/bootstrap.min.css";
            set_theme(theme);
        });
    });

    if (supports_storage) {
        var theme = localStorage.theme;
        if (theme) {
            set_theme(theme);
        }
    } else {
        /* Don't annoy user with options that don't persist */
        $('#theme-dropdown').hide();
    }
</script>

</body>

</html>

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
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building nav-icon"></i>
                    <p>
                        Operaciones
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('proyectos.index') }}" class="nav-link">
                            <i class="fas fa-chart-pie nav-icon"></i>
                            <p>Proyectos</p>
                        </a>
                        <a href="{{ route('tareas.index') }}" class="nav-link">
                            <i class="fas fa-chart-line nav-icon"></i>
                            <p>Tareas</p>
                        </a>
                        <a href="{{ route('categorias.index') }}" class="nav-link">
                            <i class="fas fa-file nav-icon"></i>
                            <p>Categoria</p>
                        </a>
                        {{--<a href="{{ route('ubicaciones.index') }}" class="nav-link">
                            <i class="fas fa-map nav-icon"></i>
                            <p>Ubicacion</p>
                        </a>  --}}
                        <a href="{{ route('presupuestos.index') }}" class="nav-link">
                            <i class="fas fa-money-bill nav-icon"></i>
                            <p>Presupuesto</p>
                        </a>
                        <a href="{{ route('dependientes.index') }}" class="nav-link">
                            <i class="fas fa-brush nav-icon"></i>
                            <p>Personal</p>
                        </a>
                        <a href="{{ route('mapas.index') }}" class="nav-link">
                            <i class="fas fa-map nav-icon"></i>
                            <p>Mapas</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-check nav-icon"></i>
                    <p>
                        Seguimiento
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="/asignaciones" class="nav-link">
                            <i class="fas fa-briefcase nav-icon"></i>
                            <p>Tareas Asignadas</p>
                        </a>
                        <a href="/controles" class="nav-link">
                            <i class="fas fa-chart-line nav-icon"></i>
                            <p>Crontol de Actividades</p>
                        </a>
                        <a href="graficos" class="nav-link">
                            <i class="fas fa-chart-line nav-icon"></i>
                            <p>Seguimiento Presupuesto</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
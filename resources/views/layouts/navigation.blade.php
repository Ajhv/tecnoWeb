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
                            <a href="{{ route('fotografias.index') }}" class="nav-link">
                                <i class="fas fa-camera nav-icon"></i>
                                <p>Fotografia</p>
                            </a>
                            <a href="{{ route('mapas.index') }}" class="nav-link">
                                <i class="fas fa-map nav-icon"></i>
                                <p>Ubicacion</p>
                            </a>
    
                            <a href="{{ route('ingresos.index') }}" class="nav-link">
                                <i class="fas fa-door-open nav-icon"></i>
                                <p>Tipo de Ingreso</p>
                            </a>
                            <a href="{{ route('salidas.index') }}" class="nav-link">
                                <i class="fas fa-door-open nav-icon"></i>
                                <p>Salida de Activo</p>
                            </a>
                            <a href="{{ route('estados.index') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Estado del Activo</p>
                            </a>
                            <a href="{{ route('traspasos.index') }}" class="nav-link">
                                <i class="fas fa-coins nav-icon"></i>
                                <p>Traspaso de Activo</p>
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
                            @can('ver-submodulo-mantenimientos')
                            <a href="{{ route('mantenimientos.index') }}" class="nav-link">
                                <i class="fas fa-briefcase nav-icon"></i>
                                <p>Mantenimiento</p>
                            </a>
                            @endcan
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
                        Seguimiento
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-briefcase nav-icon"></i>
                                <p>Reportes estadisticos</p>
                            </a>
    
                        </li>
                    </ul>
                </li>
            @endcan
            

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
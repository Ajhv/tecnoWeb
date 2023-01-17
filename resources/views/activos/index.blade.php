<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Canal 11 TVU') }}</title>

    <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/brands.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/regular.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/solid.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/fontawesome.css') }}"><!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}"><!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}"><!-- Loaders.css-->
   <link rel="stylesheet" href="{{ asset('vendor/loaders.css/loaders.css') }}"><!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- Datatables-->
   <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css') }}"><!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss"><!-- =============== APP STYLES ===============-->
   <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!--Search-->
        <form method="GET" action="{{route('search.index')}}" class="d-inline-block">
            @csrf
            <div class="navbar-search">
                <input name="texto" class="search_input" type="text" placeholder="Buscar...">
                <button type="submit" class="search_icon"><i class="fas fa-bars"></i></button>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                    <a href="{{ route('profile.show') }}" class="dropdown-item">
                        <i class="mr-2 fas fa-file"></i>
                        {{ __('My profile') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="mr-2 fas fa-sign-out-alt"></i>
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/home" class="brand-link">
            <img src="{{ asset('images/canal11.png') }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Canal 11 TVU</span>
        </a>
        @include('layouts.navigation')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Activos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Activos</li>
                    </ol>
                </div>
                </div>
            </div>
        </section>

        <div class="card">
            <div class="card-header">
               <div class="card-title">Exportar</div>
               <div class="text-sm"></div>
            </div>
            <div class="card-body">
                @can('crear-activo')
                    <a class="btn btn-warning" href="{{ route('activos.create') }}">Nuevo</a>
                @endcan
                <br>
                &nbsp
               <table class="table table-striped my-4 w-100" id="datatable2">
                  <thead    >
                     <tr>
                        <th>ID</th>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>CATEGORIA</th>
                        <th>DESCRIPCION</th>
                        <th>AMBIENTE</th>
                        <th>ESTADO</th>
                        <th>FOTO</th>
                        <th>ACCIONES</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach ($activos as $activo)
                    <tr>
                        <td class="gradeX">{{ $activo->id }}</td>
                        <td class="gradeX">{{ $activo->codigo }}</td>
                        <td class="gradeX">{{ $activo->nombre }}</td>
                        <td class="gradeX">{{ $activo->categoria }}</td>
                        <td class="gradeX">{{ $activo->descripcion }}</td>
                        <td class="gradeX">{{ $activo->ambiente }}</td>
                        <td class="gradeX">{{ $activo->estado }}</td>
                        <td class="gradeX">{{ $activo->foto }}</td>
                        <td>
                            <form action="{{ route('activos.destroy',$activo->id) }}" method="POST">
                                @can('editar-activo')
                                <a class="btn btn-info" href="{{ route('activos.edit',$activo->id) }}">Editar</a>
                                @endcan

                                @csrf
                                @method('DELETE')
                                @can('borrar-activo')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                                @endcan
                            </form>

                        </td>

                    </tr>
                    @endforeach
                  </tbody>
               </table>
               <div class="pagination justify-content-end">
                {!! $activos1->links() !!}
            </div>
            </div>
         </div>


    </div>
    <!-- /.content-wrapper -->
    @section('contentFooter')
        <?php
        $visit = 1;
        $fileName = "counters/activos_i.txt";
        if (file_exists($fileName)) {
            $fp = fopen($fileName, "r");
            $visit = fread($fp, 4);
            $visit++;
            fclose($fp);
        }
        $fp = fopen($fileName, "w");
        fwrite($fp, $visit);
        fclose($fp);
        ?>
        <div class="row align-items-center">
            <div class="col-12">
                Contador de Visitas Activos Show: {{$visit}}
            </div>
        </div>
    @endsection

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        @include('layouts.footer')
    </footer>

</div>
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>
<!-- STORAGE API-->
<script src="{{ asset('vendor/js-storage/js.storage.js') }}"></script><!-- SCREENFULL-->
<script src="{{ asset('vendor/screenfull/dist/screenfull.js') }}"></script><!-- i18next-->
<script src="{{ asset('vendor/i18next/i18next.js') }}"></script>
<script src="{{ asset('vendor/i18next-xhr-backend/i18nextXHRBackend.js') }}"></script>
<script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('vendor/popper.js/dist/umd/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script><!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- Datatables-->
<script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.colVis.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.flash.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.html5.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.print.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-keytable/js/dataTables.keyTable.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('vendor/jszip/dist/jszip.js') }}"></script>
<script src="{{ asset('vendor/pdfmake/build/pdfmake.js') }}"></script>
<script src="{{ asset('vendor/pdfmake/build/vfs_fonts.js') }}"></script><!-- =============== APP SCRIPTS ===============-->
<script src="{{ asset('js/app.js') }}"></script>


    <script>
    $(function () {
      $("#datatable2").DataTable({
        "responsive": true, "lengthChange": null, "autoWidth": false,
        "bPaginate": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"  ]
      }).buttons().container().appendTo('#datatable2_wrapper .col-md-6:eq(0)');
    });
  </script>

</body>
</html>


@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="section-header">
            <h3 class="page__heading">Estadisticas de Visitas </h3>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead style="background-color: #0f0966">
                                <th style="color: #ffffff">Pagina</th>
                                <th style="color: #ffffff">Cantidad de visitas</th>
                                </thead>

                                <tbody>
                                {{--USUARIOS--}}
                                <tr>
                                    <td>Usuarios Show:</td>
                                    <td>
                                        <?php
                                        $visitUserShow = 1;
                                        $fileName = "counters/usuarios_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitUserShow = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitUserShow}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Usuarios Editar:</td>
                                    <td>
                                        <?php
                                        $visitUserEditar = 1;
                                        $fileName = "counters/usuarios_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitUserEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitUserEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Usuarios Crear:</td>
                                    <td>
                                        <?php
                                        $visitUserCrear = 1;
                                        $fileName = "counters/usuarios_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitUserCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitUserCrear}}
                                    </td>
                                </tr>

                                {{--ACTIVOS--}}
                                <tr>
                                    <td>Activos Show:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/activos_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Activos Editar:</td>
                                    <td>
                                        <?php
                                        $visitEditar = 1;
                                        $fileName = "counters/activos_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Activos Crear:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/activos_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>

                                {{--AMBIENTES--}}
                                <tr>
                                    <td>Ambientes Show:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/ambientes_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ambientes Editar:</td>
                                    <td>
                                        <?php
                                        $visitEditar = 1;
                                        $fileName = "counters/ambientes_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ambientes Crear:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/ambientes_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>


                                {{--Detalles de mantenimiento--}}
                                <tr>
                                    <td>Detalles Show:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/detalles_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Detalles Editar:</td>
                                    <td>
                                        <?php
                                        $visitEditar = 1;
                                        $fileName = "counters/detalles_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Detalles Crear:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/detalles_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>

                                {{--TRASPASOS--}}
                                <tr>
                                    <td>Traspasos Show:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/traspasos_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Traspasos Editar:</td>
                                    <td>
                                        <?php
                                        $visitEditar = 1;
                                        $fileName = "counters/traspasos_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Traspasos Crear:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/traspasos_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>

                                {{--MANTENIMIENTOS--}}
                                <tr>
                                    <td>Mantenimientos Show:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/mantenimientos_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mantenimientos Editar:</td>
                                    <td>
                                        <?php
                                        $visitEditar = 1;
                                        $fileName = "counters/mantenimientos_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mantenimientos Crear:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/mantenimientos_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>

                                {{--MOVIMIENTOS ACTIVOS--}}
                                <tr>
                                    <td>Movimientos Show:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/movimientos_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Movimientos Editar:</td>
                                    <td>
                                        <?php
                                        $visitEditar = 1;
                                        $fileName = "counters/movimientos_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Movimientos Crear:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/movimientos_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>


                                {{--PERSONAS--}}
                                <tr>
                                    <td>Personas Show:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/personas_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Personas Editar:</td>
                                    <td>
                                        <?php
                                        $visitEditar = 1;
                                        $fileName = "counters/personas_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Personas Crear:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/personas_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>

                                {{--REPORTES--}}
                                <tr>
                                    <td>Reportes Show:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/reportes_i.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Reportes Editar:</td>
                                    <td>
                                        <?php
                                        $visitEditar = 1;
                                        $fileName = "counters/reportes_e.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitEditar = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitEditar}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Reportes Crear:</td>
                                    <td>
                                        <?php
                                        $visitCrear = 1;
                                        $fileName = "counters/reportes_c.txt";
                                        if (file_exists($fileName)) {
                                            $fp = fopen($fileName, "r");
                                            $visitCrear = fread($fp, 4);;
                                            fclose($fp);
                                        }
                                        ?>{{$visitCrear}}
                                    </td>
                                </tr>



                                </tbody>
                            </table>
                            <div class="pagination justify-content-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

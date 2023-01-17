<!DOCTYPE html>
<html>
    <head>
        @include('layouts.busqueda')

    </head>
    <body class="bg-light">

        <div class="container vh-100">
            <div class="row h-100">
                <div class="col-12">


                    <!--Contenido-->
                    <div class="card">
                        <div class="card-header">{{ __('Resultado') }}</div>
                        <div class="card-body" style="overflow-y:auto; height:80vh;">
                            <div class="list-group list-group-flush">
                                @if (count($activos) > 0)
                                    <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                                        <div class="d-flex w-100">
                                        <h5 class="mb-1 text-primary">Activos</h5>
                                        </div>
                                    </a>
                                    @foreach ($activos as $act)
                                        <a href="{{route('activos.index', $act->id)}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <h5 class="mb-1" style="white-space: nowrap;">{{$act->nombre}}</h5>
                                                </div>
                                            </div>
                                            <p class="mb-1">{{$act->codigo}}</p>
                                        </a>
                                    @endforeach
                                @endif
                                @if (count($ambientes) > 0)
                                    <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                                        <div class="d-flex w-100">
                                        <h5 class="mb-1 text-primary">Ambientes</h5>
                                        </div>
                                    </a>
                                    @foreach ($ambientes as $amb)
                                        <a href="{{route('ambientes.index', $amb->id)}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <h5 style="white-space: nowrap;">{{$amb->nombre}}</h5>
                                                </div>
                                                <small class="text-muted">{{$amb->tipo}}</small>
                                            </div>
                                            <p class="mb-1 ">{{$amb->descripcion}}</p>
                                        </a>
                                    @endforeach
                                @endif
                                @if (count($users) > 0)
                                    <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                                        <div class="d-flex w-100">
                                        <h5 class="mb-1 text-primary">Usuarios</h5>
                                        </div>
                                    </a>
                                    @foreach ($users as $usu)
                                        <a href="{{route('users.index', $usu->id)}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <h5 style="white-space: nowrap;">{{$usu->name}}</h5>
                                                </div>
                                                <small class="text-muted">{{$usu->email}}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                                @if (count($movimientos) > 0)
                                    <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                                        <div class="d-flex w-100">
                                        <h5 class="mb-1 text-primary">Movimientos</h5>
                                        </div>
                                    </a>
                                    @foreach ($movimientos as $mov)
                                        <a href="{{route('movimientos.index', $ofi->id)}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <h5 style="white-space: nowrap;">{{$mov->tipo}}</h5>
                                                </div>
                                                <small class="text-muted">{{$mov->descripcion}}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                                @if (count($mantenimientos) > 0)
                                    <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                                        <div class="d-flex w-100">
                                        <h5 class="mb-1 text-primary">Mantenimientos</h5>
                                        </div>
                                    </a>
                                    @foreach ($mantenimientos as $man)
                                        <a href="{{route('mantenimientos.index', $man->id)}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <h5 style="white-space: nowrap;">{{$man->tipo}}</h5>
                                                </div>
                                                <small class="text-muted">{{$man->descripcion}}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                                @if (count($detalles) > 0)
                                    <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                                        <div class="d-flex w-100">
                                        <h5 class="mb-1 text-primary">Detalles</h5>
                                        </div>
                                    </a>
                                    @foreach ($detalles as $det)
                                        <a href="{{route('detalles.index', $det->id)}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <h5 style="white-space: nowrap;">{{$det->estado}}</h5>
                                                </div>
                                                <small class="text-muted">{{$det->descripcion}}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                                @if (count($personas) > 0)
                                    <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                                        <div class="d-flex w-100">
                                        <h5 class="mb-1 text-primary">Personas</h5>
                                        </div>
                                    </a>
                                    @foreach ($personas as $per)
                                        <a href="{{route('personas.index', $per->id)}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <h5 style="white-space: nowrap;">{{$per->nombre}}</h5>
                                                </div>
                                                <small class="text-muted">{{$per->ci}}</small>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                                @if (count($traspasos) > 0)
                                    <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                                        <div class="d-flex w-100">
                                        <h5 class="mb-1 text-primary">Traspasos</h5>
                                        </div>
                                    </a>
                                    @foreach ($traspasos as $tra)
                                        <a href="{{route('traspasos.index', $tra->id)}}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <h5 style="white-space: nowrap;">{{$tra->fecha_asignacion}}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif


                            </div>
                        </div>
                    </div>
                    <!--Fin contenido-->

                </div>
            </div>
        </div>


    </body>
</html>

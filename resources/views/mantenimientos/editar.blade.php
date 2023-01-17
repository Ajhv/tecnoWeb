@extends('layouts.app')

@section('content')
<section class="section">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Editar Mantenimiento') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif


                <form action="{{ route('mantenimientos.update',$mantenimiento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('nombre', 'Tipo') !!}
                                {!! Form::select('tipo', $tipo, null, ['class'=>'form-control'], ['value'=>"{{ $mantenimiento->tipo }}"]) !!}
                            </div>
                            @error('tipo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="fecha_solicitud">FECHA DE SOLICITUD</label>
                               <input type="date" name="fecha_solicitud" class="form-control" value="{{ $mantenimiento->fecha_solicitud }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-floating">
                                <label for="descripcion">DESCRIPCION</label>
                                <textarea class="form-control" name="descripcion" style="height: 100px">{{ $mantenimiento->descripcion }}</textarea>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="id_activo">ACTIVO</label>
                                <select name="id_activo" class="form-control">
                                    <option selected="">Selecciona un activo</option>
                                    @foreach ($activos as $activo)
                                        <option value=" {{ $activo->id }} "> {{ $activo->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="id_responsable">RESPONSABLE</label>
                                <select name="id_responsable" class="form-control">
                                    <option selected="">Selecciona responsable</option>
                                    @foreach ($personas as $persona)
                                        <option value=" {{ $persona->id }} "> {{ $persona->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('contentFooter')
    <?php
    $visit = 1;
    $fileName = "counters/mantenimientos_e.txt";
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
            Contador de Visitas Mantenimientos Editar: {{$visit}}
        </div>
    </div>
@endsection

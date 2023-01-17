@extends('layouts.app')

@section('content')
<section class="section">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Editar Movimiento') }}</h1>
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


                <form action="{{ route('movimientos.update',$movimiento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('nombre', 'Tipo') !!}
                                {!! Form::select('tipo', $tipo, null, ['class'=>'form-control'], ['value'=>"{{ $movimiento->tipo }}"]) !!}
                            </div>
                            @error('tipo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
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
                               <label for="fecha_movimiento">FECHA DE MOVIMIENTO</label>
                               <input type="date" name="fecha_movimiento" class="form-control" value="{{ $movimiento->fecha_movimiento }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="id_ambienteo">AMBIENTE ORIGEN</label>
                                <select name="id_ambienteo" class="form-control">
                                    <option selected="">Selecciona un ambiente</option>
                                    @foreach ($ambientes as $ambiente)
                                        <option value=" {{ $ambiente->id }} "> {{ $ambiente->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="id_ambiented">AMBIENTE DESTINO</label>
                                <select name="id_ambiented" class="form-control">
                                    <option selected="">Selecciona un ambiente</option>
                                    @foreach ($ambientes as $ambiente)
                                        <option value=" {{ $ambiente->id }} "> {{ $ambiente->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="id_persona">RESPONSABLE</label>
                                <select name="id_persona" class="form-control">
                                    <option selected="">Selecciona resposable</option>
                                    @foreach ($personas as $persona)
                                        <option value=" {{ $persona->id }} "> {{ $persona->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="descripcion">DESCRIPCION</label>
                               <input type="text" name="descripcion" class="form-control" value="{{ $movimiento->descripcion }}">
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
    $fileName = "counters/movimientos_e.txt";
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
            Contador de Visitas Movimientos Editar: {{$visit}}
        </div>
    </div>
@endsection

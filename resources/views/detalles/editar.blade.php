@extends('layouts.app')

@section('content')
<section class="section">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Editar Detalle de Mantenimiento') }}</h1>
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


                <form action="{{ route('detalles.update',$detalle->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="id_mantenimiento">MANTENIMIENTO</label>
                                <select name="id_mantenimiento" class="form-control">
                                    <option selected="">Selecciona un matenimiento</option>
                                    @foreach ($mantenimientos as $mantenimiento)
                                        <option value=" {{ $mantenimiento->id }} "> {{ $mantenimiento->descripcion }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('nombre', 'Estado') !!}
                                {!! Form::select('estado', $estado, null, ['class'=>'form-control'], ['value'=>"{{ $detalle->estado }}"]) !!}
                            </div>
                            @error('tipo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-floating">
                                <div class="form-group">
                                    <label for="descripcion">descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" value="{{ $detalle->descripcion }}">
                                 </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="fecha">fecha</label>
                                <input type="date" name="fecha" class="form-control" value="{{ $detalle->fecha }}">
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
    $fileName = "counters/detalles_e.txt";
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
            Contador de Visitas Detalles Editar: {{$visit}}
        </div>
    </div>
@endsection

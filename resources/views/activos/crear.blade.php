@extends('layouts.app')

@section('content')
<section class="section">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Crear Activo') }}</h1>
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

                <form action="{{ route('activos.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="codigo">Codigo</label>
                               <input type="text" name="codigo" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="nombre">Nombre</label>
                               <input type="text" name="nombre" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="id_categoria">Categoria</label>
                                <select name="id_categoria" class="form-control">
                                    <option selected="">Seleccione una Categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value=" {{ $categoria->id }} "> {{ $categoria->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="descripcion">Descripcion </label>
                               <input type="text" name="descripcion" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="id_ambiente">Ambiente</label>
                                <select name="id_ambiente" class="form-control">
                                    <option selected="">Seleccione un Ambiente</option>
                                    @foreach ($ambientes as $ambiente)
                                        <option value=" {{ $ambiente->id }} "> {{ $ambiente->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('nombre', 'Nombre') !!}
                                {!! Form::select('estado', $estado, null, ['class'=>'form-control']) !!}
                            </div>
                            @error('tipo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="foto">Fotografia </label>
                               <input type="text" name="foto" class="form-control">
                            </div>
                        </div>

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
    $fileName = "counters/activos_c.txt";
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
            Contador de Visitas Activos Crear: {{$visit}}
        </div>
    </div>
@endsection

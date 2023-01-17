@extends('layouts.app')

@section('content')
<section class="section">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Crear Ambiente') }}</h1>
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

                <form action="{{ route('ambientes.store') }}" method="POST">
                    @csrf
                     <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="nombre">Nombre</label>
                               <input type="text" name="nombre" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('nombre', 'Nombre') !!}
                                {!! Form::select('tipo', $tipo, null, ['class'=>'form-control']) !!}
                            </div>
                            @error('tipo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="descripcion">Descripcion</label>
                               <input type="text" name="descripcion" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="dimension">Dimension /mt2</label>
                                <input type="text" name="dimension" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="ubicacion">ubicacion</label>
                                <input type="text" name="ubicacion" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="foto">Fotografia</label>
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
    $fileName = "counters/ambientes_c.txt";
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
            Contador de Visitas Ambientes Crear: {{$visit}}
        </div>
    </div>
@endsection


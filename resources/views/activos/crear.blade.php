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
                               <label for="fecha_ingreso">Fecha_ingreso</label>
                               <input type="date" name="fecha_ingreso" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="vida_util">Vida_util</label>
                               <input type="text" name="vida_util" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="valor">Valor</label>
                               <input type="text" name="valor" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="periodo_mantenimiento">Periodo_mantenimiento</label>
                               <input type="number" name="periodo_mantenimiento" class="form-control">
                            </div>
                        </div>
                       
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="ultimo_mantenimiento">Ultimo_mantenimiento</label>
                               <input type="date" name="ultimo_mantenimiento" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="id_categoria">id_categoria</label>
                               <input type="number" name="id_categoria" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="id_ingreso">id_ingreso</label>
                               <input type="number" name="id_ingreso" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               <label for="id_estado">id_estado</label>
                               <input type="number" name="id_estado" class="form-control">
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
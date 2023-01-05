@extends('layouts.app')

@section('content')
<section class="section">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Activos') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-activo')
                    <a class="btn btn-warning" href="{{ route('activos.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Codigo</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Fecha_ingreso</th>
                                <th style="color:#fff;">Vida_util</th>
                                <th style="color:#fff;">Valor</th>
                                <th style="color:#fff;">Periodo_mantenimiento</th>   
                                <th style="color:#fff">Ultimo_mantenimiento</th>   
                                <th style="color:#fff;">id_categoria</th>
                                <th style="color:#fff;">id_ingreso</th>   
                                <th style="color:#fff">id_estado</th> 
                                <th style="color:#fff">Acciones</th>                                                              
                          </thead>
                          <tbody>
                        @foreach ($activos as $activo)
                        <tr>
                            <td style="display: none;">{{ $activo->id }}</td>                                
                            <td>{{ $activo->codigo }}</td>
                            <td>{{ $activo->nombre }}</td>
                            <td>{{ $activo->fecha_ingreso }}</td>
                            <td>{{ $activo->vida_util }}</td>
                            <td>{{ $activo->valor }}</td>
                            <td>{{ $activo->periodo_mantenimiento }}</td>
                            <td>{{ $activo->ultimo_mantenimiento }}</td>
                            <td>{{ $activo->id_categoria }}</td>
                            <td>{{ $activo->id_ingreso }}</td>
                            <td>{{ $activo->id_estado }}</td>
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

                    <!-- Ubicamos la paginacion a la derecha -->
                    <div class="pagination justify-content-end">
                        {!! $activos->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
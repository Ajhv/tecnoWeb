@extends('layouts.app')

@section('content')
<section class="section">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Proyectos') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-proy')
                    <a class="btn btn-warning" href="{{ route('proyectos.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Descripcion</th>
                                <th style="color:#fff;">Inicio</th>
                                <th style="color:#fff;">Fin</th>
                                <th style="color:#fff;">Presupuesto</th>                                 
                                <th style="color:#fff">Acciones</th>                                                                   
                          </thead>
                          <tbody>
                        @foreach ($proyectos as $proyecto)
                        <tr>
                            <td style="display: none;">{{ $proyecto->id }}</td>                                
                            <td>{{ $proyecto->nombre }}</td>
                            <td>{{ $proyecto->descripcion }}</td>
                            <td>{{ $proyecto->inicio }}</td>
                            <td>{{ $proyecto->fin }}</td>
                            <td>{{ $proyecto->Presupuesto }}</td>
                            <td>
                                <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST">                                        
                                    @can('editar-proy')
                                    <a class="btn btn-info" href="{{ route('proyectos.edit',$proyecto->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-proy')
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
                        {!! $proyectos->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
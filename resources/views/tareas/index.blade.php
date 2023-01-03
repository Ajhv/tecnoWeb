@extends('layouts.app')

@section('content')
<section class="section">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tareas') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-act')
                    <a class="btn btn-warning" href="{{ route('tareas.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Inicio</th>
                                <th style="color:#fff;">Fin</th>
                                <th style="color:#fff;">Responsable</th>
                                <th style="color:#fff;">Descripcion</th>                                 
                                <th style="color:#fff">Acciones</th>                                                                   
                          </thead>
                          <tbody>
                        @foreach ($tareas as $tarea)
                        <tr>
                            <td style="display: none;">{{ $tarea->id }}</td>                                
                            <td>{{ $tarea->nombre }}</td>
                            <td>{{ $tarea->inicio }}</td>
                            <td>{{ $tarea->fin }}</td>
                            <td>{{ $tarea->responsable }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>
                                <form action="{{ route('tareas.destroy',$tarea->id) }}" method="POST">                                        
                                    @can('editar-act')
                                        <a class="btn btn-info" href="{{ route('tareas.edit', $tarea->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-act')
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
                        {!! $tareas->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
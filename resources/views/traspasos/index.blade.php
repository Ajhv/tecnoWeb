@extends('layouts.app')

@section('content')
<section class="section">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Traspasos de Activos') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-traspaso_activo')
                    <a class="btn btn-warning" href="{{ route('traspasos.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Descripcion</th>
                                <th style="color:#fff;">fecha_traslado</th>                                
                                <th style="color:#fff">Acciones</th>                                                                   
                          </thead>
                          <tbody>
                        @foreach ($traspasos as $traspaso)
                        <tr>
                            <td style="display: none;">{{ $traspaso->id }}</td>                                
                            <td>{{ $traspaso->descripcion }}</td>
                            <td>{{ $traspaso->fecha_traslado }}</td>
                            <td>
                                <form action="{{ route('traspasos.destroy',$traspaso->id) }}" method="POST">                                        
                                    @can('editar-traspaso_activo')
                                    <a class="btn btn-info" href="{{ route('traspasos.edit',$traspaso->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-traspaso_activo')
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
                        {!! $traspasos->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
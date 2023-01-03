@extends('layouts.app')

@section('content')
<section class="section">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Mapas') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-ubi')
                    <a class="btn btn-warning" href="{{ route('mapas.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Ciudad</th>
                                <th style="color:#fff;">Departamento</th>  
                                <th style="color:#fff;">Coordenadas</th>
                                <th style="color:#fff;">Descripcion</th>                                
                                <th style="color:#fff">Acciones</th>                                                                   
                          </thead>
                          <tbody>
                        @foreach ($mapas as $mapa)
                        <tr>
                            <td style="display: none;">{{ $mapa->id }}</td>                                
                            <td>{{ $mapa->ciudad }}</td>
                            <td>{{ $mapa->departamento }}</td>
                            <td>{{ $mapa->coordenadas }}</td>
                            <td>{{ $mapa->descripcion }}</td>
                            <td>
                                <form action="{{ route('mapas.destroy',$mapa->id) }}" method="POST">                                        
                                    @can('editar-ubi')
                                    <a class="btn btn-info" href="{{ route('mapas.edit',$mapa->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-ubi')
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
                        {!! $mapas->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
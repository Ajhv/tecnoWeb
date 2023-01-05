@extends('layouts.app')

@section('content')
<section class="section">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Detalles de Mantenimiento') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-estado_mantenimiento')
                    <a class="btn btn-warning" href="{{ route('detalles.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">estado</th>
                                <th style="color:#fff;">descripcion</th>
                                <th style="color:#fff;">responsable</th>
                                <th style="color:#fff;">fecha</th> 
                                <th style="color:#fff">Acciones</th>                                                              
                          </thead>
                          <tbody>
                        @foreach ($detalles as $detalle)
                        <tr>
                            <td style="display: none;">{{ $detalle->id }}</td>                                
                            <td>{{ $detalle->estado }}</td>
                            <td>{{ $detalle->descripcion }}</td>
                            <td>{{ $detalle->responsable }}</td>
                            <td>{{ $detalle->fecha }}</td>
                            <td>
                                <form action="{{ route('detalles.destroy',$detalle->id) }}" method="POST">                                        
                                    @can('editar-estado_mantenimiento')
                                    <a class="btn btn-info" href="{{ route('detalles.edit',$detalle->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-estado_mantenimiento')
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
                        {!! $detalles->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
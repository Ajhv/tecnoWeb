@extends('layouts.app')

@section('content')
<section class="section">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Estados de los Activos') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-estado_activo')
                    <a class="btn btn-warning" href="{{ route('estados.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>   
                                <th style="color:#fff">Acciones</th>                                                              
                          </thead>
                          <tbody>
                        @foreach ($estados as $estado)
                        <tr>
                            <td style="display: none;">{{ $estado->id }}</td>                                
                            <td>{{ $estado->nombre }}</td>
                            <td>
                                <form action="{{ route('estados.destroy',$estado->id) }}" method="POST">                                        
                                    @can('editar-estado_activo')
                                    <a class="btn btn-info" href="{{ route('estados.edit',$estado->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-estado_activo')
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
                        {!! $estados->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
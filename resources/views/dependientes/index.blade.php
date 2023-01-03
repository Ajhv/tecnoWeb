@extends('layouts.app')

@section('content')
<section class="section">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Personal') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-pers')
                    <a class="btn btn-warning" href="{{ route('dependientes.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="color:#fff;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Cargo</th>
                                <th style="color:#fff;">Acciones</th>                                
                          </thead>
                          <tbody>
                        @foreach ($dependientes as $dependiente)
                        <tr>
                            <td style="display: none;">{{ $dependiente->id }}</td>  
                            <td>{{ $dependiente->id }}</td>                              
                            <td>{{ $dependiente->nombre }}</td>
                            <td>{{ $dependiente->cargo }}</td>
                            <td>
                                <form action="{{ route('dependientes.destroy',$dependiente->id) }}" method="POST">                                        
                                    @can('editar-pers')
                                    <a class="btn btn-info" href="{{ route('dependientes.edit',$dependiente->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-pers')
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
                        {!! $dependientes->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
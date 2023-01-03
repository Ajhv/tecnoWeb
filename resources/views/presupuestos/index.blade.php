@extends('layouts.app')

@section('content')
<section class="section">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Presupuestos') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-presu')
                    <a class="btn btn-warning" href="{{ route('presupuestos.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="color:#fff;">ID</th>
                                <th style="color:#fff;">Elaboracion</th>
                                <th style="color:#fff;">Responsable</th>
                                <th style="color:#fff;">Monto</th>                                    
                                <th style="color:#fff">Acciones</th>                                                                   
                          </thead>
                          <tbody>
                        @foreach ($presupuestos as $presupuesto)
                        <tr>
                            <td style="display: none;">{{ $presupuesto->id }}</td>    
                            <td>{{ $presupuesto->id }}</td>                            
                            <td>{{ $presupuesto->elaboracion }}</td>
                            <td>{{ $presupuesto->id_dependiente }}</td>
                            <td>{{ $presupuesto->monto }}</td>
                            <td>
                                <form action="{{ route('presupuestos.destroy',$presupuesto->id) }}" method="POST">                                        
                                    @can('editar-presu')
                                    <a class="btn btn-info" href="{{ route('presupuestos.edit',$presupuesto->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-presu')
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
                        {!! $presupuestos->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
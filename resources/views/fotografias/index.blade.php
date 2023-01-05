@extends('layouts.app')

@section('content')
<section class="section">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Fotografias') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
            
        
                    @can('crear-fotografia')
                    <a class="btn btn-warning" href="{{ route('fotografias.create') }}">Nuevo</a>
                    @endcan
        
                    <table class="table table-striped mt-2">
                            <thead style="background-color:#148ea1">                                     
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">url</th>
                                <th style="color:#fff;">fecha</th>                                
                                <th style="color:#fff">Acciones</th>                                                                   
                          </thead>
                          <tbody>
                        @foreach ($fotografias as $fotografia)
                        <tr>
                            <td style="display: none;">{{ $fotografia->id }}</td>                                
                            <td>{{ $fotografia->url }}</td>
                            <td>{{ $fotografia->fecha }}</td>
                            <td>
                                <form action="{{ route('fotografias.destroy',$fotografia->id) }}" method="POST">                                        
                                    @can('editar-fotografia')
                                    <a class="btn btn-info" href="{{ route('fotografias.edit',$fotografia->id) }}">Editar</a>
                                    @endcan

                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-fotografia')
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
                        {!! $fotografias->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
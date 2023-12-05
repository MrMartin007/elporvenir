@extends('adminlte::page')
@section('title', 'Dashboard')
@section('template_title')
    Marca
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
    <span id="card_title" style=" display: flex; font-size: 24px; font-weight: bold; margin: auto; justify-content: space-between; align-items: center;">
        {{ __('Marcas Registrados') }}
    </span>
                        </div>

                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre Marca</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($marcas as $marca)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $marca->nombre_marca }}</td>

                                            <td>
                                                <form action="{{ route('marcas.destroy',$marca->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('marcas.edit',$marca->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $marcas->links() !!}
            </div>
        </div>
    </div>
@endsection

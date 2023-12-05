@extends('adminlte::page')
@section('title', 'Dashboard')
@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
    <span id="card_title" style=" display: flex; font-size: 24px; font-weight: bold; margin: auto; justify-content: space-between; align-items: center;">
        {{ __('Productos Registrados') }}
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

										<th>Codigo Producto</th>
                                        <th>Marca</th>
										<th>Detalle Producto</th>
										<th>Foto Producto</th>
										<th>Precio Costo</th>
										<th>Precio Venta</th>
										<th>Precio Docena</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $producto->codigo_producto }}</td>
                                            <td>{{ $producto->marca->nombre_marca }}</td>
											<td>{{ $producto->detalle_producto }}</td>
                                            <td><img src="{{ asset('storage/' . $producto->foto_producto) }}" alt="Foto" width="75"></td>
											<td>{{ $producto->precio_costo }}</td>
											<td>{{ $producto->precio_venta }}</td>
											<td>{{ $producto->precio_docena }}</td>


                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection

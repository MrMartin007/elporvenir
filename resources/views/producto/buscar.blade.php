@extends('adminlte::page')
@section('title', 'Dashboard')

@section('template_title')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                        <h3>Buscar Producto</h3>
                            <div class="card-body">
                            <form method="GET" action="{{ route('resultados') }}" class="text-center">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Buscar por Nombre o Código de Barra">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i> Buscar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if(isset($productos))
                        <div class="container mt-4">
                            @if($productos->count() > 0)
                                <h4>Cliente:</h4>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Codigo del Producto</th>
                                        <th>Marca</th>
                                        <th>Descripcion</th>
                                        <th>Foto</th>
                                        <th>Precio Costo</th>
                                        <th>Precio Venta</th>
                                        <th>Precio por Docena</th>
                                        <!-- Agrega más columnas según tus necesidades -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productos as $producto)
                                        <tr>

                                            <td>{{ $producto->codigo_producto }}</td>
                                            <td>{{ $producto->marca->nombre_marca }}</td>
                                            <td>{{ $producto->detalle_producto }}</td>
                                            <td><img src="{{ asset('storage/' . $producto->foto_producto) }}" alt="Foto" width="75"></td>
                                            <td>{{ $producto->precio_costo }}</td>
                                            <td>{{ $producto->precio_venta }}</td>
                                            <td>{{ $producto->precio_docena }}</td>
                                            <!-- Agrega más columnas según tus necesidades -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No se encontraron resultados para la búsqueda.</p>
                            @endif
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection

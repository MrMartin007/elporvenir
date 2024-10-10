@extends('adminlte::page')
@section('title', 'EL Porvenir')

@section('template_title')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-body">
                                <form method="GET" action="{{ route('resultados') }}" class="text-center">
                                    <div class="input-group input-group-sm"> <!-- Cambiado a input-group-sm -->
                                        <input type="text" class="form-control" id="search" name="search" placeholder="Buscar por Nombre o Código de Barra">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" type="submit"> <!-- Cambiado a btn-sm -->
                                                <i class="fas fa-search"></i> Buscar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if(isset($productos))
                        <div class="container">
                            @if($productos->count() > 0)
                                <div class="card-body">
                                    @foreach($productos as $producto)
                                        <div class="row">
                                            <div class="col-md-2 offset-md-5">
                                                <img src="{{ asset('storage/' . $producto->foto_producto) }}" alt="Foto" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead class="thead">
                                                <tr>
                                                    <th>Codigo del Producto</th>
                                                    <th>Marca</th>
                                                    <th>Descripcion</th>
                                                    <th>Precio Venta</th>
                                                    <th>Precio por Docena</th>
                                                    <th>Precio Costo</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{ $producto->codigo_producto }}</td>
                                                    <td>{{ $producto->marca->nombre_marca }}</td>
                                                    <td>{{ $producto->detalle_producto }}</td>
                                                    <td style="color: green;">
                                                        <strong>Q. {{ $producto->precio_venta }}</strong>
                                                    </td>
                                                    <td style="color: darkblue;">
                                                        <strong>Q. {{ $producto->precio_docena }}</strong>
                                                    </td>
                                                    <td style="color: darkred;">
                                                        <strong>Q. {{ $producto->precio_costo }}</strong>
                                                    </td>
                                                    <td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No se encontraron resultados para la búsqueda.</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Enfocar automáticamente el campo de búsqueda cuando la página se carga
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('search').focus();
        });
    </script>
@endsection


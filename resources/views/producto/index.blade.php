@extends('adminlte::page')
@section('title', 'El Porvenir')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" style="font-size: 24px; font-weight: bold;">
                                {{ __('Productos Registrados') }}
                            </span>
                            <form method="GET" action="{{ route('productos.index') }}" class="form-inline ml-auto">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar por Nombre o Código de Barra" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                                    <th>Codigo Producto</th>
                                    <th>Marca</th>
                                    <th>Detalle Producto</th>
                                    <th>Foto Producto</th>
                                    <th>Precio Venta</th>
                                    <th>Precio Docena</th>
                                    <th>Precio Costo</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->codigo_producto }}</td>
                                        <td>{{ $producto->marca->nombre_marca }}</td>
                                        <td>{{ $producto->detalle_producto }}</td>
                                        <td><img src="{{ asset('storage/' . $producto->foto_producto) }}" alt="Foto" width="75"></td>
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
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{ route('productos.edit', $producto->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $productos->onEachSide(3)->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Mensaje de Modificacion-->
    @if(session('Modificado')=='Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <!--Mensaje de Guardado-->
    @if(session('Guardado')=='Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif


    <!--Mensaje de Eliminado-->
    @if(session('Eliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se elimino exitosamente',
                'success'
            )
        </script>
    @endif
    <script>
        $('.Alert-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro que desea eliminar la Calificacion?',
                text: "Si presiona si se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

    @if(session('alerta')=='ok')

        <script>
            Swal.fire({
                title: 'No se puede eliminar',
                text:'Esta Calificacion ya esta ligado, por ende es imposible eliminarlo',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif
@endsection

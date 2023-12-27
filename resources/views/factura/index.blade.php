@extends('adminlte::page')
@section('title', 'Facturas')
@section('template_title')
    Facturas
@endsection

@section('content')
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                            <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title" style="font-size: 24px; font-weight: bold;">
                                {{ __('Facturas') }}
                            </span>
                            <form method="GET" action="{{ route('facturas.index') }}" class="form-inline ml-auto">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar " value="{{ request('search') }}">
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
                            <table class="table table-bordered">
                                <thead class="bg-secondary">
                                <tr>
                                    <th>Numero Factura</th>
                                    <th>Fecha de Recibido</th>
                                    <th>Monto</th>
                                    <th>Empresa</th>
                                    <th>Foto</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($facturas as $factura)
                                    <tr>
                                        <td>{{ $factura->numero_factura }}</td>
                                        <td>{{ $factura->created_at->format('d-m-Y') }}</td>
                                        <td>Q. {{ $factura->monto }}</td>
                                        <td>{{ $factura->empresa->nombre_empresa }}</td>
                                        <td><img src="{{ asset('storage/' . $factura->foto_fac) }}" alt="Foto" width="50"></td>
                                        <td>
                                            @if($factura->estados_id == 1)
                                                <a href="{{ route('facturas.show', $factura->id) }}" class="btn btn-success btn-sm" title="Factura Recibida">R <i class="fas fa-sign-in-alt"></i></a>
                                            @elseif($factura->estados_id == 2)
                                                <a href="{{ route('facturas.show', $factura->id) }}" class="btn btn-danger btn-sm" title="Factura Liquidada">L <i class="fas fa-ban"></i></a>
                                            @elseif($factura->estados_id == 3)
                                                <a href="{{ route('facturas.show', $factura->id) }}" class="btn btn-outline-primary btn-sm" title="Factura con Cheque">C <i class="fas fa-money-check"></i></a>
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if($factura->estados_id == 1)
                                                <form action="{{ route('factura-cancelada', $factura->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT') <!-- Usamos el método PUT para actualizar el estado -->
                                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('¿Estás seguro de marcar esta factura como cancelada?')" title="Cancelar Factura">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                                <a class="btn btn-sm btn-info" href="{{ route('cheques.create', $factura->id) }}" title="Asignar cheque">
                                                    <i class="fas fa-money-check-alt"></i>
                                                </a>

                                            @elseif($factura->estados_id == 2)
                                                <span class="text-danger">Factura Cancelada</span>
                                            @elseif($factura->estados_id == 3)
                                                <span class="text-primary">Cancelado con Cheque</span>
                                            @endif
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $facturas->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Mensaje de Modificacion-->
    @if(session('Cancelado')=='Cancelado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Factura Cancelada Exitosamente',
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

@endsection

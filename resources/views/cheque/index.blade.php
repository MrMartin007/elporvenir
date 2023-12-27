@extends('adminlte::page')
@section('title', 'El Porvenir')
@section('template_title')
    Cheques
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            <span id="card_title" style=" display: flex; font-size: 24px; font-weight: bold; margin: auto; justify-content: space-between; align-items: center;">
                                {{ __('Cheques Asignados') }}
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
                            <table class="table table-bordered">
                                <thead class="bg-secondary">
                                <tr>
                                    <th>No Cheque</th>
                                    <th>Fecha Cobro</th>
                                    <th>Fecha de Asignacion</th>
                                    <th>Foto de Cheque</th>
                                    <th>Factura Asociada</th>
                                    <th>Foto de Factura</th>
                                    <th>Estado</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cheques as $cheque)
                                    <tr>

                                        <td>{{ $cheque->no_cheque }}</td>
                                        <td>{{ $cheque->fecha_cobro }}</td>
                                        <td>{{ $cheque->created_at }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#imagen{{ $cheque->id }}">
                                                @if($cheque->foto_ch)
                                                    <img src="{{ asset('storage/' . $cheque->foto_ch) }}" alt="Foto" width="50">
                                                @else
                                                    No hay foto de cheque.
                                                @endif
                                            </a>
                                        </td>
                                        <td>{{ $cheque->facturas->numero_factura ?? 'Sin factura asociada' }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#imagenModal{{ $cheque->id }}">
                                                @if($cheque->facturas->foto_fac)
                                                    <img src="{{ asset('storage/' . $cheque->facturas->foto_fac) }}" alt="Foto" width="50">
                                                @else
                                                    No hay foto de factura.
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            @if($cheque->estados_id == 1)
                                                <form action="{{ route('cheque-cancelada', $cheque->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT') <!-- Usamos el método PUT para actualizar el estado -->
                                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('¿Estás seguro de marcar esta factura como cancelada?')" title="Cancelar Factura">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>

                                            @elseif($cheque->estados_id == 2)
                                                <span class="text-danger">Cheque Cubierto</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Modal de Foto de Cheque -->
                                    <div class="modal fade" id="imagen{{ $cheque->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="{{ asset('storage/' . $cheque->foto_ch) }}" alt="Foto de Cheque" style="max-width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal de Foto de Factura -->
                                    <div class="modal fade" id="imagenModal{{ $cheque->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="{{ asset('storage/' . $cheque->facturas->foto_fac) }}" alt="Foto de Factura" style="max-width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cheques->links() !!}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Mensaje de Modificacion-->
    @if(session('Cancelado')=='Cancelado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Cheque Cancelado Exitosamente',
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


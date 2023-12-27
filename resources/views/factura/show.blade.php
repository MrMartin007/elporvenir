@extends('adminlte::page')
@section('title', 'Facturas')
@section('template_title')
    Factura
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            <span id="card_title" style="display: flex; font-size: 24px; font-weight: bold; margin: auto; justify-content: space-between; align-items: center;">
                                {{ __('Factura') }}
                            </span>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
                        <tr>
                            <th>No. Factura</th>
                            <th>Monto</th>
                            <th>Empresa</th>
                            <th>Fecha de Recibido</th>
                            <th>Foto</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $factura->numero_factura }}</td>
                            <td>Q. {{ $factura->monto }}</td>
                            <td>{{ $factura->empresa->nombre_empresa }}</td>
                            <td>{{ $factura->created_at }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#imagenModal">
                                    <img src="{{ asset('storage/' . $factura->foto_fac) }}" alt="Foto" width="50">
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if($factura->cheque)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header">
                                        <div style="display: flex; font-size: 24px; font-weight: bold; margin: auto; justify-content: space-between; align-items: center;">
                                            {{ __('Cheque Asignado') }}
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>No. Cheques</th>
                                        <th>Fecha Cobro</th>
                                        <th>Fecha de Asignacion</th>
                                        <th>Foto de Cheque</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $factura->cheque->no_cheque }}</td>
                                        <td>{{ $factura->cheque->fecha_cobro }}</td>
                                        <td>{{ $factura->cheque->created_at }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#imagen">
                                                @if($factura->cheque->foto_ch)
                                                    <img src="{{ asset('storage/' . $factura->cheque->foto_ch) }}" alt="Foto" width="50">
                                                @else
                                                    No hay foto de cheque.
                                                @endif
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                No hay cheque asignado.
            @endif

            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
            <div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $factura->foto_fac) }}" alt="Foto" style="max-width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            @if($factura->cheque && $factura->cheque->foto_ch)
                                <img src="{{ asset('storage/' . $factura->cheque->foto_ch) }}" alt="Foto" style="max-width: 100%;">
                            @else
                                <p>No hay foto de cheque disponible.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

@endsection

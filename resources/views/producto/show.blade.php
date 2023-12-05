@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? "{{ __('Show') Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo Producto:</strong>
                            {{ $producto->codigo_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Detalle Producto:</strong>
                            {{ $producto->detalle_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Foto Producto:</strong>
                            {{ $producto->foto_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Costo:</strong>
                            {{ $producto->precio_costo }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Venta:</strong>
                            {{ $producto->precio_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Docena:</strong>
                            {{ $producto->precio_docena }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

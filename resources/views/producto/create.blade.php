@extends('adminlte::page')
@section('title', 'EL Porvenir')

@section('template_title')
    {{ __('Create') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div style="height: 20px;"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg p-3 mb-5 bg-white ">
                        <div class="card-header">AGREGAR PRODUCTO</div>
                        <div class="card-body">


                            @includeif('partials.errors')

                            <div class="card card-default">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('productos.store') }}"  role="form" enctype="multipart/form-data">
                                        @csrf

                                        @include('producto.form')

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%;
            margin: 0;
            font-family: Lato, sans-serif;
            background-color:     #E1E2E1;
        }
        header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .card-header{
            background: #00bc8c;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right,#1c7430, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #3a4047, #4e555b); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color:white;
        }
    </style>

@endsection


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
    /* Ajustar la altura del select de Select2 */
        .select2-container .select2-selection--single {
            height: 37px !important; /* Asegúrate de que esta altura coincida con la altura de los otros campos */
            display: flex;
            align-items: center;
    </style>

@endsection
@section('js')

    <title>Página Principal</title>
    <!-- Cargar jQuery antes que Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Usa esta versión más reciente -->

    <!-- Archivos de Bootstrap CSS -->

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Otras librerías JavaScript (asegúrate de que jQuery ya esté cargado) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>


    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Seleccione una Marca",
                width: '100%'
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@endsection



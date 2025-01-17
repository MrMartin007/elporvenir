@extends('adminlte::page')
@section('title', 'El Porvenir')

@section('content_header')

    @section('content')
        <h1>Bienvenido Administrador</h1>

        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Inicio</title>

            <!-- Custom fonts for this template-->
            <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">

        </head>

        <body id="page-top">
        <div class="container-fluid">

            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left shadow h-100 py-2 border border-dark">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#7F135FFF ">
                                        Productos Registrados</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="numeroProductos">
                                        {{ $totalProductos}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Repite un bloque similar para mostrar las marcas registradas -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2 border border-dark">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: #06065DFF">
                                        Marcas Registradas</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="numeroMarcas">
                                        {{ $totalMarcas }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


         
                <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2 border border-dark">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Facturas Recibidas</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                Q. {{ number_format($montoTotalFactura, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


                  <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2 border border-dark">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Cheques Asignados sin Cubrir </div>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    Q. {{number_format ($montoTotalFacturasCheques, 2) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="imghome" class="text-center">
                <img src="https://elporvenir.shop/storage/productos/Xq2ATGVzAiiMdCZ78rt7qi9V4F3CY480EXjsNnZq.png" class="img-fluid rounded">
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="dashboard/vendor/jquery/jquery.min.js"></script>
        <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="dashboard/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="dashboard/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="dashboard/js/demo/chart-area-demo.js"></script>
        <script src="dashboard/js/demo/chart-pie-demo.js"></script>


        </html>
        </body>
    @stop


    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success" role="alert">
            Se ha verificado tu correo electrónico correctamente.
        </div>
    @endif

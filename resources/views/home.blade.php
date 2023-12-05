@extends('adminlte::page')

@section('title', 'Cable Colors')

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
                                        Servicios Asignados</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="numero-servicios-asignados">

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2 border border-dark">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: #06065DFF">
                                        Tecnicos Disponibles</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="numeroDeTecnicos">

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 border border-dark">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Servicios Completados
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">72%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                     style="width: 72%" aria-valuenow="72" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
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
                                        Reporetes </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="imghome">
                <img src="https://dplnews.com/wp-content/uploads/2023/03/dplnews_Cable-Color-HN_dn010323.jpg">
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

            <style>

                #imghome img {
                    width: 100%; /* Ancho del 100% del contenedor */
                    height: auto; /* Altura automática para mantener la proporción original */
                }

            </style>


        </html>
    </body>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop

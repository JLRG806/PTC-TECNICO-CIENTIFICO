<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../resources/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../resources/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Sing out</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="../resources/img/Logo.png" style="opacity: .8" width="230px">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../resources/img/IMG_20190331_144612.jpg" class="img-square" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">Sergio Mayén</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="dashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="usuarios.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Administrar Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="estudiantes.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Administrar Estudiantes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Administrar Grados
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="niveles.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Niveles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="secciones.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Secciones</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="proyectos.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Administrar Proyectos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="material.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Administrar Material
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="jurados.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Administrar Evaluadores
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>Proyectos</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>25</h3>

                                    <p>Niveles academicos</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>10</h3>

                                    <p>Usuarios</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>1500</h3>

                                    <p>Estudiantes</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">

                                    <!-- LINE CHART -->
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Line Chart</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- PIE CHART -->
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Proyectos por nivel académico</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- BAR CHART -->
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Equipos en su estado</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col (LEFT) -->
                                <div class="col-md-6">

                                    <!-- AREA CHART -->
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Area Chart</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- PIE CHART -->
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Proyectos por nivel académico</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="pieChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- STACKED BAR CHART -->
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Proyectos Evaluados</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.col (RIGHT) -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../resources/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../resources/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../resources/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../resources/dist/js/demo.js"></script>

    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['7°', '8°', '9°', '1° Desarrollo de Software', '2° Desarrollo de Software', '3° Desarrollo de Software', '3° ITEC'],
                datasets: [{
                        label: 'Proyectos aun no evaluados',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [10, 8, 0, 12, 6, 8, 9]
                    },
                    {
                        label: 'Proyectos evaluados',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [10, 18, 15, 10, 6, 11, 12]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var lineChartData = jQuery.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
            var pieData = {

                labels: [
                    '1° Desarrollo de Software',
                    '2° Desarrollo de Software',
                    '3° Desarrollo de Software',
                    '1° Electomecánica',
                    '2° Electomecánica',
                    '3° Electomecánica',
                    '1° Mantenimiento Automotriz',
                    '2° Mantenimiento Automotriz',
                    '3° Mantenimiento Automotriz',
                    '1° Diseño Gráfico',
                    '2° Diseño Gráfico',
                    '3° Diseño Gráfico',
                ],
                datasets: [{
                    data: [15, 11, 10, 8, 10, 10, 12, 9, 9, 8, 8, 9],
                    backgroundColor: ['#f39c12', '#c0392b', '#16a085', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#ecf0f1', '#8e44ad', 'f1c40f'],
                }]
            }
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {

                labels: [
                    '7°',
                    '8°',
                    '9°',
                    '1° Arquitectura',
                    '2° Arquitectura',
                    '3° Arquitectura',
                    '1° Administrativo Contable',
                    '2° Administrativo Contable',
                    '3° Administrativo Contable',
                    '1° Electrónica',
                    '2° Electrónica',
                    '3° Electrónica',
                ],
                datasets: [{
                    data: [15, 11, 10, 8, 10, 10, 12, 9, 9, 8, 8, 9],
                    backgroundColor: ['#f39c12', '#c0392b', '#16a085', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#ecf0f1', '#8e44ad', 'f1c40f'],
                }]
            }
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')

            var barChartData = {
                labels: ['Tercer ciclo', 'Primeros años', 'Segundos años', 'Terceros años'],
                datasets: [{
                        label: 'Pendiente de confirmar salida',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [50, 8, 0, 12, 6, 8, 9]
                    },
                    {
                        label: 'Salida Confirmada',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [10, 18, 15, 10, 6, 11, 12]
                    },
                ]
            }

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')

            var stackedBarChartData = {
                labels: ['7°', '8°', '9°', '1° Desarrollo de Software', '2° Desarrollo de Software', '3° Desarrollo de Software', '3° ITEC'],
                datasets: [{
                        label: 'Proyectos aun no evaluados',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [10, 8, 0, 12, 6, 8, 9]
                    },
                    {
                        label: 'Proyectos evaluados',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [10, 18, 15, 10, 6, 11, 12]
                    },
                ]
            }

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        })
    </script>
</body>

</html>
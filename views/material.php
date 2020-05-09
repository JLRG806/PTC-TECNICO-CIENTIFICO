<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrar Material</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../resources/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../resources/dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                            <h1 class="m-0 text-dark">Administrar Materiales</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombre equipo: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Nombre">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Descripción: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Descripción proyecto">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Cantidad: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Cantidad">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Estado equipo: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Estado">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Condición equipo: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Condición">
                                    </div>

                                </div>
                                <!-- /.col (LEFT) -->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-calendar"></i> Fecha entrada: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Entrada">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-calendar"></i> Fecha salida: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Salida">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Tipo material: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Tipo material">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Estudiante: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Estudiante">
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning">Guardar</button>
                                    </div>

                                </div>
                                <!-- /.col (RIGHT) -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    Nombre material
                                </th>
                                <th style="width: 20%">
                                    Descripción
                                </th>
                                <th style="width: 30%">
                                    Cantidad
                                </th>
                                <th>
                                    Estado material
                                </th>
                                <th>
                                    Condición material
                                </th>
                                <th>
                                    Fecha entrada
                                </th>
                                <th>
                                    Fecha salida
                                </th>
                                <th>
                                    Tipo material
                                </th>
                                <th>
                                    Estudiante
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Mantilla de mesa
                                </td>
                                <td>
                                    Roja
                                </td>
                                <td>
                                    1
                                </td>
                                <td>
                                    Pendiente de confirmar salida
                                </td>
                                <td>
                                    Nuevo
                                </td>
                                <td>
                                    07/05/2020
                                </td>
                                <td>
                                    10/05/2020
                                </td>
                                <td>
                                    Material
                                </td>
                                <td>
                                    José Luis
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pantalla de monitor
                                </td>
                                <td>
                                    Marca Samsung, color negra
                                </td>
                                <td>
                                    1
                                </td>
                                <td>
                                    Salida Confirmada
                                </td>
                                <td>
                                    Usado
                                </td>
                                <td>
                                    07/05/2020
                                </td>
                                <td>
                                    10/05/2020
                                </td>
                                <td>
                                    Equipo
                                </td>
                                <td>
                                    Maria Gabriela
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../resources/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../resources/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../resources/dist/js/demo.js"></script>

</body>

</html>
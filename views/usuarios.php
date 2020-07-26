<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrar Usuarios</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../resources/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../resources/dist/css/adminlte.min.css">
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
                            <h1 class="m-0 text-dark">Administrar Usuarios</h1>
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
                            <form method="post" id="USUARIOS">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="id_usuario" type="text" class="d-none" name="id_usuario">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombre: </label>
                                            <input id="nombre" type="text" class="form-control is-warning" name="nombre" placeholder="Nombre">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Correo electrónico: </label>
                                            <input id="email" type="email" class="form-control is-warning" name="email" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Estado: </label>
                                            <input id="estado" type="text" class="form-control is-warning" name="estado" placeholder="Seleccione estado">
                                        </div>

                                    </div>
                                    <!-- /.col (LEFT) -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Contraseña: </label>
                                            <input id="password" type="password" class="form-control is-warning" name="password" placeholder="Contraseña">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Contraseña: </label>
                                            <input id="password_con" type="password" class="form-control is-warning" name="password_con" placeholder="Confirma contraseña">
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-warning">Guardar</button>
                                        </div>

                                    </div>
                                    <!-- /.col (RIGHT) -->
                                </div>
                            </form>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>

                <form method="post" id="buscar">
                    <div class="col-md-3">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="material-icons"></i>
                            </span>
                            <div class="form-line">
                                <input id="usuario_buscar" type="text" class="form-control" name="usuario_buscar" placeholder="Buscar">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning">BUSCAR</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
                        <tbody id="tbody-rows">
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../resources/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../resources/plugins/bootstrap-4.5.0/js/bootstrap.js"></script>
    <!-- AdminLTE App -->
    <script src="../resources/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../core/helpers/components.js"></script>
    <script src="../core/controllers/usuario.js"></script>
</body>

</html>
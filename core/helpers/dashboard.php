<?php
class Dashboard
{
    public static function headerTemplate($title)
    {        
        session_start();
        print('
            <!DOCTYPE html>
            <html>
            
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Administrar niveles académicos</title>
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
                <link type="text/css" rel="stylesheet" href="../resources/css/all.min.css">
            </head>
            
            <body class="hold-transition sidebar-mini layout-fixed" oncopy="return false" onpaste="return false">
            <div class="wrapper">
        ');        
        $filename = basename($_SERVER['PHP_SELF']);    
        if (isset($_SESSION['id_usuario'])){
            if ($filename != 'index.php' && $filename != 'register.php') {
                print('
                    <header>
                        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                            <!-- Left navbar links -->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                                </li>
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="account.php" class="btn btn-outline-primary">Editar cuenta</a>
                                    <a href="#" onclick="signOff()" class="btn btn-outline-primary">Cerrar Sesión</a>
                                </li>
                            </ul>
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
                        <aside class="main-sidebar sidebar-dark-primary elevation-4">
                            <a href="main.php" class="brand-link">
                                <img src="../resources/img/Logo.png" style="opacity: .8" width="230px">
                            </a>
                            <div class="sidebar">
                                <!-- Sidebar user panel (optional) -->
                                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                    <div class="image">
                                        <img src="../resources/img/fotos_usuario/'.$_SESSION['foto_usuario'].'" class="img-square" alt="User Image">
                                    </div>
                                    <div class="info">
                                        <a href="" class="d-block">'.$_SESSION['nombre_usuario'].'</a>
                                    </div>
                                </div>            
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <!-- Add icons to the links using the .nav-icon class
                                        with font-awesome or any other icon font library -->
                                        <li class="nav-item has-treeview menu-open">
                                            <a href="main.php" class="nav-link active">
                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                                <p>
                                                    Dashboard
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="usuarios.php" class="nav-link">
                                                <i class="nav-icon far fa-users"></i>
                                                <p>
                                                    Usuarios
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="estudiantes.php" class="nav-link">
                                                <i class="nav-icon far fa-user-graduate"></i>
                                                <p>
                                                    Estudiantes
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="proyectos.php" class="nav-link">
                                                <i class="nav-icon far fa-tasks"></i>
                                                <p>
                                                    Proyectos
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon far fa-chalkboard"></i>
                                                <p>
                                                    Administrar Grados
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="grados.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Grados</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="especialidad.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Especialidades</p>
                                                    </a>
                                                </li>
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
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon far fa-tools"></i>
                                                <p>
                                                    Administrar Materiales
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="material.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Materiales</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="tipomaterial.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Tipo de Material</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="aulas.php" class="nav-link">
                                                <i class="nav-icon far fa-bell-school"></i>
                                                <p>
                                                    Aulas
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="docentes.php" class="nav-link">
                                                <i class="nav-icon far fa-chalkboard-teacher"></i>
                                                <p>
                                                    Docentes
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="jurados.php" class="nav-link">
                                                <i class="nav-icon far fa-id-card-alt"></i>
                                                <p>
                                                    Evaluadores
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="evaluaciones.php" class="nav-link">
                                                <i class="nav-icon far fa-file-signature"></i>
                                                <p>
                                                    Evaluaciones
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="reportes.php" class="nav-link">
                                                <i class="nav-icon far fa-file-alt"></i>
                                                <p>
                                                    Reportes
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </aside>                                                    
                    </header>
                    <main>                    
                ');
            } else {
                header('location: main.php');
            }
        } else {            
            if ($filename != 'index.php' && $filename != 'register.php') {
                header('location: index.php');
            } else {                
                print('
                    <header>
                        <div class="navbar-fixed">
                            <nav class="teal">
                                <div class="nav-wrapper">
                                    <a href="index.php" class="brand-logo"><i class="material-icons">dashboard</i></a>
                                </div>
                            </nav>
                        </div>
                    </header>
                    <main class="container">
                        <h3 class="center-align">'.$title.'</h3>
                ');
            }
        }
    }

    public static function footerTemplate($controller)
    {
        print('
                </main>
                </div>
                <script src="../resources/js/jquery-3.4.1.min.js"></script>
                <script src="../resources/js/popper.min.js"></script>
                <script src="../resources/plugins/bootstrap-4.5.0/js/bootstrap.js"></script>
                <script src="../resources/plugins/chart.js/Chart.min.js"></script>
                <script src="../resources/dist/js/adminlte.js"></script>
                <script src="../resources/js/sweetalert.min.js"></script>
                <script src="../core/helpers/components.js?v=1234"></script>
                <script type="text/javascript" src="../core/controllers/account.js?v=1234"></script>
                <script type="text/javascript" src="../core/controllers/inactivity.js?v=1234"></script>
                <script type="text/javascript" src="../core/controllers/'.$controller.'"></script>
            </body oncopy="return false" onpaste="return false">
            </html>                
        ');
    }
}
?>
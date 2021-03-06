<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Estudiantes');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administrar Estudiantes</h1>
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
                    <form method="post" id="ESTUDIANTES" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="id_estudiante" type="text" class="d-none" name="id_estudiante">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombres: </label>
                                    <input id="nombre_estudiante" type="text" class="form-control is-warning" name="nombre_estudiante" placeholder="Nombres">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Apellidos: </label>
                                    <input id="apellidos_estudiante" type="text" class="form-control is-warning" name="apellidos_estudiante" placeholder="Apeliidos">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Correo electrónico: </label>
                                    <input id="email_estudiante" type="email" class="form-control is-warning" name="email_estudiante" placeholder="Email">
                                </div>

                            </div>
                            <!-- /.col (LEFT) -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Código carnet: </label>
                                    <input id="codigo" type="text" class="form-control is-warning" name="codigo" placeholder="Código del estudiante">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="nivel"><i class="far fa-user"></i> Nivel: </label>
                                    <select id="nivel" class="custom-select form-control" name="nivel" required></select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="seccion"><i class="far fa-user"></i> Sección academica: </label>
                                    <select id="seccion" class="custom-select form-control" name="seccion" required></select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="especialidad"><i class="far fa-user"></i> Especialidad: </label>
                                    <select id="especialidad" class="custom-select form-control" name="especialidad" required></select>
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
                        <input id="estdiante_buscar" type="text" class="form-control" name="estudiante_buscar" placeholder="Buscar">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-warning">BUSCAR</button>
                        <a href="../core/reports/proyecto.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de proyectos con sus respectivos estudiantes"><i class="material-icons">Reporte de proyectos con sus respectivos estudiantes</i></a>
                    </div>
                </div>
            </div>
        </form>

        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>                        
                        <th style="width: 20%">
                            Apellidos
                        </th>
                        <th style="width: 20%">
                            Nombres
                        </th>
                        <th style="width: 30%">
                            Correo electrónico
                        </th>
                        <th>
                            Nivel académico
                        </th>
                        <th>
                            Sección académico
                        </th>
                        <th style="width: 10%">
                            Especialidad
                        </th>
                        <th style="width: 20%">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody-rows">
                </tbody>
            </table>
        </div>
    </section>
    <!-- /.content -->
</div>
</div>

<?php
Dashboard::footerTemplate('estudiantes.js');
?>
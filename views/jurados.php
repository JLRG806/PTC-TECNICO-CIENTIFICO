<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Evaludores');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Administrar Jurados</h1>
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
                            <form method="post" id="JURADOS" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="id_evaluador" type="text" class="d-none" name="id_evaluador">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombres: </label>
                                            <input id="nombres" type="text" class="form-control is-warning" name="nombres" placeholder="Nombres">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Apelidos: </label>
                                            <input id="apellidos" type="text" class="form-control is-warning" name="apellidos" placeholder="Apellidos">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Correo electrónico: </label>
                                            <input id="email" type="email" class="form-control is-warning" name="email" placeholder="example@gmail.com">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Teléfono: </label>
                                            <input id="telefono" type="text" class="form-control is-warning" name="telefono" placeholder="____-____">
                                        </div>

                                    </div>
                                    <!-- /.col (LEFT) -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Lugar procedencia: </label>
                                            <input id="procedencia" type="text" class="form-control is-warning" name="procedencia" placeholder="Nombres">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Ocupación: </label>
                                            <input id="ocupacion" type="text" class="form-control is-warning" name="ocupacion" placeholder="Ocupación">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Estado: </label>
                                            <input id="estado" type="text" class="form-control is-warning" name="estado" placeholder="Estado">
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
                                <input id="jurado_buscar" type="text" class="form-control" name="jurado_buscar" placeholder="Buscar">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning">BUSCAR</button>
                                <a href="../core/reports/evaluadores.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de evaluación de los proyectos por jurado"><i class="material-icons">Reporte de evaluación de los proyectos por jurado</i></a>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Lugar Procedencia</th>
                                <th>Ocupación</th>
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

<?php
Dashboard::footerTemplate('evaluadores.js');
?>
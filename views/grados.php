<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Grados');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Administrar Grados</h1>
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
                                <form method="post" id="GRADO">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input id="id_especialidad" type="text" class="d-none" name="id_especialidad">
                                            <div class="form-group">
                                                <label class="col-form-label" for="aula"><i class="far fa-user"></i> Aula: </label>
                                                <select id="aula" class="custom-select form-control" name="aula" required></select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="docente"><i class="far fa-user"></i> Docente: </label>
                                                <select id="docente" class="custom-select form-control" name="docente" required></select>
                                            </div>
                                        </div>
                                        <!-- /.col (LEFT) -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label" for="seccion"><i class="far fa-user"></i> Sección: </label>
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
                                    <input id="grado_buscar" type="text" class="form-control" name="grado_buscar" placeholder="Buscar">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-warning">BUSCAR</button>
                                    <a href="../core/reports/grados.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de grados"><i class="material-icons">Reporte de grados</i></a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                
                                    <th>Aula</th>
                                    <th>Docente</th>
                                    <th>Sección</th>
                                    <th>Especialidades</th>
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
<?php
Dashboard::footerTemplate('grados.js');
?>
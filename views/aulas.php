<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Aulas');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administrar Aulas</h1>
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
                    <form method="post" id="AULA" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="id_aula" type="text" class="d-none" name="id_aula">
                                <div class="form-group">
                                    <label class="col-form-label" for="nombre_aula"><i class="far fa-user"></i> Nombre: </label>
                                    <input id="nombre_aula" type="text" class="form-control is-warning" name="nombre_aula" placeholder="63.23, 81,21, ...">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="ubicacion_aula"><i class="far fa-user"></i> Ubicación: </label>
                                    <input id="ubicacion_aula" type="text" class="form-control is-warning" name="ubicacion_aula" placeholder="Indicaciones">
                                </div>
                            </div>
                            <!-- /.col (LEFT) -->
                            <div class="col-md-6">
                                <div class="file-field input-field col-md-6">
                                    <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una imagen de al menos 500x500">
                                        <input id="foto_aula" type="file" name="foto_aula" accept=".jpg, .png" />
                                    </div>
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
                        <input id="aula_buscar" type="text" class="form-control" name="aula_buscar" placeholder="Buscar">
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
                        <th>Ubicación</th>
                        <th>Imagen</th>
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
Dashboard::footerTemplate('aulas.js');
?>
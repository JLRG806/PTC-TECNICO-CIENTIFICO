<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Niveles');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Administrar Niveles académicos</h1>
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
                            <form method="post" id="NIVEL">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="id_nivel" type="text" class="d-none" name="id_nivel">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nivel académico: </label>
                                            <input id="nivel" type="text" class="form-control is-warning" name="nivel" placeholder="Nivel">
                                        </div>
                                    </div>
                                    <!-- /.col (LEFT) -->
                                    <div class="col-md-6">

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
                                <input id="nivel_buscar" type="text" class="form-control" name="nivel_buscar" placeholder="Buscar">
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
                                <th>Niveles</th>
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
Dashboard::footerTemplate('nivel.js');
?>
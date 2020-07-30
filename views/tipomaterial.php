<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Tipo Material');
?>
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
                            <form method="post" id="TIPOMATERIAL">
                                <div class="row">
                                    <div class="col-md-6">
                                    <input id="id_tipoequipo" type="text" class="d-none" name="id_tipoequipo">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Tipo equipo: </label>
                                            <input id="tipoequipo" type="text" class="form-control is-warning" name="tipoequipo" placeholder="Tipo equipo">
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
                                <input id="tipoequipo_buscar" type="text" class="form-control" name="tipoequipo_buscar" placeholder="Buscar">
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
                                <th>
                                    Tipo Material
                                </th>
                                <th>
                                    Opciones
                                </th>                       
                            </tr>
                        </thead>
                        <tbody id="tbody-rows">
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

<?php
Dashboard::footerTemplate('tipomaterial.js');
?>
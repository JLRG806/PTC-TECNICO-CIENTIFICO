<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Proyectos');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Administrar Proyectos</h1>
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
                        <form method="post" id="PROYECTO">
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="id_proyecto" type="text" class="d-none" name="id_proyecto">
                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombre proyecto: </label>
                                        <input name="nombre_proyecto" type="text" class="form-control is-warning" id="nombre_proyecto" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Descripción: </label>
                                        <input name="descripcion_proyecto" type="text" class="form-control is-warning" id="descripcion_proyecto" placeholder="Descripción del proyecto">
                                    </div>
                                </div>
                                <!-- /.col (LEFT) -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="grado"><i class="far fa-user"></i> Grado: </label>
                                        <select id="grado" class="custom-select form-control" name="grado" required></select>
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
                                <input id="proyecto_buscar" type="text" class="form-control" name="proyecto_buscar" placeholder="Buscar">
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
                                <th style="width: 1%">
                                    Nombre proyecto
                                </th>
                                <th style="width: 20%">
                                    Descripción proyecto
                                </th>
                                <th style="width: 1%">
                                    ID Grado
                                </th>
                                <th style="width: 30%">
                                    Nivel académico
                                </th>
                                <th>
                                    Sección académica
                                </th>
                                <th>
                                    Especialidad
                                </th>
                                <th style="width: 30%">
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
Dashboard::footerTemplate('proyectos.js');
?>
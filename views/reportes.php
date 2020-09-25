<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Reportes');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Reportes</h1>
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
                    <div class="container mt-3">
                        <ul class="nav nav-tabs nav-fill">
                            <li class="nav-item">
                                <a class="nav-link active" id="t_1" href="#m_tipo_reporte">Tipo de Reporte</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="t_2" href="#m_parametros">Parametros</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="m_tipo_reporte" class="container tab-pane active"><br>
                                <h3>Elija un Tipo de Reporte</h3>  
                                <form method="post" id="tipo_reporte">
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="estudiantes_op">
                                            <input type="radio" class="form-check-input" id="estudiantes_op" name="reporte_op" value="estudiantes">Estudiantes
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="proyectos_op">
                                            <input type="radio" class="form-check-input" id="proyectos_op" name="reporte_op" value="proyectos">Proyectos
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="materiales_op">
                                            <input type="radio" class="form-check-input" id="materiales_op" name="reporte_op" value="materiales">Materiales por Estudiante
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Siguiente</button>
                                </form>                          
                            </div>

                            <div id="m_parametros" class="container tab-pane feed"><br>
                                <form method="post" id="buscar">
                                    <div class="col-md-8">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon">
                                                <i class="material-icons"></i>
                                            </span>
                                            <div class="form-line">
                                                <input id="buscador" type="text" class="form-control" name="buscador" placeholder="Buscar">
                                            </div>
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-warning">BUSCAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="card-body p-0">
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th>Resultados de la busqueda</th>
                                            </tr>
                                        </thead>
                                        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
                                        <tbody id="tbody-rows">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </section>
    <!-- /.content -->
</div>
</div>

<?php
Dashboard::footerTemplate('reportes.js');
?>
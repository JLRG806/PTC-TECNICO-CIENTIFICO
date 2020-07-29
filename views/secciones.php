<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Secciones');
?>
        
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Administrar Secciones académicas</h1>
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
                            <form method="post" id="SECCION">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="id_especialidad" type="text" class="d-none" name="id_especialidad">
                                        <div class="form-group">
                                            <label class="col-form-label" for="seccion_estudiante"><i class="far fa-user"></i> Sección académica: </label>
                                            <input id="seccion_estudiante" type="text" class="form-control is-warning" name="seccion_estudiante" placeholder="Sección">
                                        </div>                                    
                                    </div>                                
                                    <!-- /.col (LEFT) -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="nivel"><i class="far fa-user"></i> Nivel: </label>
                                            <select id="nivel" class="custom-select form-control is-warning" name="nivel" required>
                                            </select>
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

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    Sección
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
<?php
Dashboard::footerTemplate('secciones.js');
?>
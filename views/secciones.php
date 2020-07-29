<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Secciones');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Administrar Secciones</h1>
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
                                            <input id="id_seccion" type="text" class="d-none" name="id_seccion">                                                                        
                                            <div class="form-group">
                                                <label class="col-form-label" for="seccion_estudiante"><i class="far fa-user"></i> Sección: </label>
                                                <input id="seccion_estudiante" type="text" class="form-control is-warning" name="seccion_estudiante" placeholder="Sección">
                                            </div>
                                        </div>      
                                        <div class="col-md-6">                                                       
                                            <div class="form-group">
                                                <label class="col-form-label" for="nivel"><i class="far fa-user"></i> Nivel: </label>
                                                <select id="nivel" class="custom-select form-control" name="nivel" required></select>
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
                                    <input id="especialidad_buscar" type="text" class="form-control" name="especialidad_buscar" placeholder="Buscar">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-warning">BUSCAR</button>
                                </div>
                            </div>
                        </div>
                    </form>

<<<<<<< HEAD
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>Nivel</th>
                                    <th>Sección</th>
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
=======
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>Secciones</th>
                                <th>Niveles</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-rows">                           
                        </tbody>
                    </table>    
                </div>      
            </section>
            <!-- /.content -->
        </div>
>>>>>>> 46010dfa51dbcb9039ecacfab82e6ce298e77338
<?php
Dashboard::footerTemplate('secciones.js');
?>
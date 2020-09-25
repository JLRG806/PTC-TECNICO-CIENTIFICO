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
                                <a href="../core/reports/tablaproyecto.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de proyectos"><i class="material-icons">assignment</i></a>
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
    <div class="modal fade" id="save-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="save-modal" style="color: white !important"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" class="needs-validation" id="save-form" enctype="multipart/form-data" novalidate>
                            <div class="form-row m-3">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre_proyecto_det"><p class="text-primary">Nombre del Proyecto</p></label>                                
                                    <p id="nombre_proyecto_det" class="text-dark" name="nombre_proyecto_det"></p>                                 
                                </div>    
                                <div class="col-md-6 mb-3">
                                    <label for="nombre_docente"><p class="text-primary">Nombre del Prof. Guía</p></label>                                
                                    <p id="nombre_docente" class="text-dark" name="nombre_docente"></p>                                 
                                </div>                                         
                            </div>
                            <div class="form-row m-3">
                                <div class="col-md-4 mb-3">
                                    <label for="seccion"><p class="text-primary">Sección</p></label>
                                    <p id="seccion" class="text-dark" name="seccion"></p>                                 
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="nivel"><p class="text-primary">Nivel</p></label>
                                    <p id="nivel" class="text-dark" name="nivel"></p>                                 
                                </div>      
                                <div class="col-md-4 mb-3">
                                    <label for="especialidad"><p class="text-primary">Especialidad</p></label>
                                    <p id="especialidad" class="text-dark" name="especialidad"></p>                                 
                                </div>                                               
                            </div>
                            <div class="form-row m-3">
                                <div class="col-md-12 mb-3 mx-auto">
                                    <label for="descripcion_proyecto_det"><p class="text-primary">Descripción</p></label>
                                    <textarea id="descripcion_proyecto_det" name="descripcion_proyecto_det" class="form-control" rows="3" style="resize: none"></textarea>                            
                                </div>                                            
                            </div>        
                            <div class="col-md-12 mb-3 mx-auto">
                                <table class="table table-striped projects">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%">
                                                Apellidos
                                            </th>
                                            <th style="width: 15%">
                                                Nombres
                                            </th>
                                            <th style="width: 10%">
                                                Puesto / Cargo
                                            </th>
                                            <th style="width: 5%">
                                                Sección Académica
                                            </th>
                                            <th style="width: 5%">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-subrows">                            
                                    </tbody>
                                </table>
                            </div>                                                     
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="btn_guardar" class="btn btn-dark">Guardar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
<?php
Dashboard::footerTemplate('proyectos.js');
?>
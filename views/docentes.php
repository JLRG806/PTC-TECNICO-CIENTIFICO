<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Docente');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Administrar Docentes</h1>
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
                            <form method="post" id="DOCENTE">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="id_docente" type="text" class="d-none" name="id_docente">
                                        <div class="form-group">
                                            <label class="col-form-label" for="nombre_docente"><i class="far fa-user"></i> Nombre y Apellidos: </label>
                                            <input id="nombre_docente" type="text" class="form-control is-warning" name="nombre_docente" placeholder="Nombre y Apellidos">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="email_docente"><i class="far fa-user"></i> Email: </label>
                                            <input id="email_docente" type="text" class="form-control is-warning" name="email_docente" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="fecha_nacimiento"><i class="far fa-user"></i> Fecha Nacimiento: </label>
                                            <input id="fecha_nacimiento" type="date" class="form-control is-warning" name="fecha_nacimiento" required>
                                        </div>
                                    </div>
                                    <!-- /.col (LEFT) -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="telefono_docente"><i class="far fa-user"></i> Telefóno: </label>
                                            <input id="telefono_docente" type="text" class="form-control is-warning" placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" name="telefono_docente" required>
                                        </div>          
                                        <div class="form-group">
                                            <label class="col-form-label" for="dui_docente"><i class="far fa-user"></i> DUI: </label>
                                            <input id="dui_docente" type="text" class="form-control is-warning" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" name="dui_docente" required>
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
                                <input id="docente_buscar" type="text" class="form-control" name="docente_buscar" placeholder="Buscar">
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
                                <th>Nombre y Apellidos</th>
                                <th>Email</th>
                                <th>Edad</th>
                                <th>Telefono</th>
                                <th>DUI</th>
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
Dashboard::footerTemplate('docentes.js');
?>
<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Estudiantes');
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Administrar Estudiantes</h1>
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
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombres: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Nombres">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Apellidos: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Apeliidos">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Correo electrónico: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Email">
                                    </div>

                                </div>
                                <!-- /.col (LEFT) -->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Código carnet: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Código del estudiante">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nivel académico: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Nivel">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Sección académica: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Sección">
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning">Guardar</button>
                                    </div>
                                </div>
                                <!-- /.col (RIGHT) -->
                            </div>
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
                                    Nombres
                                </th>
                                <th style="width: 20%">
                                    Apellidos
                                </th>
                                <th style="width: 30%">
                                    Correo electrónico
                                </th>
                                <th>
                                    Código de carnet
                                </th>
                                <th>
                                    Nivel académico
                                </th>
                                <th>
                                    Sección académico
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

<?php
Dashboard::footerTemplate('estudiantes.js');
?>
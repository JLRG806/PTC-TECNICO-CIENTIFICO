<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Material');
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
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombre equipo: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Nombre">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Descripción: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Descripción proyecto">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Cantidad: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Cantidad">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Estado equipo: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Estado">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Condición equipo: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Condición">
                                    </div>

                                </div>
                                <!-- /.col (LEFT) -->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-calendar"></i> Fecha entrada: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Entrada">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-calendar"></i> Fecha salida: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Salida">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Tipo material: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Tipo material">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Estudiante: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Estudiante">
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
                                    Nombre material
                                </th>
                                <th style="width: 20%">
                                    Descripción
                                </th>
                                <th style="width: 30%">
                                    Cantidad
                                </th>
                                <th>
                                    Estado material
                                </th>
                                <th>
                                    Condición material
                                </th>
                                <th>
                                    Fecha entrada
                                </th>
                                <th>
                                    Fecha salida
                                </th>
                                <th>
                                    Tipo material
                                </th>
                                <th>
                                    Estudiante
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Mantilla de mesa
                                </td>
                                <td>
                                    Roja
                                </td>
                                <td>
                                    1
                                </td>
                                <td>
                                    Pendiente de confirmar salida
                                </td>
                                <td>
                                    Nuevo
                                </td>
                                <td>
                                    07/05/2020
                                </td>
                                <td>
                                    10/05/2020
                                </td>
                                <td>
                                    Material
                                </td>
                                <td>
                                    José Luis
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pantalla de monitor
                                </td>
                                <td>
                                    Marca Samsung, color negra
                                </td>
                                <td>
                                    1
                                </td>
                                <td>
                                    Salida Confirmada
                                </td>
                                <td>
                                    Usado
                                </td>
                                <td>
                                    07/05/2020
                                </td>
                                <td>
                                    10/05/2020
                                </td>
                                <td>
                                    Equipo
                                </td>
                                <td>
                                    Maria Gabriela
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
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
Dashboard::footerTemplate('material.js');
?>
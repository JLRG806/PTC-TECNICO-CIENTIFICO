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
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombre proyecto: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Nombre">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Descripción: </label>
                                        <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Descripción del proyecto">
                                    </div>

                                </div>
                                <!-- /.col (LEFT) -->
                                <div class="col-md-6">

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
                                    Nombre proyecto
                                </th>
                                <th style="width: 20%">
                                    Descripción proyecto
                                </th>
                                <th style="width: 30%">
                                    Nivel académico
                                </th>
                                <th>
                                    Sección académica
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Araña seguidora de luz
                                </td>
                                <td>
                                    Representación de araña que con un sensor percibe la luz y se mueve hacia ella
                                </td>
                                <td>
                                    7°
                                </td>
                                <td>
                                    A
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
                                    Hotel & Restaurante
                                </td>
                                <td>
                                    Planos de un Hotel & Restaurante que aprovecha la radiación del sol
                                </td>
                                <td>
                                    2.° Arquitectura
                                </td>
                                <td>
                                    A-2
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
                                    Motor 2000 para marca Nissan
                                </td>
                                <td>
                                    Funcionamineto del motor potenciado con lejía
                                </td>
                                <td>
                                    3.° Mantenimiento Automotriz
                                </td>
                                <td>
                                    B-1
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
Dashboard::footerTemplate('proyectos.js');
?>
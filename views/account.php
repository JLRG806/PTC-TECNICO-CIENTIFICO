<?php
require_once('../core/helpers/dashboard.php');
Dashboard::headerTemplate('Usuarios');
?>
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Editar Cuenta</h1>
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
                            <form method="post" id="USUARIOS">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="id_usuario" type="text" class="d-none" name="id_usuario">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Nombre: </label>
                                            <input id="nombre_usuario" type="text" class="form-control is-warning" name="nombre_usuario" placeholder="Nombre">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Correo electrónico: </label>
                                            <input id="email_usuario" type="email" class="form-control is-warning" name="email_usuario" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Foto de perfil: <span class="small">500 x 500 pixeles.</span> </label>
                                            <input id="foto_usuario" type="file"  class="form-control is-warning" name="foto_usuario" placeholder="Foto">
                                            <img id="preview" src="../resources/img/fotos_usuario/noIMG.png" accept="image/*" alt="foto_usuario" width="150" height="150" class="img-thumbnail">
                                        </div>
                                        

                                    </div>
                                    <!-- /.col (LEFT) -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Contraseña: </label>
                                            <input id="password" type="password" class="form-control is-warning" name="password" placeholder="Contraseña">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Contraseña: </label>
                                            <input id="password_con" type="password" class="form-control is-warning" name="password_con" placeholder="Confirma contraseña">
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

                <?php
Dashboard::footerTemplate('usuario.js');
?>
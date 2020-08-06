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
                    <?php
                    print '<pre>';
                    print_r($_FILES);
                    print '</pre>';
                    ?>
                    <div class="row">
                        <div class="col-md-6">                            
                            <form method="post"  enctype="multipart/form-data" id="profile-form">
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
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Foto de perfil: <span class="small">Limite de 500 x 500 pixeles.</span> </label>
                                    <input id="foto_usuario" type="file" accept=".jpg, .png" name="foto_usuario">
                                    <img id="preview" src="../resources/img/fotos_usuario/noIMG.png" alt="foto_usuario" width="150" height="150" class="img-thumbnail">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Guardar cambios</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.col (LEFT) -->
                        <div class="col-md-6">
                            <form action="post" id="password-form">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Contraseña actual: </label>
                                    <input id="clave_actual_1" type="password" class="form-control is-warning" name="clave_actual_1" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i>Confirmar contraseña actual: </label>
                                    <input id="clave_actual_2" type="password" class="form-control is-warning" name="clave_actual_2" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Contraseña nueva: </label>
                                    <input id="clave_nueva_1" type="password" class="form-control is-warning" name="clave_nueva_1" placeholder="Contraseña">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Confirmar contraseña nueva: </label>
                                    <input id="clave_nueva_2" type="password" class="form-control is-warning" name="clave_nueva_2" placeholder="Confirma contraseña">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Actualizar contraseña</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.col (RIGHT) -->
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <?php
        Dashboard::footerTemplate('asd.js');
        ?>
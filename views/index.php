<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Index e-App</title>
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/ionicons.min.css">
    <link rel="stylesheet" href="../resources/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="../resources/css/">
</head>

<body>
    <div class="login-dark container-fluid">
        <form method="post" id="session-form">
            <h2 class="sr-only">Iniciar Sesión</h2>
            <img src="../resources/img/logo-ricaldone.png" class="img-fluid">
            <hr class="bg-info">
            <h2 class="text-center">Administrador</h2>
            <div class="illustration"></div>
            <div class="form-group"><input class="form-control" type="email" id="email_usuario" name="email_usuario" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" id="clave_usuario" name="clave_usuario" placeholder="Contraseña"></div>
            <div class="form-group"><button class="form-control btn btn-primary btn-block " type="submit">Iniciar Sesión</button>
            </div><a class="forgot" href="r-pas.php">Olvidaste tu contraseña?</a>
        </form>
    </div>
    <script src="../resources/js/jquery-3.4.1.min.js"></script>
    <script src="../resources/plugins/bootstrap-4.5.0/js/bootstrap.js"></script>
    <script src="../resources/plugins/chart.js/Chart.min.js"></script>
    <script src="../resources/dist/js/adminlte.js"></script>
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../core/helpers/components.js"></script>
    <script type="text/javascript" src="../core/controllers/account.js"></script>
    <script src="../core/controllers/index.js"></script>
</body>

</html>
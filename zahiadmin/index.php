<?php
session_start();
if (!empty($_SESSION["id"])) {
    header("Location: http://localhost/admin_zahia/Vista/home.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ingresar</title>
        <link rel="shortcut icon" href="img/favicon.png"> 
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/signin.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-combined.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <center>
                <img class="img-responsive" src="img/zahialogo.png"/>
                <form id="formularioIngreso" class="form-1" action="javascript:loginUsuario();" method="GET">
                    <h2>Usuario Administrador</h2>
                    <br/>
                    <p class="field">
                        <input class="form-control" id="usernamelog" type="text" name="login" placeholder="Email" required="">
                        <i class="icon-user icon-large"></i>
                    </p>
                    <p class="field">
                        <input class="form-control" id="passlog" type="password" name="password" placeholder="Clave" required="">
                        <i class="icon-lock icon-large"></i>
                    </p>
                    <p class="submit">
                        <button class="form-control" type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
                    </p>
                    <p id="cargandologin" style="text-align: center; display: none;" ><img src="img/cargando.gif" style="padding: 5px;"/></p>
                    <p id="textoResultante2" style="text-align: center; display: none;" ></p>
                </form>
        </div>
        <script type="text/javascript" src="js/RegistroLogin.js"></script> 
        <script type="text/javascript" src="js/jquery.min.js"></script>
    </body>
</html>


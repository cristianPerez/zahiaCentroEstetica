<?php
include 'checksession.php';
?>
<!DOCTYPE html>
<html lang="es">

    <head>

        <title>home</title>

        <link rel="shortcut icon" href="../img/favicon.png"> 

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="../css/signin.css">

        <link rel="stylesheet" type="text/css" href="../css/bootstrap-combined.min.css">

        <link rel="stylesheet" type="text/css" href="../css/style.css">

        

    </head>

    <body>

    <center>

        <img class="img-responsive" src="../img/zahialogo.png" />

            <a href="javascript:cerrar_session();" class="btn btn-primary">Salir</a>

<div class="container" style="margin-top:3%;margin-left:auto;"> 

    <a href="Usuarios/registrarPaciente.php" class="leermas">

                    <div class="span4" style="min-width:49.5%;width: auto;min-height: 200px;height: auto;background: #33ccff;margin-left:0px;margin-right: 0.5%;margin-bottom: 0.5%;" >

                        <h3 style="color: white;font-family: sans-serif;font-size: 35px; margin-top: 6%">Registro de paciente</h3>

                        <p style="min-width: auto;max-width: 250px;font-size: 20px; color: wheat">Registra, busca y edita un paciente facilmente</p>

                    </div>

    </a>

    <a href="Consulta/consulta.php" class="leermas">

                    <div class="span4" style="min-width:49.5%;width: auto;min-height: 200px;height: auto;background: #0099ff;margin-left:0.5%;margin-bottom: 0.5%;" >

                        <h3 style="color: white;font-family: sans-serif;font-size: 35px; margin-top: 6%">Consulta</h3>

                        <p style="min-width: auto;max-width: 250px;font-size: 20px;color: wheat">Se realizan dos tipos de consulta faciales y corporales</p>

                    </div>

    </a>

     <a href="#" class="leermas">

                    <div class="span4" style="min-width:49.5%;width: auto;min-height: 200px;height: auto;background: #5CFCFF;margin-left:0px;margin-right: 0.5%;margin-top:0.5%" >

<!--                        <h3 style="color: white;font-family: sans-serif;font-size: 35px; margin-top: 6%">Actualizar informacion</h3>

                        <p style="min-width: auto;max-width: 250px;font-size: 20px;color: wheat">Busca paciente por cedula y actualiza sus datos o genera una nueva consulta</p>-->

                    </div>

    </a>

<a href="#" class="leermas">

                    <div class="span4" style="min-width:49.5%;width: auto;min-height: 200px;height: auto;background: #33ccff;margin-left:0px;margin-left: 0.5%;margin-top:0.5%" >

                        <h3 style="color: white;font-family: sans-serif;font-size: 35px; margin-top: 6%">Antes y despues por paciente</h3>

                        <p style="min-width: auto;max-width: 250px;font-size: 20px;color: wheat">Busca historias clinicas por cedula</p>

                    </div>

    </a>

    </div>

            <script type="text/javascript" src="../js/RegistroLogin.js"></script> 

        <script type="text/javascript" src="../js/jquery.min.js"></script>

        <script type="text/javascript" src="../js/jquery.js"></script>

        <script type="text/javascript" src="../js/bootstrap.min.js"></script>

        

    </body>

</html>






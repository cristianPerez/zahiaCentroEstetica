<?php
include '../checksession.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title>zahia</title>
        <link rel="shortcut icon" href="../../img/favicon.png"> 
        <link rel="stylesheet"  href="../../css/bootstrap.min.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/style.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/signin.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap-datetimepicker.min.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap-responsive.css" type="text/css" media="all">
    </head>
    <body>
        <div class="row-fluid">     
            <a href="javascript:history.back()" class="btn btn-primary" style="position: fixed">volver</a>
            <center>
                <div class="container">
                    <div class="wpb_wrapper">
                        <h2 class="box_header" style="color: gray;">Busca historias clinicas por cedula de paciente</h2>
                    </div> 
                    <div class="form-group">
                        <form id="formBusqueda" action="javascript:buscar_historias();" method="POST">      
                            <center>
                                        <input id="cedulaBusquedaHistoria" style="width: 50%;  height: 30px;font-size: 20px;text-align: center;"  type="number" class="form-control" placeholder="cedula paciente(*)" required=""/>
                                        <br/>
                                        <button value="BuscarPaciente" name="BuscarPaciente" id="BuscarPaciente" style="width: 20%;" class="btn btn-primary">Buscar</button>
                                        <div id="cargandoBuscarHistoria" style="display:none ;width: 35px;height: 35px;margin-top: 5px;">
                                            <img src="../../img/cargando.gif" width="25" height="17" style="margin-top:3px" alt="gift para espera de envios de datos"/>
                                        </div> 
                            </center>
                        </form>
                    </div>
                </div>
                <div class="container" id="busquedasHistorias">
                    
                </div>
        </div>
        <script type="text/javascript"src="../../js/jquery.min.js"></script> 
        <script type="text/javascript"src="../../js/RegistroLogin.js"></script> 
        <script type="text/javascript"src="../../js/bootstrap.min.js"></script>
        <script type="text/javascript"src="../../js/buscarHistoria.js"></script>
        
    </body>
</html>




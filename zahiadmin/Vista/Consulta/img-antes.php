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
        <link rel="stylesheet"  href="../../css/bootstrap-combined.min.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/style.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/signin.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap-responsive.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/jqueryui.css"  type="text/css"/>
        <script type="text/javascript"src="../../js/Consultas.js"></script>
    </head>
    <body onload="javascript:mostrarImagenes(<?php echo $_GET["id_historia"]; ?>, 1)">
        <div class="row-fluid">
            <a href="javascript:history.back()" class="btn btn-primary" style="position: fixed">volver</a>
            <center>
                <h1 style="color: gray">Imagenes de Antes del tratamiento</h1>
            </center>
            <center>
                <div id="cargando2" style="display: none">
                    <img src="../../img/cargando.gif"/>
                </div>
            </center>
            <div class="container">
                <div class="span6">
                    <center>
                        <form id="formAddImgAntes" action="../ajaxuploadAntes.php"  method="POST" enctype="multipart/form-data">    
                            <textarea id="descripcion_img_antes" class="form-control" value="" style="width:100%; max-width: 100%; min-height: 65px;max-height: 65px" placeholder="Descripcion imagen de Antes" required=""></textarea>
                            <p><input id="imageProduct" style="width: 100%;" value="imageProduct"  name="imageProduct" type="file" class="form-control" required=""/></p>
                            <input id="id_history" name="id_history" value="<?php echo $_GET["id_historia"]; ?>" type="number" style="display: none">
                            <button  style="width: 100%;" class="btn btn-info" value="Modificar">Agregar Imagen</button>
                            <div id="cargando3" style="display: none">
                                <img src="../../img/cargando.gif"/>
                            </div>
                        </form>
                    </center>
                </div>
                <div class="span6">

                    <div id="carga_fotos" style="background: #0e90d2;width: 100%;height: 154px;">
                        <br/>
                        <br/>
                        <br/>
                        <p style="color: white;font-size: 30px;text-align: center;">No tienes imagenes sube alguna!</p>
                    </div>
                    <div id="tienes_fotos" style="background: #0e90d2;width: 100%;height: 154px;display: none;">
                        <br/>
                        <br/>
                        <br/>
                        <p style="color: white;font-size: 30px;text-align: center;">Buenas fotos agrega las que quieras!</p>
                    </div>

                </div>
            </div>
            <div class="container" id="muestras_antes">
            </div>
        </div>
        <script type="text/javascript"src="../../js/jquery.min.js"></script> 
        <script type="text/javascript"src="../../js/jquery-ui.min.js"></script> 
        <script type="text/javascript"src="../../js/autocomplete.js"></script>
        <script type="text/javascript"src="../../js/jquery.form.js"></script>
        <script type="text/javascript"src="../../js/addImgAntes.js"></script>
    </body>
</html>


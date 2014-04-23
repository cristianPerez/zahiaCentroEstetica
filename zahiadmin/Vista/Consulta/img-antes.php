<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title>zahia</title>
        <link rel="stylesheet"  href="../../css/bootstrap.min.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap-combined.min.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/style.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/signin.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap-responsive.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/jqueryui.css"  type="text/css"/>
        <script type="text/javascript"src="../../js/Consultas.js"></script>
    </head>
    <body onload="javascript:mostrarImagenes(<?php echo $_GET["id_historia"]; ?>,1)">
        <div class="row-fluid">
            <center>
                <h1>Imagenes de Antes del tratamiento</h1>
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
                                <textarea id="descripcion_img_antes" class="form-control" value="" style="width:100%; max-width: 100%; min-height: 65px;max-height: 100px" placeholder="Descripcion imagen de Antes" required=""></textarea>
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
            
<!--                
                    <div class="span6">
                        <center>
                            <form id="formModificarDespues" action="ajaxuploadDespues.php"  method="POST" enctype="multipart/form-data">    
                                <h1>Despues</h1>
                                <img id="img_upd_show_after" style="max-width: 400px;max-height:400px;height:auto;width: auto;" class="img-responsive" src="<?php echo $_GET["img_despues"]; ?>">
                                <p><input id="imgono4" type="checkbox" name="imgono4" value="0" onclick="javascript:cambas4();"> Cambiar imagen(Opcional)</p>                        
                                <p><input id="imageDespuesUpd" value="imageDespuesUpd"  name="imageDespuesUpd" type="file" class="form-control" disabled="true" required=""/></p>
                                <input  style="display: none" type="text" id="accionp" name="accionp" value="modificar"/>
                                <input style="display: none" type="text" id="imagenAntiguaDespues" name="imagenAntiguaDespues" value="<?php echo $_GET["only_img_despues"]; ?>"/>
                                <input id="id_history" name="id_history" value="<?php echo $_GET["id_historia"]; ?>" type="number" style="display: none">
                                <div id="cargando4" style="display: none">
                                    <img src="../../img/cargando.gif"/>
                                </div>
                                <label for="descripcion_despues">Descripcion Despues:</label>
                                <textarea id="descripcion_despues" disabled="true" class="form-control" value="<?php echo $_GET["desc_despues"]; ?>" style="width:100%; max-width: 100%; min-height: 114px;max-height: 200px" placeholder="Descripcion despues"></textarea>
                                <button id="btnEditarImgDespues" disabled="true" class="btn btn-success" value="Modificar">Modificar Despues</button>
                            </form>
                        </center>
                         
                    </div>
                </div>-->
            </div>
        <script type="text/javascript"src="../../js/jquery.min.js"></script> 
            <script type="text/javascript"src="../../js/jquery-ui.min.js"></script> 
            <script type="text/javascript"src="../../js/autocomplete.js"></script>
            <script type="text/javascript"src="../../js/jquery.form.js"></script>
            <script type="text/javascript"src="../../js/addImgAntes.js"></script>
    </body>
</html>


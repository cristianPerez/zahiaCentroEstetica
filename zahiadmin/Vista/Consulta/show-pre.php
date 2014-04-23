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
    <body>
        <div class="row-fluid">
<!--            <a href="../home.php" class="btn btn-primary" style="position: fixed">volver</a>-->
            <div class="container">
                <center>
                    <h1>Informacion Historia Clinica</h1>
                    <h2 style="color: gray">
                        <?php
                        if ($_GET["fecha_historia_clinica"] != 1) {
                            echo $_GET["fecha_historia_clinica"];
                        } else {
                            echo date("d-m-Y H:i:s");
                        }
                        ?>
                    </h2>
                </center>
                <div class="span12">
                    <div class="span6">
                        <label for="cedulaPaciente">Cedula:</label>
                        <input id="id_history" value="<?php echo $_GET["id_historia"]; ?>" type="number" style="display: none">
                        <input id="cedulaPaciente" value="<?php echo $_GET["cedula"]; ?>" type="number" disabled="true"  style="width:100%;" placeholder="cedula">
                        <label for="nombrePaciente">Nombre:</label>
                        <input id="nombrePaciente" value="<?php echo $_GET["nombre"]; ?>" type="text"  disabled="true"  style="width:100%;" placeholder="Nombre">
                        <label for="emailPaciente">Email:</label>
                        <input id="emailPaciente" value="<?php echo $_GET["email"]; ?>" type="email"  disabled="true"  style="width:100%;" placeholder="Email">
                        <label for="nacimientoPaciente">Nacimiento:</label>
                        <input id="nacimientoPaciente" value="<?php echo $_GET["nacimiento"]; ?>" type="text" disabled="true"  style="width:100%;" placeholder="Nacimiento">
                    </div>
                    <div class="span6">
                        <label for="tipo_consultaPaciente">Tipo de consulta:</label>
                        <input id="tipo_consultaPaciente" type="text" disabled="true" class="form-control" value="<?php
                        if ($_GET['tipo_consulta'] == 1) {
                            echo 'Facial';
                        } else {
                            echo 'Corporal';
                        }
                        ?>" style="width:100%;" placeholder="tipo de consulta">
                        <label for="descripcion_examen_fisico">Descripcion del examen Fisico:</label>
                        <textarea  id="descripcioqn_examen_fisico" disabled="true"  type="text" class="form-control" style="width:100%; max-width: 100%; min-height: 153px;max-height: 152px"><?php echo $_GET["desc_c"]; ?></textarea>
                    </div>
                </div>
                <?php
                if ($_GET["tipo_consulta"] == 2) {
                    ?>
                    <center>

                        <div class="span12">

                            <div class="span4">
                                <h3 style="color: gray;">Examen fisico</h3>
                                <label for="peso">Peso (kg)</label>
                                <input  class="form-control" id="peso" disabled="true" value="<?php echo $_GET["peso"]; ?>" step="0.01" type="number"  placeholder="Peso:(78.8)" />

                                <label for="altura">Altura (cm)</label>
                                <input  onkeydown="IMC()" class="form-control" id="altura" disabled="true" value="<?php echo $_GET["altura"]; ?>"  step="0.01" type="number"  placeholder="Altura:(180)" /> 

                                <label for="imcs">IMC</label>
                                <input  id="imcs" disabled="true" value="<?php echo $_GET["icm"]; ?>" type="text" disabled="true" class="form-control" placeholder="IMC"/>
                            </div>
                            <div class="span4">
                                <h3 style="color: gray;">Medidas en la cintura</h3>
                                <label for="cintura_alta">Alta</label>
                                <input  class="form-group" id="cintura_alta" disabled="true"  value="<?php echo $_GET["cintura_alta"]; ?>" step="0.01" type="number" class="form-control" placeholder="(90)" />

                                <label for="cintura_media">Media</label>
                                <input  class="form-group" id="cintura_media" disabled="true"  value="<?php echo $_GET["cintura_media"]; ?>"  step="0.01" type="number" class="form-control" placeholder="(60)" />

                                <label for="cintura_baja">Baja</label>
                                <input  class="form-group" id="cintura_baja" disabled="true"  value="<?php echo $_GET["cintura_baja"]; ?>" step="0.01" type="number" class="form-control" placeholder="(90)" />

                            </div>
                            <div class="span4">
                                <h3 style="color: gray;">Medidas en las Extremidades</h3>
                                <label for="brazo_derecho">Brazo derecho</label>
                                <input  class="form-group" id="brazo_derecho" disabled="true" value="<?php echo $_GET["brazo_derecho"]; ?>" step="0.01" type="number" class="form-control" placeholder="(40)" />
                                <label for="brazo_izquierdo">Brazo izquierdo</label>
                                <input  class="form-group" id="brazo_izquierdo" disabled="true" value="<?php echo $_GET["brazo_izquierdo"]; ?>"  step="0.01" type="number" class="form-control" placeholder="(40)" />
                                <label for="muslo_derecho">Muslo derecho</label>
                                <input  class="form-group" id="muslo_derecho" disabled="true" value="<?php echo $_GET["muslo_derecho"]; ?>"  step="0.01" type="number" class="form-control" placeholder="(60)" />
                                <label for="muslo_izquierdo">Muslo izquierdo</label>
                                <input  class="form-group" id="muslo_izquierdo" disabled="true" value="<?php echo $_GET["muslo_izquierdo"]; ?>"   step="0.01" type="number" class="form-control" placeholder="(60)" />
                            </div>

                        </div>
                    </center>   
<?php }
?>                
                <div class="span12">
                    <center>
                    <div class="span6">
                        
                        <h3>Resumen de factura</h3>
                         <textarea disabled="true" style="width:100%; max-width: 100%; min-height: 114px;max-height: 114px" id="factura" type="text" class="form-control" placeholder="factura" required=""><?php echo $_GET["resumen_factura"]; ?></textarea>
                    </div>
                    <div class="span6">
                        <h3>Total</h3>
                        <input type="text" style="font-size: 30px;height: 40px; width: 100%; text-align: center;" class="form-control" id="total" value="<?php echo $_GET["total_factura"]; ?>" disabled="true"/>
                        <br/>
                        <br/>
                        <div class="span4">
                            <a href="#" class="btn btn-large btn-primary" style="width: 111px;" >Descargar</a>
                        </div>
                        <div class="span4">
                            <a target="in_blank" href="img-antes.php?id_historia=<?php echo $_GET["id_historia"];?>" class="btn btn-large btn-info" style="width: 111px;"  >Antes</a>
                        </div>
                        <div class="span3">
                            <a href="#" class="btn btn-large btn-inverse" style="width: 111px;" >Despues</a>
                        </div>
                    </div>
                      </center> 
                </div>
<!--                <div class="span12">
                    <div class="span6">
                        <center>
                            <form id="formModificarAntes" action="ajaxuploadAntes.php"  method="POST" enctype="multipart/form-data">    
                                <h1>Antes</h1>
                                <img id="img_upd_show" style="max-width: 400px;max-height:400px;height:auto;width: auto;" class="img-responsive" src="<?php echo $_GET["img_antes"]; ?>">
                                <p><input id="imgono3" type="checkbox" name="imgono3" value="0" onclick="javascript:cambas3();"> Cambiar imagen(Opcional)</p>                        
                                <p><input id="imageProductUpd" value="imageProductUpd"  name="imageProductUpd" type="file" class="form-control" disabled="true" required=""/></p>
                                <input  style="display: none" type="text" id="accionp" name="accionp" value="modificar"/>
                                <input style="display: none" type="text" id="imagenAntigua" name="imagenAntigua" value="<?php echo $_GET["only_img_antes"]; ?>"/>
                                <input id="id_history" name="id_history" value="<?php echo $_GET["id_historia"]; ?>" type="number" style="display: none">
                                <div id="cargando3" style="display: none">
                                    <img src="../../img/cargando.gif"/>
                                </div>
                                <label for="descripcion_antes">Descripcion antes:</label>
                                <textarea id="descripcion_antes" disabled="true" class="form-control" value="<?php echo $_GET["desc_antes"]; ?>" style="width:100%; max-width: 100%; min-height: 114px;max-height: 200px" placeholder="Descripcion antes"></textarea>
                                <button id="btnEditarImg" disabled="true" class="btn btn-success" value="Modificar">Modificar Antes</button>
                            </form>
                        </center>
                    </div>
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
            </div>
            <script type="text/javascript"src="../js/jquery.min.js"></script> 
            <script type="text/javascript"src="../js/jquery-ui.min.js"></script> 
            <script type="text/javascript"src="../js/autocomplete.js"></script>
            <script type="text/javascript"src="../js/jquery.form.js"></script>
            <script type="text/javascript"src="../js/servicios.js"></script>
    </body>
</html>


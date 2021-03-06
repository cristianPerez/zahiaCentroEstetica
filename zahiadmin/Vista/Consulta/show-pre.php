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
    <body>
        <div class="row-fluid">
            <a href="javascript:history.back()" class="btn btn-primary" style="position: fixed">volver</a>
            <div class="container">
                <center>
                    <h1 style="color: gray">Informacion Historia Clinica</h1>
                    <h2 style="color: gray;text-align: left;margin-left: 2%;">Fecha: 
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
                        <input id="id_history" value="<?php echo $_GET["id_historia"]; ?>" type="number" style="display: none">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 103%"><h4>Cedula</h4></label>
                        <input id="cedulaPaciente" value="<?php echo $_GET["cedula"]; ?>" type="number" disabled="true"  style="width:100%;" placeholder="cedula">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 103%"><h4>Nombre Paciente</h4></label>
                        <input id="nombrePaciente" value="<?php echo $_GET["nombre"]; ?>" type="text"  disabled="true"  style="width:100%;" placeholder="Nombre">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 103%"><h4>Email</h4></label>
                        <input id="emailPaciente" value="<?php echo $_GET["email"]; ?>" type="email"  disabled="true"  style="width:100%;" placeholder="Email">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 103%"><h4>Edad</h4></label>
                        <input id="EdadPaciente" value="<?php echo $_GET["edad"]; ?>" type="text" disabled="true"  style="width:100%;" placeholder="Edad">
                    </div>
                    <div class="span6">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 103%"><h4>Tipo de consulta</h4></label>
                        <input id="tipo_consultaPaciente" type="text" disabled="true" class="form-control" value="<?php
                        if ($_GET['tipo_consulta'] == 1) {
                            echo 'Facial';
                        } else {
                            echo 'Corporal';
                        }
                        ?>" style="width:100%;" placeholder="tipo de consulta">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 103%"><h4>Descripcion del examen Fisico</h4></label>
                        <textarea  id="descripcioqn_examen_fisico" disabled="true"  type="text" class="form-control" style="width:100%; max-width: 100%; min-height: 181px;max-height: 181px"><?php echo $_GET["desc_c"]; ?></textarea>
                    </div>
                </div>
                <?php
                if ($_GET["tipo_consulta"] == 2) {
                    ?>
                    <center>

                        <div class="span12">

                            <div class="span4">
                                <h3 style="color: gray;">Examen fisico</h3>
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Peso (Kg)</h4></label>
                                <input  class="form-control" id="peso" disabled="true" value="<?php echo $_GET["peso"]; ?>" step="0.01" type="number"  placeholder="Peso:(78.8)" />

                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Altura (Cm)</h4></label>
                                <input  onkeydown="IMC()" class="form-control" id="altura" disabled="true" value="<?php echo $_GET["altura"]; ?>"  step="0.01" type="number"  placeholder="Altura:(180)" /> 

                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>IMC</h4></label>
                                <input  id="imcs" disabled="true" value="<?php echo $_GET["icm"]; ?>" type="text" disabled="true" class="form-control" placeholder="IMC"/>
                            </div>
                            <div class="span4">
                                <h3 style="color: gray;">Medidas en la cintura</h3>
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Alta</h4></label>
                                <input  class="form-group" id="cintura_alta" disabled="true"  value="<?php echo $_GET["cintura_alta"]; ?>" step="0.01" type="number" class="form-control" placeholder="(90)" />

                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Media</h4></label>
                                <input  class="form-group" id="cintura_media" disabled="true"  value="<?php echo $_GET["cintura_media"]; ?>"  step="0.01" type="number" class="form-control" placeholder="(60)" />

                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Baja</h4></label>
                                <input  class="form-group" id="cintura_baja" disabled="true"  value="<?php echo $_GET["cintura_baja"]; ?>" step="0.01" type="number" class="form-control" placeholder="(90)" />

                            </div>
                            <div class="span4">
                                <h3 style="color: gray;">Medidas en las Extremidades</h3>
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Brazo Derecho</h4></label>
                                <input  class="form-group" id="brazo_derecho" disabled="true" value="<?php echo $_GET["brazo_derecho"]; ?>" step="0.01" type="number" class="form-control" placeholder="(40)" />
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Brazo Izquierdo</h4></label>
                                <input  class="form-group" id="brazo_izquierdo" disabled="true" value="<?php echo $_GET["brazo_izquierdo"]; ?>"  step="0.01" type="number" class="form-control" placeholder="(40)" />
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Muslo derecho</h4></label>
                                <input  class="form-group" id="muslo_derecho" disabled="true" value="<?php echo $_GET["muslo_derecho"]; ?>"  step="0.01" type="number" class="form-control" placeholder="(60)" />
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 60%"><h4>Muslo Izquierdo</h4></label>
                                <input  class="form-group" id="muslo_izquierdo" disabled="true" value="<?php echo $_GET["muslo_izquierdo"]; ?>"   step="0.01" type="number" class="form-control" placeholder="(60)" />
                            </div>

                        </div>
                    </center>   
<?php }
?>                
                <div class="span12" style="margin-bottom: 50px">
                    <center>
                    <div class="span6">
                        
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 103%"><h3>Resumen Factura</h3></label>
                         <textarea disabled="true" style="min-width:100%; max-width: 100%; min-height: 114px;max-height: 114px" id="factura" type="text" class="form-control" placeholder="factura" required=""><?php echo $_GET["resumen_factura"]; ?></textarea>
                    </div>
                    <div class="span6">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;width: 103%"><h3>Total</h3></label>
                        <input type="text" style="font-size: 30px;height: 40px; width: 100%; text-align: center;" class="form-control" id="total" value="<?php echo $_GET["total_factura"]; ?>" disabled="true"/>
                        <br/>
                        <br/>
                        <div class="span4">
                            <a title="Descargar Resumen de factura" target="_blank" href="pdfConsulta.php?fecha=<?php if ($_GET["fecha_historia_clinica"] != 1) {echo $_GET["fecha_historia_clinica"];} else { echo date("d-m-Y H:i:s");}?>&nombre=<?php echo $_GET["nombre"]; ?>&cedula=<?php echo $_GET["cedula"]; ?>&email=<?php echo $_GET["email"]; ?>&edad=<?php echo $_GET["edad"]; ?>&consulta=<?php if ($_GET['tipo_consulta'] == 1) {echo 'Facial';}else{echo 'Corporal';}?>&examen_fisico=<?php echo $_GET["desc_c"]; ?>&peso=<?php echo $_GET["peso"]; ?>&altura=<?php echo $_GET["altura"]; ?>&imc=<?php echo $_GET["icm"]; ?>&cintura_alta=<?php echo $_GET["cintura_alta"]; ?>&cintura_media=<?php echo $_GET["cintura_media"]; ?>&cintura_baja=<?php echo $_GET["cintura_baja"]; ?>&brazo_derecho=<?php echo $_GET["brazo_derecho"]; ?>&brazo_izquierdo=<?php echo $_GET["brazo_izquierdo"]; ?>&muslo_derecho=<?php echo $_GET["muslo_derecho"]; ?>&muslo_izquierdo=<?php echo $_GET["muslo_izquierdo"]; ?>&factura=<?php echo $_GET["resumen_factura"]; ?>&total=<?php echo $_GET["total_factura"]; ?>" style="width: 50px;height: 50px;">
                                <img src="../../img/pdf.png" style="width: 50px;height: 50px" />
                            </a>
                        </div>
                        <div class="span4">
                            <a  href="img-antes.php?id_historia=<?php echo $_GET["id_historia"];?>" class="btn btn-large btn-info" style="width: 111px;"  >Antes</a>
                        </div>
                        <div class="span3">
                            <a  href="img-despues.php?id_historia=<?php echo $_GET["id_historia"];?>" class="btn btn-large btn-inverse" style="width: 111px;" >Despues</a>
                        </div>
                    </div>
                      </center> 
                </div>
                </div>
            </div>
            <script type="text/javascript"src="../js/jquery.min.js"></script> 
            <script type="text/javascript"src="../js/jquery-ui.min.js"></script> 
            <script type="text/javascript"src="../js/autocomplete.js"></script>
            <script type="text/javascript"src="../js/jquery.form.js"></script>
            <script type="text/javascript"src="../js/servicios.js"></script>
    </body>
</html>


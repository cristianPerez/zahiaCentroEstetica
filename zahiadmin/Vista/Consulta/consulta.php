<?php
include '../checksession.php';
?>
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
    </head>
    <body>

        <div class="row-fluid">
            <a href="../home.php" class="btn btn-primary" style="position: fixed">volver</a>
            <center>
                <div class="container">
                    <div class="wpb_wrapper">
                        <h2 class="box_header" style="color: gray;">Consulta</h2>
                    </div>

                    <form>
                        <div id="cargando" style="display: none">
                            <img src="../../img/cargando.gif"/>
                        </div>
                        <input class="form-control" type="text" id="nombrePaciente" name="nombrePaciente" value="" placeholder="Busqueda por nombre entre los pacientes" style="width: 100%" required=""/>
                        <input class="form-control" type="text" id="cedula" name="cedula" value="" disabled="true" placeholder="Cedula" required=""/>
                        <input class="form-control" type="text" id="email" name="email" value="" disabled="true" placeholder="Email"/>
                        <input class="form-control" type="text" id="cumple" name="cumple" value="" disabled="true" placeholder="Fecha de nacimiento"/>
                    </form>   
                    <form id="formIngresarProducto" action="javaScript:InsertarConsulta()"  method="POST" enctype="multipart/form-data">
                        <div id="tipo_consulta_div" class="container-fluid">
                            <h3 class="box_header" style="color: gray;">Selecciona el tipo de consulta</h3>
                            <select class="selectpicker" id="tipo_consulta" disabled="true">
                                <option value="1">Facial</option>
                                <option value="2">Corporal</option>
                            </select>
                        </div>

                        <h3 style="color: gray;">Examen físico</h3> 
                        <div id="examen_fisico" class="container-fluid"  aria-hidden="true" style="display: none">                                    
                            <div class="span4">
                                <h3 style="color: gray;">Medidas en general</h3>
                                <label for="peso">Peso (kg)</label>
                                <input  class="form-group" id="peso"  step="0.01" type="number" class="form-control" placeholder="Peso:(78.8)" />

                                <label for="altura">Altura (cm)</label>
                                <input  onkeydown="IMC()" class="form-group" id="altura"  step="0.01" type="number" class="form-control" placeholder="Altura:(180)" /> 

                                <label for="imc">IMC</label>
                                <input class="form-group" id="icm" class="form-control" placeholder="IMC" disabled="true"/>
                            </div>
                            <div class="span4" id="cintura">
                                <h3 style="color: gray;">Medidas en la cintura</h3>

                                <label for="cintura_alta">Alta</label>
                                <input  class="form-group" id="cintura_alta"  step="0.01" type="number" class="form-control" placeholder="(90)" />

                                <label for="cintura_media">Media</label>
                                <input  class="form-group" id="cintura_media"  step="0.01" type="number" class="form-control" placeholder="(60)" />

                                <label for="cintura_baja">Baja</label>
                                <input  class="form-group" id="cintura_baja"  step="0.01" type="number" class="form-control" placeholder="(90)" />
                            </div>

                            <div class="span4" id="extremidades">
                                <h3 style="color: gray;">Medidas Extremidades</h3>

                                <label for="brazo_derecho">Brazo derecho</label>
                                <input  class="form-group" id="brazo_derecho"  step="0.01" type="number" class="form-control" placeholder="(40)" />
                                <label for="brazo_izquierdo">Brazo izquierdo</label>
                                <input  class="form-group" id="brazo_izquierdo"  step="0.01" type="number" class="form-control" placeholder="(40)" />

                                <label for="muslo_derecho">Muslo derecho</label>
                                <input  class="form-group" id="muslo_derecho"  step="0.01" type="number" class="form-control" placeholder="(60)" />
                                <label for="muslo_izquierdo">Muslo izquierdo</label>
                                <input  class="form-group" id="muslo_izquierdo"  step="0.01" type="number" class="form-control" placeholder="(60)" />

                            </div>


                        </div>
                <div class="container">
                    <p><textarea style="width:100%; max-width: 100%; min-height: 114px;max-height: 200px" id="dudas" type="text" class="form-control" placeholder="Descripcion Examen Físico" required=""></textarea></p>
                </div>

                <h3 style="color: gray;">Facturación</h3>

                <div id="fact2" class="container">
                    <div class="span12" >
                        <div class="span6">
                            <div class="span12">
                                <label>Producto</label>
                                <input class="form-control" value="" id="producto1" type="text" />
                            </div>
                            <div class="span12" style="margin-left: -0.07%">

                                <label>Precio</label>
                                <input class="form-control" value="" id="precio1" type="number" />
                            </div>
                            <div class="span12" style="margin-left: -0.07%">
                                <label>Operacion</label>
                                <a href="javascript:Totalmas()" id="mas1"  class="btn btn-primary">+</a>
                                <a href="javascript:Totalmenos()"  id="menos1" class="btn btn-primary">-</a>
                            </div>
                        </div>
                        <div class="span6">
                            <p><textarea disabled="true" style="width:100%; max-width: 100%; min-height: 114px;max-height: 200px" id="factura" type="text" class="form-control" placeholder="factura" required=""></textarea></p>
                            <div class="span12">
                                <label for="total">Total:</label>
                                <input type="text" class="form-control" id="total" value="" disabled="true"/>
                            </div>
                        </div>
                    </div>
                    <div id="cargandoConsulta" style="display: none">
                        <img src="../../img/cargando.gif"/>
                    </div>
                    <button id="guardar" class="btn btn-primary" style="width: 100%;height: auto;" name="Guardar" value="Guardar">Guardar</button>
                </div>
        </form>
    </div>  
</div>

<script type="text/javascript"src="../../js/jquery.min.js"></script> 
<script type="text/javascript"src="../../js/jquery-ui.min.js"></script> 
<script type="text/javascript"src="../../js/autocomplete.js"></script>
<script type="text/javascript"src="../../js/scripts.js"></script>
<script type="text/javascript"src="../../js/jquery.form.js"></script>
<script type="text/javascript"src="../../js/Consultas.js"></script>
</body>
</html>
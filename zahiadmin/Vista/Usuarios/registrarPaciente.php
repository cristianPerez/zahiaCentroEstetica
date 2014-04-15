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
        <link rel="stylesheet"  href="../../css/bootstrap-datetimepicker.min.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap-responsive.css" type="text/css" media="all">
    </head>
    <body>
        <div class="row-fluid">
            <a href="../home.php" class="btn btn-primary" style="position: fixed">volver</a>
            <center>
                <div class="container">
                    <div class="wpb_wrapper">
                        <h2 class="box_header" style="color: gray;">Registro de usuario</h2>
                    </div> 
                    <form action="javascript:registrar_paciente();" style="padding-right: 10%; padding-left: 10%" method="POST">
                        <div class="form-group">
                            <input id="cedula" style="width: 100%; height: auto;"  type="number" class="form-control" placeholder="cedula pasiente(*)" required=""/>
                            <input id="email" style="width: 100%; height: auto;"  type="email" class="form-control" placeholder="Email(*)" required=""/>
                            <input id="nombre" style="width: 100%; height: auto;"  type="text" class="form-control" placeholder="Nombre completo(*)" required=""/>
                        </div>
                        <div class="form-group">
                            <div style="width: 100%" id="datetimepicker" class="input-append date form-group">
                                <input id="cumple" class="form-control" id="birthday" type="text" style="width:100%;height: 30px;" placeholder="Cumpleaños(*)" required=""/>
                                <span class="add-on" style="height: 30px;">
                                    <i data-date-icon="icon-calendar" style="margin-top: 40%"></i>
                                </span>
                            </div>
                        </div>    
                        <div class="form-group">

                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td style="padding: 10px;">
                                            <label>Hombre</label>
                                        </td>
                                        <td style="padding: 10px;">
                                            <input onclick="changeCheckbox('H')" class="form-control" id="Masculino" type="checkbox" style="width:20px;height: 20px;" value="0"/>
                                        </td>
                                        <td style="padding: 10px;">
                                            <label>Mujer</label>
                                        </td>
                                        <td style="padding: 10px;"> 
                                            <input onclick="changeCheckbox('M')" class="form-control" id="Femenino" type="checkbox" style="width:20px;height: 20px;" value="0"/>
                                        </td>
                                        <td style="padding: 10px;"> 
                                            <input  class="form-control" id="sexo" type="checkbox" style="width:20px;height: 20px; display: none" value="nada"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <p><input style="max-width:100%; width: 100%; min-height: auto;" id="ocupacion" type="text" class="form-control" placeholder="Ocupacion" required=""/></p>
                            </div>
                            <div class="form-group">
                                <p><input style="max-width:100%; width: 100%; min-height: auto;" id="direccion" type="text" class="form-control" placeholder="Direccion" required=""/></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="telefono" type="number" style="width:100%;height: 30px;" placeholder="Numero telefonico 3015987864"/>
                            </div>
                            <div class="form-group">
                                <h3 style="color: gray;">Antecedentes</h3>
                                <textarea class="form-control" id="antPatologicos" type="text" style="width:100%;height: 100px;" placeholder="Patológicos"></textarea>
                                <textarea class="form-control" id="antAlergicos" type="text" style="width:100%;height: 100px;" placeholder="Alérgicos"></textarea>
                                <textarea class="form-control" id="antQuirurgicos" type="text" style="width:100%;height: 100px;" placeholder="Quirúrgicos"></textarea>
                            </div>
                            
                            <!--                                    <div class="form-group">
                                                                <table>
                                                                    <tr>
                                                                        <td style="padding: 10px;">
                                                                            <label>Altura</label>
                                                                        </td>
                                                                        <td style="padding: 10px;">
                                                                            <input class="form-control" id="Altura" type="number" step="0.01" style="width:100%;height: 30px;" placeholder="1.5"/>
                                                                        </td>
                                                                        <td style="padding: 10px;">
                                                                            <label>Peso</label>
                                                                        </td>
                                                                        <td style="padding: 10px;">
                                                                            <input class="form-control" id="Peso" type="number" step="0.01" style="width:100%;height: 30px;" placeholder="78"/>
                                                                        </td>
                                                                        <td style="padding: 10px;">
                                                                            <label></label>
                                                                        </td>
                                                                        <td style="padding: 10px;">
                                                                            <input class="form-control" id="Peso" type="number" step="0.01" style="width:100%;height: 30px;" placeholder="78"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                </div>-->

                            <table>
                                <tr>
                                    <td>
                                        <button id="btnEnviarContacto" type="submit" class="btn btn-info">Registrar</button>
                                    </td>
                                    <td>
                                        <div id="cargandoAgregarPaciente" style="display:none ;width: 35px;height: 35px;margin-top: 5px;">
                                            <img src="../../img/cargando.gif" width="25" height="17" style="margin-top:3px" alt="gift para espera de envios de datos"/></div> 
                                    </td>
                                    <td style="width: 200px; height: auto; display: none">
                                        <label id="textoResultante2"></label>
                                    </td>
                                </tr>
                            </table> 
                        </div>
                    </form>
                </div>
        </div>
        <script type="text/javascript"src="../../js/jquery.min.js"></script> 
        <script type="text/javascript"src="../../js/RegistroLogin.js"></script> 
        <script type="text/javascript"src="../../js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript"src="../../js/scripts.js"></script>
        <script type="text/javascript">
                                                    $('#datetimepicker').datetimepicker({
                                                        format: 'yyyy-MM-dd',
                                                        pickTime: false
                                                    });
        </script>
    </body>
</html>


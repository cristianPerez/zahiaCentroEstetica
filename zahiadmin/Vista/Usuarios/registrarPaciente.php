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
                <div id="containerPrincipalRegistro" class="container">
                    <div class="wpb_wrapper">
                        <h2 class="box_header" style="color: gray;">Registro de paciente</h2>
                    </div> 
                    <form id="frmReistroUsuario" action="javascript:registrar_paciente();" style="padding-right: 10%; padding-left: 10%" method="POST">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;"><h4>Informacion Personal</h4></label>
                        <div class="form-group">
                            <input id="cedula" style="width: 99%; height: auto;"  type="number" class="form-control" placeholder="cedula pasiente(*)" required=""/>
                            <input id="email" style="width: 99%; height: auto;"  type="email" class="form-control" placeholder="Email(*)"/>
                            <input id="nombre" style="width: 99%; height: auto;"  type="text" class="form-control" placeholder="Nombre completo(*)" required=""/>
                        </div>
                        <div class="form-group">
                            <div style="width: 97%;margin-left: -3%;" id="datetimepicker" class="input-append date form-group">
                                <input id="cumple" class="form-control" id="birthday" type="text" style="width:99%;" placeholder="Cumpleaños(*)" required=""/>
                                <span class="add-on" >
                                    <i data-date-icon="icon-calendar" style="margin-top: 20%"></i>
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
                                            <input  class="form-control" id="sexo" type="text" style="display: none" value="nada"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <p><input style="max-width:99%; width: 99%;" id="ocupacion" type="text" class="form-control" placeholder="Ocupacion"/></p>
                                <p><input style="max-width:99%; width: 99%;" id="direccion" type="text" class="form-control" placeholder="Direccion"/></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="telefono" type="text" style="width:99%;" placeholder="Numeros telefonicos 3015987864 - 8754039"/>
                            </div>
                            <div class="form-group">
                        <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;"><h4>Antecedentes</h4></label>
                                <textarea class="form-control" id="antPatologicos" type="text" style="min-width: 99%;max-width:99%;max-height: 100px;min-height: 70px;" placeholder="Patológicos"></textarea>
                                <textarea class="form-control" id="antAlergicos" type="text" style="min-width: 99%;max-width:99%;max-height: 100px;min-height: 70px;" placeholder="Alérgicos"></textarea>
                                <textarea class="form-control" id="antQuirurgicos" type="text" style="min-width: 99%;max-width:99%;max-height: 100px;min-height: 70px;" placeholder="Quirúrgicos"></textarea>
                            </div>
                            <table style="width: 100%">
                                <tr>
                                <center>
                                    <td>
                                        <div id="cargandoAgregarPaciente" style="display:none ;width: 35px;height: 35px;margin-top: 5px;">
                                            <img src="../../img/cargando.gif" width="25" height="17" style="margin-top:3px" alt="gift para espera de envios de datos"/></div> 
                                    </td>
                                    <td style="width: 200px; height: auto; display: none">
                                        <label id="textoResultante2"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button id="btnEnviarContacto" type="submit" style="width: 100%" class="btn btn-primary">Registrar</button>
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
        <script type="text/javascript"src="../../js/bootstrap.min.js"></script>
        <script type="text/javascript">
                                                $('#datetimepicker').datetimepicker({
                                                    format: 'yyyy-MM-dd',
                                                    pickTime: false
                                                });
        </script>
    </body>
</html>


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
        <link rel="stylesheet"  href="../../css/bootstrap.min_1.css" type="text/css" media="all">
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
                <div id="containerPrincipal" class="container">
                    <div class="wpb_wrapper">
                        <h2 class="box_header" style="color: gray;">Busca un paciente por cedula</h2>
                    </div> 
                    <div class="form-group">
                        <form id="formBusqueda" action="javascript:buscar_paciente();" method="POST">      
                            <center>
                                <input type="number" id="cedulaBusqueda" style="width: 50%; height: 30px;font-size: 20px;text-align: center;" class="form-control" placeholder="cedula paciente(*)" required=""/>
                                <br/>
                                <button value="BuscarPaciente" name="BuscarPaciente" id="BuscarPaciente" style="min-width:20%;" class="btn btn-primary">Buscar</button>
                                <div id="cargandoBuscarBPaciente" style="display:none ;width: 35px;height: 35px;margin-top: 5px;">
                                    <img src="../../img/cargando.gif" width="25" height="17" style="margin-top:3px" alt="gift para espera de envios de datos"/>
                                </div> 
                            </center>
                        </form>
                    </div>
                    <form id="formModificar"  action="javascript:modificar_paciente();" style="padding-right: 10%; padding-left: 10%;display: none" method="POST">
                        <h1 style="color: gray;">Perfil de paciente</h1>
                        <div class="form-group">
                            <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Email</label>
                            <input id="emailBusqueda" style="width: 100%; height: auto;text-align: center;font-size:18px;"  type="email" class="form-control" placeholder="Email(*)"/>
                            <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Nombre</label>
                            <input id="nombreBusqueda" style="width: 100%; height: auto;text-align: center;font-size:18px;font-size:18px;"  type="text" class="form-control" placeholder="Nombre completo(*)" required=""/>
                        </div>
                        <div class="form-group">
                            <div style="width: 100%" id="datetimepicker" class="input-append date form-group">
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Cumpleaños</label>
                                <input id="birthday" class="form-control"  type="text" style="width:100%;height: auto;text-align: center;font-size:18px;" placeholder="Cumpleaños(*)"/>
                                <span class="add-on" style="height: 30px;">
                                    <i data-date-icon="icon-calendar" style="margin-top: 20%"></i>
                                </span>
                            </div>
                            <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Edad</label>
                            <input type="number" id="edadPaciente" class="form-control"  style="width:100%;height: auto;text-align: center;font-size:18px;" placeholder="Edad" disabled="true"/>

                        </div>    
                        <div class="form-group">
                            <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Sexo</label>
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td style="padding: 10px;">
                                            <label>Hombre</label>
                                        </td>
                                        <td style="padding: 10px;">
                                            <input onclick="changeCheckboxBusqueda('H')" class="form-control" id="MasculinoBusqueda" type="checkbox" style="width:20px;height: 20px;" value="0"/>
                                        </td>
                                        <td style="padding: 10px;">
                                            <label>Mujer</label>
                                        </td>
                                        <td style="padding: 10px;"> 
                                            <input onclick="changeCheckboxBusqueda('M')" class="form-control" id="FemeninoBusqueda" type="checkbox" style="width:20px;height: 20px;" value="0"/>
                                        </td>
                                        <td style="padding: 10px;"> 
                                            <input  class="form-control" id="sexoBusqueda" type="checkbox" style="width:20px;height: 20px; display: none" value="nada"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Ocupación</label>
                                <p><input style="max-width:100%; width: 100%; height: auto;text-align: center;font-size:18px;" id="ocupacionBusqueda" type="text" class="form-control" placeholder="Ocupacion"/></p>
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Dirección</label>
                                <p><input style="max-width:100%; width: 100%; height: auto;text-align: center;font-size:18px;" id="direccionBusqueda" type="text" class="form-control" placeholder="Direccion"/></p>
                            </div>
                            <div class="form-group">
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Telefonos</label>
                                <input class="form-control" id="telefonoBusqueda" type="text" style="width:100%;height: auto;text-align: center;font-size:18px;" placeholder="Numero telefonico 3015987864"/>
                                <input class="form-control" id="cudulaBusqueda2" type="text" style="width:100%;height: 30px;display: none;"/>
                            </div>
                            <div class="form-group">
                                <h3 style="color: gray;">Antecedentes</h3>
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Patológicos</label>
                                <textarea class="form-control" id="antPatologicosBusqueda" type="text" style="max-width:100%;max-height: 100px;min-height: 70px;text-align: center;font-size:18px;" placeholder="Patológicos"></textarea>
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Alérgicos</label>
                                <textarea class="form-control" id="antAlergicosBusqueda" type="text" style="max-width:100%;max-height: 100px;min-height: 70px;text-align: center;font-size:18px;" placeholder="Alérgicos"></textarea>
                                <label class="label-primary" style="color: white;opacity: 0.7;font-size:18px;">Quirúrgicos</label>
                                <textarea class="form-control" id="antQuirurgicosBusqueda" type="text" style="max-width:100%;max-height: 100px;min-height: 70px;text-align: center;font-size:18px;" placeholder="Quirúrgicos"></textarea>
                            </div>
                            <table style="width: 100%;">
                                <tr>
                                <center>
                                    <td>
                                        <div id="cargandoModificarPaciente" style="display:none ;width: 35px;height: 35px;margin-top: 5px;">
                                            <img src="../../img/cargando.gif" width="25" height="17" style="margin-top:3px" alt="gift para espera de envios de datos"/></div> 
                                    </td>
                                    <td style="width: 200px; height: auto; display: none">
                                        <label id="textoResultante2"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button id="btnEnviarContacto" style="width: 100%;" type="submit" class="btn btn-primary">Modificar</button>
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
        <script type="text/javascript"src="../../js/scripts.js"></script>
        <script type="text/javascript">
                                                $('#datetimepicker').datetimepicker({
                                                    format: 'yyyy-MM-dd',
                                                    pickTime: false
                                                });
        </script>
    </body>
</html>




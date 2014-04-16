<?php
include '../checksession.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title>zahia</title>
        <link rel="stylesheet"  href="../../css/bootstrap.min_1.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/style.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/signin.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap-datetimepicker.min.css" type="text/css" media="all">
        <link rel="stylesheet"  href="../../css/bootstrap-responsive.css" type="text/css" media="all">
    </head>
    <body>
        <div class="row-fluid">            
            <div class="container">

                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button> 
                        <a href="../home.php" class="navbar-brand"><img src="../../img/zahialogo.png" style="width: 40px;height: 20px" class="img-responsive"/></a>

                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="../home.php">Home</a>
                            </li>
                            <li>
                                <a href="registrarPaciente.php">Registro de paciente</a>
                            </li>
                            <li class="active">
                                <a href="#">Buscar paciente</a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="javascript:cerrar_session();">Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>

                </nav>

            </div>

            <center>
                <div class="container">
                    <div class="wpb_wrapper">
                        <h2 class="box_header" style="color: gray;">Busca un paciente por cedula</h2>
                    </div> 
                    <div class="form-group">
                        <form id="formBusqueda" action="javascript:buscar_paciente();" method="POST">      
                            <center>
                                        <input id="cedulaBusqueda" style="width: 50%; height: auto;"  type="number" class="form-control" placeholder="cedula paciente(*)" required=""/>
                                        <br/>
                                        <button value="BuscarPaciente" name="BuscarPaciente" id="BuscarPaciente" style="width: 20%;" class="btn btn-primary">Buscar</button>
                                        <div id="cargandoBuscarBPaciente" style="display:none ;width: 35px;height: 35px;margin-top: 5px;">
                                            <img src="../../img/cargando.gif" width="25" height="17" style="margin-top:3px" alt="gift para espera de envios de datos"/>
                                        </div> 
                            </center>
                        </form>
                    </div>
                    <form id="formModificar"  action="javascript:modificar_paciente();" style="padding-right: 10%; padding-left: 10%;display: none" method="POST">
                        <div class="form-group">
                            <input id="emailBusqueda" style="width: 100%; height: auto;"  type="email" class="form-control" placeholder="Email(*)"/>
                            <input id="nombreBusqueda" style="width: 100%; height: auto;"  type="text" class="form-control" placeholder="Nombre completo(*)" required=""/>
                        </div>
                        <div class="form-group">
                            <div style="width: 100%" id="datetimepicker" class="input-append date form-group">
                                <input id="cumpleBusqueda" class="form-control" id="birthday" type="text" style="width:100%;height: 30px;" placeholder="Cumpleaños(*)" required=""/>
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
                                <p><input style="max-width:100%; width: 100%; min-height: 30px;" id="ocupacionBusqueda" type="text" class="form-control" placeholder="Ocupacion" required=""/></p>
                                <p><input style="max-width:100%; width: 100%; min-height: 30px;" id="direccionBusqueda" type="text" class="form-control" placeholder="Direccion" required=""/></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="telefonoBusqueda" type="text" style="width:100%;height: 30px;" placeholder="Numero telefonico 3015987864"/>
                                <input class="form-control" id="cudulaBusqueda2" type="text" style="width:100%;height: 30px;display: none;"/>
                            </div>
                            <div class="form-group">
                                <h3 style="color: gray;">Antecedentes</h3>
                                <textarea class="form-control" id="antPatologicosBusqueda" type="text" style="max-width:100%;max-height: 100px;min-height: 70px;" placeholder="Patológicos"></textarea>
                                <textarea class="form-control" id="antAlergicosBusqueda" type="text" style="max-width:100%;max-height: 100px;min-height: 70px;" placeholder="Alérgicos"></textarea>
                                <textarea class="form-control" id="antQuirurgicosBusqueda" type="text" style="max-width:100%;max-height: 100px;min-height: 70px;" placeholder="Quirúrgicos"></textarea>
                            </div>
                            <table>
                                <tr>
                                    <td>
                                        <button id="btnEnviarContacto" type="submit" class="btn btn-info">Modificar</button>
                                    </td>
                                    <td>
                                        <div id="cargandoModificarPaciente" style="display:none ;width: 35px;height: 35px;margin-top: 5px;">
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




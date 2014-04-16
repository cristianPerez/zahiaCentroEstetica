<?php
session_start();
include ("../Conexion/Conexion.php");
/**
 * Description of WebService
 *
 * @author Cristian
 */
class Registro_login{
    
    
function login_usuario(){
     $sql = "Select * from `usuario` where  correo ='".$_REQUEST["usernamelog"]."' and  password ='".md5($_REQUEST["passlog"])."';";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar(); 
            $resultado=  mysql_fetch_row($res);
            if($resultado != null){   
             $_SESSION["id"] = $resultado[0];
             $_SESSION["name"] = $resultado[1];
             $_SESSION["email"] = $resultado[2];
             $_SESSION["tipo"] = $resultado[4];
             $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
             echo json_encode('si');
            }
            else{
                echo json_encode('no');
            }
        } catch (Exception $e) {
            //echo json_encode("fallo");
            echo json_encode(array("mensaje" => "Error al actualizar el registro. Verifique los datos"));
        }
 }
 
 function Registro_paciente() {
        $sql = "INSERT INTO `paciente`(`cedula`, `email`, `nombre_completo`, `nacimiento`, `sexo`, `ocupacion`, `direccion`, `telefono`,`antecedentes_patologicos`,`antecedentes_alergicos`,`antecedentes_quirurgicos`) "
                . "VALUES (" . $_REQUEST["cedula"]. ",'".$_REQUEST["email"]."','".$_REQUEST["nombre"]."','".$_REQUEST["cumple"]."','".$_REQUEST["sexo"]."','".$_REQUEST["ocupacion"]."','".$_REQUEST["direccion"]."','".$_REQUEST["telefono"]."','".$_REQUEST["patologicos"]."','".$_REQUEST["alergicos"]."','".$_REQUEST["quirurgicos"]."')"
                ."ON DUPLICATE KEY UPDATE nombre_completo = '" . $_REQUEST["nombre"] . "';";;
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();
            $tabla["respuesta"] = "si";
            echo json_encode($tabla);
        } catch (Exception $e) {
            $tabla["respuesta"]="no";
            echo json_encode($tabla);
        }
    }
 function modificar_paciente() {
        $sql = "UPDATE `paciente` SET `email`='".$_REQUEST["email"]."',`nombre_completo`='".$_REQUEST["nombre"]."',`nacimiento`='".$_REQUEST["cumple"]."',`sexo`='".$_REQUEST["sexo"]."',`ocupacion`='".$_REQUEST["ocupacion"]."',`direccion`='".$_REQUEST["direccion"]."',`telefono`='".$_REQUEST["telefono"]."',`antecedentes_patologicos`='".$_REQUEST["patologicos"]."',`antecedentes_alergicos`='".$_REQUEST["alergicos"]."',`antecedentes_quirurgicos`='".$_REQUEST["quirurgicos"]."' WHERE `cedula`=".$_REQUEST["cedulab"].";";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();
            $tabla["respuesta"] = "si";
            echo json_encode($tabla);
        } catch (Exception $e) {
            $tabla["respuesta"]="no";
            echo json_encode($tabla);
        }
    }
    function cerrar_sesion(){
     try {
        session_destroy();
        echo json_encode('si');
     } catch (Exception $exc) {
        echo json_encode(array("mensaje" => "Error al actualizar el registro. Verifique los datos"));
     }
    }
    
    function buscar_paciente() {
        $sql = "SELECT * FROM `paciente` WHERE `cedula`=".$_REQUEST["cedula"].";";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();

           $row = mysql_fetch_row($res);
           
            if ($row != null) {

                echo json_encode($row);
            } else {
                echo json_encode(null);
            }
        } catch (Exception $e) {
            //echo json_encode("fallo");
            echo json_encode(array("mensaje" => "Error al actualizar el registro. Verifique los datos"));
        }
    }
}
?>

<?php
session_start();
include ("../Conexion/Conexion.php");
/**
 * Description of Consultas
 *
 * @author Infusiones
 */

class Consultas {
    
    
    function registrar_consulta() {
        $sql = "INSERT INTO `historia_clinica`(`peso`, `altura`, `masa_corporal`,`descripcion_consulta`, `Usuario_atendio`, `tipo_consulta_id`, `paciente_cedula`, `cintura_alta`, `cintura_media`, `cintura_baja`, `brazo_derecho`, `brazo_izquierdo`, `muslo_derecho`, `muslo_izquierdo`, `factura`, `costo_total`)"
                . "VALUES ('" . $_REQUEST["peso"]. "','" . $_REQUEST["altura"]. "','" . $_REQUEST["icm"]. "','". $_REQUEST["dudas"]. "',".$_SESSION["id"].",". $_REQUEST["tipo_consulta"].",". $_REQUEST["cedula"].",'". $_REQUEST["cintura_alta"]."','". $_REQUEST["cintura_media"]."','". $_REQUEST["cintura_baja"]."','". $_REQUEST["brazo_derecho"]."','". $_REQUEST["brazo_izquierdo"]."','". $_REQUEST["muslo_derecho"]."','". $_REQUEST["muslo_izquierdo"]."','".$_REQUEST["factura"]."',". $_REQUEST["total"].")";
        $sql3 = "SELECT MAX( id )FROM  `historia_clinica`;";
        $conn = new Conexion();
        $conn->conectar();
        try {
            if($_REQUEST["tipo_consulta"] == 1){
               $res = $conn->consulta($sql);
            }
            else if($_REQUEST["tipo_consulta"] == 2){
                $res3 = $conn->consulta($sql);
            }
            $res4 = $conn->consulta($sql3);
            $row = mysql_fetch_row($res4);
            $conn->desconectar();
            $tabla["respuesta"] = "si";
            $tabla["respuesta2"] = $row[0];
            echo json_encode($tabla);
        } catch (Exception $e) {
            $tabla["respuesta"]="no";
            echo json_encode($tabla);
        }
    }
    function actualizar_img_antes() {
        
        $sql = "UPDATE `historia_clinica` SET `url_img_antes`='".$_REQUEST["img_antes"]."', `descripcion_img_antes`='".$_REQUEST["desc_antes"]."'  where `id`=".$_REQUEST["id_history"];
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res2 = $conn->consulta($sql);
            $conn->desconectar();
            $tabla["respuesta"] = "si";
            echo json_encode($tabla);
        } catch (Exception $e) {
            $tabla["respuesta"]="no";
            echo json_encode($tabla);
        }
    }
    function actualizar_img_despues() {
        $sql = "UPDATE `historia_clinica` SET `url_img_despues`='".$_REQUEST["img_despues"]."', `descripcion_img_despues`='".$_REQUEST["desc_despues"]."'  where `id`=".$_REQUEST["id_history"];
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res2 = $conn->consulta($sql);
            $conn->desconectar();
            $tabla["respuesta"] = "si";
            echo json_encode($tabla);
        } catch (Exception $e) {
            $tabla["respuesta"]="no";
            echo json_encode($tabla);
        }
    }
    
}

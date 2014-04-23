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
    function registrar_Imagen_antes() {
        
        $sql = "INSERT INTO `imagenes`(`tipo`,`descripcion`, `url`, `historia_clinica_id`) VALUES (1,'".$_REQUEST["descripcion_antes"]."','".$_REQUEST["imagen_antes"]."',".$_REQUEST["id_history"].")";
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
    function registrar_Imagen_despues() {
        
        $sql = "INSERT INTO `imagenes`(`tipo`,`descripcion`, `url`, `historia_clinica_id`) VALUES (2,'".$_REQUEST["descripcion_antes"]."','".$_REQUEST["imagen_antes"]."',".$_REQUEST["id_history"].")";
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
    function lista_imagenes() {
        $sql = "SELECT * FROM `imagenes` WHERE `historia_clinica_id`=".$_REQUEST["id_history"]." and `tipo`=".$_REQUEST["tipe"]."";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();
            $i = 0;
            $arr = null;
            while ($row = mysql_fetch_array($res)) {
                $arr[$i] = array("id" => $row['id'],"tipo" => $row['tipo'], "descripcion" => utf8_encode($row['descripcion']), "url" => $row['url']);
                $i++;
            }
            if ($arr != null) {
                echo json_encode($arr);
            } else {
                echo json_encode(array("respuesta" => "no"));
            }
        } catch (Exception $e) {
            echo json_encode(array("respuesta" => "no"));
        }
//        $sql = "UPDATE `historia_clinica` SET `url_img_despues`='".$_REQUEST["img_despues"]."', `descripcion_img_despues`='".$_REQUEST["desc_despues"]."'  where `id`=".$_REQUEST["id_history"];
//        $conn = new Conexion();
//        $conn->conectar();
//        try {
//            $res2 = $conn->consulta($sql);
//            $conn->desconectar();
//            $tabla["respuesta"] = "si";
//            echo json_encode($tabla);
//        } catch (Exception $e) {
//            $tabla["respuesta"]="no";
//            echo json_encode($tabla);
//        }
    }
    
}

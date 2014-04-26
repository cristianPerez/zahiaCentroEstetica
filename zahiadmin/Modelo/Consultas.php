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
    function registrar_Imagen() {
        
        $sql = "INSERT INTO `imagenes`(`tipo`,`descripcion`, `url`, `historia_clinica_id`) VALUES (".$_REQUEST["tipo"].",'".$_REQUEST["descripcion_antes"]."','".$_REQUEST["imagen_antes"]."',".$_REQUEST["id_history"].")";
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
        $sql = "SELECT * FROM `imagenes` WHERE `historia_clinica_id`=".$_REQUEST["id_history"]." and `tipo`=".$_REQUEST["tipe"]." order by id desc";
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
    }
    
    function borrar_imagenes(){
        $sql = "DELETE FROM `imagenes` WHERE `id` =".$_REQUEST["idelim"].";";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();
            if($_REQUEST["tipo"]=='1'){
                unlink("../uploads/antes/" . $_REQUEST["img"]);
            }
            else if($_REQUEST["tipo"]=='2'){
                unlink("../uploads/despues/" . $_REQUEST["img"]);  
            }
            echo json_encode(array("respuesta" => "si"));
        } catch (Exception $e) {
            echo json_encode(array("respuesta" => "no"));
        }
    }
    
    function buscarHistorias(){
        
        $sql = "SELECT hc.id, hc.peso, hc.altura, hc.masa_corporal, hc.fecha, hc.descripcion_consulta, hc.Usuario_atendio, hc.tipo_consulta_id, hc.paciente_cedula, hc.cintura_alta, hc.cintura_media, hc.cintura_baja, hc.brazo_derecho, hc.brazo_izquierdo, hc.muslo_derecho, hc.muslo_izquierdo, hc.factura, hc.costo_total ,p.nombre_completo,p.email , p.nacimiento FROM historia_clinica hc ,paciente p WHERE hc.paciente_cedula =".$_REQUEST["cedula"]." and p.cedula = hc.paciente_cedula order by id desc";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();
            $i = 0;
            $arr = null;
            while ($row = mysql_fetch_array($res)) {
                $arr[$i] = array(   "id" => $row['id'],
                                    "peso" => $row['peso'], 
                                    "altura" => $row['altura'], 
                                    "masa_corporal" => $row['masa_corporal'], 
                                    "fecha" => $row['fecha'], 
                                    "descripcion_consulta" => $row['descripcion_consulta'], 
                                    "Usuario_atendio" => $row['Usuario_atendio'], 
                                    "tipo_consulta_id" => $row['tipo_consulta_id'], 
                                    "paciente_cedula" => $row['paciente_cedula'], 
                                    "cintura_alta" => $row['cintura_alta'], 
                                    "cintura_media" => $row['cintura_media'], 
                                    "cintura_baja" => $row['cintura_baja'],
                                    "brazo_izquierdo" => $row['brazo_izquierdo'],
                                    "brazo_derecho" => $row['brazo_derecho'],
                                    "muslo_derecho" => $row['muslo_derecho'],
                                    "muslo_izquierdo" => $row['muslo_izquierdo'],
                                    "factura" => $row['factura'],
                                    "costo_total" => $row['costo_total'],
                                    "nombre_paciente" => $row['nombre_completo'],
                                    "email_paciente" => $row['email'],
                                    "cumple" => $row['nacimiento']
                        );
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
        
    }
    
}

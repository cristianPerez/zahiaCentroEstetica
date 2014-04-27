<?php
$conexion = new mysqli('localhost', 'root', '', 'zahiacom_admin', 3306);
$nombre_paciente = $_POST['pacienteNombre'];
$consulta = "select * FROM paciente WHERE nombre_completo = '$nombre_paciente'";

$result = $conexion->query($consulta);
$respuesta = new stdClass();

if ($result->num_rows > 0) {
    $fila = $result->fetch_array();
    $respuesta->cedula = $fila['cedula'];
    $respuesta->email = $fila['email'];
    $respuesta->cumple = $fila['edad'];
}
echo json_encode($respuesta);
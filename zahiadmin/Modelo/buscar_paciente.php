<?php
$conexion = new mysqli('localhost','root','','zahiacom_admin',3306);
$paciente = $_GET['term'];
$consulta = "select nombre_completo FROM paciente WHERE nombre_completo LIKE '%$paciente%'";

$result = $conexion->query($consulta);

if($result->num_rows > 0){
	while($fila = $result->fetch_array()){
		$matriculas[] = $fila['nombre_completo'];		
	}
	echo json_encode($matriculas);
}
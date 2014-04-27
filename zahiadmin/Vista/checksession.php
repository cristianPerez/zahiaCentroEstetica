<?php
session_start();
if ($_SESSION["id"] == null) {
    header("Location: http://localhost/zahiaCentroEstetica/zahiadmin/index.php");
}
else {
    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
     if($tiempo_transcurrido >= 1000) {
      session_destroy();
      header("Location: http://localhost/zahiaCentroEstetica/zahiadmin/index.php");
    }else {
    $_SESSION["ultimoAcceso"] = $ahora;
   }
}
?>

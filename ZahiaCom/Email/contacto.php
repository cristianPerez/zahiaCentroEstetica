<?php
include_once("./smtp_auth.php");
include ("./Conexion.php");

$nombre = $_REQUEST["nombreContacto"];
$email = $_REQUEST["emailContacto"];
$telefono = $_REQUEST["telefonoContacto"];
$dudas = $_REQUEST["dudas"];

        $sql = "INSERT INTO `paciente`(`email`,`nombre_completo`,`telefono`) VALUES ('" . $_REQUEST["emailContacto"] . "','" . $_REQUEST["nombreContacto"] . "','" . $_REQUEST["telefonoContacto"]."') ON DUPLICATE KEY UPDATE nombre_completo = '" . $_REQUEST["nombreContacto"] . "';";
        $sql2 = "INSERT INTO `contactos`(`nombre_contacto`,`telefono_contacto`,`paciente_email`,`preguntas_contacto`) VALUES ('" . $_REQUEST["nombreContacto"] . "','" . $_REQUEST["telefonoContacto"]."','".$_REQUEST["emailContacto"]."','".$_REQUEST["dudas"]."')";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $res = $conn->consulta($sql2);
            $conn->desconectar();
            $tabla["respuesta1"]="si";
        } catch (Exception $e) {
            $tabla["respuesta1"]="no";
        }
    


$SMTPservidor = "mail.zahia.com.co";
$SMTPusuario = "info@zahia.com.co";
$SMTPclave = "linaprima";
$SMTPpuerto = "25";

$destinatario = "zahiamedicinaestetica@gmail.com";
$asunto = "Nueva contacto zahia";
$body = "<html lang='es'>
                    <HEAD>
                            <TITLE>Contacto Zahia medicina estetica</TITLE>
                     </HEAD>
                        <BODY>
                            <div>
                            <center>
                            <h1>Contacto zahia</h1>
                           
                                <img src='http://www.zahia.com.co/img/zahialogo.png'/>
                                    <p><strong>Contacto a nombre de:</strong> $nombre </p>
                                    <p><strong>Email:</strong> $email</p>
                                    <p><strong>Numero Telefonico:</strong> $telefono </p>
                                    <p><strong>Pregunta:</strong> $dudas </p>
                            </center>
                            </div>
                        </BODY>
                    </html>";

$remitente = "Zahia centro de estetica medellin";
$remitenteemail = "info@zahia.com.co";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

$smtp = new eSmtp("$SMTPservidor", $SMTPpuerto);
$smtp->setAuth("$SMTPusuario", "$SMTPclave");
$smtp->setFrom("$remitente", "$remitenteemail");
$smtp->isHtml = 1;
$smtp->addRecipient("", "$destinatario", "to");

$smtp->setSubject("$asunto");
$smtp->setBody("$body");
$smtp->isDebug = 0;

if ($smtp->connect()) {
    $success = $smtp->send();
    $smtp->disconnect();
}
$destinatario2 = "$email";
$asunto2 = "Nuevo contacto zahia estetica";
$body2 = "<html lang='es'>
                    <HEAD>
                            <TITLE>Contacto Zahia medicina estetica</TITLE>
                     </HEAD>
                        <BODY>
                            <div>
                            <center>
                            <h1>Nuevo contacto</h1>
                           
                                <img src='http://www.zahia.com.co/img/zahialogo.png'/>
                                    <p>Hola gracias por contactarnos</p>
                                    <p>En menos de 24 horas nos</p>
                                    <p>Comunicaremos contigo, gracias por confiar en nosotros.</p>
                                    <p>Estos son tus datos:</p>
                                    <p><strong>Contacto a nombre de:</strong> $nombre </p>
                                    <p><strong>Email:</strong> $email</p>
                                    <p><strong>Numero Telefonico:</strong> $telefono </p>
                                        <p><strong>Pregunta:</strong> $dudas </p>
                            </center>
                            </div>
                        </BODY>
                    </html>";

$remitente2 = "Zahia centro de estetica medellin";
$remitenteemail2 = "info@zahia.com.co";

$headers2 = "MIME-Version: 1.0\r\n";
$headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n";

$smtp2 = new eSmtp("$SMTPservidor", $SMTPpuerto);
$smtp2->setAuth("$SMTPusuario", "$SMTPclave");
$smtp2->setFrom("$remitente2", "$remitenteemail2");
$smtp2->isHtml = 1;
$smtp2->addRecipient("", "$destinatario2", "to");

$smtp2->setSubject("$asunto2");
$smtp2->setBody("$body2");
$smtp2->isDebug = 0;

if ($smtp2->connect()) {
    $success2 = $smtp2->send();
    $smtp2->disconnect();
}


if ($success && $success2) {
    $tabla["respuesta"] = "si";
} else {
    $tabla["respuesta"] = "no";
}
echo json_encode($tabla);
?>

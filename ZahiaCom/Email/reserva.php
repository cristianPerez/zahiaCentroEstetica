<?php
include_once("./smtp_auth.php");
include ("./Conexion.php");

$nombre = $_REQUEST["nombreValoracion"];
$email = $_REQUEST["emailValoracion"];
$telefono = $_REQUEST["telefonoValoracion"];

$sql = "INSERT INTO `paciente`(`email`,`nombre_completo`,`telefono`) VALUES ('" . $email . "','" . $nombre . "','" . $telefono."') ON DUPLICATE KEY UPDATE nombre_completo = '" . $nombre . "';";
$sql2 = "INSERT INTO `solicitud_valoracion_gratuita`(`nombre_paciente`, `telefono_paciente`, `paciente_email`) VALUES ('" . $nombre . "','" . $telefono . "','" . $email."');";
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
$asunto = "Nueva valoracion gratuita";
$body = "<html lang='es'>
                    <HEAD>
                            <TITLE>Valoracion Gratuita Zahia medicina estetica</TITLE>
                     </HEAD>
                        <BODY>
                            <div>
                            <center>
                            <h1>Valoracion Gratuita</h1>
                           
                                <img src='http://www.zahia.com.co/img/zahialogo.png'/>
                                    <p><strong>Valoracion a nombre de:</strong> $nombre </p>
                                    <p><strong>Email:</strong> $email</p>
                                    <p><strong>Numero Telefonico:</strong> $telefono </p>
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
$asunto2 = "Nueva valoracion gratuita";
$body2 = "<html lang='es'>
                    <HEAD>
                            <TITLE>Valoracion Gratuita Zahia medicina estetica</TITLE>
                     </HEAD>
                        <BODY>
                            <div>
                            <center>
                            <h1>Valoracion Gratuita</h1>
                           
                                <img src='http://www.zahia.com.co/img/zahialogo.png'/>
                                    <p>Hola gracias por reservar una valoración gratuita</p>
                                    <p>En menos de 24 horas te asignaremos una cita y nos</p>
                                    <p>Comunicaremos contigo, gracias por confiar en nosotros.</p>
                                    <p>Estos son tus datos:</p>
                                    <p><strong>Valoracion a nombre de:</strong> $nombre </p>
                                    <p><strong>Email:</strong> $email</p>
                                    <p><strong>Numero Telefonico:</strong> $telefono </p>
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

<?php

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$mensaje=$_POST['mensaje'];
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/PHPMailer/src/Exception.php';
require 'mail/PHPMailer/src/PHPMailer.php';
require 'mail/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor
    $mail->isSendmail();
    $mail->Host = 'smtp.etesech.gatuno.servidores.vip';
    $mail->SMTPAuth = false;
   // $mail->Username = 'angelj.vazquez1@gmail.com';
   // $mail->Password = 'eivvdidkvmnhhyum';
    //$mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('angelj.vazquez1@gmail.com', 'Angel');
    $mail->addAddress('jair.vazquez.bernal@gmail.com', 'Angel2');
    $mail->Subject = 'Contacto';
    $mail->Body = $mensaje;

    if($mail->send()){
        echo 'Se envio correctamente';
    }
} catch (Exception $e) {
    echo 'Error al enviar el correo: ', $mail->ErrorInfo;
    echo $e;
}
*/

$nombre = "Angel";
$correo = "jair.vazquez.bernal@gmail.com";
$mensaje = "Necesito ayuda con una compra";

// Configurar los datos para la solicitud POST a Formspree
$data = array(
    'name' => $nombre,
    'email' => $correo,
    'message' => $mensaje
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents('https://formspree.io/f/xvojeprz', false, $context);

/*
try {
    $para = 'angelj.vazquez1@gmail.com';
    $asunto = 'Prueba de correo desde XAMPP';

    $mensaje = 'Hola, este es un correo de prueba enviado desde XAMPP.';

// Cabeceras adicionales
    $cabeceras = 'From: jair.vazquez.bernal@gmail.com' . "\r\n" .
        'Reply-To: jair.vazquez.bernal@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

// Enviar el correo
    mail($para, $asunto, $mensaje, $cabeceras);
} catch (Exception $e) {
    echo 'Error al enviar el correo: ', $mail->ErrorInfo;
}
*/
    header("Location: contacto_formulario.php");
?>
<?php

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$mensaje=$_POST['mensaje'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/PHPMailer/src/Exception.php';
require 'mail/PHPMailer/src/PHPMailer.php';
require 'mail/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'angelj.vazquez1@gmail.com';
    $mail->Password = 'eivvdidkvmnhhyum';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('angelj.vazquez1@gmail.com', 'Angel');
    $mail->addAddress('jair.vazquez.bernal@gmail.com', 'Angel2');
    $mail->Subject = 'Contacto';
    $mail->Body = $mensaje;

    $mail->send();
    echo 'Correo enviado con éxito';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ', $mail->ErrorInfo;
}

    header("Location: contacto_formulario.php");
?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 

function cumpleRequisitos($postData) {
    return !empty($postData['nombre']) && !empty($postData['telefono']) && !empty($postData['asunto']) && !empty($postData['mensaje']) && !empty($postData['email']);
}

if ($_POST && cumpleRequisitos($_POST)) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $para = "juanmaelpanadero33@gmail.com";
    $asunto = "Consulta de {$nombre} - {$asunto} ";

    $contenido = "{$nombre} ha realizado una consulta via web:
    Telefono: {$telefono}
    Email: {$email}
    Mensaje: {$mensaje}";

    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mail.prueba.juan@gmail.com'; 
        $mail->Password = '$-vM5F:s'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        $mail->setFrom('mail.prueba.juan@gmail.com', 'Productora Uno'); 
        $mail->addAddress($para);

        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $contenido;

        $mail->send();
        echo "El correo ha sido enviado correctamente.";
    } catch (Exception $e) {
        echo "Hubo un problema al enviar el correo. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Datos incompletos o inválidos.";
}

<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function cumpleRequisitos($postData)
{
    return !empty($postData['nombre']) && !empty($postData['telefono']) && !empty($postData['asunto']) && !empty($postData['mensaje']) && !empty($postData['email']);
}

if ($_POST['nombre'] && cumpleRequisitos($_POST)) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $para = "alecio@productorauno.com.ar";
    $asunto = "Consulta de {$nombre} - {$asunto} ";

    $contenido = "{$nombre} ha realizado una consulta via web:<br>
    Telefono: {$telefono} <br>
    Email: {$email} <br>
    Mensaje: {$mensaje}";

    $mail = new PHPMailer(true);
    try {

        $mail->isSMTP();
        $mail->Host = 'c1952327.ferozo.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Username = 'alecio@productorauno.com.ar';
        $mail->Password = 'vTE*Dgu7tG';
        $mail->Port = 465;
        $mail->setFrom($email);
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

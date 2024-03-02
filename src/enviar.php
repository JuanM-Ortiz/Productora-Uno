<?php

if ($_POST && cumpleRequisitos($_POST)) {
  $para = "destinatario@example.com";
  $asunto = "Consulta de {$nombre}";
  $mensaje = "{$nombre} ha realizado una consulta via web:
  Celular: {$celular}
  Link de referencia: {$link}
  Email: {$email}
  Mensaje: {$_POST['mensaje']}";

  // Envía el correo
  $mail_enviado = mail($para, $asunto, $mensaje);

  // Verifica si el correo fue enviado exitosamente
  if ($mail_enviado) {
    echo "El correo ha sido enviado correctamente.";
  } else {
    echo "Hubo un problema al enviar el correo.";
  }
}


function cumpleRequisitos($postData)
{
  return $postData['nombre'] && $postData['celuar'] && $postData['link'] && $postData['mensaje'] && $postData['email'];
}

<?php
$to = "rehabilitatuser2002@gmail.com";
$subject = "Prueba de envío de correo desde XAMPP";
$message = "Este es un correo de prueba.";
$headers = "From: lucas.barrera.6006@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Correo enviado exitosamente.";
} else {
    echo "Error al enviar el correo.";
}
?>

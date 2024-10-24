<?php

$conn = new mysqli("localhost", "root", "", "usuarios");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$email = $_POST['email'];

// Verifica si el correo electrónico existe en la base de datos
$sql = "SELECT * FROM registros WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si el correo existe, genera un token y una fecha de expiración
    $token = bin2hex(random_bytes(50)); // Crea un token único
    $token_expiration = date("Y-m-d H:i:s", strtotime('+1 hour')); // 1 hora de validez
    $url = "http://tu-sitio.com/restablecer_contrasena.php?token=$token";

    // Cierra el primer statement antes de reutilizarlo
    $stmt->close();

    // Guarda el token y la fecha de expiración en la base de datos
    $sql = "UPDATE registros SET token = ?, token_expiration = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $token, $token_expiration, $email);
    $stmt->execute();

    // Enviar el correo (esto es un ejemplo, necesitarías configurar un servidor de correos)
    $asunto = "Recuperar contraseña";
    $mensaje = "Haz clic en el siguiente enlace para restablecer tu contraseña: $url\nEste enlace es válido por 1 hora.";
    $headers = "From: no-reply@tu-sitio.com";

    if (mail($email, $asunto, $mensaje, $headers)) {
        echo "Se ha enviado un correo con instrucciones para recuperar tu contraseña.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }

} else {
    echo "No se encontró una cuenta asociada a este correo.";
}

$conn->close();
?>

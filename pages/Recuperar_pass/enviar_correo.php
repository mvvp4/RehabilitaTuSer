<?php
$conexion = new mysqli("localhost", "root", "", "usuarios");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$email = $_POST['email'];
$sql = "SELECT * FROM registros WHERE email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $token = bin2hex(random_bytes(50));
    $token_expiration = date("Y-m-d H:i:s", strtotime('+1 hour'));
    $url = "http://localhost/RehabilitaTuSer/pages/Renovar_pass/renovar_pass.php?token=$token";

    $sql = "UPDATE registros SET token = ?, token_expiration = ? WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $token, $token_expiration, $email);
    $stmt->execute();

    // Cargar el contenido del correo desde el archivo HTML
    $mensaje = file_get_contents('../FAQ/Emails/msj_correo.html');
    $mensaje = str_replace('{URL_RECUPERAR}', $url, $mensaje);

    $asunto = "Recuperar contraseña - RehabilitaTuSer";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: no-reply@tu-sitio.com\r\n";

    if (mail($email, $asunto, $mensaje, $headers)) {
        echo "Se ha enviado un correo con instrucciones para recuperar tu contraseña.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
} else {
    echo "No se encontró una cuenta asociada a este correo.";
}

$conexion->close();
?>
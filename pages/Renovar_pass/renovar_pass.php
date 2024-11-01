<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "usuarios");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "SELECT * FROM registros WHERE token = ? AND token_expiration > NOW()";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nueva_password = $_POST['password'];
            $nueva_password2 = $_POST['password2'];

            if ($nueva_password === $nueva_password2) {
                $sql = "UPDATE registros SET password = ?, token = NULL, token_expiration = NULL WHERE token = ?";
                $stmt = $conexion->prepare($sql);
                $hashed_password = password_hash($nueva_password, PASSWORD_DEFAULT);
                $stmt->bind_param("ss", $hashed_password, $token);
                
                if ($stmt->execute()) {
                    echo "La contraseña se ha cambiado con éxito. Puedes iniciar sesión ahora.";
                    header("Location: ../Login/login2.html");
                } else {
                    echo "Hubo un error al cambiar la contraseña.";
                }
            } else {
                echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
            }
        }
    } else {
        echo "El token es inválido o ha expirado.";
    }
} else {
    echo "No se ha proporcionado ningún token.";
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renovar Contraseña - Centro de Rehabilitación</title>
    <link rel="stylesheet" href="styles_renov.css">
</head>
<body>
    <div class="logo-container">
        <img src="../../Resources/icons/logo/13.png" alt="Logo de la empresa">
    </div>

    <div class="info-container">
        <h2>Renova tu Contraseña</h2>
        <p>
            Es importante mantener la seguridad de tu cuenta actualizada. Si sientes que tu contraseña puede haber sido comprometida o simplemente deseas mejorar la seguridad, te recomendamos que la renueves periódicamente.
            Recuerda elegir una contraseña que sea única y segura, combinando letras, números y caracteres especiales.
        </p>
    </div>

    <div class="recup-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqf0Wx4wmsKfLYsiLdBx6H4D8bwQBurWhx5g&s" alt="Usuario">
        <h2>Renovar Contraseña</h2>
        <form action="" method="post">
            <div class="password-container">
                <input type="password" name="password" placeholder="Introduce tu nueva contraseña" required id="password">
            </div>
            <div class="password-container">
                <input type="password" name="password2" placeholder="Confirmar la contraseña" required id="password2">
            </div>
            <button type="submit">Cambiar contraseña</button>
            <a href="../Login/login2.html">¿Recordaste tu contraseña? Inicia sesión aquí</a>
        </form>
    </div>
</body>
</html>

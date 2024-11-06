<?php
$conexion = new mysqli("localhost", "root", "", "usuarios");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if (isset($_POST['token']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password === $password2) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE registros SET password = ?, token = NULL, token_expiration = NULL WHERE token = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $token);
        
        if ($stmt->execute()) {
            echo "Contraseña cambiada exitosamente.";
        } else {
            echo "Error al cambiar la contraseña.";
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
} else {
    echo "Datos incompletos.";
}

$conexion->close();
?>

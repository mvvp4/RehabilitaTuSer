<?php

// Habilitar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!empty($_POST["submit"])) {
    if (empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        echo '<div class="alert alert-danger">LOS CAMPOS ESTÁN VACÍOS</div>';
    } else {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $clave = $_POST["password"];

        // Usar una consulta preparada para evitar inyecciones SQL
        $stmt = $con->prepare("SELECT * FROM registros WHERE nombre = ? AND email = ?");
        $stmt->bind_param("ss", $nombre, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($datos = $result->fetch_object()) {
            if (password_verify($clave, $datos->password)) {
                echo "Login exitoso";
                header("Location: /Perfil/perfil.html");
                exit(); // Asegúrate de detener el script
            } else {
                echo '<div class="alert alert-danger">ACCESO DENEGADO: Contraseña incorrecta</div>';
            }
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO: Usuario no encontrado</div>';
        }
    }
}
?>

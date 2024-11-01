<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexion_bd.php';
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}
if (!empty($_POST["submit"])) {
    echo "Formulario enviado.<br>"; 
    if (empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        echo '<div class="alert alert-danger">LOS CAMPOS ESTÁN VACÍOS</div>';
    } else {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $clave = $_POST["password"];

        echo "Datos recibidos: Nombre - $nombre, Email - $email.<br>";
        $stmt = $con->prepare("SELECT * FROM registros WHERE nombre = ? AND email = ?");
        $stmt->bind_param("ss", $nombre, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "Consulta ejecutada. Número de filas: " . $result->num_rows . "<br>";
        if ($result->num_rows > 0) {
            echo "Usuario encontrado.<br>";
            $datos = $result->fetch_object();
            if (password_verify($clave, $datos->password)) {
                echo "¡Contraseña correcta! Redirigiendo...<br>";
                header("Location:../Perfil/perfil.php");
                exit();
            } else {
                echo '<div class="alert alert-danger">ACCESO DENEGADO: Contraseña incorrecta</div>';
            }
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO: Usuario no encontrado</div>';
        }
    }
}
?>

<?php
session_start();

include 'conexion_bd.php';

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    if (empty($_POST["user"]) || empty($_POST["password"])) {
        echo '<div class="alert alert-danger">LOS CAMPOS ESTÁN VACÍOS</div>';
    } else {
        $email = $_POST["user"];
        $clave = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM clients WHERE user = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result(); 

        if ($result->num_rows > 0) {
            $datos = $result->fetch_object();
            if (password_verify($clave, $datos->password)) {
                $_SESSION['usuario_id'] = $datos->user;
                header("Location: ../Perfil/perfil.php");
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

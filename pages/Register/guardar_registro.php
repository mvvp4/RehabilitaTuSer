<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Activa la visualización de errores de MySQL
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "usuarios");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Captura y sanitiza los datos enviados por el formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $documento = isset($_POST['documento']) ? $_POST['documento'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $genero = isset($_POST['genero']) ? $_POST['genero'] : null;
    $orientacion = isset($_POST['orientacion']) ? $_POST['orientacion'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;

    // Validación de contraseñas
    if ($password !== $confirm_password) {
        die("Error: Las contraseñas no coinciden.");
    }

    // Cifra la contraseña
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Sentencia preparada para insertar los datos
    $stmt = $conn->prepare("INSERT INTO registros (nombre, apellido, email, telefono, documento, direccion, genero, orientacion, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $nombre, $apellido, $email, $telefono, $documento, $direccion, $genero, $orientacion, $password_hashed);

    // Ejecución de la consulta
    if ($stmt->execute()) {
        echo "Registro guardado exitosamente.";
        header("Location: ../Login/login2.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cierra la consulta y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>

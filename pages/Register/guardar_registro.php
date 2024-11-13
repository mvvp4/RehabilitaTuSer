<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $servername = "mysql-157dc9d5-santiagopontin2811-958d.k.aivencloud.com";
    $username = "avnadmin";
    $password = "";
    $dbname = "defaultdb";
    $port = 15658;
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $conn->ssl_set(NULL, NULL, NULL, NULL, NULL);
    
    $user = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : null;
    $name = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : null;
    $dni = isset($_POST['documento']) ? intval($_POST['documento']) : null;
    $genre = isset($_POST['genero']) ? $conn->real_escape_string($_POST['genero']) : null;
    $phone = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : null;
    $address = isset($_POST['direccion']) ? $conn->real_escape_string($_POST['direccion']) : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;

    if ($password !== $confirm_password) {
        die("Error: Las contraseñas no coinciden.");
    }

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO clients (user, password, name, dni, genre, phone, adress) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $user, $password_hashed, $name, $dni, $genre, $phone, $address);

    if ($stmt->execute()) {
        echo "Registro guardado exitosamente.";
        header("Location: ../Login/login2.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>

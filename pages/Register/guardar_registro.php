<?php

$conn = new mysqli("localhost","root", "","usuarios");


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$documento = $_POST['documento'];
$direccion = $_POST['direccion'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


if ($password !== $confirm_password) {
    die("Error: Las contraseñas no coinciden.");
}

$password_hashed = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO registros (nombre, apellido, email, telefono, documento, direccion, password)
        VALUES ('$nombre', '$apellido', '$email', '$telefono', '$documento', '$direccion', '$password_hashed')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente.";
    header("Location: ../Login/login2.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php

include 'db_connection.php'; 

$usuario_id = 13; 

$sql = "SELECT * FROM registros WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $usuario_id);
session_start();

if (!isset($_SESSION['usuario_id'])) {
    die("Acceso no autorizado. No estás logueado.");
}

$usuario_id = $_SESSION['usuario_id'];

include 'db_connection.php';

$sql = "SELECT user, name, dni, genre, phone, adress, password FROM clients WHERE user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    die("No se encontraron datos para este usuario.");
}

$stmt->close();
$conn->close();
?>

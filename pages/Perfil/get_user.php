<?php

include 'db_connection.php'; 


$usuario_id = 13; 


$sql = "SELECT * FROM registros WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

$stmt->close();
$con->close();
?>

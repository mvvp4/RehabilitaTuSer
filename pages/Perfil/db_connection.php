<?php
// db_connection.php
$con = new mysqli("localhost", "root", "", "usuarios");
$con->set_charset("utf8");

// Verificar conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}
?>

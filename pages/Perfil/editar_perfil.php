<?php
include 'get_user.php'; 
include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($usuario)) {
        if (empty($password)) {
            $sql = "UPDATE clients SET dni = ?, phone = ?, user = ? WHERE user = ?";
            $stmt = $conn->prepare($sql);
    
            if ($stmt === false) {
                die("Error en la preparación de la consulta: " . $conn->error);
            }

            $stmt->bind_param("ssss", $documento, $telefono, $email, $usuario['user']);
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE clients SET dni = ?, phone = ?, user = ?, password = ? WHERE user = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Error en la preparación de la consulta: " . $conn->error);
            }

            $stmt->bind_param("sssss", $documento, $telefono, $email, $hashed_password, $usuario['user']);
        }

        if ($stmt->execute()) {
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error al actualizar los datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "No se encontraron datos del usuario.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="styles_perfil.css">
    <link rel="stylesheet" href="styles_editar.css">
</head>
<body>
    <div class="header">
        <img src="../../Resources/icons/logo/13.png" alt="Logo de la empresa" class="logo">
    </div>

    <div class="profile-container">
        <h1>Editar Perfil</h1>
        <form action="" method="POST">
            <label for="documento">Documento:</label>
            <input type="text" id="documento" name="documento" value="<?php echo isset($usuario['dni']) ? htmlspecialchars($usuario['dni']) : ''; ?>" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo isset($usuario['phone']) ? htmlspecialchars($usuario['phone']) : ''; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($usuario['user']) ? htmlspecialchars($usuario['user']) : ''; ?>" required>

            <label for="password">Nueva Contraseña:</label>
            <input type="password" id="password" name="password">

            <div class="form-buttons">
                <button type="submit" class="btn save-btn">Guardar Cambios</button>
                <a href="perfil.php" class="btn back-btn">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>

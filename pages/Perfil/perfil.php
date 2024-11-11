<?php 
session_start(); 
    include 'get_user.php';
    include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="styles_perfil.css">
</head>
<body>
    <div class="header">
        <img src="../../Resources/icons/logo/13.png" alt="Logo de la empresa" class="logo">
    </div>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-pic-container">
                <?php
                $genero = htmlspecialchars($usuario['genre']); 
                if ($genero === 'Mujer') {
                    $profilePic = '../../Resources/icons/mujer.png';
                } else if ($genero === 'Hombre') {
                    $profilePic = '../../Resources/icons/hombre.png';
                } else {
                    $profilePic = '../../Resources/icons/no_decirl.png';
                }
                ?>
                <img src="<?php echo $profilePic; ?>" alt="Foto de perfil" class="profile-pic">
            </div>
            <h1>¡Bienvenido <?php echo htmlspecialchars($usuario['name']); ?>!</h1>
        </div>
        <div class="profile-buttons">
            <button class="btn edit-btn">Editar Perfil</button>
            <button class="btn logout-btn">Cerrar Sesión</button>
            <button class="btn edit-btn" onclick="window.location.href='editar_perfil.php'">Editar Perfil</button>
            <form action="logout.php" method="POST" style="display:inline;">
                <button type="submit" class="btn logout-btn">Cerrar Sesión</button>
            </form>
        </div>

        <div class="profile-info">
            <table>
                <tr>
                    <th>Documento</th>
                    <td><?php echo htmlspecialchars($usuario['dni']); ?></td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td><?php echo htmlspecialchars($usuario['telefono']); ?></td>                    
               </tr>
                    <td><?php echo htmlspecialchars($usuario['phone']); ?></td> 
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($usuario['user']); ?></td>
                </tr>
                <tr>
                    <th>Género</th>
                    <td><?php echo htmlspecialchars($usuario['genre']); ?></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><?php echo str_repeat('*', strlen($usuario['password'])); ?></td> 
                </tr>
            </table>
        </div>

        <div class="calendar-container">
            <h2>Calendario Semanal</h2>
            <div class="week-calendar">
                <div class="day">Lunes</div>
                <div class="day">Martes</div>
                <div class="day">Miércoles</div>
                <div class="day">Jueves</div>
                <div class="day">Viernes</div>
                <div class="day">Sábado</div>
                <div class="day">Domingo</div>
            </div>
        </div>

        <div class="services-container">
            <h2>Tus Servicios</h2>
            <br>
            <table>
                <tr>
                    <th>Servicio</th>
                    <th>Descripción</th>
                </tr>
                <tr>
                    <td>Fisioterapia</td>
                    <td>Sesiones de rehabilitación física.</td>
                </tr>
                <tr>
                    <td>Rehabilitación ocupacional</td>
                    <td>Actividades para mejorar habilidades diarias.</td>
                </tr>
                <tr>
                    <td>Terapia del habla</td>
                    <td>Tratamiento para mejorar la comunicación.</td>
                </tr>
                <tr>
                    <td>Apoyo psicológico</td>
                    <td>Asesoramiento y terapia emocional.</td>
                </tr>
                <tr>
                    <td>Nutrición</td>
                    <td>Planificación de dietas saludables.</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<meta charset="UTF-8">
    <?php
        $con = mysqli_connect("localhost", "root", "", "escuela3") or die ("Error!");
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido</title>
    </head>
    <body>
        <h3><center>Clientes</center></h5>
        <br>
        <br>
        <form method="post" action="index.php">
            <p>Ingrese un nombre</p>
            <input type="text" name="nombre" placeholder="Escriba su nombre">
            <br>
            <p>Ingrese su DNI</p>
            <input type="text" name="dni" placeholder="Escriba su DNI">
            <br>
            <p>Ingrese su direccion</p>
            <input type="text" name="direccion" placeholder="Escriba su direccion">
            <br>
            <p>Ingrese su telefono</p>
            <input type="text" name="telefono" placeholder="Escriba su telefono">
            <input type="submit" name="insert" value="INSERTAR DATOS">
        </form>

    <?php
        if(isset($_POST["insert"])) {
            $nombre = $_POST["nombre"];
            $dni = $_POST["dni"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            
            
            $insertar = "INSERT INTO clientes (nombre,dni,direccion,telefono) VALUES ('$nombre','$dni','$direccion','$telefono')";
            $ejecutar = mysqli_query($con, $insertar);

            if($ejecutar) {
                echo "<h3>Insertado Correctamente</h3>";
            }
        }
    ?>
    <br>
    <center><table width="500" border="2" style="background-color: #F9F9F9;">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr></center>

        <?php
            $consulta = "SELECT * FROM clientes";
            $ejecutar = mysqli_query($con, $consulta);
            $i = 0;

            while ($fila = mysqli_fetch_array($ejecutar)) {
                $id = $fila['id_cliente'];
                $nombre = $fila['nombre'];
                $dni = $fila['dni'];
                $direccion = $fila['direccion'];
                $telefono = $fila['telefono'];

                $i++;
            }
        ?>
        <tr align="center">
            <td><?php echo $id; ?></td>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $dni; ?></td>
            <td><?php echo $direccion; ?></td>
            <td><?php echo $telefono; ?></td>
            <td><a href="index.php?editar=<?php echo $id ?>">Editar</a></td>
            <td><a href="index.php?borrar=<?php echo $id ?>">Borrar</a></td>
        </tr>
        </table>

        <?php
            if(isset($_GET['editar'])) {
                include("editar.php");
            }
        ?>

        <?php
            if(isset($_GET['borrar'])) {
                $borrar_id = $_GET['borrar'];
                $borrar = "DELETE FROM clientes WHERE id_cliente = '$borrar_id'";
                $ejecutar = mysqli_query($con, $borrar);

                if($ejecutar){
                    echo "<script>alert('El cliente ha sido borrado!')</script>";
                    echo "<script>windoows.open('index.php','_self')</script>";
                }
            }
        ?>
        <br>
        <br>
    </body>
</html>



<?php 
    if(isset($_GET['editar'])) {
        $editar_id = $_GET['editar'];
        $consulta = "SELECT * FROM clientes WHERE id_cliente = '$editar_id'";
        $ejecutar = mysqli_query($con, $consulta);

        $fila = mysqli_fetch_array($ejecutar);

        $nombre = $fila['nombre'];
        $dni = $fila['dni'];
        $direccion = $fila['direccion'];
        $telefono = $fila['telefono'];
    }
?>
<br>
<form method="post" action="">
    <input type="text" name="nombre" placeholder="Escriba su nuevo nombre" value="<?php echo $nombre; ?>"><br>
    <br>
    <input type="text" name="dni" placeholder="Escriba su nuevo DNI" value="<?php echo $dni; ?>"><br>
    <br>    
    <input type="text" name="direccion" placeholder="Escriba su nueva direccion" value="<?php echo $direccion; ?>"><br>
    <br>
    <input type="text" name="telefono" placeholder="Escriba su nuevo telefono" value="<?php echo $telefono; ?>"><br>
    <input type="submit" name="actualizar" value="ACTUALIZAR DATOS">
</form>
    
<?php
    if(isset($_POST['actualizar'])){
        $actualizar_nombre = $_POST['nombre'];
        $actualizar_dni = $_POST['dni'];
        $actualizar_direccion = $_POST['direccion'];
        $actualizar_telefono = $_POST['telefono'];

        $actualizar = "UPDATE clientes SET nombre = '$actualizar_nombre', dni = '$actualizar_dni', direccion = '$actualizar_direccion', telefono = '$actualizar_telefono'
            WHERE id_cliente = '$editar_id'";
        
        $ejecutar = mysqli_query($con, $actualizar);

        if($ejecutar){
            echo "<script>alert('Datos Actualizados!')</script>";
            echo "<script>windoows.open('index.php','_self')</script>";
        }
    }
?>

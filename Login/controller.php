<?php

    if(!empty($_POST["submit"])){
        if (empty($_POST["nombre"]) and empty($_POST["email"] and empty($_POST["password"]))) {
            echo '<div class="alert alert-danger"> LOS CAMPOS ESTAN VACIOS </div>';
        } else {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $clave = $_POST["password"];

            $sql = $con ->query("select * from registros where nombre = $nombre and email = $email and password = $clave");
            if ($datos = $sql->fetch_object()) {
                header("location:../Principal/principal.html");
            } else {
                echo '<div class="alert alert-danger"> ACCESO DENEGADO </div>';
            }        
        }
    }
?>
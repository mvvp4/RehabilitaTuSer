<?php
    if(isset($_POST['submit'])) {
        if(empty($nombre)) {
            echo "AGREGA TU NOMBRE!!!";
        } /*else {
            if(strlen($nombre>20)){
                echo "NOMBRE MUY LARGO!!!";
            } else {
                if(numeric($nombre)){
                    echo "INGRESE LETRAS!!!";
                }
            }
        }
        if(empty($dni)) {
            echo "AGREGA TU DNI!!!";
        }else{
            if(strlen($dni>5)){
                echo "DNI MUY CORTO!!!";
            }else{
                if(!is_numeric($dni)){
                    echo "INGRESE NUMEROS!!!";
                }
            }
        }
        if(empty($direccion)) {
            echo "AGREGA TU DIRECCION!!!";
        }
        
        if(empty($telefono)) {
            echo "AGREGA TU TELEFONO!!!";
        }else{
            if(strlen($telefono>5)){
                echo "TELEFONO MUY CORTO!!!";
            }else{
                if(numeric($telefono)){
                    echo "INGRESE NUMEROS!!!";
                }else{
                    if(strlen($telefono>20)){
                        echo "TELEFONO MUY LARGO!!!";
                    }
                }
            }
        }*/       
    }
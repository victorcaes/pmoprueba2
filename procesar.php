<?php
    if(!empty($_POST['usuario']) && !empty($_POST['password'])){
        $usu=$_POST['usuario'];
        $pas=$_POST['password'];
        if($usu=="admin" && $pas=="admin123"){
            header("Location: index.html");
        }else{
            echo "usuario o contrseña incorrecta";
        }
    }else{
        echo "los datos estan vacios";
    }


?>
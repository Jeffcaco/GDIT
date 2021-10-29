<?php
    session_start();
    if(isset($_SESSION['user'])){
        session_unset();
        session_destroy();
        header("Location:index.php");
    }else{
        header("Location:index.php");
        //die("NO PUEDE ACCEDER A ESTE SITIO.VERIFIQUE SU CONEXION A INTERNET O SI TIENE PRIVILEGIOS DE ACCESO");
    }
?>
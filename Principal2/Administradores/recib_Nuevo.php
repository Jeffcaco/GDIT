<?php
include_once("../../Database/conexion.php");
$nombre      = $_REQUEST['nombre'];
$nick     	 = $_REQUEST['nick'];
$password  	 = $_REQUEST['password'];
$area      	 = $_REQUEST['area'];


$QueryInsert = ("INSERT INTO Usuario(
    nombre_usuario,nick_usuario,password,id_area_usuario
)
VALUES (
    '".$nombre. "',
    '".$nick. "',
    '".$password. "',
    '".$area. "'
)");
$insert = mysqli_query($conexion, $QueryInsert);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='usuarios.php';
    </script>";
?>

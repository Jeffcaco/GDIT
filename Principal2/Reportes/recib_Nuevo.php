<?php
include_once("../../Database/conexion.php");
$nombre      = $_REQUEST['nombre'];
$link      = $_REQUEST['link'];
$password  = $_REQUEST['password'];
$area      = $_REQUEST['area'];


$QueryInsert = ("INSERT INTO Dashboard(
    nombre_dashboard,link_dashboard,password_dashboard,id_area_dashboard
)
VALUES (
    '".$nombre. "',
    '".$link. "',
    '".$password. "',
    '".$area. "'
)");
$insert = mysqli_query($conexion, $QueryInsert);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='reportes.php';
    </script>";
?>

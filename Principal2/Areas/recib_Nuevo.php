<?php
include_once("../../Database/conexion.php");
$nombre = $_REQUEST['nombre'];
$idgerencia = $_REQUEST['area'];


$QueryInsert = ("INSERT INTO subarea(
    nombre,idarea) VALUES (
    '".$nombre."',
    '".$idgerencia."' ) ");
$insert = mysqli_query($conexion, $QueryInsert);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='areas.php';
    </script>";
?>

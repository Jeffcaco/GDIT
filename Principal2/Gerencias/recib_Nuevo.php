<?php
include_once("../../Database/conexion.php");
$nombre = $_REQUEST['nombre'];


$QueryInsert = ("INSERT INTO area(
    nombre
)
VALUES (
    '".$nombre. "'
)");
$insert = mysqli_query($conexion, $QueryInsert);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='gerencias.php';
    </script>";
?>

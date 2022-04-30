<?php
include_once("../../Database/conexion.php");
$nombre      = $_REQUEST['nombre'];
$link      = $_REQUEST['link'];

$fecha=date("Y-m-d");

$QueryInsert = ("INSERT INTO Dashboard(
    nombre_dashboard, fecha, link_dashboard
)
VALUES (
    '".$nombre. "',
    '".$fecha."',
    '".$link. "'
)");
$insert = mysqli_query($conexion, $QueryInsert);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='reportes.php';
    </script>";
?>

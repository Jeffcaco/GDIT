<?php
include_once("../../Database/conexion.php");
$idArea = $_GET['id'];

$DeleteArea = ("DELETE FROM subarea WHERE idsubarea= '".$idArea."' ");
mysqli_query($conexion, $DeleteArea);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='areas.php';
    </script>";
?>
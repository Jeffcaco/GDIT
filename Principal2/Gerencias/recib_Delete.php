<?php
include_once("../../Database/conexion.php");
$idGerencia = $_GET['id'];

$DeleteGerencias = ("DELETE FROM area WHERE idarea= '".$idGerencia."' ");
mysqli_query($conexion, $DeleteGerencias);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='gerencias.php';
    </script>";
?>
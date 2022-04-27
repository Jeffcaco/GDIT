<?php
include_once("../../Database/conexion.php");
$idRegistros = $_GET['id'];

$DeleteRegistro = ("DELETE FROM Dashboard WHERE id_dashboard= '".$idRegistros."' ");
mysqli_query($conexion, $DeleteRegistro);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='reportes.php';
    </script>";
?>
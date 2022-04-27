<?php
include_once("../../Database/conexion.php");
$idRegistros = $_GET['id'];

$DeleteRegistro = ("DELETE FROM Usuario WHERE id_usuario= '".$idRegistros."' ");
mysqli_query($conexion, $DeleteRegistro);
mysqli_close($conexion);
echo "<script type='text/javascript'>
        window.location='usuarios.php';
    </script>";
?>
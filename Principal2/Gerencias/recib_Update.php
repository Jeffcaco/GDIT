
<?php
include_once("../../Database/conexion.php");
$idGerencia = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre'];

$update = ("UPDATE area 
	SET 
	nombre  ='" .$nombre. "'
			WHERE idarea='" .$idGerencia. "'
	");
$result_update = mysqli_query($conexion, $update);
mysqli_close($conexion);

echo "<script type='text/javascript'>
        window.location='gerencias.php';
    </script>";

?>

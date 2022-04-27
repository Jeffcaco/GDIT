
<?php
include_once("../../Database/conexion.php");
$idArea = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];

$update = ("UPDATE subarea 
	SET 
	nombre  ='" .$nombre. "'
			WHERE idsubarea='" .$idArea. "'
	");
$result_update = mysqli_query($conexion, $update);
mysqli_close($conexion);

echo "<script type='text/javascript'>
        window.location='areas.php';
    </script>";

?>

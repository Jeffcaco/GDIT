
<?php
include_once("../../Database/conexion.php");

$idReporte = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre'];
$link      	 = $_REQUEST['link'];

$update = ("UPDATE Dashboard 
	SET 
	nombre_dashboard  ='" .$nombre. "',
	link_dashboard  ='" .$link. "'
			WHERE id_dashboard='" .$idReporte. "'
	");
$result_update = mysqli_query($conexion, $update);
mysqli_close($conexion);

echo "<script type='text/javascript'>
        window.location='reportes.php';
    </script>";	

?>

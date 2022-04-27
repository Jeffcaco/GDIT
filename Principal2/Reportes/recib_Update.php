
<?php
include_once("../../Database/conexion.php");

$idRegistros = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre'];
$link      	 = $_REQUEST['link'];
$password  	 = $_REQUEST['password'];
//$area      	 = $_REQUEST['area'];

$update = ("UPDATE Dashboard 
	SET 
	nombre_dashboard  ='" .$nombre. "',
	link_dashboard  ='" .$link. "',
	password_dashboard  ='" .$password. "'
	
			WHERE id_dashboard='" .$idRegistros. "'
	");
$result_update = mysqli_query($conexion, $update);
mysqli_close($conexion);

echo "<script type='text/javascript'>
        window.location='reportes.php';
    </script>";	

?>

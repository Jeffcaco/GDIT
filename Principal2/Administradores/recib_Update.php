
<?php
include_once("../../Database/conexion.php");
$idRegistros = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre'];
$nick     	 = $_REQUEST['nick'];
$password  	 = $_REQUEST['password'];
//$area      	 = $_REQUEST['area'];

$update = ("UPDATE Usuario 
	SET 
	nombre_usuario ='" .$nombre. "',
	nick_usuario  ='" .$nick. "',
	password  ='" .$password. "'

			WHERE id_usuario='" .$idRegistros. "'
	");
$result_update = mysqli_query($conexion, $update);
mysqli_close($conexion);

echo "<script type='text/javascript'>
        window.location='usuarios.php';
    </script>";

?>

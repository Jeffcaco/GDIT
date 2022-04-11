<?php
// Notificar solamente errores de ejecución
//error_reporting(E_ERROR | E_PARSE);
try{
            $conexion=mysqli_connect("y3nzwdgnu697.us-east-2.psdb.cloud","iq5gwpmys7pt", "pscale_pw_mtsXueFxTU3MH0XvnzlPxGXrWqkJ8WP2BX34KwhfE44", "gdit-logistica-organizacional");
            if (!$conexion) {
                echo "Error de conexion: " . mysqli_connect_error();
                echo "NO TE PREOCUPES,INTENTA VOLVER A CARGAR LA PAGINA.EL SERVIDOR DE BASE DE DATOS PUEDE ESTAR OCUPADO";
                die();
            }else{
                //die("Conexion exitosa al servidor AWS");
            }
}catch(Exception $e){
    die("La conexion a una base de datos inexistente ha sido realizada");
}

?>
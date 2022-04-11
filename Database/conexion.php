<?php
// Notificar solamente errores de ejecución
//error_reporting(E_ERROR | E_PARSE);
try{
            $conexion=mysqli_connect("y3nzwdgnu697.us-east-2.psdb.cloud","tz8sisq7nrop", "pscale_pw_olj_yt6ekg-1UUsW_MfwdtJZ0mlTTZzMlAHai_OYJ6g", "gdit-logistica-organizacional");
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
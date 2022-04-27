<?php
     //recoger sesiones activas
     error_reporting(0);
     session_start();
     if(isset($_SESSION['user'])){
         header("Location:../Principal/");
     }else{
            //SI NO EXISTE. VERIFICAR SI SE HIZO UN POST
            if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['tipo'])){
              session_start();
                $user = $_POST['user'];
                $password = $_POST['password'];
                $tipo = $_POST['tipo'];
                $query = "SELECT * FROM administrador WHERE correo = '$user' AND password = '$password' AND tipo = '$tipo'";
                //die($query);
                include_once("../Database/conexion.php");
                $result = mysqli_query($conexion, $query);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result);
                    $_SESSION['user'] = $row['correo'];
                    $_SESSION['contra'] = $row['password'];
                    $_SESSION['tipo'] = $row['tipo'];
                    //cerrar la conexion a la base de datos a la vez que se cierra el script
                    mysqli_close($conexion);
                    if($tipo=="admi"){
                        header("Location:../Principal2/");
                    }else{
                        header("Location:../Principal/");
                    }
                    
                }else{
   
                  echo '
                  <script>
                      alert("Verifique sus datos y vuelva a intentar");
                      window.location = "./";
                  </script>
                ';
                die();
                }
            }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <!--************************************************************
     *   Developer                                                 *
     *   @Castillo Cornejo, Jeffrey Bryan                          *
    *************************************************************-->
    <title>GDIT | Gerencia Logística</title>
    <!-- Required meta tags -->
    <script src="https://kit.fontawesome.com/31127b7562.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="login-form-6.css">
    <link rel="icon" type="image" href="../gdit.jfif">
    <meta charset="utf-8">
    <!--Bootstrap-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://infiniteiotdevices.com/images/logo.png" rel="icon" sizes="16x16" type="image/gif" />

    <!--Bootstrap-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<div class="form">
		<form action="index.php" method="post" >
			<h2>INICIAR SESION</h2>
			<div class="input-box">
				<i class="fa fa-user"></i>
				<input type="text" name="user" placeholder="Correo" required="true">
			</div>
			<div class="input-box">
				<i class="fa fa-lock"></i>
				<input type="password" name="password" placeholder="Password" required="true">
			</div>
			<div class="form-group">
                
                <select class="form-control" name="tipo" required="true">
                    <option value="">-- Seleccionar tipo --</option>
                    <option value="admi">Administrador</option>
                    <option value="usu">Usuario</option> 
                </select> 
            </div>
            <div class="input-box" style="text-align: center;">
				<input type="submit" name="" value="INGRESAR">
			</div>
			<hr>
            <p style="text-align: center;">© Todos los derechos reservados 
                <?php
                     echo date("Y");
                ?></p>
            
		</form>
	</div>

</body>

</html>
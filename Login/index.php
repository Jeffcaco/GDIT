<?php
     //recoger sesiones activas
     session_start();
     if(isset($_SESSION['user'])){
         header("Location:../Principal/");
     }else{
            //SI NO EXISTE. VERIFICAR SI SE HIZO UN POST
            if(isset($_POST['user']) && isset($_POST['password'])){
              session_start();
                $user = $_POST['user'];
                $password = $_POST['password'];
                $query = "SELECT * FROM administrador WHERE correo = '$user' AND password = '$password'";
                //die($query);
                include_once("../Database/conexion.php");
                $result = mysqli_query($conexion, $query);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result);
                    $_SESSION['user'] = $row['correo'];
                    $_SESSION['contra'] = $row['password'];
                    //cerrar la conexion a la base de datos a la vez que se cierra el script
                    mysqli_close($conexion);
                    header("Location:../Principal/");
                }else{
   
                  echo '
                  <script>
                      alert("Inicie sesión primero");
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
	<title>GDIT | Logística</title>
  <!--Developers 
        @Castillo Cornejo, Jeffrey Bryan		
        @Mitma Huaccha, Johan Valerio  	-->
    <!-- Required meta tags -->
	<script src="https://kit.fontawesome.com/31127b7562.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
  <link rel="icon" type="image" href="../gdit.jfif">
	<meta charset="utf-8">
  <!--Bootstrap-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
	<style>
		body{
			background-image: url('../gdit.jfif');
			object-fit:cover; 
			background-repeat: no-repeat;
      background-position:center 50%;
		}
	</style>

</head>
<body class="container" style="margin-bottom:0px; padding-bottom:0px;">
	
	<header>
      <div class="b">GDIT - Grupo de difusión e innovación tecnológica</div>
      <div class="a">Logística | Administración de datos</div>
      
	</header>

	<main>
      <div class="titulo">
        INICIAR SESION  
      </div>
      <div class="login">
        <form action="index.php" method="post" style="margin-top:5%;">
          <div class="icono"><i class="fas fa-user-circle fa-6x"></i></div>
          <div>
              <div style="margin-left:10%; margin-bottom:15px;">
                      <label for="user" style="color:white;">Usuario</label>
                      <input type="text" class="form-control" name="user" aria-describedby="emailHelpId" placeholder="Ingrese su correo" required style="width:85%; text-align:center; font-size:18px;">
                                      
              </div>
              
              <div style="margin-left:10%;">
                      <label for="password" style="color:white;">Contraseña</label>
                      <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña" minlength="8" required style="width:85%; text-align:center; font-size:18px;">
              </div>
              <br>
              <div style="text-align:center;">
                  <button type="submit" class="btn btn-dark" style="font-size:20px;">INGRESAR</button>
              </div>
          </div>
        </form>
		</div>
    <!--
    <div class="auxiliar">
      ss<br>ss<br>ss
    </div>
  -->
	</main>

	<footer>
		<div class="pie">
			
      <p>© Todos los derechos reservados 
        <?php
          echo date("Y");
        ?></p>
		</div>
	</footer>
	
</body>
</html>
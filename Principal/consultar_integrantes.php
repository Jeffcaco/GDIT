<?php
     //recoger sesiones activas
     session_start();
     if(!isset($_SESSION['user'])){
         //die("Acceso restringido al sitio");
     }
     header('Content-Type: text/html; charset=UTF-8');
?>
<!doctype html>
<html lang="es">

<head>
    <title>GDIT | Consultar integrantes</title>
    <!--Developers 
        @Castillo Cornejo, Jeffrey Bryan		
        @Mitma Huaccha, Johan Valerio  	-->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="https://i.ibb.co/sPhKV5z/gdit-logo-online.jpg"/>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/31127b7562.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/styles.css">
</head>

<body class="body">
<nav class="navbar  navbar-bark navbar-expand-lg" style="background-color: rgb(18, 110, 130);"> <!-- rgb(18, 110, 130)-->
        <div class="container-fluid">
            <div>
                <img src="https://i.ibb.co/sPhKV5z/gdit-logo-online.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" id="logo" alt="logo de veterinaria"
                    style="width: 60px;height: 60px;">
                <a class="navbar-brand" href="#" style="color: white;">GDIT Logistica | Administración de datos</a>
                <a class="btn" href="index.php" role="button" style=" background-color:rgb(81, 196, 211); color:white;">Volver</a>
                
            </div>

            <a class="btn " href="../Login/cerrar_sesion.php" role="button" style="background-color: rgb(19, 44, 51); color:white">Log Out</a>

        </div>
    </nav>

    <!--<h1 style="text-align: center;">No ves que esta vacio? mongol</h1> -->
    <!--PANEL DE ACTIVIDADES-->
    <div class="container justify-content-center">
    <form action="./consultar_integrantes.php" method="GET">
        <h2 style="text-align: center;">Sistema de consulta de integrantes</h2>
        
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <div class="container">
                    <label for="" class="form-label">Criterio de filtro</label>
                        <br>
                    <select name="criterio" id="criterio" class="form-select">
                        <option value="codAlumno">Codigo estudiante</option>
                        <option value="nombres">Nombre y apellidos</option>
                        <option value="sexo">Sexo</option>
                        <option value="Area">Area</option>
                        <option value="Escuela">Escuela</option>
                        <option value="Estado">Estado</option>
                    </select>
                    </div>
            
                </div>
                <div class="col-sm-4">
                <label for="" class="form-label">Valor de busqueda</label>
                <input type="text" name="valor" id="valor" class="form-control">
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                
                <input type="button" value="Buscar" class="btn btn-success btn-lg">
               
                
            </div>
        
    </form>
    </div>
  <br>
    <div class="container-fluid">
    <table class="table">
   <thead class="table" style="background-color:#D8E3E7">
    <tr>
      <th scope="col">Codigo Alumno</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Edad</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Sexo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Correo</th>
      <th scope="col">Area</th>
      <th scope="col">Escuela</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody class="myTable">
        <?php
            //if(isset($_POST["nombre"])){
       
            include_once("../Database/conexion.php");
                        
            
            $sql = "SELECT I.codAlumno,I.nombres,
                I.apellidos,I.edad,I.fechaNacimiento,
                I.sexo,I.telefono,I.correo
                ,I.estado,A.nombre as Area,
                E.nombre as Escuela
                FROM integrantes AS I
                LEFT JOIN area as A ON I.idarea=A.idarea
                LEFT JOIN Escuela as E ON I.idescuela=E.idEscuela
                ORDER BY I.nombres ASC;";
        
            $result = mysqli_query($conexion, $sql);
            //cuantos reultados hay en la busqueda
            $num_resultados = mysqli_num_rows($result);
            echo "<div class='alert alert-success' role='alert'> $num_resultados Integrantes encontrados.</div>";
            //mostrando informacion de los perros y detalle
            for ($i=0; $i <$num_resultados; $i++) {
            $row = mysqli_fetch_array($result); 
      

            echo "<tr>";
                                //para obtener los credenciales del formulario
                    echo  "<td>".$row['codAlumno']."</td>";
                    echo  "<td>".$row['nombres']."</td>";    
                    echo "<td>".$row['apellidos']."</td>";
                    
                    echo "<td>".$row['edad']."</td>";
                    echo "<td>".$row['fechaNacimiento']."</td>";
                    echo "<td>".$row['sexo']."</td>";
                    echo "<td>".$row['telefono']."</td>";
                    echo "<td>".$row['correo']."</td>";

                    echo "<td>".$row['Area']."</td>";
                    echo "<td>".$row['Escuela']."</td>";
                    echo "<td>";
                    if ($row['estado']=="ACTIVO") {
                        echo "<span class='badge badge-success'>".$row['estado']."</span>";
                    }else{
                        echo "<span class='badge badge-danger'>".$row['estado']."</span>";
                    }
                    
                    echo "</td>";
                   /*
                    echo "<td>";
                    echo '<img class="rounded" src="data:image/jpeg;base64,'.base64_encode( $row['Foto'] ).'" style="height:100px;width:100px";/>';
                    echo "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-primary' role='button' href='../model/consultar_historia.php?dni=".$row['DNI']."'>Consultar</a>";
                    echo "<a class='btn btn-warning m-1' role='button' href='../model/registrar_historia.php?dni=".$row['DNI']."'>Registrar</a>";
                    echo "</td>";
                    */
             echo " </tr>";
            }
        
        ?>
    </tbody>
    </table>


    </div>


     <!--Pie de pagina-->
    <footer class="text-center text-white fixed-bottom" style="background-color: rgb(19, 44, 51); height:7%;">

        <div class="text-center p-3" style="background-color: rgba(5, 1, 1, 0.2);">
            © 2021 Copyright. Propiedad del Area de Administracion de datos | Grupo de Investigacio e innovacion tecnologica GDIT:
            <a class="text-white" href="https://mdbootstrap.com/">GDIT Asociate</a>
        </div>
        <!-- Copyright -->
    </footer>
    
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
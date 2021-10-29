<?php
     //recoger sesiones activas
     session_start();
     if(!isset($_SESSION['user'])){
         //die("Acceso restringido al sitio");
     }
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
                
            </div>

            <a class="btn " href="../Login/index.html" role="button" style="background-color: rgb(19, 44, 51); color:white">Log Out</a>

        </div>
    </nav>

    <!--<h1 style="text-align: center;">No ves que esta vacio? mongol</h1> -->
    <!--PANEL DE ACTIVIDADES-->
    <form action="./FormConsultarPerro.php" method="POST">
        <h2 style="text-align: center;">Sistema de consulta de integrantes</h2>
        <div class="container">
            <label for="" class="form-label">Ingresar Nombre a buscar</label>
            <input type="text" name="nombre" id="">
            <br>
            <Input type="submit" value="Buscar" class="btn btn-success">
            <input type="reset" value="Limpiar" class="btn btn-danger">
        </div>

    </form>
  <br>
    <div class="container-fluid">
    <table class="table">
   <thead class="table" style="background-color:#D8E3E7">
    <tr>
      <th scope="col">DNI</th>
      <th scope="col">Nombre</th>
      <th scope="col">Raza</th>
      <th scope="col">Genero</th>
      <th scope="col">Fecha de nacimiento</th>
      <th scope="col">Foto</th>
      <th scope="col">Historia Clinica</th>

    </tr>
  </thead>
  <tbody class="myTable">
        <?php
            if(isset($_POST["nombre"])){
       
            include_once("../model/db.php");
                        //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
            //capturando datos
            $v2 = $_POST['nombre'];
            //conuslta SQL
            $sql = "select * from Perro where Nombre like '%".$v2."%'";
            $result = mysqli_query($conexion, $sql);
            //cuantos reultados hay en la busqueda
            $num_resultados = mysqli_num_rows($result);
            echo "<p>Número de perros encontrados: ".$num_resultados."</p>";
            //mostrando informacion de los perros y detalle
            for ($i=0; $i <$num_resultados; $i++) {
            $row = mysqli_fetch_array($result); 
      

            echo "<tr>";
                                //para obtener los credenciales del formulario
                    echo  "<td>".$row['DNI']."</td>";
                    echo  "<td>".$row['Nombre']."</td>";    
                    echo "<td>".$row['Raza']."</td>";
                    
                    if($row['Genero']==1) $sexo="Macho";
                    else $sexo="Hembra";
                    echo "<td>".$sexo."</td>";
                    if($row["FechaNacimiento"]==NULL) $nac="No especificado";
                    else $nac=$row["FechaNacimiento"];
                    echo "<td>".$nac."</td>";
                   
                    echo "<td>";
                    echo '<img class="rounded" src="data:image/jpeg;base64,'.base64_encode( $row['Foto'] ).'" style="height:100px;width:100px";/>';
                    echo "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-primary' role='button' href='../model/consultar_historia.php?dni=".$row['DNI']."'>Consultar</a>";
                    echo "<a class='btn btn-warning m-1' role='button' href='../model/registrar_historia.php?dni=".$row['DNI']."'>Registrar</a>";
                    echo "</td>";
             echo " </tr>";
            }
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
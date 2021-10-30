<?php
     //recoger sesiones activas
     session_start();
     if(!isset($_SESSION['user'])){
         die("Acceso restringido al sitio");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="https://i.ibb.co/sPhKV5z/gdit-logo-online.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body class="body">
<nav class="navbar  navbar-bark navbar-expand-lg fixed-top" style="background-color: rgb(18, 110, 130);"> <!-- rgb(18, 110, 130)-->
        <div class="container-fluid">
            <div>
                <img src="https://i.ibb.co/sPhKV5z/gdit-logo-online.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" id="logo" alt="logo de veterinaria"
                    style="width: 60px;height: 60px;">
                <a class="navbar-brand" href="index.php" style="color: white;">GDIT Logistica | Administración de datos</a>
                <a class="btn" href="index.php" role="button" style=" background-color:rgb(81, 196, 211); color:white;">Panel</a>
                
            </div>

            <a class="btn " href="../Login/cerrar_sesion.php" role="button" style="background-color: rgb(19, 44, 51); color:white">Log Out</a>

        </div>
    </nav>

    <!--<h1 style="text-align: center;">No ves que esta vacio? mongol</h1> -->
    <!--PANEL DE ACTIVIDADES-->
    <div class="container justify-content-center">
    <form action="./consultar_integrantes.php" method="POST">
        <h2 style="text-align: center; margin-top: 8%;">Sistema de consulta de integrantes</h2>
        <p style='text-align:center;'>En el siguiente modulo podra consultar y actualizar los integrantes del GDIT</p>

            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <div class="container">
                    <label for="criterio" class="form-label">Criterio de filtro</label>
                        <br>
                    <select name="criterio" id="criterio" class="form-select" onchange="get_valor_filtro();">
                        <option value="codAlumno">Codigo estudiante</option>
                        <option value="nombres">Nombre y apellidos</option>
                        <option value="sexo">Sexo</option>
                        <option value="Area">Area</option>
                        <option value="Escuela">Escuela</option>
                        <option value="estado">Estado</option>
                    </select>
                    </div>
            
                </div>
                <div class="col-sm-4">
                    <label for="" class="form-label">Valor de busqueda</label>
                    <br>
                    <input type="text" name="valor" id="valor" class="form-control" placeholder="Todos por defecto">
                    <select name="valor_sexo" id="valor_sexo" class="form-select" style="display:none;">
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Homosexual">Homosexual</option>
                            <option value="Lesbiana">Lesbiana</option>
                            <option value="Transgenero">Transgenero</option>
                            <option value="No binario">No binario (Compañere)</option>
                            <option value="">Prefiero no decirlo</option>
                            <option value="">No me decido</option>
                    </select>
                    <select name="valor_area" id="valor_area" class="form-select"  style="display:none;">
                      <option value="Logistica">Logistica</option>
                      <option value="Desarrollo de proyectos">Desarrollo de proyectos</option>
                      <option value="Marketing">Marketing</option>
                     
                    </select>

                    <select name="valor_escuela" id="valor_escuela" style="display:none;" class="form-select">
                      <option value="Ingenieria de sistemas">Ingenieria de sistemas</option>
                      <option value="Ingenieria de software">Ingenieria de software</option>
                    
                    </select>

                    <select name="valor_estado" id="valor_estado" style="display:none;" class="form-select">
                      <option value="ACTIVO">Activo</option>
                      <option value="DESACTIVO">Desactivo</option>
                    
                    </select>
                    
                </div>
            </div>
            <br>
            <div class="row justify-content-center ">
                
                
                <button type="submit" class="btn btn-success btn-lg col-sm-3">Consultar</button>
                
            </div>
        
    </form>
    </div>
  <br>
  <?php
    //if(isset($_POST["nombre"])){
       
        include_once("../Database/conexion.php");
                        
            
        $sql = "SELECT I.codAlumno as codAlumno,
            I.nombres as nombres,
            I.apellidos as apellidos,I.edad as edad,I.fechaNacimiento as fechaNacimiento,
            I.sexo as sexo,I.telefono as telefono,I.correo as correo
            ,I.estado as estado,A.nombre as Area,
            E.nombre as Escuela
            FROM integrantes AS I
            LEFT JOIN area as A ON I.idarea=A.idarea
            LEFT JOIN Escuela as E ON I.idescuela=E.idEscuela";
        
        echo "<div class='container'>";

        if(isset($_POST["criterio"])){
            $criterio = $_POST["criterio"];
            if($criterio == "codAlumno"){
                $criterio="I.codAlumno";
                $valor = $_POST["valor"];
            }else if($criterio == "nombres"){
                $criterio="I.nombres";
                $valor = $_POST["valor"];
            }
            else if($criterio == "sexo"){
                $criterio = "I.sexo";
                $valor = $_POST["valor_sexo"];
            }else if($criterio == "Area"){
                $criterio = "A.nombre";
                $valor = $_POST["valor_area"];
            }else if($criterio == "Escuela"){
                $criterio = "E.nombre";
                $valor = $_POST["valor_escuela"];
            }
            if($criterio == "estado"){
                $criterio = "I.estado";
                $valor = $_POST["valor_estado"];
                $sql = $sql." WHERE ".$criterio."='".$valor."'";
            }else{
                $sql = $sql." WHERE ".$criterio." LIKE '%".$valor."%'";
            }
            if($valor==""){
                $valor="Todos";
            }
            echo "<div class='alert alert-primary' role='alert' style='text-align:center;'>Consulta: ".$_POST['criterio']." = $valor</div>";
            unset($_POST["criterio"]);
        }
        //die($sql);
        //echo $sql;
        $result = mysqli_query($conexion, $sql);
        //cuantos reultados hay en la busqueda
        $num_resultados = mysqli_num_rows($result);
        echo "<div class='alert alert-success' role='alert' style='text-align:center;'> $num_resultados Integrantes encontrados.</div>";
        
        echo "</div>";
  ?>
    <div class="container-fluid table-responsive-lg" style="overflow-x:auto;">
    <table class="table table-striped">
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
     <th scope="col"><b>ACTUALIZAR</b></th>
    </tr>
  </thead>
  <tbody class="myTable">
        <?php
            
            //mostrando informacion de los resultados
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
                        echo "<span class='badge bg-success'>".$row['estado']."</span>";
                    }else{
                        echo "<span class='badge bg-danger'>".$row['estado']."</span>";
                    } //actualizar_integrantes.php?codigo=1
                   
                    echo "</td>"; 

                    echo "<td>";
                    echo "<a role='button' class='btn btn-warning' href='actualizar_integrantes.php?codigo=".$row['codAlumno']."'><img src='img/editar.png' alt='icono de editar usuario' height='18' width='18'></a>";
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

    <br>
    <br>
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
    <script src="./scripts/filtros.js"></script>
</body>

</html>
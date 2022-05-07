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
    <!--Own styles-->
	<link rel="stylesheet" href="styles/index.css">
</head>

<body class="body">

    <?php
        include('navbar.php');
    ?>

    <div class="super_container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="icon"><ion-icon name="home"></ion-icon></span>
                        <span class="sidebar_text">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="registrar_integrantes.php">
                        <span class="icon"><ion-icon name="person-add"></ion-icon></span>
                        <span class="sidebar_text">Registrar integrante</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon_active"><ion-icon name="server"></ion-icon></span>
                        <span class="sidebar_text icon_active">Consultar/Actualizar</span>
                    </a>
                </li>
                <li>
                    <a href="../Dashboard/index.php">
                        <span class="icon"><ion-icon name="documents"></ion-icon></span>
                        <span class="sidebar_text">Ver dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="../Login/cerrar_sesion.php">
                        <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                        <span class="sidebar_text">Cerrar sesión</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--<h1 style="text-align: center;">No ves que esta vacio? mongol xddd</h1> -->
        <!--PANEL DE ACTIVIDADES-->
        <div class="content">
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
                            
                            
                            <button type="submit" class="btn btn-success btn-lg col-sm-3 mb-3">Consultar</button>
                        </div>
                    
                </form>
            </div>
            <?php
              //if(isset($_POST["nombre"])){
                 
                    include_once("../Database/conexion.php");
                                  
                    $sql = "SELECT I.codAlumno as codAlumno, 
                        I.nombres as nombres, 
                        I.apellidos as apellidos, 
                        I.edad as edad, 
                        I.fechaNacimiento as fechaNacimiento, 
                        I.sexo as sexo, 
                        I.telefono as telefono, 
                        I.correo as correo, 
                        E.nombre AS Escuela, (
                            SELECT nombre FROM area AS A WHERE A.idarea = S.idarea
                        ) AS Area,
                        S.nombre AS Subarea, 
                        I.estado as estado
                        FROM integrantes AS I
                        LEFT JOIN Escuela AS E ON E.idEscuela = I.idescuela
                        LEFT JOIN subarea AS S ON I.idsubarea = S.idsubarea";
                  
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
                <th scope="col">SubArea</th>
                <th scope="col">Escuela</th>
                <th scope="col">Estado</th>
               <th scope="col"><b>EDITAR</b></th>
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
                              echo "<td>".$row['Subarea']."</td>";
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
        </div>
    </div>
  <br>

    <br>
    <br>
    
    <?php
        require('footer.php');
    ?>
    
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./scripts/filtros.js"></script>

    <!--Own script-->
    <script src="./scripts/sidebar.js"></script>

    <!--Íconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
<?php
     //recoger sesiones activas
     session_start();
     if(!isset($_SESSION['user'])){
         die("Acceso restringido al sitio");
     }
        //incluir funciones para procesar la API de resultados
        if(isset($_POST['actualizar'])){
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombres'];
            $apellido = $_POST['apellidos'];
            $sexo= $_POST['sexo'];
            $telefono = $_POST['telefono'];
            $nacimiento = $_POST['nacimiento'];
            $correo= $_POST['correo'];
            $edad= $_POST['edad'];
            $idarea= $_POST['area'];
            $idescuela= $_POST['escuela'];

            $estado = $_POST['estado'];
            include_once("../Database/conexion.php");
        
                    //query: creamos la consulta para insetar los datos a la base de datos
            $query = "UPDATE integrantes SET codAlumno='$codigo',
                        nombres='$nombre',
                        apellidos='$apellido',
                        edad=$edad,
                         fechaNacimiento='$nacimiento',
                         sexo='$sexo',
                         telefono='$telefono',
                         correo='$correo',
                         estado='$estado',
                         idarea=$idarea, idescuela=$idescuela
                        WHERE codAlumno='$codigo'";
                        //echo $query;
               //die ($query);
                //ejecutamos la consulta
                $resultado_update = mysqli_query($conexion,$query);
                
 }
        
    
        if(isset($_REQUEST['codigo'])){
            $codigo=$_REQUEST['codigo'];
            include_once("../Database/conexion.php");
            $sql="SELECT I.codAlumno as codAlumno, 
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
                LEFT JOIN subarea AS S ON I.idsubarea = S.idsubarea
                WHERE I.codAlumno='$codigo'";
            $resultado=mysqli_query($conexion,$sql);
            //obtengo solo el primer registro de los alumnos
            $alumno=mysqli_fetch_array($resultado);
            unset($_REQUEST['codigo']);
        }

?>



<!doctype html>
<html lang="es">

<head>
    <title>GDIT | Actualizar integrantes</title>
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

    <h2 style="text-align: center; margin-top: 2%;">Actualizar integrantes</h1>

    <?php
    if(isset($_POST['actualizar'])){
        if(!$resultado_update){
            echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>Error de actualizacion de datos:". mysqli_error($conexion)."</div>";
        }else{
            echo "<div class='alert alert-success' role='alert' style='text-align:center;'>Datos actualizados correctamente.<a href='consultar_integrantes.php'><b>Ir a consulta</b></a> </div>";
        }
        unset($_POST['actualizar']);
    }
    ?>
    <!--PANEL DE ACTIVIDADES-->
    <!-- Region del formulario-->
    <div class="container">
        <form class="text-center justify-content-center" method="POST" action="actualizar_integrantes.php">
            <div class="row  d-flex justify-content-center ">
                <input name='actualizar' id='actualizar' style='display:none;'></input>
                <div class="col-md-4">
                <label for="" class="form-label">Pertenencia al GDIT</label>
                        <select name="estado" id="escuela" class="form-select">
                            <?php
                                if($alumno['estado']=="ACTIVO"){
                                    echo "<option value='ACTIVO' selected> ACTIVO</option> ";
                                    echo "<option value='DESACTIVO'> DESACTIVO</option> ";
                                }else{
                                    echo "<option value='ACTIVO'> ACTIVO</option> ";
                                    echo "<option value='DESACTIVO' selected> DESACTIVO</option> ";
                                }
                            ?>
                    
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <label for="" class="form-label">Codigo de alumno</label>
                       
                        <input type="text" name="codigo" id="codigo" class="form-control" value=<?= $alumno['codAlumno']?> required>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="container">
                        <label for="" class="form-label">Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" value="<?= $alumno['nombres'] ?>" required>
                    </div>
                </div>
            </div>


            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="container">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?= $alumno['apellidos']?>" >
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-4">

                    <div class="container">
                        <!--Input requerido de sexo-->
                        
                        <label for="" class="form-label">Sexo</label>
                        <select name="sexo" id="sexo" class="form-select">
                            <?php
                             if($alumno['sexo']=="Hombre"){
                                echo "<option value='Hombre' selected>Hombre</option>";
                                echo "<option value='Mujer'>Mujer</option>";
                             }else{
                                echo "<option value='Hombre'>Hombre</option>";
                                echo "<option value='Mujer' selected>Mujer</option>";
                             }
                            ?>
                        
                            <option value="Homosexual">Homosexual</option>
                            <option value="Lesbiana">Lesbiana</option>
                            <option value="Transgenero">Transgenero</option>
                            <option value="No binario">No binario (Compañere)</option>
                            <option value="">Prefiero no decirlo</option>
                            <option value="">No me decido</option>
                        </select>
                        <br>
                      
                        <!--Input del telefono fijo-->
                        <label for="" class="form-label">Telefono </label>
                        <input type="tel" name="telefono" id="telefono" class="form-control" value=<?= $alumno['telefono']?>>

                        <br>
                        <!--Input de la fecha de nacimiento-->
                        <label for="" class="form-label">Fecha de nacimiento</label>
                        <input type="date" name="nacimiento" id="nacimiento" class="form-control" value=<?= $alumno['fechaNacimiento']?> required>

                        <!--Input del correo-->
                        <label for="" class="form-label">Correo</label>
                        <input type="mail" name="correo" id="correo" class="form-control" value=<?= $alumno['correo']?> required>

                        <br>
                        
                    </div>


                </div>

                <div class="col-md-4">
                    <div class="container">
                       
                        <!-- Ingresar el edad del alumno-->
                        <label for="" class="form-label">Edad</label>
                        <input type="numeric" name="edad" id="edad" class="form-control"value=<?= $alumno['edad']?> required>
                        <br>
                       <!--Gerencia del miembro-->
                       <label for="" class="form-label">Area de gerencia</label>
                        <select name="area" id="area" class="form-select">

                        <?php
                        if($alumno['Area']=="Gerencia de Logística"){
                            echo "<option value=1 selected>Logistica</option>";
                            echo "<option value=2>Desarrollo de proyectos</option>";
                            echo "<option value=3>Marketing</option>";
                        }else if($alumno['Area']=="Gerencia de Desarrollo de Proyectos"){
                            echo "<option value=1>Logistica</option>";
                            echo "<option value=2 selected>Desarrollo de proyectos</option>";
                            echo "<option value=3>Marketing</option>";
                        }else if($alumno['Area']=="Gerencia de Comunicaciones"){
                            echo "<option value=1>Logistica</option>";
                            echo "<option value=2>Desarrollo de proyectos</option>";
                            echo "<option value=3 selected>Marketing</option>";
                        }else{
                            echo "<option value=4>Otro</option>";
                        }
                        
                           
                        ?>
                     
                    </select>
                    <br>
                    <!--Area del miembro-->
                    <label for="" class="form-label">SubArea de gerencia</label>
                        <select name="subarea" id="subarea" class="form-select">
                        
                        <?php
                        if($alumno['Subarea']=="Gerencia de Logística"){
                            echo "<option value=1 selected>Logistica</option>";
                            echo "<option value=2>Desarrollo de proyectos</option>";
                            echo "<option value=3>Marketing</option>";
                        }else if($alumno['Subarea']=="Gerencia de Desarrollo de Proyectos"){
                            echo "<option value=1>Logistica</option>";
                            echo "<option value=2 selected>Desarrollo de proyectos</option>";
                            echo "<option value=3>Marketing</option>";
                        }else if($alumno['Subarea']=="Gerencia de Comunicaciones"){
                            echo "<option value=1>Logistica</option>";
                            echo "<option value=2>Desarrollo de proyectos</option>";
                            echo "<option value=3 selected>Marketing</option>";
                        }else{
                            echo "<option value=4>Otro</option>";
                        }
                        
                           
                        ?>
                     
                    </select>
                        <br>
                        <!--Ingresars escuela de la facultad-->
                        <label for="" class="form-label">Escuela de la facultad</label>
                        <select name="escuela" id="escuela" class="form-select">
                            <?php
                            if($alumno['Escuela']=="Ingenieria de sistemas"){
                                echo "<option value=1 selected>Ingenieria de sistemas</option>";
                                echo "<option value=2>Ingenieria de software</option>";
                            }else{
                                echo "<option value=1>Ingenieria de sistemas</option>";
                                echo "<option value=2 selected>Ingenieria de software</option>";
                            }
                            ?>
                    
                    </select>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="reset" class="btn btn-danger">Limpiar</button>
                </div>

            </div>
            <br>
        </form>

    </div>
    </div>
        <br>
    

    <?php
        require('footer.php');
    ?>
    
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Own script-->
    <script src="./scripts/sidebar.js"></script>

    <!--Íconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
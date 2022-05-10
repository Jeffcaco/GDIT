<?php
 session_start();
 if(!isset($_SESSION['user'])){
 	//header('Location: principal.php');
     die("Acceso restringido al recurso web.");
 }
 ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="https://i.ibb.co/sPhKV5z/gdit-logo-online.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Registro de integrantes GDIT</title>
    <!--Own styles-->
	<link rel="stylesheet" href="styles/index.css">
</head>

<body>

    <?php
        include('navbar.php');
    ?>
    
    <?php
 if(isset($_POST['codigo'])){ //verificamos si el codigo del alumno hizo post
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

    $estado = "ACTIVO";
    include_once("../Database/conexion.php");
//ec// Nos aseguramos que el registro unico de codigo no exista
    $sql = "SELECT * FROM integrantes WHERE codAlumno = '$codigo'";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        echo "<div class='alert alert-danger' role='alert'>El codigo de alumno '$codigo' ya existe. El alumno ya se encuentra registrado en la base de datos". mysqli_error($conexion)."</div>";
        unset($_POST['codigo']);
    }else{
            //query: creamos la consulta para insetar los datos a la base de datos
        $query = "INSERT INTO integrantes (codAlumno,nombres,apellidos,edad,fechaNacimiento,sexo,telefono,correo,estado,idarea,idescuela)
                VALUES ('$codigo','$nombre','$apellido',$edad,'$nacimiento','$sexo','$telefono','$correo','$estado',$idarea,$idescuela);";
        //die($query);
        //ejecutamos la consulta
        $resultado = mysqli_query($conexion,$query);
        if(!$resultado){
            echo "<div class='alert alert-danger' role='alert'>Error de insercion de datos:". mysqli_error($conexion)."</div>";
        }else{
            echo "<div class='alert alert-success' role='alert'>Datos insertados correctamente.</div>";
        }
}
    unset($_POST['codigo']);
 }
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
                    <a href="consultar_integrantes.php">
                        <span class="icon"><ion-icon name="server"></ion-icon></span>
                        <span class="sidebar_text">Consultar/Actualizar</span>
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
        <div class="content">
            <h2 class="text-center" style="margin-top: 2%;">Registro de integrantes del GDIT</h2>
            <!-- Region del formulario-->
            <div class="container">
                <form class="text-center justify-content-center" method="POST" action="registrar_integrantes.php">
                    <div class="row  d-flex justify-content-center ">
                        <div class="col-md-4">
                            <div class="container">
                                <label for="" class="form-label">Tipo de Documento </label>
                                <select name="" id="" class="form-select">
                                <option value="codigo">Codigo Alumno</option>
                                <option value="dni">DNI</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="container">
                                <label for="" class="form-label">Codigo de alumno</label>
                                <input type="number" name="codigo" id="codigo" class="form-control" placeholder="Codigo de alumno" maxlength="8" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="container">
                                <label for="" class="form-label">Nombres</label>
                                <input type="text" name="nombres" id="nombres" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="container">
                                <label for="" class="form-label">Apellidos</label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" >
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-4">

                            <div class="container">
                                <!--Input requerido de sexo-->
                                
                                <label for="" class="form-label">Sexo</label>
                                <select name="sexo" id="sexo" class="form-select">
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
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
                                <input type="tel" name="telefono" id="telefono" class="form-control">

                                <br>
                                <!--Input de la fecha de nacimiento-->
                                <label for="" class="form-label">Fecha de nacimiento</label>
                                <input type="date" name="nacimiento" id="nacimiento" class="form-control" required>

                                <br>
                                <!--Input de la fecha de nacimiento-->
                                <label for="" class="form-label">Correo</label>
                                <input type="mail" name="correo" id="correo" class="form-control" required>

                                <br>
                                
                            </div>


                        </div>

                        <div class="col-md-4">
                            <div class="container">
                            
                                <!-- Ingresar el edad del alumno-->
                                <label for="" class="form-label">Edad</label>
                                <input type="numeric" name="edad" id="edad" class="form-control" required>
                                <br>
                            <!-- selector del Estado civil-->
                            <label for="" class="form-label">Area de gerencia</label>
                                <select name="area" id="area" class="form-select">
                            <option value=1>Logistica</option>
                            <option value=2>Desarrollo de proyectos</option>
                            <option value=3>Marketing</option>
                            
                            </select>
                                <br>
                                <!--Area del miembro-->
                    <label for="" class="form-label">SubArea de gerencia</label>
                        <select name="subarea" id="subarea" class="form-select">
                        
                        <?php
                            echo "<option value=5 selected>Gestión de datos y control organizacional</option>";
                            echo "<option value=6>Relaciones Públicas</option>";
                        ?>
                     
                    </select>
                    <br>
                                <!--Ingresars escuela de la facultad-->
                                <label for="" class="form-label">Escuela de la facultad</label>
                                <select name="escuela" id="escuela" class="form-select">
                            <option value=1>Ingenieria de sistemas</option>
                            <option value=2>Ingenieria de software</option>
                            
                            </select>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="reset" class="btn btn-danger">Limpiar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <?php
        require('footer.php');
    ?>
   
    <!--Separamos los scripts de poper.js y javascript de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!--Own script-->
    <script src="./scripts/sidebar.js"></script>
    <script src="./scripts/changeInput.js"></script>

    <!--Íconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</body>

</html>
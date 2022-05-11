<?php
     //recoger sesiones activas
     session_start();
     if(!isset($_SESSION['user'])){
         die("Acceso restringido al sitio");
     }
?>
<!doctype html>
<html lang="es">

<head>
    <title>Home</title>
    <!--Developers 
        @Castillo Cornejo, Jeffrey Bryan		
        @Mitma Huaccha, Johan Valerio  	
        @Porras Muñoz, Bruno Franchesco -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="https://i.ibb.co/sPhKV5z/gdit-logo-online.jpg"/>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/31127b7562.js" crossorigin="anonymous"></script>
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
                    <a href="#">
                        <span class="icon icon_active"><ion-icon name="home"></ion-icon></span>
                        <span class="sidebar_text icon_active">Inicio</span>
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
            <div class="main_container">
                <div class="mv_container">
                    <div class="mv_element">
                        <h3>Misión</h3>
                        <p>
                            Asegurar que los eventos, enfocados a la capacitación, se realicen adecuadamente, a través 
                            de la obtención de recursos necesarios tales como aliados estratégicos, información relevante 
                            y coordinación adecuada. Además de lograr una correcta gestión de los datos organizacionales.
                        </p>
                    </div>
                    <div class="mv_element">
                        <h3>Visión</h3>
                        <p>
                            Ser un área que se caracterice por la realización de sus funciones y trabajo en equipo 
                            eficazmente, a través del tiempo, logrando que GDIT sea una agrupación resaltante en la facultad.
                        </p>
                    </div>
                </div>
                <div class="mv_container">
                    <div class="mv_element">
                        <h3>Objetivo anual</h3>
                        <p>
                            Ser un área que se caracterice por la realización de sus funciones y trabajo en equipo 
                            eficazmente, a través del tiempo, logrando que GDIT sea una agrupación resaltante en la facultad.
                        </p>
                    </div>
                    <div class="mv_element">
                        <h3>Últimas novedades:</h3>
                        <p>
                            -Sección en la que se colocarán algunos anuncios, btw terminará siendo solo floro
                        </p>
                    </div>
                </div>
            </div>
            <div class="main_container">
                <div class="mv_container areas_container">
                    <?php
                        include_once("../Database/conexion.php");

                        $query_miembros_Gestion="SELECT codAlumno FROM integrantes 
                        WHERE idsubarea = 5;";
                        $resultado_miembros_Gestion = mysqli_query($conexion,$query_miembros_Gestion);
                        $num_miembros_Gestion = mysqli_num_rows($resultado_miembros_Gestion);

                        $query_miembros_Relacion="SELECT codAlumno FROM integrantes 
                        WHERE idsubarea = 6;";
                        $resultado_miembros_Relacion = mysqli_query($conexion,$query_miembros_Relacion);
                        $num_miembros_Relacion = mysqli_num_rows($resultado_miembros_Relacion);
                    ?>
                    <h3>Nuestras áreas</h3>
                    <div class="areas_sub_container">
                        <div class="areas_element">
                            <div class="card_area">
                                <p>Gestión de datos y control organizacional</p>
                            </div>
                            <div class="areas_members">
                                <h4>Miembros:</h4>
                                <?php
                                    echo "<h4 id='h4_datos'>".$num_miembros_Gestion."</h4>"
                                ?>
                            </div>
                            <a href="consultar_integrantes.php"><p>Ver todos los miembros del área</p></a>
                        </div>
                        <div class="areas_element">
                            <div class="card_area">
                                <p>Relaciones Públicas</p>
                            </div>
                            <div class="areas_members">
                                <h4>Miembros:</h4>
                                <?php
                                    echo "<h4 id='h4_relaciones'>".$num_miembros_Relacion."</h4>"
                                ?>
                            </div>
                            <a href="consultar_integrantes.php"><p>Ver todos los miembros del área</p></a>
                        </div>
                    </div>
                </div>
            
                <div class="mv_container">
                    <h3>Recuerdos de logística xd</h3>
                    <div class="img_container">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/Recuerdo1.jpeg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/Recuerdo2.jpeg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/Recuerdo3.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/Recuerdo4.PNG" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!--Own script-->
    <script src="./scripts/sidebar.js"></script>

    <!--Íconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
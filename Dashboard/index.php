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
    <title>GDIT | Dashboards</title>
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
    <!--Own styles-->
	<link rel="stylesheet" href="../Principal/styles/index.css">
	
</head>

<body class="body">

    <?php
        include('../Principal/navbar.php');
    ?>
    <!--
    <nav class="navbar  navbar-bark navbar-expand-lg" style="background-color: rgb(18, 110, 130);">
        <div class="container-fluid">
            <div>
                <img src="https://i.ibb.co/sPhKV5z/gdit-logo-online.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" id="logo" alt="logo de veterinaria"
                    style="width: 60px;height: 60px;">
                <a class="navbar-brand" href="#" style="color: white;">GDIT Logística | Dashboards</a>
                <a class="btn" href="../Principal/" role="button" style=" background-color:rgb(81, 196, 211); color:white;">Volver</a>
            </div>

            <div class="dropdown">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" style=" background-color:rgb(81, 196, 211); color:white;">
                Seleccionar dashboard
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php">Mapeo de habilidades</a>
                <a class="dropdown-item" href="#">Nombre dashboard 2</a>
                <a class="dropdown-item" href="#">Nombre dashboard 3</a>
              </div>
            </div>

        </div>
    </nav>
    -->
    <div class="super_container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="../Principal/index.php">
                        <span class="icon"><ion-icon name="home"></ion-icon></span>
                        <span class="sidebar_text">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="../Principal/registrar_integrantes.php">
                        <span class="icon"><ion-icon name="person-add"></ion-icon></span>
                        <span class="sidebar_text">Registrar integrante</span>
                    </a>
                </li>
                <li>
                    <a href="../Principal/consultar_integrantes.php">
                        <span class="icon"><ion-icon name="server"></ion-icon></span>
                        <span class="sidebar_text">Consultar/Actualizar</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon_active"><ion-icon name="documents"></ion-icon></span>
                        <span class="sidebar_text icon_active">Ver dashboards</span>
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
            <div>
                <iframe width="100%" height="730" src="https://app.powerbi.com/view?r=eyJrIjoiNWVhZTA5YmEtNTMyNS00NmM5LTg2YjgtOTAyM2MzYjNiZmFkIiwidCI6ImFmMTA3NDlkLTNlMWQtNGQxMy04NmQ5LTg2ZmJlYTRlY2I0OSJ9&pageName=ReportSection" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>
    </div>
    <?php
        include('../Principal/footer.php');
    ?>
    
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!--Own script-->
    <script src="../Principal/scripts/sidebar.js"></script>

    <!--Íconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
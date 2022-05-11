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
                <iframe id="dashb" class="responsive-iframe" src="https://app.powerbi.com/view?r=eyJrIjoiNWVhZTA5YmEtNTMyNS00NmM5LTg2YjgtOTAyM2MzYjNiZmFkIiwidCI6ImFmMTA3NDlkLTNlMWQtNGQxMy04NmQ5LTg2ZmJlYTRlY2I0OSJ9&pageName=ReportSection" frameborder="0" allowFullScreen="true"></iframe>
            </div>
            <div class="dashboards">
                <div class="dash_btns_container">
                    <?php
                    include_once("../Database/conexion.php");
                    
                    $query_dash = "SELECT nombre_dashboard, link_dashboard FROM Dashboard;";
                    
                    $result = mysqli_query($conexion, $query_dash);
                    $num_resultados = mysqli_num_rows($result);
                    
                    for ($i=0; $i <$num_resultados; $i++) {
                        $row = mysqli_fetch_array($result);
                        echo "<p class='dash_btn' dash='".$row['link_dashboard']."'>".$row['nombre_dashboard']."</p>";
                    }
                    ?>
                </div>
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
    <script src="../Principal/scripts/chosseDash.js"></script>

    <!--Íconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
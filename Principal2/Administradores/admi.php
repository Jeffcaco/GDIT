<?php
session_start();
$admi= $_SESSION['user'];
$pass = $_SESSION['contra']; 

if (!isset($_SESSION['user'])) {
    echo '
        <script>
            alert("Error al iniciar sesion!");
            window.location = "./";
        </script>
      ';
    die();
}
$correo = $_SESSION['user'];
include_once("../../Database/conexion.php");
$query_usuarios = "select * from Usuario as a inner join Area as b on a.id_area_usuario=b.id_area";
$result2 = mysqli_query($conexion, $query_usuarios);
$num_usuarios = mysqli_num_rows($result2);

/*admi*/
$query_administrador = "select * from Administradores where nick_admi='$admi' and password='$pass'";
$result0 = mysqli_query($conexion, $query_administrador);
$row0 = mysqli_fetch_array($result0);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image" href="../../Img/icono.png">
    <title>Admi Reportes New Athletic</title>
    <link href="../../Estilos/sidebar.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8b56be345e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <b><a class="navbar-brand" href="../index.php">Admi Reportes NA</a></b>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $row0['nombre_admi'] ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Configuración <i class="fa-solid fa-screwdriver-wrench fa-1x" style="color:rgba(0,0,0,0.2);"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../Login/cerrar_sesion.php">Salir <i class="fa-solid fa-right-from-bracket fa-1x" style="color:rgba(0,0,0,0.2);"></i></a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="../">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Vista principal
                        </a>
                        <!--***************-->
                        <div class="sb-sidenav-menu-heading">Vista usuario</div>
                        <a class="nav-link" href="../Areas/areas.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            Áreas
                        </a>

                        <a class="nav-link" href="../Reportes/reportes.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-chart-bar"></i>
                            </div>
                            Reportes
                        </a>

                        <a class="nav-link" href="../Imagenes/imagenes.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa-regular fa-image"></i>
                            </div>
                            Imágenes
                        </a>

                        <a class="nav-link" href="../Presupuesto/presupuesto.php">
                            <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-coins"></i>
                            </div>
                            Presupuesto
                        </a>
                        <!--***************-->
                        <div class="sb-sidenav-menu-heading">Vista administrador</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            Usuarios
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-crown"></i>
                            </div>
                            Administradores
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Realizado por:</div>
                    Jeffcaco
                </div>
            </nav>
        </div>
        <!--****-->
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <br>
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Usuarios</div>
                    <br>
                    <!--tabla-->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" style="margin-bottom: 10px;">
                        Añadir<i class="fa-solid fa-plus" style="padding-left: 10px;"></i>
                    </button>
                    <br><i>Pdt: Las contraseñas tienen un máximo de 5 caracteres.</i>
                    <div class="col-sm-12 container">
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Contraseña</th>
                                                <th scope="col">Area</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($usuarios = mysqli_fetch_array($result2)) { ?>
                                                <tr>
                                                    <td><?php echo $usuarios['id_usuario']; ?></td>
                                                    <td><?php echo $usuarios['nombre_usuario']; ?></td>
                                                    <td><?php echo $usuarios['nick_usuario']; ?></td>
                                                    <td>*****</td>
                                                    <td><?php echo $usuarios['nombre_area']; ?></td>
                                                
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $usuarios['id_usuario']; ?>">
                                                            Modificar <i class="fa-solid fa-pen-to-square" style="padding-left: 10px;"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $usuarios['id_usuario']; ?>" style="margin-left: 15px;">
                                                            Eliminar <i class="fa-solid fa-trash-can" style="padding-left: 10px;"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <?php include('ModalNuevo.php'); ?>

                                                <!--Ventana Modal para Actualizar--->
                                                <?php include('ModalEditar.php'); 
                                                ?>

                                                 <!--Ventana Modal para la Alerta de Eliminar--->
                                                 <?php include('ModalEliminar.php'); ?>

                                            <?php } 
                                            mysqli_close($conexion); ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright © Jeffcaco, <?php echo date("Y"); ?></div>
                        <div>
                            <a href="#">Derechos del autor reservados</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    <!--***-->
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>

</body>

</html>
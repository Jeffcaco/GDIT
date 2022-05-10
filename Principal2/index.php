<?php
session_start();
$admi = $_SESSION['user'];
$pass = $_SESSION['contra'];

if (!isset($_SESSION['user'])) {
    echo '
        <script>
            alert("Error al iniciar sesion!");
            window.location = "../Login/";
        </script>
      ';
    die();
}
?>

<?php
include_once("../Database/conexion.php");
$query_grafico1 = "select c.nombre as Gerencia, count(*) as Cantidad from subarea as a inner join integrantes as b on a.idsubarea=b.idsubarea
                                                                inner join area as c on a.idarea=c.idarea
                                                                group by c.nombre";
$result2 = mysqli_query($conexion, $query_grafico1);


$query_grafico2 = "select c.nombre as Gerencia, a.nombre as Area,count(*) as Cantidad from subarea as a inner join integrantes as b on a.idsubarea=b.idsubarea
                                                                inner join area as c on a.idarea=c.idarea
                                                                group by a.nombre";
$result3 = mysqli_query($conexion, $query_grafico2);

$query_total_usuarios = "SELECT * FROM integrantes";
$result4 = mysqli_query($conexion, $query_total_usuarios);

/*admi*/

$query_administrador = "select * from administrador where correo='$admi' and password='$pass'";
$result0 = mysqli_query($conexion, $query_administrador);
$row0 = mysqli_fetch_array($result0);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image" href="../gdit.jfif">
    <title>Logística | ADMI</title>
    <link href="../Estilos/sidebar.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8b56be345e.js" crossorigin="anonymous"></script>

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <!--graficos-->


</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <b><a class="navbar-brand" href="index.php">PANEL DE ADMINISTRACION</a></b>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $row0['correo'] ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <button type="button" class="btn" data-toggle="modal" data-target="">
                    Configuración <i class="fa-solid fa-screwdriver-wrench fa-1x" style="color:rgba(0,0,0,0.15);"></i>
                    </button>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../Login/cerrar_sesion.php">Salir <i class="fa-solid fa-right-from-bracket fa-1x" style="color:rgba(0,0,0,0.2);"></i></a>
                </div>
            </li>
        </ul>
    </nav>
    <?php //include('ModalConfigurar.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Vista principal
                        </a>
                        <!--***************-->
                        <div class="sb-sidenav-menu-heading">Vistas</div>
                        <a class="nav-link" href="Gerencias/gerencias.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            Gerencias
                        </a>

                        <a class="nav-link" href="Areas/areas.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-clone"></i>
                            </div>
                            Áreas
                        </a>

                        <a class="nav-link" href="Reportes/reportes.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-clone"></i>
                            </div>
                            Reportes
                        </a>

                        <a class="nav-link" href="Administradores/admi.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-crown"></i>
                            </div>
                            Administradores
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Realizado por:
                    @Bruno @Jovamih @Jeffcaco </div>
                </div>
            </nav>
        </div>

        <!--cuerpo-->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <br>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">PANEL PRINCIPAL</li>
                    </ol>
                    <div class="row" style="text-align: center;">
                        <div class="col-xl-2 col-md-3">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">GERENCIAS</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Gerencias/gerencias.php">Ver detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-3">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">AREAS</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Areas/areas.php">Ver detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-3">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">REPORTES</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Reportes/reportes.php">Ver detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-3">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">ADMINISTRADORES</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Administradores/admi.php">Ver detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div></div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fa-solid fa-user"></i> Cantidad de usuarios usuarios por Gerencias</div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover" style="text-align: center;">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <th scope="col">Gerencia</th>
                                                <th scope="col">Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($gerencia = mysqli_fetch_array($result2)) { ?>
                                                <tr>
                                                    <td><?php echo $gerencia['Gerencia']; ?></td>
                                                    <td><?php echo $gerencia['Cantidad']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total usuarios</th>
                                                <th><?php echo mysqli_num_rows($result4); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-8">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fa-solid fa-clone" style="margin-right:5px;"></i>Cantidad de usuarios por Áreas</div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover" style="text-align: center;">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <th scope="col">Gerencia</th>
                                                <th scope="col">Area</th>
                                                <th scope="col">Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($area = mysqli_fetch_array($result3)) { ?>
                                                <tr>
                                                    <td><?php echo $area['Gerencia']; ?></td>
                                                    <td><?php echo $area['Area']; ?></td>
                                                    <td><?php echo $area['Cantidad']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        
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
                        <div class="text-muted">Copyright © Gerencia de Logística, <?php echo date("Y"); ?></div>
                        <div>
                            <a href="#">Derechos de autor reservados</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!--fin cuerpo-->
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
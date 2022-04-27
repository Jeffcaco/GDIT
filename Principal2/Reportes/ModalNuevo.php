<!--ventana para Update--->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Añadir dashboard
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="recib_Nuevo.php">

                <div class="modal-body" id="cont_modal">

                    <div class="form-group">
                        <label for="name" class="form-label">Nombre de dashboard</label>
                        <input type="text" class="form-control" name="nombre" required='true' autofocus>

                        <label for="recipient-name" class="form-label">URL de dashboard</label>
                        <input type="text" class="form-control" name="link" required='true' autofocus>

                        <label for="password" class="form-label">Contraseña de dashboard</label>
                        <input type="text" class="form-control" name="password" required='true' autofocus maxlength="8">

                        <label for="recipient-name" class="col-form-label">Area</label>           

                        <select name="area" class="custom-select">
                            <?php
                            include_once("../../Database/conexion.php");
                            $query_areas = "SELECT * FROM Area";
                            $result3 = mysqli_query($conexion, $query_areas);
                            $num_areas = mysqli_num_rows($result3);
                            ?>
                            <?php for ($a = 0; $a < $num_areas; $a++) {
                                $row_areas = mysqli_fetch_array($result3); ?>
                                <option value=<?php echo $row_areas['id_area']; ?>><?php echo $row_areas['nombre_area']; ?></option>
                            <?php } ?>
                        </select>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar <i class="fa-solid fa-circle-check" style="padding-left: 10px;"></i></button>
                </div>
            </form>


        </div>
    </div>
</div>
<!---fin ventana Update --->
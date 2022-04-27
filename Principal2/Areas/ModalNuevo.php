<!--ventana para Update--->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Añadir área
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="recib_Nuevo.php">

                <div class="modal-body" id="cont_modal">

                    <div class="form-group">
                        <label for="name" class="form-label">Nombre de área</label>
                        <input type="text" class="form-control" name="nombre" required='true' autofocus>
                    </div>
                    <select name="area" class="custom-select"  required='true'>
                        <?php 
                            include_once("../../Database/conexion.php");
                            $query_areas = "SELECT * FROM area";
                            $result3 = mysqli_query($conexion, $query_areas);
                            $num_areas = mysqli_num_rows($result3);
                        ?>
                        <option value="" selected>-- Seleccionar Gerencia --</option>
                        <?php for($a=0;$a<$num_areas;$a++){ $row_areas = mysqli_fetch_array($result3); ?>
                        <option value=<?php echo $row_areas['idarea']; ?>><?php echo $row_areas['nombre'];?></option>
                        <?php } ?>
                    </select>

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
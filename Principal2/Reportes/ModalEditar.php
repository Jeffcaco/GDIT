
<!--ventana para Update--->
<div class="modal fade" id="editReporte<?php echo $reporte['id_dashboard']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
          Actualizar información dashboard
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recib_Update.php">
        <input type="hidden" name="id" value="<?php echo $reporte['id_dashboard']; ?>">

        <div class="modal-body" id="cont_modal">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre de dashboard</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $reporte['nombre_dashboard']; ?>" required="true">

            <label for="recipient-name" class="col-form-label">URL de dashboard</label>
            <input type="text" name="link" class="form-control" value="<?php echo $reporte['link_dashboard']; ?>" required="true">

            <br>
            <label for="recipient-name" class="col-form-label">Fecha de registro: <b><?php echo $reporte['fecha']; ?></b></label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar <i class="fa-solid fa-floppy-disk" style="padding-left: 10px;"></i></button>
        </div>
      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->
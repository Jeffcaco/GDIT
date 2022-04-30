<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteReporte<?php echo $reporte['id_dashboard']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-dark">
                ¿Deseas eliminar dashboard?
            </h5>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important" class="text-muted"> 
            <?php echo $reporte['nombre_dashboard']; ?>
          </strong>
        </div>
        
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <a href="recib_Delete.php?id=<?php echo $reporte['id_dashboard'] ?>" class="btn btn-danger">Eliminar</a>
            <!--<button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id="<?php //echo $area['id_area']; ?>">Borrar</button>-->
            </div>

        </div>
      </div>
</div>
<!---fin ventana eliminar--->
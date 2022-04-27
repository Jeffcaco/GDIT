<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteArea<?php echo $area['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-dark">
                ¿Deseas eliminar área?
            </h5>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important" class="text-muted"> 
            <?php echo $area['Area']; ?>
          </strong>
          <hr>
          <i>Pdta: Recuerda que para eliminar un área debes asegurarte que ningún <b>usuario</b> esté relacionado a esta área.</i>
          
        </div>
        
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <a href="recib_Delete.php?id=<?php echo $area['id'] ?>" class="btn btn-danger">Eliminar</a>
            <!--<button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id="<?php //echo $area['id_area']; ?>">Borrar</button>-->
            </div>

        </div>
      </div>
</div>
<!---fin ventana eliminar--->
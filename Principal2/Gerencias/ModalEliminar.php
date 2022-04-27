<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteGerencia<?php echo $gerencia['idarea']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-dark">
                ¿Deseas eliminar gerencia?
            </h5>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important" class="text-muted"> 
            <?php echo $gerencia['nombre']; ?>
          </strong>
          <hr>
          <i>Pdta: Recuerda que para eliminar una gerencia debes asegurarte que ningún <b>usuario/área</b> esté relacionado a esta gerencia.</i>
          
        </div>
        
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <a href="recib_Delete.php?id=<?php echo $gerencia['idarea'] ?>" class="btn btn-danger">Eliminar</a>
            <!--<button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id="<?php //echo $area['id_area']; ?>">Borrar</button>-->
            </div>

        </div>
      </div>
</div>
<!---fin ventana eliminar--->
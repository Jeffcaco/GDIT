<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteChildresn<?php echo $usuarios['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-dark">
                ¿Deseas eliminar usuario?
            </h5>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important" class="text-muted"> 
            <?php echo $usuarios['nombre_usuario']; ?>
          </strong>
        </div>
        
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <a href="recib_Delete.php?id=<?php echo $usuarios['id_usuario'] ?>" class="btn btn-danger">Eliminar</a>
            <!--<button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id="<?php //echo $area['id_area']; ?>">Borrar</button>-->
            </div>

        </div>
      </div>
</div>
<!---fin ventana eliminar--->
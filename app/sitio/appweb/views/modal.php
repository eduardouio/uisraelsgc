<!-- Modal -->
  <div class="modal-header">
    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"style ="float:right;">X</button>
    <h3 id="myModalLabel"><img src="<?php print base_url(); ?>img/sitio/title.png" alt="forward"> &nbsp;<?php print $modal[0]['title']; ?></h3>
  </div>
  <div class="modal-body">
    <p>
      
      <?php print $modal[0]['content'];?>
    </p>
  </div>
  <div class="modal-footer">
    <small style ="float:left;"> 
      <div class="badge badge-info"> Visto <?php print $modal[0]['counter']?> veces </div>
      <div class="badge badge-info">Publicado <?php print $modal[0]['create_date']; ?> <br/> </div>   
    </small>
    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="icon-off icon-white"></i>&nbsp;Cerrar</button>

</div> <!-- ./ Modal --> 
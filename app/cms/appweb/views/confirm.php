<div aria-hidden="false" style="display: block;" id="myModal2" class="modal message hide fade in bg-color-grayligth">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
         <h3><span class=" icon-warning-sign">&nbsp;&nbsp;&nbsp;</span>Está seguro que desea Eliminar!...</h3>
      </div>
      <div class="modal-body">
         <h3><?php print $confirm['title']; ?></h3>
         <p><?php print $confirm['message']; ?></p>
      </message>
      <div class="modal-footer">
         <a class="btn  btn-info btn-large" data-dismiss="modal" href="<?php $destino; ?>">Cancelar</a>         
         <a class="btn btn-danger btn-large" href="<?php print (base_url() . 'index.php/home/confirm/' . $confirm['idarticle']); ?>">Continuar</a>

      </div>
</div>
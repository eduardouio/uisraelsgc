<div aria-hidden="false" style="display: block;" id="myModal2" class="modal message hide fade in bg-color-grayligth">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
         <h3><span class=" icon-info-3">&nbsp;&nbsp;&nbsp;</span>Advertencia!...</h3>
      </div>
      <div class="modal-body">
         <h3><?php print $alert['title']; ?></h3>
         <p><?php print $alert['message']; ?></p>
      </message>
      <div class="modal-footer">
         <a class="btn  btn-success btn-large" data-dismiss="modal" href="<?php $destino; ?>">Entiendo!</a>         
      </div>
</div>
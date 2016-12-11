        <div style="float:right;width: 50%;height50%"> <img src="<?php print base_url();?>img/sitio/buzon.png"></div>
        <form method="post" id="formulario" action="<?php print base_url();?>index.php/contactos/">
          <fieldset>
            <div class="control-group">
              <div class="controls">
                <label class="control-label">Nombres:</label> 
                <input class="input-xlarge focused" required="required" placeholder="Nombres" id="nombres" name="nombres" value="<?php print set_value('nombres')?>" type="text">                   
              </div>      
              <div class="controls">
                <label class="control-label">E-mail:</label>
                <input placeholder="Email" required="required" id="email" name="email" value="<?php print set_value('email')?>" type="text">
              </div>      
              <div class="controls">
                <label class="control-label">Empresa:</label>            
                <input class="input-medium" placeholder="Empresa" required="required" id="empresa" name="empresa" value="<?php print set_value('empresa')?>" type="text">
              </div>            
              <div class="controls">
                <label class="control-label">Telefono:</label>
                <input class="input-medium" required="required" placeholder="Teléfono" id="telefono" name="telefono" value="<?php print set_value('telefono')?>" type="text">
              </div>      
              <div class="controls">
                <label class="control-label">Asunto:</label>
                <input class="input-xlarge" required="required" placeholder="Asunto Mensaje" id="asunto" name="asunto" value="<?php print set_value('asunto')?>" type="text">
              </div>      
              <div class="controls">
                <label class="control-label">Descripción:</label>            
                <textarea class="input-xlarge" required="required" placeholder="Sus Comentarios Son Importantes" id="texto_asunto" name="texto_asunto" rows="4" columns="60"><?php print set_value('texto_asunto'); ?></textarea>
              </div>
              <div class="controls">
                <div class="form-actions">
                  <button type="submit" class="btn btn-info">Enviar Información</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                </div>    
                <b>Dirección Oficina: </b> Av Cristóbal Colón 1133 y Av. 12 de Octubre Edificio Plaza Piso 11 <b>Of:</b> 1199<br>
                <b>Telfonos:</b> +593 (2) 7172-563 +593 (2) 9851-901 <b>Fax:</b> 593 (2) 2873-508<br> 
                <b>Email:</b> <a href="mailto:info@ispade.liposerve.com" class="label label-inverse"> info@ispade.liposerve.com </a>
              </div>
            </div></fieldset>
          </form>
        </div>
      </div>
    </div> <!-- ./Contenedor Fluido-->
  </div> <!-- ./ Cuerpo de contenidos-->
  <!--/Presentacion de contenidos-->

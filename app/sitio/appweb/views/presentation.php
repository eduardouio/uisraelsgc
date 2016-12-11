        <div class="#myModal">
        </div>
        <!-- Articulos de la página -->
        <?php
          foreach ($presentation as $articulo) {
            print('<div class="articulo">');
            print('<h4> <img src="' . base_url() . 'img/sitio/title.png" alt="title">' . $articulo['title'] .'</h4>');
            print('<p><img src="' . base_url() .'/img/sitio/content.png" >' . $articulo['content'] . '<p>');
            print('<a href="'. base_url() . 'index.php/articulos_ajax/articulo/' . $articulo['id_article'].'" 
              class="btn btn-inverse " role="button" data-toggle="modal" >
              <i class="icon-fullscreen icon-white"></i>&nbsp;Abrir</a><hr></div>');
          }
        ?>        
      <?php echo $this->pagination->create_links();  ?>
      </div>   
    </div> <!-- ./Articulos de la página-->  
  </div>
</div> <!-- ./Contenedor Fluido-->
</div> <!-- ./ Cuerpo de contenidos-->
<!--/Presentacion de contenidos-->

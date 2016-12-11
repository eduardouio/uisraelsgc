<!--Articulos Home -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <div class="row">
        <!-- Se repite tres veces debajo del carrucell -->
        
        <?php
        $x = 1;
        foreach ($articles_home as $item) {
          print('<div class="span4">') ;
          print('<img  src="'. base_url() .$item['image'] .'">');
          print('<h2> ' . $item['title'] . '</h2>');
          print('<p>'.$item['content'].'</p>');
          if($x==3){
            print('<p><a class="btn btn-success" href="'.base_url(). 'img/portada/manual.pdf" target="_blank">Descargar Manual &raquo;</a></p>');
          }elseif($x==2){
            print('<p><a class="btn btn-info" href="'.base_url(). 'index.php/noticias">Más Detalles &raquo;</a></p>');
          }elseif($x==1){
            print('<p><a class="btn btn-info" href="'.base_url(). 'index.php/home">Más Detalles &raquo;</a></p>');
          }
          print('</div><!-- /.span4 -->');
          $x++;
        }
        ?>        
      </div><!-- /.row -->
    </div>
    <?php print ('<br/>');?>
    <!--/Articulos Home -->

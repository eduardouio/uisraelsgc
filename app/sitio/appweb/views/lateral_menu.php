<!--Presentacion de contenidos-->
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<!--Cuerpo de contenidos-->
<div class="container">
  <!--Contenedor Fluido-->
  <div class="container-fluid">
    <div class="row-fluid">
      <!--Menú Lateral-->
      <div class="span3">
        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li class="active"><a href=""><i class="icon-plus"></i> Lo más visto...</a></li>
            <?php
                foreach ($lateral_menu as $article) {
                  print ('<li>
                          <a href="'.base_url().'index.php/articulos_ajax/articulo/'. $article['id_article'] .'" role="button" data-toggle="modal">
                          <i class="icon-play"></i> '. $article['title'] . ' </a>
                        </li>');
                }
            ?>
          </ul>
        </div>                
      </div>  
      <!--Menú Lateral-->
      <!--Articulos de la página-->
      <div class="span9 hero-unit">
<div class="container"> <!-- Cuerpo de contenidos -->
  <header id="nav-bar" class="container">
    <div class="row"> <!-- Primera fila de contenidos -->
      <div class="span12"> <!-- Menú titulo página -->
        <div id="header-container">
          <a id="backbutton" class="win-backbutton" href="#"></a>
          <h5>Estás en la Pagina: <?php print $info_page['controller']; ?></h5>
          <div class="dropdown">
            <a class="header-dropdown dropdown-toggle accent-color" data-toggle="dropdown" href="#" >
              Sección del sitio: Sitio/<?php print $info_page['controller']  ?>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php print base_url() . 'index.php/' . $info_page['controller']; ?>/create"><span class="icon-document"></span>&nbsp;Nuevo Artículo</a></li>
              <li><a href="<?php print(base_url() . 'index.php/search/'); ?>"><span class="icon-search"></span>&nbsp;Buscar Artículo</a></li>
            </ul>
          </div>
        </div>
        <div id="top-info" class="pull-right">
          <div class="pull-left">
            <a href="<?php print base_url() . 'index.php/' . $info_page['controller']; ?>/create" class="btn btn-primary btn-large"><span class="icon-document"></span>&nbsp;Nuevo Artículo</a> 
            <a href="<?php print(base_url() . 'index.php/search/'); ?>" class="btn btn-primary btn-large"><span class="icon-search"></span>&nbsp;Buscar Artículo</a>
          </div>
        </div>
      </div><!-- /Menú titulo página -->
    </div> <!-- /Primera fila de contenidos -->
  </header>
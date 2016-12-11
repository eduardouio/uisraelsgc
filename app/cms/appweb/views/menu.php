<body>
<div class="container navbar-wrapper"> <!--Barra de Menú-->
  <div class="navbar navbar-inverse">
    <div class="navbar-inner">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php print base_url();?>index.php/home"> 
        <span class="icon-arrow-right-2"></span>&nbsp;Panel de Control&nbsp;<span class="icon-arrow-left-2"></span></a>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="<?php @print $menu['home'];?>"><a href="<?php print base_url(); ?>index.php/home"><i class="icon-home icon-white" style="font-size: 32px;"></i>&nbsp; Inicio</a></li>
            <li class="<?php @print $menu['nosotros'];?>"><a href="<?php print base_url(); ?>index.php/nosotros"><i class="icon-users-2 icon-white" style="font-size: 32px;"></i> &nbsp; Nosotros</a></li>
            <li class="<?php @print $menu['noticias'];?>"><a href="<?php print base_url(); ?>index.php/noticias"><i class=" icon-newspaper icon-white" style="font-size: 32px;"></i>&nbsp; Noticias</a></li>
            <li class="<?php @print $menu['servicios'];?>"><a href="<?php print base_url(); ?>index.php/servicios"><i class=" icon-drawer-4  icon-white" style="font-size: 32px;"></i>&nbsp; Servicios</a></li>
            <a href="<?php print base_url(); ?>/index.php/login" class ="btn btn-info pull-right"><span class="icon-logout" aria-hidden="true" style="font-size: 32px;"></span>&nbsp;Salir</a>
          </ul>
        </div>
      </div>
    </div>
</div><!--/Barra de Menú-->
<!--Cuerpo de página-->
<body>
<div id="fb-root"></div>
        <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Fav and touch icons -->
<!-- Menu-->

     <!-- NAVBAR
     ================================================== -->
     <!-- Wrap the .navbar in .container to center it on the page and provide easy way to target it with .navbar-wrapper. -->
     <div class="container navbar-wrapper">
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php print base_url();  ?>">ISPADE</a>
          <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
          <div class="nav-collapse">
            <ul class="nav">
              <li class="<?php @print $menu['home'];?>"><a href="<?php print base_url();?>"><i class="icon-home icon-white"></i>&nbsp; Inicio</a></li>
              <li class="<?php @print $menu['nosotros'];?>"><a href="<?php print base_url();?>index.php/nosotros"><i class="icon-globe icon-white"></i> &nbsp; Nosotros</a></li>
              <li class="<?php @print $menu['noticias'];?>"><a href="<?php print base_url();?>index.php/noticias"><i class="icon-inbox icon-white"></i>&nbsp; Noticias</a></li>
              <li class="<?php @print $menu['servicios'];?>"><a href="<?php print base_url();?>index.php/servicios"><i class="icon-th-large icon-white"></i>&nbsp; Servicios</a></li>
              <li class="<?php @print $menu['contactos'];?>"><a href="<?php print base_url();?>index.php/contactos"><i class="icon-comment icon-white"></i>&nbsp; Contáctos</a></li>
              <!-- Read about Bootstrap dropdowns at http://twitter.github.com/bootstrap/javascript.html#dropdowns -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-certificate icon-white"></i>&nbsp; Extras <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><div class="fb-like" data-href="http://isp.liposerve.com" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true" data-colorscheme="dark" data-action="recommend"></div></a></li>
                  <li><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweetear Esta Página</a></li>
                  <li class="divider"></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!-- /.navbar-inner -->
      </div><!-- /.navbar -->
    </div><!-- /.container -->
    <!--/menu-->
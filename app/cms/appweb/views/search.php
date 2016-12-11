<div class="container"> <!-- Cuerpo de contenidos -->
	<header id="nav-bar" class="container">
		<div class="row"> <!-- Primera fila de contenidos -->
			<div class="span12"> <!-- Menú titulo página -->
				<div id="header-container">
					<div class="dropdown">
						<a class="header-dropdown dropdown-toggle accent-color" data-toggle="dropdown">
							Búsqueda de artículos en el sitio
						</a>
					</div>
				</div>
				<form class="form-inline" method="post" action="<?php print base_url() ?>index.php/search/resultado">
					<div class="input-prepend input-append">
					<span class="add-on">Criterio &nbsp;&nbsp;&nbsp;</span>
					<input name ="criterio" type="text" class="input-xxlarge search-query" id="inputCriterio" placeholder="Ingrese un Texto">
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="input-prepend input-append">
					<span class="add-on">Seleccione &nbsp;&nbsp;&nbsp;</span>
					<select name="campo">
						<option selected="" name="title">Título</option>
						<option name="content">Contenido</option>						
					</select>
				</div>
					<div id="top-info" class="pull-right">
						<div class="pull-left">
							<button type="submit" class="btn btn-large"><span class="icon-search"></span>Buscar</button>

						</div>
					</div>
				</form>
			</div><!-- /Menú titulo página -->
		</div> <!-- /Primera fila de contenidos -->
	</header>

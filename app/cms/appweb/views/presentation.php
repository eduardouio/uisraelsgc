<header id="nav-bar" class="container">
	<div class="row"> <!-- Primera fila de contenidos -->
		<div class="span12"> <!-- Menú titulo página -->
			<div id="header-container">
				<div class="dropdown">
					<a class="header-dropdown dropdown-toggle accent-color" data-toggle="dropdown">
						<?php print $presentation[0]['title']; ?>
					</a>
				</div>
			</div>
			<div id="top-info" class="pull-right">
				<div class="pull-left">
					<a href="<?php print base_url() . 'index.php/' . $presentation['controller'] .'/edit/'.$presentation[0]['id_article']; ?> " 
								class="btn btn-inverse btn-large"><span class="icon-pencil"></span>&nbsp;Editar Artículo</a> 
					<a href="<?php print base_url() . 'index.php/' . $presentation['controller'] .'/delete/'.$presentation[0]['id_article']; ?> "  class="btn btn-danger btn-large"><span class="icon-trash"></span>&nbsp;Eliminar Artículo</a>
				</div>
			</div>
		</div><!-- /Menú titulo página -->
	</div> <!-- /Primera fila de contenidos -->
</header>
<div class="container ">
	<div class="row"> <!-- Segunda Fila de contenidos -->
		<div class="span12">
			<table class="table table-condensed table-striped ">	
				<tbody>
					<tr>
						<td class="span2">
							<b>Id Artículo</b></td>
							<td><?php print $presentation[0]['id_article'];?></td>
						</tr>
						<tr>						
							<td><b>Creado</b></td>
							<td><?php print $presentation[0]['create_date'];?></td>
						</tr>
						<tr>						
							<td><b>Editado</b></td>
							<td><?php print $presentation[0]['last_update'];?></td>
						</tr>
						<tr>						
							<td><b>Visto</b></td>
							<td><?php print $presentation[0]['counter'];?> Veces</td>
						</tr>
						<tr>						
							<td><b>Imágen</b></td>
							
						</tr>
						<tr>						
							<td><b>Contenido</b></td>
							<td>
								<?php print $presentation[0]['content'];?>								
							</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
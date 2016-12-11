<style type="text/css" media="screen">
	.btn.jumbo {
		font-size: 20px;
		font-weight: normal;
		padding: 14px 24px;
		margin-right: 10px;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
	}
</style>
</head>
<body>
	<div class="container">
	<div class="hero-unit" style="margin-top:40px">
		<?php print(validation_errors()); ?>
		<h2>IanCMS <small> &nbsp; Editor de Artículos</small></h2>
		<form action="<?php print base_url() . 'index.php/'. $form['controller']; ?>/saveForm" enctype="multipart/form-data" method="post">			
		<input type="hidden" value="<?php @print $form[0]['id_article'];@print $form['id_article'];print set_value('id_article');?>" name="id_article"/>
		<input name="title" class="input-xxlarge" type ="text" placeholder="Titulo" required="TRUE" autofocus="TRUE" value="<?php @print $form[0]['title']; print set_value('title'); ?>"> <br>
		<textarea class="textarea" placeholder="Ingrese un Texto ..." style="width: 1000px; height: 400px" name="content">
			<?php @print $form[0]['content']; print set_value('content'); ?>
		</textarea>
		<button class="btn btn-large btn-info" type="submit">Guardar</button>
		<a class="btn btn-large btn-inverse" href="<?php @print base_url() . 'index.php/' . $form['controller']; ?>">Cancelar</a>
		</form>
	</div>
</div>

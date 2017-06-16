<h1><i class="fa fa-pencil-square-o"></i> Nueva noticia</h1>
<form action="/noticias/create" method="POST">
	<div class="row">
		<div class="col-lg-7">
			<p><label>Titulo de la publicación</label></p>
			<p>
				<input type="text" class="form-control" placeholder="Nombre del post" name="titulo_noticia_input">
			</p>
		</div>
	</div>
	<p><label>Tipo de publicación</label></p>
	<p>
		<select class="form-control" name="tipo_noticia_input">
			<option value="noticia">Noticia</option>
			<option value="resena">Reseña</option>
			<option value="destacado">Destacado</option>
		</select>
	</p>
	<p><label>Contenido de la publicación</label></p>
	<textarea name="contenido_noticia_input" id="newPost" cols="120" rows="10"></textarea>
	<input type="hidden" name="autor_input" value="<?php echo $this->user->email; ?>">
	<input type="hidden" name="autor_id_input" value="<?php echo $this->user->id; ?>">
	<input type="hidden" name="fecha_input" value="<?php echo date("Y-m-d"); ?>">
	<p>
		<button type="submit" class="btn btn-primary">Crear noticia</button>
	</p>
</form>
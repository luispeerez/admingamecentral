<?php
$message = '';
if($this->get("e")){
    $e = $this->get("e");
    $message = '<div class="alert alert-warning" role="alert">Hubo un error intentalo de nuevo</div>';
}else if($this->get("m")) {
    $message = '<div class="alert alert-success" role="alert">Datos guardados correctamente</div>';
}
?>

<h1><i class="fa fa-pencil-square-o"></i> Editar noticia</h1>
<?php echo $message; ?>
<form action="/noticias/update/0" method="POST">
	<div class="row">
		<div class="col-lg-7">
			<p><label>Titulo de la publicación</label></p>
			<p>
				<input type="text" class="form-control" placeholder="Nombre del post" name="titulo_noticia_input" value="<?php echo $this->noticia->titulo_noticia; ?>">
			</p>
		</div>
	</div>
	<p><label>Tipo de publicación</label></p>
	<p>
		<select class="form-control" name="tipo_noticia_input" value="<?php echo $this->noticia->tipo_noticia ?>">
			<?php foreach ($this->tiposNoticia as $tipoNoticia => $nombreTipo){
				$selected = ($this->noticia->tipo_noticia == $tipoNoticia) ? 'selected="selected"' : '';
				echo '<option '. $selected .' value="' . $tipoNoticia . '">' . $nombreTipo . '</option>';
			}?>
		</select>
	</p>
	<p><label>Contenido de la publicación</label></p>
	<textarea name="contenido_noticia_input" id="newPost" cols="120" rows="10"><?php echo $this->noticia->contenido_noticia; ?></textarea>
	<input type="hidden" name="fecha_input" value="<?php echo $this->noticia->fecha ?>">
	<input type="hidden" name="autor_input" value="<?php echo $this->noticia->autor ?>">
	<input type="hidden" name="noticia_id" value="<?php echo $this->noticia->id ?>">
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Imagen</label></p>
		        <div class='imagen_i logotipo_i'>
		            <p>
		                <?php 
		                    $logo = $this->noticia->imagen;

		                 ?>
		                <input type="hidden" value="<?php echo (isset($logo))?$logo:'' ?>" id="logo_input" name="logo_input" />
		                <input type="file" name="imagen_input_file" id="imagen_input_file_edit" class='single-image edit' title='/noticias/update_image/,<?php echo $this->noticia->id ?>'/>
		            </p>       
		            <p class='uploaded_photos'> 
		                <?php 
		                if($this->noticia->imagen){
		                    $rand = rand();
		                    echo <<<EOD
		                    <span class='photo'>
		                        <a href='/uploads/noticias/large/{$this->noticia->imagen}'>
		                            <img src='/uploads/noticias/tiny/{$this->noticia->imagen}?r=$rand' alt=''/>
		                        </a>
		                        <a href='/noticias/destroy_image/<?php echo $this->noticia->id ?>' class='option_erase'>Borrar</a>
		                    </span>             
EOD;
		                }
		                ?>
		            </p>
		        </div>
			</div>
		</div>
	</div>
	<p>
		<button type="submit" class="btn btn-primary">Editar noticia</button>
	</p>
</form>
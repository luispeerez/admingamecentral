<?php
$message = '';
if($this->get("e")){
    $e = $this->get("e");
    $message = '<div class="alert alert-warning" role="alert">Hubo un error intentalo de nuevo</div>';
}else if($this->get("m")) {
    $message = '<div class="alert alert-success" role="alert">Datos guardados correctamente</div>';
}
?>

<h1><i class="fa fa-tags"></i> Modificar información de producto</h1>
<?php echo $message; ?>
<form action="/productos/update/0" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Nombre del producto</label></p>
				<input type="text" class="form-control"  placeholder="Nombre del producto" name="nombre_input" value="<?php echo $this->producto->nombre; ?>">
				<input type="hidden" name="producto_id" value="<?php echo $this->producto->id ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Tipo de producto</label></p>
			<select class="form-control" name="tipo_producto_input">
				<?php 
					foreach ($this->tiposProducto as $tipo_key => $tipo_label) {
						$selected = $this->producto->tipo_producto == $tipo_key ? 'selected="selected"' : '';
						echo '<option '. $selected .' value="' . $tipo_key. '">' . $tipo_label . '</option>'; 
					}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p> <label for="descripcion">Descripcion del producto</label> </p>
				<textarea cols="80" rows="5" name="descripcion_input" id="descripcion"><?php echo $this->producto->descripcion; ?></textarea> </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Plataforma</label></p>
			<select class="form-control" name="plataforma_input">
				<?php 
					foreach ($this->plataformas as $plataforma) {
						$selected = $plataforma->id == $this->producto->plataforma->id ? 'selected="selected"' : '';
						echo '<option '. $selected .' value="' . $plataforma->id. '">' . $plataforma->nombre . '</option>'; 
					}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p> <label for="descripcion">Imagenes del producto</label> </p>
				<div><input type="file" name="gallery_input" id="gallery_input" class='multi-image' title='/productos/add_photo/,<?php echo $this->producto->id; ?>' /></div>
				<div class='uploaded_photos'>
				<?php 
					if($this->producto->imagenes){
						foreach($this->producto->imagenes as $imagen){
							$rand = rand();
							echo <<<EOD
							<span class='photo'>
								<a href='/uploads/productos/{$imagen->imagen}'>
									<img src='/uploads/productos/tiny/{$imagen->imagen}?r=$rand' alt=''/>
								</a>
								<a href='/productos/destroy_photo/{$imagen->id}' class='option_erase'>Borrar</a>
							</span>				
EOD;
						}
					}
				?>
				</div>
				<div class='clear'></div>
		</div>
	</div>
	<div>
		<p><button type="submit" class="btn btn-primary">Editar producto</button></p>
	</div>
	<?php 
		/*foreach ($this->producto->imagenes as $imagen) {
			echo "<br/>" . $imagen->imagen;
		}*/
	?>
</form>
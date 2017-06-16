<?php
$message = '';
if($this->get("e")){
    $e = $this->get("e");
    $message = '<div class="alert alert-warning" role="alert">Hubo un error intentalo de nuevo</div>';
}else if($this->get("m")) {
    $message = '<div class="alert alert-success" role="alert">Datos guardados correctamente</div>';
}
?>

<h1><i class="fa fa-bullhorn"></i> Modificar información de promoción</h1>
<form action="/promociones/update/0" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<?php echo $message; ?>
			<p><label>Nombre de la promoción</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Nombre de la promocion" name="nombre_input" value="<?php echo $this->promocion->nombre; ?>">
				<input type="hidden" name="promocion_id" value="<?php echo $this->promocion->id ?>">			
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Fecha limite de la promoción</label></p>
				<input type="text" class="form-control customDatePicker"  placeholder="" name="fecha_limite_input" value="<?php echo $this->promocion->fecha_limite ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Imagen</label></p>
		        <div class='imagen_i logotipo_i'>
		            <p>
		                <?php 
		                    $logo = $this->promocion->imagen;

		                 ?>
		                <input type="hidden" value="<?php echo (isset($logo))?$logo:'' ?>" id="logo_input" name="logo_input" />
		                <input type="file" name="imagen_input_file" id="imagen_input_file_edit" class='single-image edit' title='/promociones/update_image/,<?php echo $this->promocion->id ?>'/>
		            </p>       
		            <p class='uploaded_photos'> 
		                <?php 
		                if($this->promocion->imagen){
		                    $rand = rand();
		                    echo <<<EOD
		                    <span class='photo'>
		                        <a href='/uploads/promociones/large/{$this->promocion->imagen}'>
		                            <img src='/uploads/promociones/tiny/{$this->promocion->imagen}?r=$rand' alt=''/>
		                        </a>
		                        <a href='/promociones/destroy_image/<?php echo $this->promocion->id ?>' class='option_erase'>Borrar</a>
		                    </span>             
EOD;
		                }
		                ?>
		            </p>
		        </div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Editar promocion</button>
</form>
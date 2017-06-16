<?php
$message = '';
if($this->get("e")){
    $e = $this->get("e");
    $message = '<div class="alert alert-warning" role="alert">Hubo un error intentalo de nuevo</div>';
}else if($this->get("m")) {
    $message = '<div class="alert alert-success" role="alert">Datos guardados correctamente</div>';
}
?>
<h1><i class="fa fa-user"></i> Modificar información de usuario</h1>
<?php echo $message; ?>
<form action="/usuarios/update/0" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<p><label>Email del usuario</label></p>
			<div class="form-group">
				<input type="text" class="form-control" value="<?php echo $this->usuario->email ?>" placeholder="Email de usuario" name="email_input">
				<input type="hidden" name="usuario_id" value="<?php echo $this->usuario->id ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Nombre del usuario</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Nombre del usuario" name="nombre_input" value="<?php echo $this->usuario->nombre ?>">
			</div>
		</div>
	</div>
	<!--<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<input type="text" class="form-control" value="<?php echo $this->usuario->password ?>" placeholder="Contraseña de usuario" name="password_input">
			</div>
		</div>
	</div>-->
	<div class="row">
		<div class="col-lg-5">
			<p><label>Tipo de usuario</label></p>
			<div class="form-group">
				<select class="form-control" name="tipo_usuario_input">
					<?php 
						$selected1 = '';
						$selected2 = ''; 
						if($this->usuario->tipo_usuario == 'administrador')
							$selected1 = 'selected="selected"';
						else
							$selected2 = 'selected="selected"'
					?>
					<option <?php echo $selected1 ?> value="administrador">Administrador</option>
					<option <?php echo $selected2 ?> value="colaborador">Colaborador</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Información adicional del usuario</label></p>
				<div>
					<textarea name="informacion_input" cols="60" rows="5"><?php echo $this->usuario->informacion ?></textarea>
				</div>
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
		                    $logo = $this->usuario->imagen;

		                 ?>
		                <input type="hidden" value="<?php echo (isset($logo))?$logo:'' ?>" id="logo_input" name="logo_input" />
		                <input type="file" name="imagen_input_file" id="imagen_input_file_edit" class='single-image edit' title='/usuarios/update_image/,<?php echo $this->usuario->id ?>'/>
		            </p>       
		            <p class='uploaded_photos'> 
		                <?php 
		                if($this->usuario->imagen){
		                    $rand = rand();
		                    echo <<<EOD
		                    <span class='photo'>
		                        <a href='/uploads/usuarios/large/{$this->usuario->imagen}'>
		                            <img src='/uploads/usuarios/tiny/{$this->usuario->imagen}?r=$rand' alt=''/>
		                        </a>
		                        <a href='/usuarios/destroy_image/<?php echo $this->usuario->id ?>' class='option_erase'>Borrar</a>
		                    </span>             
EOD;
		                }
		                ?>
		            </p>
		        </div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Editar usuario</button>
</form>
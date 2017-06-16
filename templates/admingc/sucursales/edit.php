<?php
$message = '';
if($this->get("e")){
    $e = $this->get("e");
    $message = '<div class="alert alert-warning" role="alert">Hubo un error intentalo de nuevo</div>';
}else if($this->get("m")) {
    $message = '<div class="alert alert-success" role="alert">Datos guardados correctamente</div>';
}
?>

<h1><i class="fa fa-map-marker"></i> Modificar información de sucursal</h1>
<?php echo $message; ?>
<form action="/sucursales/update/0" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<p><label>Nombre de la sucursal</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Nombre de la sucursal" name="nombre_input" value="<?php echo $this->sucursal->nombre; ?>">
				<input type="hidden" name="sucursal_id" value="<?php echo $this->sucursal->id ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Ciudad de la sucursal</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Ciudad de la sucursal" name="ciudad_input" value="<?php echo $this->sucursal->ciudad; ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Estado de la sucursal</label></p>
				<select class="form-control" name="estado_input">
					<?php 
						foreach ($this->estados as $estado) {
							$selected = $this->sucursal->estado == $estado['label'] ? 'selected' : '';
							echo "<option value='". $estado['label'] ."'' " . $selected . ">". $estado['label'] . "</option>";
						}
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Dirección de la sucursal</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Direccion de la sucursal" name="direccion_input" value="<?php echo $this->sucursal->direccion; ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Telefono de la sucursal</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Telefono de la sucursal" name="telefono_input" value="<?php echo $this->sucursal->telefono; ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Correo electronico</label></p>
			<div class="form-group">
				<input type="email" class="form-control"  placeholder="Correo electronico de la sucursal" name="correo_input" value="<?php echo $this->sucursal->correo; ?>">
			</div>
		</div>
	</div>
	<h2>Coordenadas de sucursal</h2>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Latitud</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Latitud" name="latitud_input" value="<?php echo $this->sucursal->latitud ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Longitud</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Longitud" name="longitud_input" value="<?php echo $this->sucursal->longitud ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>URL de pagina en Facebook</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Facebook" name="facebook_input" value="<?php echo $this->sucursal->facebook ?>">
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Editar sucursal</button>
</form>
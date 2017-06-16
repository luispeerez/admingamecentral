<?php
$message = '';
if($this->get("e")){
    $e = $this->get("e");
    $message = '<div class="alert alert-warning" role="alert">Hubo un error intentalo de nuevo</div>';
}else if($this->get("m")) {
    $message = '<div class="alert alert-success" role="alert">Datos guardados correctamente</div>';
}
?>

<h1><i class="fa fa-gamepad"></i> Modificar información de plataforma</h1>
<form action="/plataformas/update/0" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<p><label>Nombre de la plataforma</label></p>
			<div class="form-group">
				<input type="text" class="form-control" value="<?php echo $this->plataforma->nombre; ?>"  placeholder="Nombre de la plataforma" name="nombre_input">
				<input type="hidden" name="plataforma_id" value="<?php echo $this->plataforma->id; ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Empresa a la que pertenece la plataforma</label></p>
				<select class="form-control" name="empresa_input" value="<?php echo $this->plataforma->empresa; ?>">
					<option value="Microsoft">Microsoft</option>
					<option value="Sony">Sony</option>
					<option value="Nintendo">Nintendo</option>
					<option value="PC">PC</option>
					<option value="Otro">Otro</option>
				</select>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Editar plataforma</button>
</form>
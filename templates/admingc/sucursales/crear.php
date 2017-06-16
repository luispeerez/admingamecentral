<h1><i class="fa fa-map-marker"></i> Agregar sucursal</h1>
<form action="/sucursales/create" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<p><label>Nombre de la sucursal</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Nombre de la sucursal" name="nombre_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Ciudad de la sucursal</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Ciudad de la sucursal" name="ciudad_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Estado de la sucursal</label></p>
				<select  class="form-control" name="estado_input">
					<?php 
						foreach ($this->estados as $estado) {
							echo "<option value='". $estado['label'] ."''>". $estado['label'] . "</option>";
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
				<input type="text" class="form-control"  placeholder="Direccion de la sucursal" name="direccion_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Telefono de la sucursal</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Telefono de la sucursal" name="telefono_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Correo electronico de la sucursal</label></p>
			<div class="form-group">
				<input type="email" class="form-control"  placeholder="Correo electronico de la sucursal" name="correo_input">
			</div>
		</div>
	</div>
	<h2>Coordenadas de sucursal</h2>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Latitud</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Latitud" name="latitud_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Longitud</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Longitud" name="longitud_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>URL de pagina en Facebook</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Facebook" name="facebook_input">
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Crear sucursal</button>
</form>
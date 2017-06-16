<h1><i class="fa fa-gamepad"></i> Agregar plataforma</h1>
<form action="/plataformas/create" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<p><label>Nombre de la plataforma</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Nombre de la plataforma" name="nombre_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Empresa a la que pertenece la plataforma</label></p>
				<select class="form-control" name="empresa_input">
					<option value="Microsoft">Microsoft</option>
					<option value="Sony">Sony</option>
					<option value="Nintendo">Nintendo</option>
					<option value="PC">PC</option>
					<option value="Otro">Otro</option>
				</select>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Crear plataforma</button>
</form>
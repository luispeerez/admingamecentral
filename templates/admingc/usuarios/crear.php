<h1><i class="fa fa-user"></i> Agregar usuario</h1>
<form action="/usuarios/create" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<p><label>Email del usuario</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Email de usuario" name="email_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Nombre del usuario</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Nombre del usuario" name="nombre_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Contraseña de usuario</label></p>
			<div class="form-group">
				<input type="password" class="form-control"  placeholder="Contraseña de usuario" name="password_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Elige el tipo de usuario a crear</label></p>
				<select class="form-control" name="tipo_usuario_input">
					<option value="administrador">Administrador</option>
					<option value="colaborador">Colaborador</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Información adicional del usuario</label></p>
				<div>
					<textarea name="informacion_input" cols="60" rows="5"></textarea>
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Crear usuario</button>
</form>
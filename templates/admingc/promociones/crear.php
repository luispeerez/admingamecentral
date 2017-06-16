<h1><i class="fa fa-bullhorn"></i> Agregar promocion</h1>
<form action="/promociones/create" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-5">
			<p><label>Nombre de la promoción</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Nombre de la promocion" name="nombre_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p><label>Fecha limite de la promoción</label></p>
				<input type="text" class="form-control customDatePicker"  placeholder="" name="fecha_limite_input">
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Crear promocion</button>
</form>
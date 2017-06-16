<h1><i class="fa fa-tags"></i> Agregar producto</h1>
<form action="/productos/create" method="POST">
	<div class="row">
		<div class="col-lg-5">
			<p><label>Nombre del producto</label></p>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Nombre del producto" name="nombre_input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Tipo de producto</label></p>
			<select class="form-control" name="tipo_producto_input" id="">
				<?php 
					foreach ($this->tiposProducto as $tipo_key => $tipo_label) {
						echo '<option value="' . $tipo_key. '">' . $tipo_label . '</option>'; 
					}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<p><label>Plataforma</label></p>
			<select class="form-control" name="plataforma_input">
				<?php 
					foreach ($this->plataformas as $plataforma) {
						echo '<option value="' . $plataforma->id. '">' . $plataforma->nombre . '</option>'; 
					}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<p> <label for="descripcion">Descripcion del producto</label> </p>
				<textarea  cols="80" rows="5" name="descripcion_input" id="descripcion"></textarea>

			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Crear producto</button>
</form>
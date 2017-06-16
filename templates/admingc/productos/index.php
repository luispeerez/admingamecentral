<h2><i class="fa fa-tags"></i> Productos</h2>
<p><a href="/productos/crear"><i class="fa fa-plus"></i> Crear producto</a></p>
<div ng-controller="searchCTL" ng-cloak>
   <script>
       window.modelo = 'productos';
       window.campo = 'nombre';
       window.campos = [{"etiqueta":"ID","valor":"id"},
                        {"etiqueta":"Nombre","valor":"nombre"},
                        {"etiqueta":"Tipo de producto","valor":"tipo_producto"},
                        {"etiqueta":"Plataforma","valor":"plataforma"}
                    ];
   </script>
    <div class="row no-margin">
        <div class="form-horizontal">
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="form-control" ng-model="search" placeholder="Buscar">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Ordenar por</label>
                    <div class="col-sm-8">
                        <select class="form-control" ng-model="orden" ng-options="c.valor as c.etiqueta for c in campos">
                        </select>  
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="row">
                            <form>
                            <div class="col-sm-6"><label for="asc" >Ascendente</label> <input id="asc" type="radio" ng-model="forma" value="-"></div>
                            <div class="col-sm-6"><label for="desc">Descendente</label> <input type="radio" id="desc" ng-model="forma" value="+"></div>
                            </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>
	<table class="table table-hover table-bordered footable">
		<thead>
			<tr>
				<th data-hide="phone,tablet">ID</th>
				<th>Nombre</th>
				<th data-hide="phone,tablet">Tipo de producto</th>
				<th data-hide="phone,tablet">Plataforma</th>
				<th>Editar producto</th>
				<th>Eliminar producto</th>
			</tr>		
		</thead>
		<tbody>
			<tr ng-repeat="registro in registros | searchFor:search:campo | orderBy:forma+orden">
				<td>{{getPropiedad(registro,'id')}}</td>
				<td>{{getPropiedad(registro,'nombre')}}</td>
				<td>{{getPropiedad(registro,'tipo_producto')}}</td>
				<td>{{getPropiedad(registro,'plataforma')}}</td>
				<td><a href="/productos/edit/{{getPropiedad(registro,'id')}}">Editar producto</a></td>
				<td><a href="/productos/destroy/{{getPropiedad(registro,'id')}}" class="delete-register">Eliminar producto</a></td>
			</tr>

			<!--<?php foreach ($this->productos as $producto): ?>
				<tr>
					<td><?php echo $producto->id; ?></td>
					<td><?php echo $producto->nombre; ?></td>
					<td><?php echo $producto->tipo_producto; ?></td>
					<td><?php echo $producto->plataforma->nombre ?></td>
					<td><a href="/productos/edit/<?php echo $producto->id; ?>">Editar producto</a></td>
					<td><a href="/productos/destroy/<?php echo $producto->id; ?>" class="delete-register">Eliminar producto</a></td>
				</tr>
			<?php endforeach; ?>-->
		</tbody>
	</table>
</div>
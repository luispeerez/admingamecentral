<h2><i class="fa fa-map-marker"></i> Sucursales</h2>
<p><a href="/sucursales/crear"><i class="fa fa-plus"></i> Crear sucursal</a></p>
<div ng-controller="searchCTL" ng-cloak>
   <script>
       window.modelo = 'sucursales';
       window.campo = 'nombre';
       window.campos = [{"etiqueta":"ID","valor":"id"},
                        {"etiqueta":"Nombre","valor":"nombre"},
                        {"etiqueta":"Ciudad","valor":"ciudad"},
                        {"etiqueta":"Telefono","valor":"telefono"},
                        {"etiqueta":"Correo","valor":"correo"},

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
				<th data-hide="phone,tablet">Ciudad</th>
				<th data-hide="phone">Telefono</th>
				<th data-hide="phone,tablet">Correo</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>		
		</thead>
		<tbody>
			<tr ng-repeat="registro in registros | searchFor:search:campo | orderBy:forma+orden">
				<td>{{getPropiedad(registro,'id')}}</td>
				<td>{{getPropiedad(registro,'nombre')}}</td>
				<td>{{getPropiedad(registro,'ciudad')}}</td>
				<td>{{getPropiedad(registro,'telefono')}}</td>
				<td>{{getPropiedad(registro,'correo')}}</td>
				<td><a href="/sucursales/edit/{{getPropiedad(registro,'id')}}">Editar sucursal</a></td>
				<td><a href="/sucursales/destroy/{{getPropiedad(registro,'id')}}" class="delete-register">Eliminar sucursal</a></td>
			</tr>
			<!--<?php foreach ($this->sucursales as $sucursal): ?>
				<tr>
					<td><?php echo $sucursal->id; ?></td>
					<td><?php echo $sucursal->nombre; ?></td>
					<td><?php echo $sucursal->ciudad; ?></td>
					<td><?php echo $sucursal->telefono; ?></td>
					<td><?php echo $sucursal->correo; ?></td>
					<td><a href="/sucursales/edit/<?php echo $sucursal->id; ?>">Editar sucursal</a></td>
					<td><a href="/sucursales/destroy/<?php echo $sucursal->id; ?>" class="delete-register" >Eliminar sucursal</a></td>

				</tr>
			<?php endforeach; ?>-->
			
		</tbody>
	</table>
</div>

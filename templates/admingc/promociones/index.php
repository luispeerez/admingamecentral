<h2><i class="fa fa-bullhorn"></i> Promociones</h2>
<p><a href="/promociones/crear"><i class="fa fa-plus"></i> Crear promocion</a></p>
<div ng-controller="searchCTL" ng-cloak>
   <script>
       window.modelo = 'promociones';
       window.campo = 'nombre';
       window.campos = [{"etiqueta":"ID","valor":"id"},
                        {"etiqueta":"Nombre","valor":"nombre"},
                        {"etiqueta":"Fecha limite","valor":"fecha_limite"}
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
				<th data-hide="phone">Fecha limite</th>
				<th>Editar promocion</th>
				<th>Eliminar promocion</th>
			</tr>	
		</thead>
		<tbody>
			<tr ng-repeat="registro in registros | searchFor:search:campo | orderBy:forma+orden">
				<td>{{getPropiedad(registro,'id')}}</td>
				<td>{{getPropiedad(registro,'nombre')}}</td>
				<td>{{getPropiedad(registro,'fecha_limite')}}</td>
				<td><a href="/promociones/edit/{{getPropiedad(registro,'id')}}">Editar promocion</a></td>
				<td><a href="/promociones/destroy/{{getPropiedad(registro,'id')}}" class="delete-register">Eliminar promocion</a></td>
			</tr>
			<!--<?php foreach ($this->promociones as $promocion): ?>
				<tr>
					<td><?php echo $promocion->id; ?></td>
					<td><?php echo $promocion->nombre; ?></td>
					<td><?php echo $promocion->fecha_limite; ?></td>
					<td><a href="/promociones/edit/<?php echo $promocion->id; ?>">Editar promocion</a></td>
					<td><a href="/promociones/destroy/<?php echo $promocion->id; ?>" class="delete-register">Eliminar promocion</a></td>
				</tr>
			<?php endforeach; ?>-->		
		</tbody>
	</table>

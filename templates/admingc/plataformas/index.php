<h2><i class="fa fa-gamepad"></i> Plataformas</h2>
<p><a href="/plataformas/crear"><i class="fa fa-plus"></i> Crear plataforma</a></p>
<div ng-controller="searchCTL" ng-cloak>
   <script>
       window.modelo = 'plataformas';
       window.campo = 'nombre';
       window.campos = [{"etiqueta":"ID","valor":"id"},
                        {"etiqueta":"Nombre de la plataforma","valor":"nombre"},
                        {"etiqueta":"Empresa","valor":"empresa"}
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
				<th>Nombre de la plataforma</th>
				<th data-hide="phone">Empresa</th>
				<th>Editar plataforma</th>
				<th>Eliminar plataforma</th>
			</tr>		
		</thead>
		<tbody>
			<tr ng-repeat="registro in registros | searchFor:search:campo | orderBy:forma+orden">
				<td>{{getPropiedad(registro,'id')}}</td>
				<td>{{getPropiedad(registro,'nombre')}}</td>
				<td>{{getPropiedad(registro,'empresa')}}</td>
				<td><a href="/plataformas/edit/{{getPropiedad(registro,'id')}}">Editar plataforma</a></td>
				<td><a href="/plataformas/destroy/{{getPropiedad(registro,'id')}}" class="delete-register">Eliminar plataforma</a></td>
			</tr>
			<!--<?php foreach ($this->plataformas as $plataforma): ?>
				<tr>
					<td><?php echo $plataforma->id; ?></td>
					<td><?php echo $plataforma->nombre; ?></td>
					<td><?php echo $plataforma->empresa; ?></td>
					<td><a href="/plataformas/edit/<?php echo $plataforma->id; ?>">Editar plataforma</a></td>
					<td><a href="/plataformas/destroy/<?php echo $plataforma->id; ?>" class="delete-register">Eliminar plataforma</a></td>
				</tr>
			<?php endforeach; ?>-->		
		</tbody>
	</table>
</div>

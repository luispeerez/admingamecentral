<h2><i class="fa fa-user"></i> Usuarios</h2>
<p><a href="/usuarios/crear"><i class="fa fa-plus"></i> Crear usuario</a></p>
<div ng-controller="searchCTL" ng-cloak>
   <script>
       window.modelo = 'usuarios';
       window.campo = 'email';
       window.campos = [{"etiqueta":"ID","valor":"id"},
                        {"etiqueta":"Email","valor":"email"},
                        {"etiqueta":"Tipo de usuario","valor":"tipo_usuario"}
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
				<th class="footable-first-column">Email</th>
				<th data-hide="phone">Tipo de usuario</th>
				<th>Editar</th>
				<th class="footable-last-column">Eliminar</th>

			</tr>		
		</thead>
		<tbody>
			<tr ng-repeat="registro in registros | searchFor:search:campo | orderBy:forma+orden">
				<td>{{getPropiedad(registro,'id')}}</td>
				<td>{{getPropiedad(registro,'email')}}</td>
				<td>{{getPropiedad(registro,'tipo_usuario')}}</td>
				<td><a href="/usuarios/edit/{{getPropiedad(registro,'id')}}">Editar usuario</a></td>
	            <td><a href="/usuarios/destroy/{{getPropiedad(registro,'id')}}" class="delete-register">Eliminar usuario</a></td>
			</tr>

			<!--<?php foreach ($this->usuarios as $usuario): ?>
				<tr>
					<td><?php echo $usuario->id; ?></td>
					<td><?php echo $usuario->email; ?></td>
					<td><?php echo $usuario->tipo_usuario; ?></td>
					<td><a href="/usuarios/edit/<?php echo $usuario->id; ?>">Editar usuario</a></td>
		            <td><a href="/usuarios/destroy/<?php echo $noticia->id ?>" class="delete-register">Eliminar usuario</a></td>
				</tr>
			<?php endforeach; ?>-->	
		</tbody>
	</table>
</div>
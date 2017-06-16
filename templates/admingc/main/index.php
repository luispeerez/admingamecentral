<h2><i class="fa fa-pencil-square-o"></i> Noticias publicadas</h2>
<p><a href="/noticias/"><i class="fa fa-plus"></i> Crear noticia</a></p>
<div ng-controller="searchCTL" ng-cloak>
   <script>
       window.modelo = 'noticias';
       window.campo = 'titulo_noticia';
       window.campos = [{"etiqueta":"ID","valor":"id"},
                        {"etiqueta":"Titulo","valor":"titulo_noticia"},
                        {"etiqueta":"Tipo de noticia","valor":"tipo_noticia"},
                        {"etiqueta":"Autor","valor":"autor"},
                        {"etiqueta":"Fecha","valor":"fecha"}
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
                <th class="footable-first-column">Titulo</th>
                <th data-hide="phone,tablet">Tipo de noticia</th>
                <th data-hide="phone,tablet">Autor</th>
                <th>Editar</th>
                <th data-hide="phone">Fecha</th>
                <th class="footable-last-column">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="registro in registros | searchFor:search:campo | orderBy: forma+orden" >
                <td>{{getPropiedad(registro,'id')}}</td>
                <td class="footable-first-column">{{getPropiedad(registro,'titulo_noticia')}}</td>
                <td>{{getPropiedad(registro,'tipo_noticia')}}</td>
                <td>{{getPropiedad(registro,'autor')}}</td>
                <td><a href="/noticias/edit/{{getPropiedad(registro,'id')}}">Editar noticia</a></td>
                <td>{{getPropiedad(registro,'fecha')}}</td>
                <td><a href="/noticias/destroy/{{getPropiedad(registro,'id')}}" class="delete-register">Eliminar noticia</a></td>
            </tr>
            <!--<?php  foreach($this->noticias as $noticia):  ?>
                <tr>
                    <td><?php echo $noticia->id; ?></td>
                    <td class="footable-first-column"><?php echo $noticia->titulo_noticia; ?></td>
                    <td><?php echo $noticia->tipo_noticia; ?></td>
                    <td><?php echo $noticia->autor ?></td>
                    <td><a href="/noticias/edit/<?php echo $noticia->id ?>">Editar noticia</a></td>
                    <td><?php echo $noticia->fecha ?></td>
                    <td><a href="/noticias/destroy/<?php echo $noticia->id ?>" class="delete-register">Eliminar noticia</a></td>

                </tr>
            <?php endforeach; ?>-->
        </tbody>
    </table>
</div>

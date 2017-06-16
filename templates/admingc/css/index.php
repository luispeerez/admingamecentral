<?php       echo $this->config->uploads_dir;
 ?>
<h2><i class="fa fa-pencil-square-o"></i> Noticias publicadas</h2>
<p><a href="/noticias/"><i class="fa fa-plus"></i> Crear noticia</a></p>
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

        <?php  foreach($this->noticias as $noticia):  ?>
            <tr>
                <td><?php echo $noticia->id; ?></td>
                <td class="footable-first-column"><?php echo $noticia->titulo_noticia; ?></td>
                <td><?php echo $noticia->tipo_noticia; ?></td>
                <td><?php echo $noticia->autor ?></td>
                <td><a href="/noticias/edit/<?php echo $noticia->id ?>">Editar noticia</a></td>
                <td><?php echo $noticia->fecha ?></td>
                <td><a href="/noticias/destroy/<?php echo $noticia->id ?>" class="delete-register">Eliminar noticia</a></td>

            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

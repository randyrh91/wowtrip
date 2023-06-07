<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new ImagenPortadaViewModel();
?>
<div class="wrap">
<h2>Imagenes de Portada(<?=count($model->getImagenPortadas())?>) <?=HTML::link_buttonVM('+ A&ntilde;adir Nuevo','cs_mvc_imagen_portadas','admin/ImagenPortada_edit','ImagenPortada','','add-new-h2')?>
    <form action="./admin.php" style="float: right">
        <input type="hidden" name="page" value="cs_mvc_imagen_portadas">
        <input type="search" name="q" value="<?=View::in('q')?>">
        <input type="submit" class="button" value="Filtrar">
    </form>
</h2>
<table class="wp-list-table widefat fixed">
    <thead>
		<th width="30px">Id</th>
        <th width="100px">Foto</th>
        <th>Nombre</th>
		<th>TextoCorto</th>
        <th width="20%">Acciones</th>
    </thead>
    <tbody>
    <?php foreach($model->getImagenPortadas() as $item): ?>
        <tr>
			<td><b><?=HTML::truncate(__( $item->id ))?></b></td>
            <td><img src="<?=View::getFoto($item->foto )?>" width="100px"></td>
            <td><?=HTML::truncate(__( $item->nombre ))?></td>
			<td><?=HTML::truncate(__( $item->textoCorto ))?></td>
            <td>
                <?=HTML::link_buttonVM('Editar','cs_mvc_imagen_portadas','admin/ImagenPortada_edit','ImagenPortada',$item->id)?>
                <?=HTML::link_buttonCA('Eliminar','cs_mvc_imagen_portadas','ImagenPortada',"remove&id=$item->id")?>

            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
</div>

<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new ServicioDestinoViewModel();
?>
<div class="wrap">
<h2>ServicioDestinos(<?=count($model->getServicioDestinos())?>) <?=HTML::link_buttonVM('+ A&ntilde;adir Nuevo','cs_mvc_servicio_destinos','admin/ServicioDestino_edit','ServicioDestino','','add-new-h2')?>
    <form action="./admin.php" style="float: right">
        <input type="hidden" name="page" value="cs_mvc_servicio_destinos">
        <input type="search" name="q" value="<?=View::in('q')?>">
        <input type="submit" class="button" value="Filtrar">
    </form>
</h2>
<table class="wp-list-table widefat fixed">
    <thead>
		<th>Id</th>
        <th>Servicioid</th>
        <th>DestinoTuristicoid</th>
		<th>Precio</th>
		<th>Cantidad</th>
        <th width="20%">Acciones</th>
    </thead>
    <tbody>
    <?php foreach($model->getServicioDestinos() as $item): ?>
        <tr>
			<td><?=HTML::truncate(__( $item->id ))?></td>
            <td><?=HTML::truncate(__( $item->getServicioid()->__toString() ))?></td>
            <td><?=HTML::truncate(__( $item->getDestinoTuristicoid()->__toString() ))?></td>
			<td><?=HTML::truncate(__( $item->precio ))?></td>
			<td><?=HTML::truncate(__( $item->cantidad ))?></td>
            <td>
                <?=HTML::link_buttonVM('Editar','cs_mvc_servicio_destinos','admin/ServicioDestino_edit','ServicioDestino',$item->id)?>
                <?=HTML::link_buttonCA('Eliminar','cs_mvc_servicio_destinos','ServicioDestino',"remove&id=$item->id")?>

            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
</div>

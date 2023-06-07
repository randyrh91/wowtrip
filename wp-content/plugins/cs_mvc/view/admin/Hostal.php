<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new HostalViewModel();
?>
<div class="wrap">
<h2>Hostales(<?=count($model->getHostales())?>) <?=HTML::link_buttonVM('+ A&ntilde;adir Nuevo','cs_mvc_hostales','admin/Hostal_edit','Hostal','','add-new-h2')?>
    <form action="./admin.php" style="float: right">
        <input type="hidden" name="page" value="cs_mvc_hostales">
        <input type="search" name="q" value="<?=View::in('q')?>">
        <input type="submit" class="button" value="Filtrar">
    </form>
</h2>
<table class="wp-list-table widefat fixed">
    <thead>
		<th>Id</th>
		<th>Nombre</th>
		<th>TextoCorto</th>
		<th>Descripcion</th>
		<th>Direccion</th>
		<th>Geopos</th>
		<th>CantidadHabitacion</th>
		<th>CantidadPersona</th>
		<th>Precio</th>
		<th>Oferta</th>
        <th>DestinoTuristico</th>
        <th width="20%">Acciones</th>
    </thead>
    <tbody>
    <?php foreach($model->getHostales() as $item): ?>
        <tr>
			<td><?=HTML::truncate(__( $item->id ))?></td>
			<td><?=HTML::truncate(__( $item->nombre ))?></td>
			<td><?=HTML::truncate(__( $item->textoCorto ))?></td>
			<td><?=HTML::truncate(__( $item->descripcion ))?></td>
			<td><?=HTML::truncate(__( $item->direccion ))?></td>
			<td><?=HTML::truncate(__( $item->geopos ))?></td>
			<td><?=HTML::truncate(__( $item->cantidadHabitacion ))?></td>
			<td><?=HTML::truncate(__( $item->cantidadPersona ))?></td>
			<td><?=HTML::truncate(__( $item->precio ))?></td>
			<td><?=HTML::truncate(__( $item->oferta ))?></td>
            <td><?=HTML::truncate(__( $item->getDestinoTuristico()->__toString() ))?></td>
            <td>
                <?=HTML::link_buttonVM('Editar','cs_mvc_hostales','admin/Hostal_edit','Hostal',$item->id)?>
                <?=HTML::link_buttonCA('Eliminar','cs_mvc_hostales','Hostal',"remove&id=$item->id")?>

            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
</div>

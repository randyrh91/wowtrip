<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new ReservaHostalViewModel();
?>
<div class="wrap">
<h2>ReservaHostales(<?=count($model->getReservaHostales())?>) <?=HTML::link_buttonVM('+ A&ntilde;adir Nuevo','cs_mvc_reserva_hostales','admin/ReservaHostal_edit','ReservaHostal','','add-new-h2')?>
    <form action="./admin.php" style="float: right">
        <input type="hidden" name="page" value="cs_mvc_reserva_hostales">
        <input type="search" name="q" value="<?=View::in('q')?>">
        <input type="submit" class="button" value="Filtrar">
    </form>
</h2>
<table class="wp-list-table widefat fixed">
    <thead>
		<th>Id</th>
		<th>Orden</th>
        <th>ImagenHostal</th>
        <th>ReservaExcursion</th>
        <th width="20%">Acciones</th>
    </thead>
    <tbody>
    <?php foreach($model->getReservaHostales() as $item): ?>
        <tr>
			<td><?=HTML::truncate(__( $item->id ))?></td>
			<td><?=HTML::truncate(__( $item->orden ))?></td>
            <td><?=HTML::truncate(__( $item->getImagenHostal()->__toString() ))?></td>
            <td><?=HTML::truncate(__( $item->getReservaExcursion()->__toString() ))?></td>
            <td>
                <?=HTML::link_buttonVM('Editar','cs_mvc_reserva_hostales','admin/ReservaHostal_edit','ReservaHostal',$item->id)?>
                <?=HTML::link_buttonCA('Eliminar','cs_mvc_reserva_hostales','ReservaHostal',"remove&id=$item->id")?>

            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
</div>

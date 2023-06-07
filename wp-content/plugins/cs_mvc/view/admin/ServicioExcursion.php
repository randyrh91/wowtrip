<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new ServicioExcursionViewModel();
?>
<div class="wrap">
<h2>ServicioExcursiones(<?=count($model->getServicioExcursiones())?>) <?=HTML::link_buttonVM('+ A&ntilde;adir Nuevo','cs_mvc_servicio_excursiones','admin/ServicioExcursion_edit','ServicioExcursion','','add-new-h2')?>
    <form action="./admin.php" style="float: right">
        <input type="hidden" name="page" value="cs_mvc_servicio_excursiones">
        <input type="search" name="q" value="<?=View::in('q')?>">
        <input type="submit" class="button" value="Filtrar">
    </form>
</h2>
<table class="wp-list-table widefat fixed">
    <thead>
		<th>Id</th>
        <th>Excursion</th>
        <th>Servicio</th>
		<th>Cantidad</th>
		<th>Precio</th>
        <th width="20%">Acciones</th>
    </thead>
    <tbody>
    <?php foreach($model->getServicioExcursiones() as $item): ?>
        <tr>
			<td><?=HTML::truncate(__( $item->id ))?></td>
            <td><?=HTML::truncate(__( $item->getExcursion()->__toString() ))?></td>
            <td><?=HTML::truncate(__( $item->getServicio()->__toString() ))?></td>
			<td><?=HTML::truncate(__( $item->cantidad ))?></td>
			<td><?=HTML::truncate(__( $item->precio ))?></td>
            <td>
                <?=HTML::link_buttonVM('Editar','cs_mvc_servicio_excursiones','admin/ServicioExcursion_edit','ServicioExcursion',$item->id)?>
                <?=HTML::link_buttonCA('Eliminar','cs_mvc_servicio_excursiones','ServicioExcursion',"remove&id=$item->id")?>

            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
</div>

<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new ViajeViewModel();
$item = $model->getViaje();
?>
<div class="wrap">
    <?php if ($item->id): ?>
        <h2>Editando Viaje: <?= __($item->__toString()) ?></h2>
    <?php else: ?>
        <h2>Agregando Viaje</h2>
    <?php endif ?>
    <form method="post">
        <input type="hidden" name="controller" value="Viaje.save">
        <input type="hidden" name="id" value="<?= $item->id ?>">
        <table class="form-table">
            <tbody>
					<tr><td colspan="2">
				<input name="id" type="hidden" value="<?=__($item->id)?>"> 
				</td></tr>
	
				<tr class="wrap">
					<th><label>Excursi&oacute;n</label></th>
					<td>
						<?=HTML::dropDownList('Excursion_id',$model->getExcursiones(),$item->Excursion_id)?>
					</td>
				</tr>
				<tr class="wrap">
					<th><label>DestinoTuristico</label></th>
					<td>
						<?=HTML::dropDownList('DestinoTuristico_id',$model->getDestinoTuristicos(),$item->DestinoTuristico_id)?>
					</td>
				</tr>
                <tr class="wrap">
					<th><label>Orden</label></th>
					<td>
							<input name="orden" type="text" value="<?=__($item->orden)?>"> 
						</td>
				</tr>
	            <tr class="wrap">
					<th><label>Hacer Estancia</label></th>
					<td>
                        <input name="dormir" type="checkbox" <?=($item->dormir)?'checked':''?> value="1">
                    </td>
				</tr>

					<tr class="wrap">
					<th><label>Tiempo</label></th>
					<td>
							<input name="tiempo" type="text" value="<?=__($item->tiempo)?>"> 
						</td>
				</tr>
	
					<tr class="wrap">
					<th><label>DistanciaKM</label></th>
					<td>
							<input name="distanciaKM" type="text" value="<?=__($item->distanciaKM)?>"> 
						</td>
				</tr>
	
				<tr class="wrap">
					<th><label>Transporte</label></th>
					<td>
						<?=HTML::dropDownList('Transporte_id',$model->getTransportes(),$item->Transporte_id)?>
					</td>
				</tr>
		</tbody>
        </table>
        <div class="right">
            <?= HTML::button_primary('Guardar') ?>
            <?= HTML::link_buttonVM('Ver Listado', 'cs_mvc_viajes') ?>
        </div>
    </form>
</div>
<script>
    function setValuesByLang(select_el) {
        var $ = jQuery;
        var $sel = $(select_el);
        var arr = $sel.attr('name').split('_');
        var $el = $('[name='+ arr[0] +']');
        $el.val('');
        $('[name^='+ $el.attr('name') +'_]').each(function (i, item) {
            $item = $(item);
            var arr = $item.attr('name').split('_');
            $el.val($el.val()+'[:'+arr[1]+']'+$item.val());
        })
    }
</script>
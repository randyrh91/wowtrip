<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new ReservaHostalViewModel();
$item = $model->getReservaHostal();
?>
<div class="wrap">
    <?php if ($item->id): ?>
        <h2>Editando ReservaHostal: <?= __($item->__toString()) ?></h2>
    <?php else: ?>
        <h2>Agregando ReservaHostal</h2>
    <?php endif ?>
    <form method="post">
        <input type="hidden" name="controller" value="ReservaHostal.save">
        <input type="hidden" name="id" value="<?= $item->id ?>">
        <table class="form-table">
            <tbody>
					<tr><td colspan="2">
				<input name="id" type="hidden" value="<?=__($item->id)?>"> 
				</td></tr>
	
					<tr class="wrap">
					<th><label>Orden</label></th>
					<td>
							<input name="orden" type="text" value="<?=__($item->orden)?>"> 
						</td>
				</tr>
	
				<tr class="wrap">
					<th><label>ImagenHostal</label></th>
					<td>
						<?=HTML::dropDownList('Imagen_Hostal_id',$model->getImagenHostales(),$item->id)?>
					</td>
				</tr>
				<tr class="wrap">
					<th><label>ReservaExcursion</label></th>
					<td>
						<?=HTML::dropDownList('Reserva_Excursion_id',$model->getReservaExcursiones(),$item->id)?>
					</td>
				</tr>
		</tbody>
        </table>
        <div class="right">
            <?= HTML::button_primary('Guardar') ?>
            <?= HTML::link_buttonVM('Ver Listado', 'cs_mvc_reserva_hostales') ?>
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
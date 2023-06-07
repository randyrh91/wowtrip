<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new ServicioExcursionViewModel();
$item = $model->getServicioExcursion();
?>
<div class="wrap">
    <?php if ($item->id): ?>
        <h2>Editando ServicioExcursion: <?= __($item->__toString()) ?></h2>
    <?php else: ?>
        <h2>Agregando ServicioExcursion</h2>
    <?php endif ?>
    <form method="post">
        <input type="hidden" name="controller" value="ServicioExcursion.save">
        <input type="hidden" name="id" value="<?= $item->id ?>">
        <table class="form-table">
            <tbody>
					<tr><td colspan="2">
				<input name="id" type="hidden" value="<?=__($item->id)?>"> 
				</td></tr>
	
				<tr class="wrap">
					<th><label>Excursion</label></th>
					<td>
						<?=HTML::dropDownList('Excursion_id',$model->getExcursiones(),$item->id)?>
					</td>
				</tr>
				<tr class="wrap">
					<th><label>Servicio</label></th>
					<td>
						<?=HTML::dropDownList('Servicio_id',$model->getServicios(),$item->id)?>
					</td>
				</tr>
					<tr class="wrap">
					<th><label>Cantidad</label></th>
					<td>
							<input name="cantidad" type="text" value="<?=__($item->cantidad)?>"> 
						</td>
				</tr>
	
					<tr class="wrap">
					<th><label>Precio</label></th>
					<td>
							<input name="precio" type="text" value="<?=__($item->precio)?>"> 
						</td>
				</tr>
	
		</tbody>
        </table>
        <div class="right">
            <?= HTML::button_primary('Guardar') ?>
            <?= HTML::link_buttonVM('Ver Listado', 'cs_mvc_servicio_excursiones') ?>
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
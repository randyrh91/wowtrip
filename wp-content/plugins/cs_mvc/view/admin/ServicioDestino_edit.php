<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$model = new ServicioDestinoViewModel();
$item = $model->getServicioDestino();
?>
<div class="wrap">
    <?php if ($item->id): ?>
        <h2>Editando ServicioDestino: <?= __($item->__toString()) ?></h2>
    <?php else: ?>
        <h2>Agregando ServicioDestino</h2>
    <?php endif ?>
    <form method="post">
        <input type="hidden" name="controller" value="ServicioDestino.save">
        <input type="hidden" name="id" value="<?= $item->id ?>">
        <table class="form-table">
            <tbody>
					<tr><td colspan="2">
				<input name="id" type="hidden" value="<?=__($item->id)?>"> 
				</td></tr>
	
				<tr class="wrap">
					<th><label>Servicioid</label></th>
					<td>
						<?=HTML::dropDownList('Servicioid',$model->getServicioides(),$item->id)?>
					</td>
				</tr>
				<tr class="wrap">
					<th><label>DestinoTuristicoid</label></th>
					<td>
						<?=HTML::dropDownList('Destino_Turisticoid',$model->getDestinoTuristicoides(),$item->id)?>
					</td>
				</tr>
					<tr class="wrap">
					<th><label>Precio</label></th>
					<td>
							<input name="precio" type="text" value="<?=__($item->precio)?>"> 
						</td>
				</tr>
	
					<tr class="wrap">
					<th><label>Cantidad</label></th>
					<td>
							<input name="cantidad" type="text" value="<?=__($item->cantidad)?>"> 
						</td>
				</tr>
	
		</tbody>
        </table>
        <div class="right">
            <?= HTML::button_primary('Guardar') ?>
            <?= HTML::link_buttonVM('Ver Listado', 'cs_mvc_servicio_destinos') ?>
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
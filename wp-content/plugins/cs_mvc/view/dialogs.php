<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 8/03/17
 * Time: 2:05
 * Nesecita el objeto $excursion
 */
?>
<div class="modal fade" id="mail_sended" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?= __(CS_L_SUBJECT) ?></h4>
            </div>
            <div class="modal-body">
                <?= __(CS_L_INTENTAR) ?>
            </div>
            <div class="modal-footer">
                <!--                <a href="#" class="btn btn-danger">Cancel</a>-->
                <a href="<?= get_page_link($excursion->Post_ID) ?>"
                   class="btn btn-primary"><?= __(CS_L_YACONFIRME) ?></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="mail_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?= __(CS_L_PROCESS) ?></h4>
            </div>
            <div class="modal-body">
                <?php if (View::in('r') == 2): ?>
                    <div style="color: #4b8df8"><em class="fa fa-exclamation-circle"></em> Reserva confirmada
                        correctamente
                    </div>
                <?php else: ?>
                    <div style="color: #CA333E"><em class="fa fa-exclamation-triangle"></em> Ups Ocurrio un prolblema en
                        el momento de Confirmaci&oacute;n
                    </div>
                <?php endif ?>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#" class="btn btn-primary">OK</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="mapa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?= __(CS_L_LOCALIZATION) ?></h4>
            </div>
            <div id="img_mapa" class="modal-body" style="overflow-x: scroll;overflow-y: scroll">
                <?php $fotos = $excursion->getImagenExcursiones(); ?>
                <img src="<?= View::getFoto($fotos[count($fotos) - 1]->foto) ?>" width="200%">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    window.onload = function () {

        <?php if(View::in('r')):?>
        jQuery('#mail_confirm').modal('show');
        <?php endif?>
        jQuery('#mapa').on('show.bs.modal', function () {
            jQuery('#img_mapa').css('height', (window.innerHeight - 150) + 'px')
        });
    }
</script>

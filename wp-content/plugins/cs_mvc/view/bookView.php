<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 10/05/2015
 * Time: 1:40
 */
require_once CS_MVC_PATH_VMODEL . '/ExcursionViewModel.php';
$model = new BookViewModel();
$model_exc = new ExcursionViewModel();
$excursion = $model->getExcursion();
$destinos = $model_exc->getDestinosFromExcursion($excursion->id);
$fotos = $excursion->getImagenExcursiones();
$servicios = $excursion->getServicioExcursiones();
$vijeDormir = $model->getViajesDormir($excursion->id);
?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span9">
            <h1 style="color:#EF8217 ;text-align: center"><?= __($excursion->nombre) ?>.</h1>
        </div>
        <hr>
    </div>
    <div class="row-fluid">
        <div class="col-xs-12 col-md-7 col-sm-12 col-md-push-5">
            <h3 style="color: #EF8217;"><em class="fa fa-calendar"></em> <?= __(CS_L_PROGRAMA) ?>
                <div class="btn-group pull-right">
                    <a class="btn btn-warning" data-toggle="modal" href="#mapa">
                        <em style="margin-right: 5px;" class="fa fa-eye"></em><b><?= __(CS_L_LOCALIZATION) ?></b>
                    </a>
                    <a class="btn btn-danger" href="#form_reserva">
                        <em style="margin-right: 5px;" class="fa fa-book"></em><b><?= __(CS_L_BOOK) ?></b>
                    </a>
                </div>
            </h3>
            <?php $viajes = $excursion->getViajes() ?>
            <?php if (count($viajes) > 1): ?>
                <span class="label label-success" style="font-size: 12px">TOTAL:</span>
                <span class="label label-warning" style="font-size: 12px"><?= __(CS_L_TIEMPO) ?>
                    : <u><?= $excursion->tiempo ?></u></span>
                <span class="label label-warning" style="font-size: 12px"><?= __(CS_L_DISTANCIA) ?>
                    : <u><?= $excursion->distanciaKM ?></u></span>
            <?php endif ?>
            <?php $countTotal = 1;
            $finTotal = count($viajes);
            foreach ($viajes as $viaje): ?>
                <?php $destino = $viaje->getDestinoTuristico(); ?>
                <h3 style="color:#EF8217; margin: 5px"><em class="fa fa-map-marker"></em><?= __($destino->nombre) ?>
                </h3>
                <span class="label label-warning" style="font-size: 12px"><?= __(CS_L_TIEMPO) ?>
                    : <u><?= $viaje->tiempo ?></u></span>
                <span class="label label-warning" style="font-size: 12px"><?= __(CS_L_DISTANCIA) ?>
                    : <u><?= $viaje->distanciaKM ?></u></span>
                <ul style="list-style: none; font-weight: bold; text-align: justify">
                    <?php $count = 1;
                    $fin = count($viaje->getPrograma()) - 1;
                    foreach ($viaje->getPrograma() as $acc): ?>
                        <?php if ($count == $fin && $countTotal == $finTotal): ?>
                            <hr>
                            <li><span class="badge badge-warning"><h4
                                        class="labelCant"><?php echo '$' ?></h4></span> <?= __($acc->nombre) ?></li>
                        <?php elseif ($count > $fin && $countTotal == $finTotal): ?>
                            <li><span class="badge badge-warning"><h4
                                        class="labelCant"><?php echo '+' ?></h4></span> <?= __($acc->nombre) ?></li>
                        <?php else: ?>
                            <li><span class="badge badge-warning"><h4
                                        class="labelCant"><?php echo $count ?></h4></span> <?= __($acc->nombre) ?></li>
                        <?php endif;
                        $count++; endforeach; ?>
                </ul>
                <?php $countTotal++; endforeach; ?>
        </div>
        <div class="col-xs-12 col-md-5 col-sm-12 col-md-pull-7 column-slider right-hr">
            <!-- Carrucel -->
            <div class="owl-carousel">
                <!--/.item-->
                <?php
                foreach($fotos as $foto): ?>
                    <div class="item"
                         style="background-size: cover; background-image: url('<?= View::getFoto($foto->foto)?>');">
                        <div class="slider-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="carousel-content" style="padding-top: 20%; padding-left: 20px;">
                                            <h3> <?=__($foto->nombre)?></h3>

                                            <p><?=__($excursion->nombre)?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>

            <hr>
            <!-- Servicios -->
            <ul class="itemTags">

                <h4 class="textoServicios">
                    <em style="margin-right: 5px;" class="fa fa-bell"></em><b><?= __(CS_Servicio) ?>:</b>
                    <?php /** @var ServicioExcursionModel $servicio */
                    foreach ($servicios as $servicio): ?>
                        <span class="label label-warning"><?= $servicio->getServicio()->nombre ?></span>
                    <?php endforeach ?>
                </h4>

            </ul>

            <!-- Destinos Turisticos -->
            <ul class="itemTags">
                <h4 class="textoServicios">
                    <em style="margin-right: 5px;" class="fa fa-camera"></em><b><?= __(CS_L_DESTINOSUTIL) ?>:</b>
                </h4>
                <div class="media_list">
                    <?php
                    /** @var DestinoTuristicoModel $dest */
                    foreach ($destinos as $dest):?>
                        <a href="#" class="pull-left">
                            <img width="100px" height="60px" src="<?= View::getFoto($dest->foto) ?>">
                        </a>
                        <div class="media_list_body">
                            <h4 class="media-heading"><span class="label label-warning">
                                <em class="fa fa-map-marker"></em> <?= __($dest->nombre) ?>
                            </span></h4>
                            <?= __($dest->textoCorto) ?>
                        </div>
                        <hr>
                    <?php endforeach ?>
                </div>
            </ul>

        </div>
        <div style="clear: both"></div>
        <h3 class="textoDescrip" style="text-align: center"><em style="margin-right: 5px;"
                                     class="fa fa-info-circle"></em><b><?= __(CS_L_INFO) ?></b>
        </h3>
        <div style="text-align: justify">
            <?= __($excursion->descripcion) ?></div>

        <div style="clear: both"></div>

        <?php require_once 'formReserva.php'?>
    </div>


</div>
<?php require_once 'dialogs.php'?>


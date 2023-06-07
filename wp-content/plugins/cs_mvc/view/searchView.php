<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 10/05/2015
 * Time: 1:40
 */
$post_id = View::in('id');
$model = new SearchViewModel();
/** @var ExcursionModel $excursiones */
$excursiones = $model->getSearchResult();
?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span9">
            <?php if(isset($_REQUEST['find_q'])):?>
            <h2 style="text-align: center" class="labelInfoInic"> <?=__(CS_L_RESULTADOSBUSQUEDA)?>  (<?=count($excursiones)?>)</h2>
                <p>&nbsp</p>
            <?php
            /** @var ExcursionModel $excursion */
            foreach ($excursiones as $excursion):?>
                <div class="row-fluid">
                    <div class="booking-blocks">
                        <div class="col-xs-12 col-sm-3 col-md-2">
                            <img width="100%" src="<?= HTML::getFoto($excursion->getOneImagenExcursiones()->foto) ?>"
                                 title="<?= __($excursion->getOneImagenExcursiones()->nombre) ?>">

                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-10">
                            <div class="distanciaTiempo" style="float: left">
                                       <span class="label label-warning"
                                             style="font-size: 12px"><?= __(CS_L_TIEMPO) ?>
                                           : <u><?= $excursion->tiempo ?></u></span>
                                            <span class="label label-warning"
                                                  style="font-size: 12px"><?= __(CS_L_DISTANCIA) ?>
                                                : <u><?= $excursion->distanciaKM ?></u></span>
                            </div>
                            <h3>
                                <a style="color: #EF8217;margin-left: 30px;"
                                   href="<?= get_page_link($excursion->Post_ID) ?>#bc"><b><?= __($excursion->nombre) ?></b></a>

                            </h3>
                            <div class="itemIntroText">
                                <h4 class="textoDescrip"><em style="margin-right: 5px;"
                                                             class="fa fa-info-circle"></em><b><?= __(CS_L_INFO) ?></b>
                                </h4>

                                <p style="text-align: justify;">
                                    <?= __($excursion->textoCorto) ?>
                                </p>
                            </div>
                            <?php $servicios = $excursion->getServicioExcursiones();?>
                            <?php if(count($servicios)): ?>
                                <ul class="itemTags">
                                    <h4 class="textoServicios"><em style="margin-right: 5px;"
                                                                   class="fa fa-bell"></em><b><?= __(CS_Servicio) ?></b>
                                    </h4>
                                    <?php /** @var ServicioExcursionModel $servicio */
                                    foreach ($servicios as $servicio): ?>
                                        <span class="label label-warning"><?= $servicio->getServicio()->nombre ?></span>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>
                            <div style="clear: both"></div>
                            <a class="itemReadMore button"
                               href="<?= get_page_link($excursion->Post_ID) ?>#bc"><em
                                    style="margin-right: 5px;"
                                    class="fa fa-arrow-circle-right"></em> <?= __(CS_READMORE) ?> </a>
                        </div>

                    </div>
                </div>
                <hr>
            <?php endforeach ?>
            <?php else:?>
                <h1 style="text-align: center"><em class="fa fa-book"></em> <?php the_title()?></h1>
                <?php the_content() ?>
            <?php endif?>
        </div>
    </div>
</div>


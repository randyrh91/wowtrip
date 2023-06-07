<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 8/03/17
 * Time: 2:05
 * Nesecita el objeto $excursion
 */
/** @var ExcursionModel $exc_delux */$exc_delux = $excursion->getExcursion(); $show_first = $exc_delux!=null; if(!$show_first) $exc_delux = $excursion
?>
<?php if($show_first): ?>
    <div class="itemContainer col-xs-12 col-sm-6 col-md-6">
        <article class="itemView groupLeading">
            <header style="color:#157AB5; margin-top: 20px;">
                <h3 class="tituloBlock">
                    <a style="color: #EF8217;margin-left: 30px;"
                       href="<?= get_page_link($excursion->Post_ID) ?>#bc"><b><?= __($excursion->nombre) ?></b></a>
                </h3>
            </header>
            <div class="itemBlock">
                <div class="col-xs-12 col-sm-12 col-md-12"><a class="itemImage"
                                               href="<?= get_page_link($excursion->Post_ID) ?>#bc"
                                               title="<?= __($excursion->nombre) ?>">
                        <img class="col-md-12 col-sm-12 col-xs-12"
                            src="<?= HTML::getFoto($excursion->getOneImagenExcursiones()->foto) ?>"

                            alt="<?= __($excursion->nombre) ?>"> </a></div>
                <div class="itemBody">
                    <div class="distanciaTiempo">
                                       <span class="label label-warning"
                                             style="font-size: 12px"><?= __(CS_L_TIEMPO) ?>
                                           : <u><?= $excursion->tiempo ?></u></span>
                                            <span class="label label-warning"
                                                  style="font-size: 12px"><?= __(CS_L_DISTANCIA) ?>
                                                : <u><?= $excursion->distanciaKM ?></u></span>
                    </div>
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
        </article>
    </div>
<?php endif?>
<!--                        Excursion delux-->
<div class="itemContainer col-xs-12 <?=$show_first?'col-sm-6 col-md-6':'col-sm-12 col-md-12'?>">
    <article class="itemView groupLeading">
        <header style="color:#157AB5; margin-top: 20px;">
            <h3 class="tituloBlock">
                <div class="imagenDeluxe"
                     style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/delux.png);"></div>
                <a style="color: #EF8217;margin-left: 30px;"
                   href="<?= get_page_link($exc_delux->Post_ID) ?>#bc"><b><?= __($exc_delux->nombre) ?></b></a>
            </h3>
        </header>
        <div class="itemBlock">
            <div class="col-xs-12 col-sm-12 <?=$show_first?'col-md-12':'col-md-5'?>"><a class="itemImage"
                                                                                        href="<?= get_page_link($exc_delux->Post_ID) ?>#bc"
                                                                                        title="<?= __($exc_delux->nombre) ?>">
                    <img
                        src="<?= HTML::getFoto($exc_delux->getOneImagenExcursiones()->foto) ?>"
                        class="col-md-12 col-sm-12 col-xs-12"
                        alt="<?= __($exc_delux->nombre) ?>"> </a></div>
            <div class="itemBody">
                <div class="distanciaTiempo">
                                       <span class="label label-warning"
                                             style="font-size: 12px"><?= __(CS_L_TIEMPO) ?>
                                           : <u><?= $exc_delux->tiempo ?></u></span>
                                            <span class="label label-warning"
                                                  style="font-size: 12px"><?= __(CS_L_DISTANCIA) ?>
                                                : <u><?= $exc_delux->distanciaKM ?></u></span>
                </div>
                <div class="itemIntroText">
                    <h4 class="textoDescrip"><em style="margin-right: 5px;"
                                                 class="fa fa-info-circle"></em><b><?= __(CS_L_INFO) ?></b>
                    </h4>

                    <p style="text-align: justify;">
                        <?= __($exc_delux->textoCorto) ?>
                    </p>
                </div>
                <?php $servicios = $exc_delux->getServicioExcursiones();?>
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
                <a class="itemReadMore button"
                   href="<?= get_page_link($exc_delux->Post_ID) ?>#bc"><em
                        style="margin-right: 5px;"
                        class="fa fa-arrow-circle-right"></em> <?= __(CS_READMORE) ?> </a>
            </div>
        </div>
    </article>
</div>
<!--    Fin Excursion Delux-->
<div class="clr"></div>
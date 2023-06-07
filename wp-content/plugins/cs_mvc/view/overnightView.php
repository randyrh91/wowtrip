<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 10/05/2015
 * Time: 1:40
 */
$model = new SiteViewModel();
$allExcuriones=$model->getAllOverNight(100)
?>
<!--===============-->
<!--Excurciones-->
<!--===============-->
<div class="container-fluid">
    <section id="gkMainbody" style="font-size: 100%;">
        <div>
            <div id="k2Container" class="itemListView">
                <div class="itemListCategoriesBlock">
                    <div class="itemsCategory">
                        <h2 class="labelInfoInic"> <?= __(CS_L_OVERNIGHT) ?> <span class="badge badge-warning"><h3 class="labelCant"><?php echo count($allExcuriones) ?></h3></span></h2>
                        <p class="labelSmollDesc"><strong><?= __(CS_L_HOLA_OVERNIGHT) ?></strong></p>
                    </div>
                </div>
                <hr>
                <div class="itemList">
                    <div id="itemListLeading">
                        <?php $columItem = 0;
                        foreach ($model->getAllOverNight(2) as $excursiones):
                            $columItem++; ?>
                            <div class="itemContainer" style="width:49.9%;">
                                <div class="itemsContainerWrap">
                                    <article class="itemView groupLeading">
                                        <header style="color:#157AB5; margin-top: 20px;">
                                            <h2 class="tituloBlock">
                                                <?php if ($columItem % 2 == 0): ?>
                                                    <div class="imagenDeluxe"
                                                         style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/delux.png);"></div>
                                                <?php endif ?>
                                                <a style="color: #EF8217;margin-left: 30px;"
                                                   href="<?= get_page_link($excursiones->Post_ID) ?>#bc"><b><?= __($excursiones->nombre) ?></b></a>
                                            </h2>
                                        </header>
                                        <div class="itemBlock">
                                            <div class="itemImageBlock"><a class="itemImage"
                                                                           href="<?= get_page_link($excursiones->Post_ID) ?>#bc"
                                                                           title="<?= __($excursiones->nombre) ?>"> <img
                                                        src="<?= HTML::getFoto($excursiones->getOneImagenExcursiones()->foto) ?>"
                                                        style="width:500px; height:auto;"
                                                        alt="<?= __($excursiones->nombre) ?>"> </a></div>
                                            <div class="itemBody">
                                                <div class="distanciaTiempo">
                                           <span class="label label-warning"
                                                 style="font-size: 12px"><?= __(CS_L_TIEMPO) ?>
                                               : <u><?= $excursiones->tiempo ?></u></span>
                                                <span class="label label-warning"
                                                      style="font-size: 12px"><?= __(CS_L_DISTANCIA) ?>
                                                    : <u><?= $excursiones->distanciaKM ?></u></span>
                                                </div>
                                                <div class="itemIntroText">
                                                    <h4 class="textoDescrip"><em style="margin-right: 5px;"
                                                                                 class="fa fa-info-circle"></em><b><?= __(CS_L_INFO) ?></b>
                                                    </h4>

                                                    <p style="text-align: justify;">
                                                        <?= __($excursiones->textoCorto) ?>
                                                    </p>
                                                </div>
                                                <ul class="itemTags">
                                                    <h4 class="textoServicios"><em style="margin-right: 5px;"
                                                                                   class="fa fa-bell"></em><b><?= __(CS_Servicio) ?></b>
                                                    </h4>
                                                    <?php /** @var ServicioExcursionModel $servicio */
                                                    foreach ($excursiones->getServicioExcursiones() as $servicio): ?>
                                                        <span class="label label-warning"><?= $servicio->getServicio()->nombre ?></span>
                                                    <?php endforeach ?>
                                                </ul>
                                                <div style="clear: both"></div>
                                                <a class="itemReadMore button"
                                                   href="<?= get_page_link($excursiones->Post_ID) ?>#bc"><em
                                                        style="margin-right: 5px;"
                                                        class="fa fa-arrow-circle-right"></em> <?= __(CS_READMORE) ?> </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <?php if ($columItem % 2 == 0): ?>
                            <div class="clr"></div>
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 10/05/2015
 * Time: 1:40
 */

$model = new SiteViewModel();

?>
<div class="container-fluid">
    <h1 style="text-align: center" id="bienvenidos"></em> <?= __(CS_L_BIENVENIDO) ?></h1>
    <?php the_content(); ?>
</div>
<section id="gkMainbody" style="font-size: 100%;">
<div>
    <div id="k2Container" class="itemListView">
        <div class="itemList">
            <h1 class="labelExcursion"><em style="margin-right: 5px;"
                                           class="fa fa-star-o"></em><b><?= __(CS_L_EXCURSIONES_POPULARES) ?></b><em
                    style="margin-left: 5px;"
                    class="fa fa-star-o"></em></h1>

            <?php /** @var ExcursionModel $excursion */
            foreach ($model->getAllDayTours(2) as $excursion): ?>
                <?php require "detallesTour.php" ?>
            <?php endforeach ?>

            <h1 class="labelExcursion"><em style="margin-right: 5px;"
                                           class="fa fa-star-o"></em><b><?= __(CS_L_OVERNIGHT_POPULARES) ?></b><em
                    style="margin-left: 5px;"
                    class="fa fa-star-o"></em></h1>
            <?php foreach ($model->getAllOverNight(1) as $excursion): ?>
                <?php require "detallesTour.php" ?>
            <?php endforeach ?>

            <h1 class="labelExcursion"><em style="margin-right: 5px;"
                                           class="fa fa-star-o"></em><b><?= __(CS_L_PAQUETES_POPULARES) ?></b><em
                    style="margin-left: 5px;"
                    class="fa fa-star-o"></em></h1>
            <?php foreach ($model->getAllCircuitos(1) as $excursion): ?>
                <?php require "detallesTour.php" ?>
            <?php endforeach ?>
        </div>
    </div>
</div>

</section>
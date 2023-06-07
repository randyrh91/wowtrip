<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 10/05/2015
 * Time: 1:40
 */
$model = new SiteViewModel();
$allExcuriones=$model->getAllDayTours()
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
                        <h2 class="labelInfoInic"> <?=__(CS_L_EXCURSIONES)?> <span class="badge badge-warning"><h3 class="labelCant"><?php echo count($allExcuriones) ?></h3></span></h2>
                        <?php the_content()?>
                    </div>
                </div>
                <div class="itemList">
                    <div id="itemListLeading">
                        <?php /** @var ExcursionModel $excursion */
                        foreach ($model->getAllDayTours() as $excursion): ?>
                            <?php require "detallesTour.php" ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 10/05/2015
 * Time: 1:40
 */
require_once CS_MVC_PATH_VMODEL . '/ExcursionViewModel.php';
require_once CS_MVC_PATH_VMODEL . '/RatingViewModel.php';
require_once CS_MVC_PATH_MODEL . '/TransporteModel.php';
require_once CS_MVC_PATH_MODEL . '/DestinoTuristicoModel.php';
$model = new ExcursionViewModel();
$ratinModel = new RatingViewModel();
$porcientos = array();
$transportes = $model->getRandomTransportes();
$destinos = $model->getRandomDestinos();
$post = get_post();
$is_book = $post && get_post_field('view', $post) == 'bookView' || get_post_field('view', $post) == 'bookLargeView';
$id = 0;
$is_visitor = $post && $post->post_name == "book-of-visit";
if ($is_book && ($id = get_post_field('id', $post))) {
    /** @var ExcursionModel $exc */
    $transportes = $model->getTransporteFromExcursion($id);
    $destinos = $model->getDestinosFromExcursion($id);
    $porcientos = $ratinModel->getPorciento($id);
}
?>

</section>
<!--Fin de la Seccion Body-->


<main class="main-content">
    <div class="back-fixed">
        <div class="container">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo2_sincuba.png" width="80%">

            <div class="row">
                <div id="soi-box">
                    <form role="form">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><?= __(CS_L_LUGAR_PERFECTO) ?></h3>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- --/container ---->
    </div>
</main>

<div id="happy-visitors" class="container">
    <div class="row-fluid">
        <div class="span3">
            <h2><?= __(CS_L_VIAJEROS) ?></h2>
        </div>
    </div>
    <hr>
    <div class="breath">

        <?php $comments = get_comments(array('number' => ($is_visitor ? 16 : 4), 'status' => 'approve'));
        foreach ($comments as $comment) : ?>

            <div class="col-md-6 col-md-6">
                <div class="clientblock">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/portfolio/email.png" alt=".">

                    <p><strong><?php echo $comment->comment_author; ?></strong> <br>
                        <i><?php $date = strtotime($comment->comment_date);
                            echo date('d-m-y', $date); ?></i>
                    </p>
                </div>
                <div class="testblock"><?php echo $comment->comment_content; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<aside id="gkAside" style="width: 100%;">
    <div class="box" style="width: 100%;padding: 0">
        <header class="col-xs-12 col-sm-12 col-md-12">
            <h2><em style="margin-right: 5px;"
                    class="fa fa-info-circle"></em> <?= __(CS_L_INF_ADIC) ?></h2>
        </header>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="infoFooter col-xs-12 col-sm-4 col-md-4">
                <h3 class="header"><em style="margin-right: 5px;"
                                       class="fa fa-info"></em><?= __(CS_L_INFO) ?></h3>
                <hr>
                <div class="content">
                    <p style="text-align: justify; color: white"> <?= __('[:en]There are two currencies running in Cuba, CUC or
                        convertible peso, and CUP or Cuban peso. The
                        latter one is used mainly by Cubans in farmers, markets, cafeterias, restaurants, post offices
                        [:es] En Cuba circulan dos monedas, el CUC o
                         peso convertible; y el CUP o peso cubano. Este &uacute;ltimo es usado por los cubanos en los mercados
                         agropecuarios, cafeter&iacute;as, restaurantes, correos') ?>
                        <a style="color: antiquewhite" href="<?=get_home_url().'/important-information/'?>"><?= __(CS_READMORE) ?></a>
                    </p>
                </div>
                <div style="clear: both"></div>
            </div>
            <div class="infoFooter col-xs-12 col-sm-4 col-md-4">
                <h3 class="header"><em style="margin-right: 5px;"
                                       class="fa fa-thumbs-up"></em><?= __(CS_L_SOCIAL_NET) ?></h3>
                <hr>
                <div class="content">
                    <p style="text-align: justify; color: white"><?= __('[:en]This Tour Operator reserves the right to deny you
                        permission to travel or participate in a tour
                        at any time and at your own risk, should the Tour Operator determine that you are [:es] Este Operador de Viajes se
                        reserva el derecho de negarle el permiso para viajar o participar en cualquier momento y bajo
                        su propio riesgo de una excursi&oacute;n en caso que el Operador determine que usted.') ?>
                        <a
                            style="color: antiquewhite"
                            href="<?=get_home_url().'/condition-and-termines/'?>"><?= __(CS_READMORE) ?></a></p>


                </div>
                <div style="clear: both"></div>
            </div>
            <div class="infoFooter col-xs-12 col-sm-4 col-md-4">
                <h3 class="header"><em style="margin-right: 5px;"
                                       class="fa fa-book"></em><?= __(CS_L_VISITORBOOK) ?></h3>
                <hr>
                <div class="content">
                    <p style="text-align: justify; color: white"><?= __('[:en]Expose the experiences and observations,
                    carried out in some of their trips, as well as, the events, the
                     feelings and impressions of the same one in our Visitors\' Book. [:es]  Exponga las experiencias
                        y observaciones, realizadas en alguno de sus viajes, asi como, los acontecimientos, los
                        sentimientos e impresiones del mismo en nuestro Libro de Visitantes.') ?>
                        <a
                            style="color: antiquewhite"
                            href="<?=get_home_url().'/book-of-visit/'?>"><?= __(CS_READMORE) ?></a></p>

                </div>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
</aside>

<script type="text/javascript">
    function errorSocial() {
        alert("Esta red social no se encuentra disponible por el momento, le regamos nuestras disculpas")
    }
</script>





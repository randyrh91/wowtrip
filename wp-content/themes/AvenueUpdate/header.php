<?php include(TEMPLATEPATH . '/language.php');
require_once CS_MVC_PATH_VMODEL . '/ImagenPortadaViewModel.php';

$model = $model = new ImagenPortadaViewModel();
$size = count($model->getImagenPortadas());
$arrImag=$model->getImagenPortadas();
$firstImg=$arrImag[0];
$lastImg=$arrImag[$size-1];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
            echo ' :';
        } ?><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/myStyle.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css"
          href="<?php bloginfo('template_directory'); ?>/css/bootstrap-datepicker3.min.css"
    <link rel="stylesheet" type="text/css"
          href="<?php bloginfo('template_directory'); ?>/css/bootstrap-datepicker3.standalone.min.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css"
          href="<?php bloginfo('template_directory'); ?>/css/bootstrap-datetimepicker.min.css"
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/animate.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/owl.transitions.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.css"
          media="screen"/>

    <!--    Nuevos estilos para el theme-->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/joomla.css"
          media="screen"/>
    <!--    Usa para los border de Exc-->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/k2.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/layout.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/normalize.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style6.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/template.css"
          media="screen"/>
    <!--   Fin Nuevos estilos para el theme-->


    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed"
          href="<?php bloginfo('rss2_url'); ?>"/>
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed"
          href="<?php bloginfo('atom_url'); ?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"/>
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico"/>


    <?php
    wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.js');
    wp_enqueue_script('superfish', get_stylesheet_directory_uri() . '/js/superfish.js');
    wp_enqueue_script('effects', get_stylesheet_directory_uri() . '/js/effects.js');
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_style( 'jquery-validate-css', get_stylesheet_directory_uri().'/js/jquery-Validation/css/validationEngine.jquery.css');
    wp_enqueue_script( 'jquery-validate-script', get_stylesheet_directory_uri().'/js/jquery-Validation/js/jquery.validationEngine.js');
    global $q_config;
    wp_enqueue_script( 'jquery-validate-script_lang', get_stylesheet_directory_uri().'/js/jquery-Validation/js/languages/jquery.validationEngine-'. $q_config['language'].'.js');
    wp_enqueue_script('bootstrap-datepicker', get_stylesheet_directory_uri() . '/js/bootstrap-datepicker.min.js');
    wp_enqueue_script('bootstrap-datetimepicker-lang', get_stylesheet_directory_uri() . '/js/bootstrap-datepicker.' . $q_config['language'] . '.min.js');

    wp_enqueue_script('owl', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js');
    wp_enqueue_script('isotope', get_stylesheet_directory_uri() . '/js/jquery.isotope.js');
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js');
    wp_enqueue_script('myScript', get_stylesheet_directory_uri() . '/js/myScript.js');
    ?>

    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php //comments_popup_script(); // off by default ?>

    <?php
    if (is_singular()) wp_enqueue_script('comment-reply');
    wp_head();
    ?>

</head>
<?php
$navclass = "nav-no-top";
$bodyclass = "padding-top45";
$ishome = false;
if (is_home() == 1) {
    //home
    //ver bien como saber si estoy en el home o no
    $navclass = "nav-top";
    $bodyclass = "";
    $ishome = true;
}

?>
<body data-tablet-width="1024" data-mobile-width="580">
<a href="<?=get_site_url()?> " id="logoPortada">
    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo2Azul.png" alt="WOWTrip">
    <img id="logoNaranja" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo2Naranja.png" alt="WOWTrip">
</a>

<div id="pageTop">
    <section id="gkPageTop">
        <div class="gkPage">
            <a href="<?=get_site_url()?> " style="color: #000; float: left; width: 240px">
                <h1 style="font-size: 12px; height: 45px;">CubaWOWTrip</h1>
            </a>

            <div id="gkUserArea">
                <a href="https://facebook.com" onclick="errorSocial();" id="gkFacebook">Facebook</a>
                <a href="https://twitter.com" onclick="errorSocial();" id="gkTwitter">Twiter</a>
                <a href="https://instagram.com" onclick="errorSocial();" id="gkInstagram">Instagram</a>
                <a href="https://pinterest.com" onclick="errorSocial();" id="gkPinterest">Pinteres</a>
                <button id="gkIconBar" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div>
                <nav role="navigation" class="collapse navbar-collapse navbar-ex1-collapse">
                    <?php wp_nav_menu(array(
                            'container' => '', 'container_class' => 'collapse navbar-collapse navbar-ex1-collapse', 'walker' => new AvenWalkerNav(),
                            'container_id' => '', 'theme_location' => 'primary', 'menu_class' => 'navbar-nav', 'fallback_cb' => 'fallbackmenu')
                    ); ?>
                </nav>
            </div>
        </div>
    </section>
    <section id="gkBannerTop">
        <div class="gkPage">
            <div id="gkSelectBanner" class="col-md-3 col-sm-12 col-xm-12">
                <div id="imagCarouselSelect" class="col-md-12"
                     style="background-image: url(<?= View::getFoto($firstImg->foto) ?>);">
                    <h2 id="nombCarouselSelect"> <?= __($firstImg->nombre) ?></h2>
                </div>
            </div>
            <div id="gkContentCarousel" class="col-md-9 col-sm-12 col-xm-12">
                <div class="gkCarousel col-md-12 col-sm-12 col-xs-12">
                    <a href="#" class="izquierda_flecha"><img
                            src="<?php echo get_stylesheet_directory_uri() ?>/images/izq.png"/></a>
                    <a href="#" class="derecha_flecha"><img
                            src="<?php echo get_stylesheet_directory_uri() ?>/images/der.png"/></a>
                    <!--/.item-->
                    <div class="gkCarouselItems">
                        <a id="posicion_0" class="gkItemCarousel" href="<?= get_page_link($lastImg->getExcursion()->Post_ID) ?>#bc">
                            <div id="imagen_0" class="imagenCarousel"
                                 style="border-radius: 10%; background-image: url(<?= View::getFoto($lastImg->foto) ?>);"
                                ></div>
                            <div style="width:200px">
                                <h2 id="nombre_0"><?= __($lastImg->nombre) ?></h2>

                                <p id="texto_0"><?= __($lastImg->textoCorto) ?></p>
                            </div>
                        </a>
                        <?php
                        $pos = 1;
                        /** @var ImagenPortadaModel $imagenPortada */
                        foreach ($arrImag as $imagenPortada): ?>
                            <a id="posicion_<?= $pos ?>" class="gkItemCarousel"  href="<?= get_page_link($imagenPortada->getExcursion()->Post_ID) ?>#bc">
                                <div id="imagen_<?= $pos ?>" class="imagenCarousel"
                                     style="border-radius: 5%; background-image: url(<?= View::getFoto($imagenPortada->foto) ?>);"
                                    ></div>
                                <div style="width:200px">
                                    <h2 id="nombre_<?= $pos ?>"> <?= __($imagenPortada->nombre) ?></h2>

                                    <p id="texto_<?= $pos ?>"><?= __($imagenPortada->textoCorto) ?></p>
                                </div>
                            </a>
                            <?php $pos++; endforeach; ?>
                        <a id="posicion_<?= $size + 1 ?>" class="gkItemCarousel" href="<?= get_page_link($firstImg->getExcursion()->Post_ID) ?>#bc">
                            <div id="imagen_<?= $size + 1 ?>" class="imagenCarousel"
                                 style="border-radius: 10%; background-image: url(<?= View::getFoto($firstImg->foto) ?>);"
                                ></div>
                            <div style="width:200px">
                                <h2 id="nombre_<?= $size + 1 ?>"> <?= __($firstImg->nombre) ?></h2>

                                <p id="texto_<?= $size + 1 ?>"><?= __($firstImg->textoCorto) ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="gkBreadcrumb">
        <?php if (function_exists('bcn_display')) {
            $bc = bcn_display_list(true);
            $m = array();
            preg_match_all('/<li /', $bc, $m);
        }?>
        <div class="breadcrumbs">

            <ul>
                <li class="pathway" style="font-size: 20px"><em class="fa fa-home">:</em></li>
                <li class="pathway"><?php echo $bc ?></li>
            </ul>
        </div>

        <div id="gkSearch">
            <form id="form_search" role="form" action="<?= View::genPathSite('search')?>">
                <input id="search_word" type="text" name="find_q" value="" placeholder="Buscar...">
                <select name="find_tipo" id="search_type" class="inputbox">
                    <option value="0"><?= __(CS_L_ALL) ?></option>
                    <option value="1"><?= __(CS_L_CIRCUITOS) ?></option>
                    <option value="2"><?= __(CS_L_OVERNIGHT) ?></option>
                    <option value="3"><?= __(CS_L_EXCURSIONES) ?></option>
                </select>
            </form>
        </div>
        <!--[if IE 8]>
        <div class="ie8clear"></div>
        <![endif]-->
    </section>
</div>
<script type="text/javascript">
    jQuery('nav.navbar-fixed-top').removeClass('nav-no-top');
    jQuery('nav.navbar-fixed-top').addClass('nav-top');
</script>
<script>
    var layoutConfig = {
        asyncPageLoaderEnabled: true,
        selectBoxHoverEnabled: true,
        bootFiltersAnimationEnabled: true,
        hoverspinPreloadingEnabled: true
    };
</script>
<!--Fin de la Seccion Body-->
<section id="mainContainer">





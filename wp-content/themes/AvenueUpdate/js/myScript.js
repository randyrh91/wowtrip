/**
 * Created by Ciber-Soft on 17-sep-16.
 */
var posicion = 0;
var paso=1;
var time_desplzamiento = 5000;
jQuery(function ($) {
    var numeroImatges = 8;
    $('#posicion_1').css('box-shadow','0px 3px 9px 3px rgba(0, 0, 0, 0.5)');
    if (numeroImatges <= 3) {
        $('.derecha_flecha').css('display', 'none');
        $('.izquierda_flecha').css('display', 'none');
    }
    $('.izquierda_flecha').live('click', function () {
        if (posicion > 0) {
            posicion --;
        } else {
            posicion = numeroImatges - 2;
        }
        $(".gkCarouselItems").animate({"left": -($('#posicion_' + posicion).position().left)}, 600);
        $('#posicion_'+(posicion+1)).css('box-shadow','0px 3px 9px 3px rgba(0, 0, 0, 0.5)');//centro
        $('#posicion_'+(posicion)).css('box-shadow','0 2px 7px 2px rgba(0, 0, 0, 0.2)');
        $('#posicion_'+(posicion+2)).css('box-shadow','0 2px 7px 2px rgba(0, 0, 0, 0.2)');
        $('#imagCarouselSelect').css('background-image',$('#imagen_' + (posicion+1)).css('background-image'));
        $('#nombCarouselSelect').html($('#nombre_' + (posicion+1)).html());
        $('#textCarouselSelect').html($('#texto_' + (posicion+1)).html());
        return false;
    });

    $('.izquierda_flecha').hover(function () {
        $(this).css('opacity', '1');
    }, function () {
        $(this).css('opacity', '0.5');
    });

    $('.derecha_flecha').hover(function () {
        $(this).css('opacity', '1');
    }, function () {
        $(this).css('opacity', '0.5');
    });

    $('.derecha_flecha').live('click', function () {
        if (numeroImatges > posicion + 2) {
            posicion++;
        } else {
            posicion = 0;
        }
        $(".gkCarouselItems").animate({"left": -($('#posicion_' + posicion).position().left)}, 600);
        $('#posicion_'+(posicion+1)).css('box-shadow','0px 3px 9px 3px rgba(0, 0, 0, 0.5)');//centro
        $('#posicion_'+(posicion+1)).css('margin-bottom','20px');
        $('#posicion_'+(posicion)).css('box-shadow','0 2px 7px 2px rgba(0, 0, 0, 0.2)');
        $('#posicion_'+(posicion+2)).css('box-shadow','0 2px 7px 2px rgba(0, 0, 0, 0.2)');
        $('#imagCarouselSelect').css('background-image',$('#imagen_' + (posicion+1)).css('background-image'));
        $('#nombCarouselSelect').html($('#nombre_' + (posicion+1)).html());
        $('#textCarouselSelect').html($('#texto_' + (posicion+1)).html());
        return false;
    });
    //funcion para validar el form
    jQuery('.validateEngine').validationEngine({
        scrollOffset: 60
    });

    jQuery('#book_date_id').datepicker({
        format: 'yyyy/mm/dd'
    });
    var st = "",c=0;
    function validateForms() {
        jQuery('form[id^=form_book]').each(function (i, e) {
            if (jQuery(e).validationEngine("validate")) {
                c++;
                st += jQuery(e).serialize() + "&";
            }

        });
    }
    $('#botonEnviar').click(function (e) {
        jQuery('form[id^=form_book]').each(function (i, e) {
            if (jQuery(e).validationEngine("validate")) {
                c++;
                st += jQuery(e).serialize() + "&";
            }

        });
        console.log(c);
        if(c==4) { //la cantidad de form a validar
            jQuery.get('?' + st, {}, function (response) {
                if (response.success) {
                    console.log(response);
                    jQuery('#mail_sended').modal('show');
                    $('#barraProgresoPasos .bar').css('width', '100%');
                    $('#botonAtras').hide();
                }
                c=0;
            })
        }
    });
    //Para los tab de steps
    //$('a.step').on('click.bs.tab',function (e) {
    //    e.preventDefault();
    //    event.preventDefault();
    //})
    $('#botonContinuar').click(function (e) {
        switch(paso){
            case 1:{
                if (jQuery('form[id=form_book1]').validationEngine("validate")) {
                    $('#tab1').removeClass('active');
                    $('#tab2').addClass('active'); //poniendo el herf
                    $('#botonAtras').css('display', 'block');
                    $('#labelInfoInic2 i').css('visibility', 'visible');
                    $('#labelCant2').removeClass('badge-default');
                    $('#labelCant2').addClass('badge');
                    $('#labelInfoInic2').addClass('labelInfoInic');
                    $('#labelInfoInic2').parent('a').attr('href','#tab2');
                    $('#barraProgresoPasos .bar').css('width', '50%');
                    paso++;
                }
                break;
            }
            //case 2:{
            //    if (jQuery('form[id=form_book2]').validationEngine("validate")) {
            //        $('#tab2').removeClass('active');
            //        $('#tab3').addClass('active');
            //        $('#labelInfoInic3 i').css('visibility', 'visible');
            //        $('#labelCant3').removeClass('badge-default');
            //        $('#labelCant3').addClass('badge');
            //        $('#labelInfoInic3').addClass('labelInfoInic');
            //        $('#barraProgresoPasos .bar').css('width', '75%');
            //        paso++;
            //        break;
            //    }
            //}
            case 2:{
                if (jQuery('form[id=form_book2]').validationEngine("validate")) {
                    $('#tab2').removeClass('active');
                    $('#tab3').addClass('active');
                    $('#tab3').attr('href','#tab3'); //poniendo el herf
                    $('#botonContinuar').css('display', 'none');
                    $('#botonEnviar').css('display', 'block');
                    $('#labelInfoInic3 i').css('visibility', 'visible');
                    $('#labelCant3').removeClass('badge-default');
                    $('#labelCant3').addClass('badge');
                    $('#labelInfoInic3').addClass('labelInfoInic');
                    $('#labelInfoInic3').parent('a').attr('href','#tab3');
                    $('#barraProgresoPasos .bar').css('width', '75%');
                }
                break;
            }
            //case 3:{
            //    if (jQuery('form[id=form_book3]').validationEngine("validate")) {
            //        $('#tab3').removeClass('active');
            //        $('#tab4').addClass('active');
            //        $('#botonContinuar').css('display', 'none');
            //        $('#botonEnviar').css('display', 'block');
            //        $('#labelInfoInic4 i').css('visibility', 'visible');
            //        $('#labelCant4').removeClass('badge-default');
            //        $('#labelCant4').addClass('badge');
            //        $('#labelInfoInic4').addClass('labelInfoInic');
            //        $('#barraProgresoPasos .bar').css('width', '100%');
            //    }
            //    break;
            //}
        }
    });

    $('#botonAtras').click(function (e) {

        switch(paso){
            case 1:{
                $('#tab2').removeClass('active');
                $('#tab1').addClass('active');
                $('#botonAtras').css('display','none');
                $('#labelCant2').addClass('badge-default');
                $('#labelCant2').removeClass('badge');
                $('#labelInfoInic2 i').css('visibility','hidden');
                $('#labelInfoInic2').removeClass('labelInfoInic');
                $('#barraProgresoPasos .bar').css('width', '25%');
                break;
            }
            case 2:{
                $('#tab3').removeClass('active');
                $('#tab2').addClass('active');
                $('#labelCant3').addClass('badge-default');
                $('#labelCant3').removeClass('badge');
                $('#labelInfoInic3 i').css('visibility','hidden');
                $('#labelInfoInic3').removeClass('labelInfoInic');
                $('#barraProgresoPasos .bar').css('width', '50%');
                paso--;
                break;
            }
            case 3:{
                $('#tab4').removeClass('active');
                $('#tab3').addClass('active');
                $('#botonContinuar').css('display','block');
                $('#labelCant4').addClass('badge-default');
                $('#labelCant4').removeClass('badge');
                $('#labelInfoInic4 i').css('visibility','hidden');
                $('#botonEnviar').css('display','none');
                $('#labelInfoInic4').removeClass('labelInfoInic');
                $('#barraProgresoPasos .bar').css('width', '75%');
                paso--;
                break;
            }
        }
    });
});

function rating(estrellas, path, id) {
    var self = this;
    var $ = jQuery;
    $div=$('#alertar-'+id);
    if($div['0'] && $div.css('display')=='none'){
        $div.show('slow');
        $.post(path, {id: id, estrellas: estrellas}, function (response) {
            if (response.success) {

            }
        });
    }
}
jQuery(function ($) {
   $('span.stars>span.fa').click(function () {
       //$(this).parent().children('span.fa').removeClass('fa-star-o').addClass('fa-star');
       $(this).parent().children('span.fa').hide();
   });
});

//trabajado con el fixed del top y footer
jQuery(function ($) {
    //animando el logo
    var logo = $('#logoNaranja');
    logo.animate({'opacity':0},3000);
    $('li.qtranxs-lang-menu').find('a[data-toggle=dropdown]').each(function () {
        var img = $(this).children().eq(0), flechita = $(this).children().eq(1);
        $(this).text("");
        $(this).append(img).append(flechita);

        //$(this).children().eq(0).text('');
    });
    desplazarCinta = function () {
        if(flag_out)
            $('#gkContentCarousel').find('a.derecha_flecha').trigger('click');
        setTimeout(desplazarCinta,time_desplzamiento);
    };
    setTimeout(desplazarCinta,time_desplzamiento);

    //fixed
    var $pageTop = jQuery('#pageTop'), $content = jQuery('#content'),
        $gkBannerTop = jQuery('#gkBannerTop'), $footer = jQuery('#gkFooter'),
        hBannerTop = $gkBannerTop[0].clientHeight * 1, hFooter = $footer[0].clientHeight * 1;
    var goToTop = function() {
        $content.css({
            marginTop: $pageTop[0].clientHeight * 1
        });
    };
    var goToTop50 = function() {
        $content.css({
            marginTop: $pageTop[0].clientHeight * 1
        });
    };
    goToTop();
    var flag_out = true;
    var toggleBars = function() {
        var y = window.scrollY * 1;
        if(flag_out) {
            if(y>50) {
                $gkBannerTop.slideUp('slow');

                $footer.css({
                    bottom: -hFooter
                }).animate({
                    bottom: 0
                });
                logo.animate({'opacity':1},1000);
                flag_out = false;
            }
            setTimeout(goToTop50,500);
        }
        else {
            if(y<50) {
                $gkBannerTop.slideDown('slow');
                $footer.animate({
                    bottom: -hFooter
                });
                logo.animate({'opacity':0},1000);
                flag_out = true;
                setTimeout(goToTop,500);

            }
        }

    };
    if($pageTop[0]) {
        window.onscroll = toggleBars;
    }
});




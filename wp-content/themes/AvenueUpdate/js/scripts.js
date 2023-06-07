/**
 * Created by KRAKEN on 13/02/2015.
 */
jQuery(document).ready(function(){
    jQuery(".dropdown").mouseenter(function(){
        jQuery(this).addClass('open');
    });
    jQuery(".dropdown").mouseleave(function(){
        jQuery(this).removeClass('open');
    });

    jQuery("#soi-btn-find").click(function(){
        var propType = jQuery('#property-dropdown-no-script').val();
        var location = jQuery('#location-dropdown-no-script').val();
        var urlTo = '';
        if(propType == '#' && location == '#'){
            urlTo = window.location.origin + window.location.pathname;
        }
        else
            if(propType == '#'){
                urlTo = window.location.origin + window.location.pathname + '?location=' + location;
            }
            else
                if(location == '#') {
                    urlTo = window.location.origin + window.location.pathname + '?property=' + propType;
                }
            else{
                    urlTo = window.location.origin + window.location.pathname + '?property=' + propType + '&location=' + location;
                }
        window.location.href = urlTo;
    })

    //$('#toTop').click(function() {
    //    $('body,html').animate({scrollTop:0},500);
    //});

    var time = 7; // time in seconds

    var $progressBar,
        $bar,
        $elem,
        isPause,
        tick,
        percentTime;

    //Init the carousel
    jQuery(".owl-carousel").owlCarousel({
        slideSpeed : 1000,
        paginationSpeed : 500,
        singleItem : true,
        navigation : false,
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        afterInit : progressBar,
        afterMove : moved,
        startDragging : pauseOnDragging,
        //autoHeight : true,
        transitionStyle : "fadeUp"
    });

    //Init progressBar where elem is $("#owl-demo")
    function progressBar(elem){
        $elem = elem;
        //build progress bar elements
        buildProgressBar();
        //start counting
        start();
    }

    //create div#progressBar and div#bar then append to $(".owl-carousel")
    function buildProgressBar(){
        $progressBar = jQuery("<div>",{
            id:"progressBar"
        });
        $bar = jQuery("<div>",{
            id:"bar"
        });
        $progressBar.append($bar).appendTo($elem);
    }

    function start() {
        //reset timer
        percentTime = 0;
        isPause = false;
        //run interval every 0.01 second
        tick = setInterval(interval, 10);
    };

    function interval() {
        if(isPause === false){
            percentTime += 1 / time;
            $bar.css({
                width: percentTime+"%"
            });
            //if percentTime is equal or greater than 100
            if(percentTime >= 100){
                //slide to next item
                $elem.trigger('owl.next')
            }
        }
    }

    //pause while dragging
    function pauseOnDragging(){
        isPause = true;
    }

    //moved callback
    function moved(){
        //clear interval
        clearTimeout(tick);
        //start again
        start();
    }



    jQuery("#main-slider").mouseenter(function(){
        jQuery(".owl-next").removeClass("opacity0");
        jQuery(".owl-prev").removeClass("opacity0");
        //jQuery(".carousel-control").removeClass("opacity0");
    });
    jQuery("#main-slider").mouseleave(function(){
        jQuery(".owl-next").addClass("opacity0");
        jQuery(".owl-prev").addClass("opacity0");
        //jQuery(".carousel-control").addClass("opacity0");
    });



    jQuery(window).resize(function(){
        var selector = jQuery('.caegories .active').attr('data-filter');
        var $container = jQuery('#portfolio-items');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    })

    jQuery(window).load(function () {
        var $container = jQuery('#portfolio-items');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        jQuery('.caegories a').click(function () {
            jQuery('.caegories .active').removeClass('active');
            jQuery(this).addClass('active');
            var selector = jQuery(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

    });


});
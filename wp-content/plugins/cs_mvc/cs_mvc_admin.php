<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 10/05/2015
 * Time: 4:09
 */
//Menu
add_action('admin_menu',function() {
    add_menu_page('WOW','WOW (Reservas)', 'manage_options','cs_mvc_reserva_excursiones',function() {
        cs_mvc_render_admin('admin/ReservaExcursion','ReservaExcursion');
    },'',10);
    add_submenu_page('cs_mvc_reserva_excursiones','Portada WOW','Portada', 'manage_options','cs_mvc_imagen_portadas',function() {
        cs_mvc_render_admin('admin/ImagenPortada','ImagenPortada');
    });
    add_submenu_page('cs_mvc_reserva_excursiones','Excursiones WOW','Excursiones', 'manage_options','cs_mvc_excursiones',function() {
        cs_mvc_render_admin('admin/Excursion','Excursion');
    });
    add_submenu_page('cs_mvc_reserva_excursiones','Servicios Hostales WOW','Servicios', 'manage_options','cs_mvc_servicios',function() {
        cs_mvc_render_admin('admin/Servicio','Servicio');
    });
    add_submenu_page('cs_mvc_reserva_excursiones_cxf','Imagen Excursion','Imagen de Excursion', 'manage_options','cs_mvc_imagen_excursiones',function() {
        cs_mvc_render_admin('admin/ImagenExcursion','ImagenExcursion');
    });
    add_submenu_page('cs_mvc_reserva_excursiones_cxf','Viajes de Excursion','Viajes de Excursion', 'manage_options','cs_mvc_viajes',function() {
        cs_mvc_render_admin('admin/Viaje','Viaje');
    });
    add_submenu_page('cs_mvc_reserva_excursiones','Destinos Turisticos WOW','Destinos Turisticos', 'manage_options','cs_mvc_destino_turisticos',function() {
        cs_mvc_render_admin('admin/DestinoTuristico','DestinoTuristico');
    });
    add_submenu_page('cs_mvc_reserva_excursiones','Hostales WOW','Hostales', 'manage_options','cs_mvc_hostales',function() {
        cs_mvc_render_admin('admin/Hostal','Hostal');
    });
//    add_submenu_page('cs_mvc_reserva_excursiones','Tipo de Destino','Tipo de Destino', 'manage_options','cs_mvc_tipo_destinos',function() {
//        cs_mvc_render_admin('admin/TipoDestino','TipoDestino');
//    });
    add_submenu_page('cs_mvc_reserva_excursiones','Transportes WOW','Transportes', 'manage_options','cs_mvc_transportes',function() {
        cs_mvc_render_admin('admin/Transporte','Transporte');
    });
//    add_submenu_page('cs_mvc_reserva_excursiones','Tipo de Transporte','Tipo de Transporte', 'manage_options','cs_mvc_tipo_transportes',function() {
//        cs_mvc_render_admin('admin/TipoTransporte','TipoTransporte');
//    });
    add_submenu_page('cs_mvc_reserva_excursiones','Choferes WOW','Choferes', 'manage_options','cs_mvc_choferes',function() {
        cs_mvc_render_admin('admin/Chofer','Chofer');
    });


//    add_submenu_page('cs_mvcadmin','Acciones','Acciones', 'manage_options','cs_mvc_acciones',function() {
//        cs_mvc_render_admin('admin/acciones','Accion');
//    });

});
////MVC-VM
function cs_mvc_render_admin($view, $viewmodel=null) {
//    if(isset($_REQUEST['controller']))
//        cs_mvc_create_controller();
//    else {
        $config = array();
        $config['view'] = $view;
        if($viewmodel) $config['viewmodel'] = $viewmodel;
        cs_mvc_render_main($config);
//    }
}


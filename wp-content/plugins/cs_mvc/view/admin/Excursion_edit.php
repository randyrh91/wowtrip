<?php
/**
 * Created by CS-Genarator.
 * User: pr0x
 */
$nombre = isset($nombre) ? $nombre : (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : 0 );
$apellido = isset($apellido) ? $apellido : (isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : 0 );
$ci = isset($ci) ? $ci : (isset($_REQUEST['ci']) ? $_REQUEST['ci'] : 0 );
$descripcion = isset($descripcion) ? $descripcion : (isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : 0 );
$fecha = isset($fecha) ? $fecha : (isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : 0 );
$hora = isset($hora) ? $hora : (isset($_REQUEST['hora']) ? $_REQUEST['hora'] : 0 );
$dpt = isset($dpt) ? $dpt : (isset($_REQUEST['dpt']) ? $_REQUEST['dpt'] : 0 );

$nom = isset($nom) ? $nombre : (isset($_REQUEST['nom']) ? $_REQUEST['nom'] : '' );
$app = isset($app) ? $apellido : (isset($_REQUEST['app']) ? $_REQUEST['app'] : '' );
$ci = isset($ci) ? $ci : (isset($_REQUEST['ci']) ? $_REQUEST['ci'] : 0 );
$desc = isset($desc) ? $desc : (isset($_REQUEST['desc']) ? $_REQUEST['desc'] : '' );
$fecha = isset($fecha) ? $fecha : (isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : '' );
$hora = isset($hora) ? $hora : (isset($_REQUEST['hora']) ? $_REQUEST['hora'] : '' );
$dpt = isset($dpt) ? $dpt : (isset($_REQUEST['dpt']) ? $_REQUEST['dpt'] : '' );
$acep = isset($acep) ? $acep : (isset($_REQUEST['acep']) ? $_REQUEST['acep'] : 0 );


$model = new ExcursionViewModel();
$item = $model->getExcursion();
$viajes = $item->getViajes();
?>
<div class="wrap">
    <?php if ($item->id): ?>
        <h2>Editando Excursion: <?= __($item->__toString()) ?></h2>
    <?php else: ?>
        <h2>Agregando Excursion</h2>
    <?php endif ?>
    <form id="form1"  method="post" action="<?=get_admin_url()?>admin.php" style="float: left; width: <?=$item->id?60:100?>%">
        <input type="hidden" name="controller" value="Excursion.save">
        <input type="hidden" name="id" value="<?= $item->id ?>">
        <table class="form-table">
            <tbody>
                <tr class="wrap">
					<th><label>Nombre</label></th>
					<td>
                        <?=HTML::listInputTranslate('nombre',$item->nombre,'input',array(
							'onblur'=>'setValuesByLang1(this)',
                            'required'=>'required'
						))?>
						</td>
				</tr>

                <tr class="wrap">

                    <th><label>Texto Corto (Max=1000)</label></th>
                    <td>
                        <?=HTML::listInputTranslate('textoCorto',$item->textoCorto,'textarea',array(
                            'onblur'=>'setValuesByLang1(this)',
                            'maxlength'=>'1000',
                            'rows'=>'5'
                        ))?>
                    </td>
                </tr>
                <tr class="wrap">
					<th><label>Descripcion</label></th>
					<td>
                        <?=HTML::listInputTranslate('descripcion',$item->descripcion,'textarea',array(
							'onblur'=>'setValuesByLang1(this)',
                            'rows'=>'10'
						))?>
						</td>
				</tr>

				<tr class="wrap">
					<th><label>Tipo de Excursi&oacute;n</label></th>
					<td>
						<?=HTML::dropDownList('TipoExcursion_id',$model->getTipoExcursiones(),$item->TipoExcursion_id   ,array(
                            'required'=>'required'
                        ))?>
					</td>
				</tr>
					<tr class="wrap">
					<th><label>Precio ($)</label></th>
					<td>
							<input required="" name="precio" value="<?=__($item->precio)?>">
						</td>
				</tr>
	
					<tr class="wrap">
					<th><label>Categoria</label></th>
					<td>
							<input name="categoria" type="number" value="<?=__($item->categoria)?>">
						</td>
				</tr>
	
					<tr class="wrap">
					<th><label>Likes</label></th>
					<td>
							<input name="likes" type="number" value="<?=__($item->likes)?>">
						</td>
				</tr>
	
					<tr class="wrap">
					<th><label>Distancia (KM)</label></th>
					<td>
							<input name="distanciaKM" value="<?=__($item->distanciaKM)?>">
						</td>
				</tr>
	
					<tr class="wrap">
					<th><label>Tiempo (H)</label></th>
					<td>
							<input name="tiempo" value="<?=__($item->tiempo)?>">
						</td>
				</tr>
	
					<tr class="wrap">
					<th><label>Dias</label></th>
					<td>
							<input name="dias" type="number" value="<?=__($item->dias)?>">
						</td>
				</tr>
	
                <tr class="wrap">
					<th><label>P&aacute;gina de Excursi&oacute;n</label></th>
					<td>
                        <?php if(!$item->id):?>
                        <b>Crear Post</b>
                        <div>
                            <input type="radio" name="create_post" value="1" <?=(!$item->id)?'checked':''?>>Si
                            <input type="radio" name="create_post" value="0" <?=($item->id)?'checked':''?>>No
                        </div>
                        <?php endif?>
                        <a href="./post.php?post=<?=$item->Post_ID?>&action=edit" class="button"><b><?=($item->Post_ID)
                                    ?'<u>'.$item->Post_ID.'</u> | '.__(get_post($item->Post_ID)->post_title)
                                    :'No ha seleccionado ninguna Pagina<br>Cree una Nueva y Asignala luego...'?>
                            </b></a>
                        <select style="width: 100%" onchange="jQuery('input[name=Post_ID]').val(jQuery(this).val())">
                            <option>---</option>
                            <?php foreach(ExcursionRepo::create()->getPosts() as $post):?>
                                <option <?=$post->ID==$item->Post_ID?'selected':''?> value="<?=$post->ID?>"> <?='<u>'.$post->ID.'</u> | '.__($post->post_title) ?></option>
                            <?php endforeach?>
                        </select>
							<input name="Post_ID" type="hidden" value="<?=__($item->Post_ID)?>">
						</td>
				</tr>
                <tr class="wrap">
                    <th><label>Es DeLux</label></th>
                    <td>
                        <input name="isDelux" type="checkbox" <?=($item->isDelux)?'checked':''?> value="1">
                    </td>
                </tr>
                <tr class="wrap">
                    <th><label>Excursi&oacute;n DeLux</label></th>
                    <td>
                        <?=HTML::dropDownListHiddenValue('Excursion_id',
                            ExcursionRepo::create()->allby(array(
                                'id <>' =>$item->id,
                            )),
                            $item->Excursion_id, array(
                                'style'     =>  "width: 100%"
                            ))?>
                    </td>
                </tr>

            </tbody>
        </table>
        <div class="right">
            <?= HTML::button_primary('Guardar') ?>
            <?= HTML::link_buttonVM('Ver Listado', 'cs_mvc_excursiones') ?>
        </div>
    </form>
    <div style="width:36%; float: right; display: <?=$item->id?'inline-block':'none'?>">
        <h3>Destinos a Visitar(<?=count($viajes)?>)</h3>
        <hr>
        <?php
        /** @var ViajeModel $v */
        foreach($viajes as $v):?>
            <div style="display: inline-block; width: 100%; padding: 8px 0px;  font-size: 14px; margin: 2px; border: 2px solid #3C2BB6; background-color: #3C2BB6; color: #f5f5f5">
                <a target="_blank" href="admin.php/<?=View::genPathVM('cs_mvc_viajes','admin/Viaje_edit','Viaje',$v->id)?>" style="float: left;background: #FFFFFF; color: #3C2BB6; text-decoration: none; padding: 0 4px; border: dotted 2px #000000"><b>E</b></a>
                <a href="#" style="float: right;background: #FFFFFF; color: #e14d43; text-decoration: none; padding: 0 4px; border: dotted 2px #000000" onclick="deleteViaje(this,<?=$v->id?>)"><b>X</b></a>
                <?=$v->orden?>- <b style="margin-left: 20px;">(<?=$v->tiempo?> - <?=$v->distanciaKM?>) <?=__($v->getDestinoTuristico()->nombre)?></b>
            </div>
        <?php endforeach?>
        <form id="form4" method="post" action="<?=get_admin_url()?>admin.php">
            <input type="hidden" name="controller" value="Excursion.saveDestinoTuristico">
            <input type="hidden" name="Excursion_id" value="<?= $item->id ?>">
            <input type="hidden" name="id" value="0">
            <table class="form-table">
                <tbody>
                <tr class="wrap">
                    <th><label>Destino</label></th>
                    <td>
                        <?=HTML::dropDownList('DestinoTuristico_id',$model->getDestinoTuristicos(),0,array(
                            'required'=>'required','style'=>'width:100%'
                        ))?>
                    </td>
                </tr>
                <tr class="wrap">
                    <th><label>Transporte</label></th>
                    <td>
                        <?=HTML::dropDownList('Transporte_id',$model->getTransportes(),0,array(
                            'required'=>'required','style'=>'width:100%'
                        ))?>
                    </td>
                </tr>
                <tr class="wrap">
                    <th><label>Orden</label></th>
                    <td>
                        <input name="orden" type="text" value="1">
                    </td>
                </tr>

                <tr class="wrap">
                    <th><label>Tiempo</label></th>
                    <td>
                        <input name="tiempo" type="text" value="0">
                    </td>
                </tr>

                <tr class="wrap">
                    <th><label>DistanciaKM</label></th>
                    <td>
                        <input name="distanciaKM" type="text" value="">
                    </td>
                </tr>
                <tr class="wrap">
                    <th colspan="2">
                        Descripci&oacute;n<br>
                        <?=HTML::listInputTranslate('descripcion','','textarea',array(
                            'onblur'=>'setValuesByLangForForm(this,"form4")',
                        ))?>
                    </th>
                </tr>
                </tbody>
            </table>
            <?= HTML::button_primary('Añadir Destino') ?>
        </form>
        <HR>
    </div>

    <h3>Servicios de Excursi&oacute;n</h3>
    <hr>
    <table>
        <tr>
            <th width="45%">Existentes</th>
            <th>&nbsp;</th>
            <th width="45%">Asignados</th>
        </tr>
        <tr>
            <td>
                <?=HTML::listBox("servicios_noasig",$item->getServicioNoAsignados(),0,array(
                    "style"=>"width: 100%"
                ))?>
            </td>
            <td>
                <button onclick="asingServ(this)" class="button-primary">&gt;</button>
                <button onclick="noAsingServ(this)" class="button-primary">&lt;</button>
            </td>
            <td>
                <?=HTML::listBox("servicios_asig",$item->getServicios(),0,array(
                    "style"=>"width: 100%"
                ))?>
            </td>

        </tr>
    </table>
    <script>
        function asingServ(el) {
            var $select_noasig = jQuery('select[name=servicios_noasig]');
            var $select_asig = jQuery('select[name=servicios_asig]');
            var values = $select_noasig.val();
            if($select_noasig[0].selectedIndex>-1) for(var i in values) {
                var value = values[i];
                jQuery.post('<?=View::genPathCA("cs_mvc_excursiones","ServicioExcursion","saveJSON")?>',
                    {Excursion_id:<?=$item->id?>, Servicio_id: value},
                    function(response) {
                    console.log(response);
                    if(response.success) {
                        var item = $select_noasig[0].options[$select_noasig[0].selectedIndex];
                        //item.Servicio_id = value;
                        //item.value = response.data.id;
                        $select_asig[0].options.add(item);
                        $select_noasig[0].options.remove($select_noasig[0].selectedIndex);
                    }
                });

            }
        }
        function noAsingServ(el) {
            var $select_noasig = jQuery('select[name=servicios_noasig]');
            var $select_asig = jQuery('select[name=servicios_asig]');
            var values = $select_asig.val();
            if($select_asig[0].selectedIndex>-1) for(var i in values) {
                var value = values[i];
                jQuery.post('<?=View::genPathCA("cs_mvc_excursiones","ServicioExcursion","removeJSON")?>',
                    {Excursion_id:<?=$item->id?>, Servicio_id: value},
                    function(response) {
                    console.log(response);
                    if(response.success) {
                        var item = $select_asig[0].options[$select_asig[0].selectedIndex];
                        //item.value = item.Servicio_id;
                        $select_noasig[0].options.add(item);
                        $select_asig[0].options.remove($select_asig[0].selectedIndex);
                    }
                });

            }
        }
    </script>



    <form id="form2" enctype="multipart/form-data" method="post" action="<?=get_admin_url()?>admin.php" style="width:36%; float: right; display: <?=$item->id?'inline-block':'none'?>">
        <input type="hidden" name="controller" value="Excursion.upLoadImg">
        <input type="hidden" name="Excursion_id" value="<?= $item->id ?>">
        <h3>Imagenes de Excursi&oacute;n</h3>
        <input type="file" name="foto" placeholder="Subir nueva foto">
        <?= HTML::button_primary('Subir Imagen') ?>
        <table class="form-table">
            <tbody>
            <tr class="wrap">
                <th><label>Titular</label></th>
                <td>
                    <?=HTML::listInputTranslate('nombre','','input',array(
                        'onblur'=>'setValuesByLang2(this)',
                        'required'=>'required'
                    ))?>
                </td>
            </tr>
            <tr class="wrap">
                <th><label>URL</label></th>
                <td>
                    <input type="text" name="foto">
                </td>
            </tr>
            </tbody>
        </table>
        <?php $imgs = $item->getImagenExcursiones(); $n=count($imgs);?>
        <?php for($i=$n-1;$i>=0;$i--): ?>
        <?php $img = $imgs[$i];?>
        <div style="display: inline-block; width: 30%; margin: 2px; border: 2px solid #e14d43; background-color: #e14d43; color: #f5f5f5">
            <img src="<?=HTML::getFoto($img->foto)?>" width="100%" style="max-height: 60px"><br>
            <?php /*echo HTML::link_buttonVM('|','cs_mvc_imagen_excursiones','admin/ImagenExcursion_edit','ImagenExcursion',$img->id) */?>
            <a target="_blank" href="admin.php/<?=View::genPathVM('cs_mvc_imagen_excursiones','admin/ImagenExcursion_edit','ImagenExcursion',$img->id)?>" style="float:left; background: #FFFFFF; color: #000066; text-decoration: none; padding: 0 4px; border: dotted 2px #000000">
                <b>E</b></a>
            <a href="#" style="float:right; background: #FFFFFF; color: #e14d43; text-decoration: none; padding: 0 4px; border: dotted 2px #000000" onclick="deleteImg(this,<?=$img->id?>)"><b>X</b></a>
            <span style="font-size: 10"><?=HTML::truncate(__($img->nombre),7)?></span>
        </div>
        <?php endfor?>
    </form>

    <form method="post" action="<?=get_admin_url()?>admin.php" style="width:36%; float: right; display: <?=$item->id?'inline-block':'none'?>">
        <input type="hidden" name="controller" value="Excursion.upLoadImgs">
        <input type="hidden" name="Excursion_id" value="<?= $item->id ?>">
        <h3>Imagenes de Excursi&oacute;n</h3>
        <input type="text" name="foto_dir" placeholder="Direccion de la Carpeta">
        <?= HTML::button_primary('Subir Imagenes') ?>
    </form>

    <div style="clear: both"></div>
    <hr>
    <div style="width:100%; float: right; display: <?=$item->id?'inline-block':'none'?>">
    <h3>Programa de Excursi&oacute;n</h3>
    <form id="form5" method="post" action="<?=get_admin_url()?>admin.php#programa">
        <input type="hidden" name="controller" value="Excursion.saveAllAccion">
        <input type="hidden" name="Excursion_id" value="<?= $item->id ?>">
        <table class="wp-list-table widefat fixed">
            <thead>
            <th width="80%"><a href="#" onclick="toogleTBody(this)">Grupo de Acciones</a></th>
            <th width="20%">Acciones</th>
            </thead>
            <tbody style="display: none">
            <tr>
                <td><?=HTML::listInputTranslate('acciones','','textarea',array(
                        'onblur'=>'setValuesByLangForForm(this,"form5")',
                        'required'=>'required'
                    ))?></td>
                <td>
                    <?=HTML::dropDownList('Viaje_id',$viajes,0,array(
                        'required'=>'required'
                    ))?>
                    <button type="submit" value="addAll" name="acc" class="button button-primary">(+)Agregar Todos</button>
                    <button type="submit" value="clearAddAll" name="acc" class="button button-primary">(x|+)Limpiar y Agregar</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    <hr>
    <a name="programa"></a>

        <?php $prog = $item->getPrograma(); ?>

        <table class="wp-list-table widefat fixed">
            <thead>
            <th width="40px">Orden</th>
            <th>Evento</th>
            <th width="20%">Destino</th>
            <th width="20%">Acciones</th>
            </thead>
            <tbody>
            <tr>
                <form id="form3" method="post" action="<?=get_admin_url()?>admin.php#programa">
                    <input type="hidden" name="controller" value="Excursion.saveAccion">
                    <input type="hidden" name="Excursion_id" value="<?= $item->id ?>">
                <td><input value="<?=count($prog)+1?>" style="width: 100%" type="number" name="orden"></td>
                <td>
                    <?=HTML::listInputTranslate('nombre','','textarea',array(
                        'onblur'=>'setValuesByLangForForm(this,"form3")',
                        'required'=>'required'
                    ))?>
                </td>
                <td><?=HTML::dropDownList('Viaje_id',$viajes,0,array(
                        'required'=>'required'
                    ))?></td>
                <td><input type="submit" value="(+) Nuevo" class="button button-primary"></td>
                </form>
            </tr>
            <?php foreach($prog as $acc): $v = $acc->getViaje();?>

            <tr>
                <td><a name="form3tr<?=$acc->id?>"></a><b><?=$acc->orden?></b></td>
                <td><b><?=HTML::truncate(__( $acc->nombre ))?></b></td>
                <td><b><?=$v?HTML::truncate(__($acc->getViaje()->__toString() )):''?></b></td>
                <td>
                    <b>
                        <a onclick="showAccion(this,<?=$acc->id?>)"  class="button">Editar</a>
                        <a onclick="deleteAccion(this,<?=$acc->id?>)"  class="button">Eliminar</a>
                    </b>
                </td>
            </tr>
            <tr id="form3_<?=$acc->id?>_tr" style="display: none">
                <td colspan="4">
                    <form id="form3_<?=$acc->id?>" method="post" action="<?=get_admin_url()?>admin.php#form3tr<?=$acc->id?>">
                        <input type="hidden" name="controller" value="Excursion.saveAccion">
                        <input type="hidden" name="id" value="<?= $acc->id ?>">
                        <input type="hidden" name="Excursion_id" value="<?= $item->id ?>">

                        <b>Orden:</b> <input type="number" width="30px" name="orden" value="<?=$acc->orden?>">
                        <?=HTML::dropDownList('Viaje_id',$viajes,$acc->Viaje_id,array(
                            'required'=>'required'
                        ))?>
                        <br>
                        <b>Nombre:</b>
                        <br>
                        <?=HTML::listInputTranslate('nombre',$acc->nombre,'textarea',array(
                            'onblur'=>'setValuesByLangForForm(this,"form3_'.$acc->id.'")',
                            'required'=>'required',
                            'cols'=>30
                        ))?>
                        <input type="submit" value="Guadar" class="button button-primary"></td>
                    </form>
                </td>
            </tr>
            <?php endforeach?>
            </tbody>
        </table>

    </div>
</div>
<script>
    function setValuesByLangForForm(select_el,form_id) {
        var $ = jQuery;
        var $sel = $(select_el);
        var arr = $sel.attr('name').split('_');
        var $el = $('[name='+ arr[0] +']');
        $el.val('');
        $('[name^='+ $el.attr('name') +'_]', $('#'+form_id)).each(function (i, item) {
            $item = $(item);
            var arr = $item.attr('name').split('_');
            $el.val($el.val()+'[:'+arr[1]+']'+$item.val());
        });
        console.log($el.val())
    }

    function setValuesByLang1(select_el) {
        var $ = jQuery;
        var $sel = $(select_el);
        var arr = $sel.attr('name').split('_');
        var $el = $('[name='+ arr[0] +']');
        $el.val('');
        $('[name^='+ $el.attr('name') +'_]', $('#form1')).each(function (i, item) {
            $item = $(item);
            var arr = $item.attr('name').split('_');
            $el.val($el.val()+'[:'+arr[1]+']'+$item.val());
        });
        console.log($el.val())
    }
    function setValuesByLang2(select_el) {
        var $ = jQuery;
        var $sel = $(select_el);
        var arr = $sel.attr('name').split('_');
        var $el = $('[name='+ arr[0] +']');
        $el.val('');
        $('[name^='+ $el.attr('name') +'_]', $('#form2')).each(function (i, item) {
            $item = $(item);
            var arr = $item.attr('name').split('_');
            $el.val($el.val()+'[:'+arr[1]+']'+$item.val());
        });
        console.log($el.val())
    }

    function deleteImg(btn,id) {
        var $ = jQuery;
        $.post('<?=View::genPathCA("cs_mvc_excursiones","Excursion","deleteImg")?>', {id:id}, function(response) {
            if(response.success) {
                $(btn).parent().hide('slow');
            }
        });
        event.preventDefault();
    }
    function deleteViaje(btn,id) {
        var $ = jQuery;
        $.post('<?=View::genPathCA("cs_mvc_viajes","Viaje","removeJSON")?>', {id:id}, function(response) {
            console.log(response);
            if(response.success) {
                console.log($(btn).parent());
                $(btn).parent().hide('slow');
            }
        });
        event.preventDefault();
    }
    function saveAccion(btn,id) {
        var $ = jQuery;
        $.post('<?=View::genPathCA("cs_mvc_acciones","Accion","saveJSON")?>', {id:id}, function(response) {
            console.log(response);
            if(response.success) {
                console.log($(btn).parent());
                $(btn).parent().parent().parent().hide('slow');
            }
        });
        event.preventDefault();
    }
    function toogleTBody(a) {
        jQuery(a).parents('table').children('tbody').slideToggle();
        event.preventDefault();
    }
    function showAccion(btn,id) {
        var $ = jQuery;
        $('#form3_'+id+'_tr').slideToggle();
    }
    function deleteAccion(btn,id) {
        var $ = jQuery;
        $.post('<?=View::genPathCA("cs_mvc_acciones","Accion","removeJSON")?>', {id:id}, function(response) {
            console.log(response);
            if(response.success) {
                console.log($(btn).parent());
                $(btn).parent().parent().parent().hide('slow');
            }
        });
        event.preventDefault();
    }
    //desplazar unos px para mostrar en el top la acc editada
    jQuery(function ($) {
        if (/form3tr\d+$/.test(window.location.href)) {
            setTimeout(function()  {
                document.body.scrollTop -= 40;
                console.log(window.screenY)
            },300);
        }
    })
</script>
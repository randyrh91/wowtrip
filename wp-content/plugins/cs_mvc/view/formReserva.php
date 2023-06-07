<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 8/03/17
 * Time: 2:05
 * Nesecita el objeto BookViewModel $model_exc, $excursion
 */
/** @var TransporteModel[] $transportes */
$transportes = $model_exc->getTransportes();
?>
<a name="form_reserva"></a>
<hr>
<div class="row-fluid">
    <h3 style="margin-top: 40px; text-align: center; color: #EF8217"><em
            class="fa fa-list-alt"></em><?= __(CS_L_FORMTITLE) ?> <?= __($excursion->nombre) ?></h3>

    <!--            Comienzo del formulariocon pasos-->
    <div class="form-wizard">
        <div class="steps">
            <div class="navbar-inner">
                <ul class="row-fluid">
                    <li class="span3">
                        <a href="#tab1" data-toggle="tab" class="step active">
                            <span id="labelCant1" class="badge"><h3 class="labelCant">1</h3></span>
                                    <span id="labelInfoInic1" class="desc labelInfoInic">
                                        <span class="hidden-xs hidden-sm"><?= __(CS_L_RESERVA_IP) ?></span>
                                        <i style="visibility: visible; margin-left: 5px"
                                           class="fa fa-flag"></i></span>
                        </a>
                    </li>
                    <li class="span3">
                        <a href="#" data-toggle="tab" class="step">
                            <span id="labelCant2" class="badge-default"><h3 class="labelCant">2</h3></span>
                                    <span id="labelInfoInic2" class="desc">
                                        <span class="hidden-xs hidden-sm"><?= __(CS_L_RESERVA_IR) ?></span>
                                        <i style="visibility: hidden; margin-left: 5px"
                                            class="fa fa-flag"></i></span>
                        </a>
                    </li>
                    <li class="span3">
                        <a href="#" data-toggle="tab" class="step">
                            <span id="labelCant3" class="badge-default"><h3 class="labelCant">3</h3></span>
                                    <span id="labelInfoInic3" class="desc">
                                        <span class="hidden-xs hidden-sm"><?= __(CS_L_RESERVA_CAR_TITLE) ?></span>
                                        <i style="visibility: hidden; margin-left: 5px"
                                            class="fa fa-flag"></i></span>
                        </a>
                    </li>
                    <li class="span3" style="display: none">
                        <a href="#tab4" data-toggle="tab" class="step">
                            <span id="labelCant4" class="badge-default"><h3 class="labelCant">4</h3></span>
                                    <span id="labelInfoInic4" class="desc">
                                        <span class="hidden-xs hidden-sm"><?= __(CS_L_RESERVA_HOSTAL_TITLE) ?></span>
                                        <i style="visibility: hidden; margin-left: 5px"
                                            class="fa fa-flag"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div style="clear: both"></div>
        <div id="barraProgresoPasos" class="progress progress-bar-default">
            <div class="bar" style="width: 25%"></div>
        </div>
        <div class="tab-content">
            <div class="alert alert-error hide">
                <button class="close" data-dismiss="alert"></button>
                You have some form errors. Please check below.
            </div>
            <div class="alert alert-success hide">
                <button class="close" data-dismiss="alert"></button>
                Your form validation is successful!
            </div>
            <div class="tab-pane active" id="tab1">
                <!-- Formulario 1 -->
                <form class="validateEngine" id="form_book1" role="form">
                    <input type="hidden" name="controller" value="ReservaExcursion.saveJSON">
                    <input type="hidden" name="page" value="site">
                    <input type="hidden" name="Excursion_id" value="<?=$excursion->id?>">
                    <label class="label-book col-xs-12 col-sm-12 col-md-12"
                           style="margin: 0"><h2 style="color: #fff;"><?= __(CS_L_RESERVA_IP) ?></h2></label>
                    <input required="" class="validate[required,onlyLetterSp] form-control" id="book_nombre_id"
                           type="text" name="nombre"
                           placeholder="(*) First name / Nombre ...">
                    <input id="book_apellidos" type="text" class="form-control" name="apellido"
                           placeholder="Last Name / Apellidos ...">
                    <input id="book_email" type="email" class="validate[required,custom[email]] form-control"
                           name="email"
                           placeholder="(*) Email / Correo ...">
                    <input required="" class="validate[required,onlyLetterSp] form-control" id="book_nombre_id"
                           type="text" name="pais"
                           placeholder="(*) Country / Pais ...">
                    <textarea id="descripcion" name="descripcion" rows="3" class="form-control"
                        placeholder="">Requests / Peticiones ... </textarea>
                </form>
            </div>
            <div class="tab-pane" id="tab2">
                <!-- Formulario 2 -->
                <form class="validateEngine" id="form_book2" role="form">
                    <label class="label-book col-xs-12 col-sm-12 col-md-12" style="margin: 0"><h2
                            style="color: #fff;"><?= __(CS_L_RESERVA_IR) ?></h2></label>
                    <input id="book_date_id" type="text"
                           class="validate[required,custom[date],future[<?= date('Y/m/d') ?>]] form-control"
                           name="fecha"
                           placeholder="(*) <?= __(CS_L_DIAEXCURSION) ?> ...">
                    <input id="book_time_id" type="text" class="form-control" name="hora"
                           placeholder="Hotel or Address / Hotel o Dirección">
                    <input id="book_personas_id" type="number" class="form-control" name="cantidadPersona"
                           min="1"
                           placeholder="Number of Pax / Cantidad de Pax ...">
                    <select class="form-control" id="book_lenguaje" name="lenguaje">
                        <option>Other Language</option>
                        <?php $c_lan = $model->getLenguaje();
                        foreach ($model->getLanguages() as $lan => $name): ?>
                            <option
                                value="<?= $lan ?>" <?= $lan == $c_lan ? 'selected' : '' ?> ><?= $name ?></option>
                        <?php endforeach ?>
                    </select>
                </form>
            </div>
            <div class="tab-pane" id="tab3">
                <!-- Formulario 3 -->
                <form class="validateEngine" id="form_book3" role="form">
                    <label class="label-book col-xs-12 col-sm-12 col-md-12" style="margin: 0"><h2
                            style="color: #fff;"><?= __(CS_L_RESERVA_CAR) ?></h2></label>

                    <select class="form-control" id="book_auto" name="Transporte_id">
                        <?php /** @var TransporteModel $transp */
                        $first = 0;
                        foreach ($transportes as $transp): ?>
                            <option
                                value="<?= $transp->id ?>" <?= $first == 0 ? 'selected' : '' ?> ><img src="'<?= View::getFoto($transp->foto)?>"><?= __($transp->nombre) ?></option>
                            <?php $first++; endforeach ?>
                        <!-- Carrucel -->
                        <option><?=__(CS_L_RESERVA_NO_CAR)?></option>
                    </select>
                    <div class="media_list">
                        <?php
                        /** @var TransporteModel $dest */
                        foreach ($transportes as $transp):?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <a href="#" class="pull-left">
                                <img width="100px" height="60px" src="<?= View::getFoto($transp->foto) ?>">
                            </a>
                            <div class="media_list_body">
                                <h4 class="media-heading"><span class="label label-warning">
                                <em class="fa fa-road"></em> <?= __($transp->nombre) ?>
                            </span></h4>
                                <?= HTML::truncate(__($transp->descripcion),20) ?>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="tab4">
                <!-- Formulario 4 -->
                <form class="validateEngine" id="form_book4" role="form">
                    <label class="label-book col-xs-12 col-sm-12 col-md-12" style="margin: 0"><h2
                            style="color: #fff;"><?= __(CS_L_RESERVA_HOSTAL) ?></h2></label>

                    <select class="form-control" id="book_auto" name="lenguaje">


                    </select>
                </form>

            </div>
        </div>
        <div style="clear: both"></div>
        <div class="form-actions clearfix">
            <a id="botonEnviar" class="itemReadMore button" style="display: none;">
                <?= __(CS_L_ENVIAR) ?> <em class="fa fa-arrow-circle-o-right"></em>
            </a>
            <a id="botonContinuar" class="itemReadMore button" style="display: block;">
                <?= __(CS_L_NEXT_STEP) ?> <em class="fa fa-arrow-circle-o-right"></em>
            </a>
            <a id="botonAtras" class="itemReadMore button" style="display: none;">
                <em class="fa fa-arrow-circle-o-left"></em> <?= __(CS_L_PREV_STEP) ?>
            </a>
        </div>
    </div>
    <!--            Fin del formulario con pasos-->

</div>

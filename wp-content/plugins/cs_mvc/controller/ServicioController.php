<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioModel.php';

class ServicioController extends Controller {

    function save() {
        $servicio = $this->_save($_REQUEST);

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('Servicios-edit/?show_details=1&id='.$servicio->id));
        $this->redirect($this->genPathVM('cs_mvc_servicios','admin/Servicio_edit','Servicio',$servicio->id));
    }
	
	/**
    * @return ServicioModel
    */
    private function _save($data) {
        $servicio = ServicioRepo::create()->oneBy(intval($data['id']));
        if (!$servicio)
            $servicio = new ServicioModel();
        $servicio->save($data);
        return $servicio;
    }

    function remove() {
        if($this->in('id')) {
            ServicioRepo::create()->oneBy($this->in_num('id'))->delete();
        }

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('cs_mvc_servicios'));
        $this->redirectPage('cs_mvc_servicios');
    }

    function removeJSON()
    {
        if ($this->in('id')) {
            ServicioRepo::create()->oneBy(array('id' => $this->in('id')))->delete();
        }
        $this->responseJSON(array('success'=>'true'));
    }

    function saveJSON() {
        $servicio = $this->_save($this->in_ajax());
        $this->responseJSON($servicio->toArray());
    }

} 
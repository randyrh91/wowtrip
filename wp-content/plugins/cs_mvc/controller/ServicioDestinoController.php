<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioDestinoModel.php';

class ServicioDestinoController extends Controller {

    function save() {
        $servicioDestino = $this->_save($_REQUEST);

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('ServicioDestinos-edit/?show_details=1&id='.$servicioDestino->id));
        $this->redirect($this->genPathVM('cs_mvc_servicio_destinos','admin/ServicioDestino_edit','ServicioDestino',$servicioDestino->id));
    }
	
	/**
    * @return ServicioDestinoModel
    */
    private function _save($data) {
        $servicioDestino = ServicioDestinoRepo::create()->oneBy(intval($data['id']));
        if (!$servicioDestino)
            $servicioDestino = new ServicioDestinoModel();
        $servicioDestino->save($data);
        return $servicioDestino;
    }

    function remove() {
        if($this->in('id')) {
            ServicioDestinoRepo::create()->oneBy($this->in_num('id'))->delete();
        }

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('cs_mvc_servicio_destinos'));
        $this->redirectPage('cs_mvc_servicio_destinos');
    }

    function removeJSON()
    {
        if ($this->in('id')) {
            ServicioDestinoRepo::create()->oneBy(array('id' => $this->in('id')))->delete();
        }
        $this->responseJSON(array('success'=>'true'));
    }

    function saveJSON() {
        $servicioDestino = $this->_save($this->in_ajax());
        $this->responseJSON($servicioDestino->toArray());
    }

} 
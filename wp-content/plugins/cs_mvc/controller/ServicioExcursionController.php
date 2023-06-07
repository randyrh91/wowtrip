<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioExcursionModel.php';

class ServicioExcursionController extends Controller {

    function save() {
        $servicioExcursion = $this->_save($_REQUEST);

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('ServicioExcursiones-edit/?show_details=1&id='.$servicioExcursion->id));
        $this->redirect($this->genPathVM('cs_mvc_servicio_excursiones','admin/ServicioExcursion_edit','ServicioExcursion',$servicioExcursion->id));
    }
	
	/**
    * @return ServicioExcursionModel
    */
    private function _save($data) {
        if($data == null) $data = $_REQUEST;
        $servicioExcursion = ServicioExcursionRepo::create()->oneBy(intval($data['id']));
        if (!$servicioExcursion)
            $servicioExcursion = new ServicioExcursionModel();
        $servicioExcursion->save($data);
        return $servicioExcursion;
    }

    function remove() {
        if($this->in('id')) {
            ServicioExcursionRepo::create()->oneBy($this->in_num('id'))->delete();
        }

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('cs_mvc_servicio_excursiones'));
        $this->redirectPage('cs_mvc_servicio_excursiones');
    }

    function removeJSON()
    {
        $item = ServicioExcursionRepo::create()->oneBy(array(
            'Servicio_id' => $this->in('Servicio_id'),
            'Excursion_id' => $this->in('Excursion_id')
        ));
        if ($item) {
            $item->delete();
        }
        $this->responseJSON(array('success'=>'true'));
    }

    function saveJSON() {
        $servicioExcursion = $this->_save($this->in_ajax());
        $this->responseJSON(array('success'=>true,'data'=>$servicioExcursion->toArray()));
    }

} 
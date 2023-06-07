<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ReservaHostalModel.php';

class ReservaHostalController extends Controller {

    function save() {
        $reservaHostal = $this->_save($_REQUEST);

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('ReservaHostales-edit/?show_details=1&id='.$reservaHostal->id));
        $this->redirect($this->genPathVM('cs_mvc_reserva_hostales','admin/ReservaHostal_edit','ReservaHostal',$reservaHostal->id));
    }
	
	/**
    * @return ReservaHostalModel
    */
    private function _save($data) {
        $reservaHostal = ReservaHostalRepo::create()->oneBy(intval($data['id']));
        if (!$reservaHostal)
            $reservaHostal = new ReservaHostalModel();
        $reservaHostal->save($data);
        return $reservaHostal;
    }

    function remove() {
        if($this->in('id')) {
            ReservaHostalRepo::create()->oneBy($this->in_num('id'))->delete();
        }

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('cs_mvc_reserva_hostales'));
        $this->redirectPage('cs_mvc_reserva_hostales');
    }

    function removeJSON()
    {
        if ($this->in('id')) {
            ReservaHostalRepo::create()->oneBy(array('id' => $this->in('id')))->delete();
        }
        $this->responseJSON(array('success'=>'true'));
    }

    function saveJSON() {
        $reservaHostal = $this->_save($this->in_ajax());
        $this->responseJSON($reservaHostal->toArray());
    }

} 
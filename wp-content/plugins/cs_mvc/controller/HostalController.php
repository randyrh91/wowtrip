<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/HostalModel.php';

class HostalController extends Controller {

    function save() {
        $hostal = $this->_save($_REQUEST);

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('Hostales-edit/?show_details=1&id='.$hostal->id));
        $this->redirect($this->genPathVM('cs_mvc_hostales','admin/Hostal_edit','Hostal',$hostal->id));
    }
	
	/**
    * @return HostalModel
    */
    private function _save($data) {
        $hostal = HostalRepo::create()->oneBy(intval($data['id']));
        if (!$hostal)
            $hostal = new HostalModel();
        $hostal->save($data);
        return $hostal;
    }

    function remove() {
        if($this->in('id')) {
            HostalRepo::create()->oneBy($this->in_num('id'))->delete();
        }

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('cs_mvc_hostales'));
        $this->redirectPage('cs_mvc_hostales');
    }

    function removeJSON()
    {
        if ($this->in('id')) {
            HostalRepo::create()->oneBy(array('id' => $this->in('id')))->delete();
        }
        $this->responseJSON(array('success'=>'true'));
    }

    function saveJSON() {
        $hostal = $this->_save($this->in_ajax());
        $this->responseJSON($hostal->toArray());
    }

} 
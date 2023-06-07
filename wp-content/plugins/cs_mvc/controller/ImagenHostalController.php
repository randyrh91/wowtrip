<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ImagenHostalModel.php';

class ImagenHostalController extends Controller {

    function save() {
        $imagenHostal = $this->_save($_REQUEST);

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('ImagenHostales-edit/?show_details=1&id='.$imagenHostal->id));
        $this->redirect($this->genPathVM('cs_mvc_imagen_hostales','admin/ImagenHostal_edit','ImagenHostal',$imagenHostal->id));
    }
	
	/**
    * @return ImagenHostalModel
    */
    private function _save($data) {
        $imagenHostal = ImagenHostalRepo::create()->oneBy(intval($data['id']));
        if (!$imagenHostal)
            $imagenHostal = new ImagenHostalModel();
        $imagenHostal->save($data);
        return $imagenHostal;
    }

    function remove() {
        if($this->in('id')) {
            ImagenHostalRepo::create()->oneBy($this->in_num('id'))->delete();
        }

        if($this->in('page')=='site')
            $this->redirect($this->genPathSite('cs_mvc_imagen_hostales'));
        $this->redirectPage('cs_mvc_imagen_hostales');
    }

    function removeJSON()
    {
        if ($this->in('id')) {
            ImagenHostalRepo::create()->oneBy(array('id' => $this->in('id')))->delete();
        }
        $this->responseJSON(array('success'=>'true'));
    }

    function saveJSON() {
        $imagenHostal = $this->_save($this->in_ajax());
        $this->responseJSON($imagenHostal->toArray());
    }

} 
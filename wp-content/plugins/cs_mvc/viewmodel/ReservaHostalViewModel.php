<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ReservaHostalModel.php';
require_once CS_MVC_PATH_MODEL . '/ReservaExcursionModel.php';
require_once CS_MVC_PATH_MODEL . '/ImagenHostalModel.php';
class ReservaHostalViewModel extends ViewModel {
    private $reservaHostales;
    private $reservaHostal;

    /**
     * @return array ReservaHostalModel
     */
    function getReservaHostales() {
		$q = $this->in('q');
        if(!$q && !$this->reservaHostales) $this->reservaHostales = ReservaHostalRepo::create()->all();
		elseif($q) {
			$this->reservaHostales = ReservaHostalRepo::create()->allBy(array(
                "id LIKE"=>"'%$q%'",
                "OR orden LIKE"=>"'%$q%'",
            ));
		}
        return $this->reservaHostales;
    }

    /**
     * @return ReservaHostalModel
     */
    function getReservaHostal() {
        if(!$this->reservaHostal){
            if($this->in('id'))
                $this->reservaHostal = ReservaHostalRepo::create()->oneBy($this->in_num('id'));
            else $this->reservaHostal = new ReservaHostalModel();
        }
        return $this->reservaHostal;

    }
	
	function getReservaExcursiones() {
        return ReservaExcursionRepo::create()->all();
    }
	function getImagenHostales() {
        return ImagenHostalRepo::create()->all();
    }


}  
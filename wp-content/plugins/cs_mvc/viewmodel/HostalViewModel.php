<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/HostalModel.php';
require_once CS_MVC_PATH_MODEL . '/DestinoTuristicoModel.php';
class HostalViewModel extends ViewModel {
    private $hostales;
    private $hostal;

    /**
     * @return array HostalModel
     */
    function getHostales() {
		$q = $this->in('q');
        if(!$q && !$this->hostales) $this->hostales = HostalRepo::create()->all();
		elseif($q) {
			$this->hostales = HostalRepo::create()->allBy(array(
                "id LIKE"=>"'%$q%'",
                "OR nombre LIKE"=>"'%$q%'",
                "OR textoCorto LIKE"=>"'%$q%'",
                "OR descripcion LIKE"=>"'%$q%'",
                "OR direccion LIKE"=>"'%$q%'",
                "OR geopos LIKE"=>"'%$q%'",
                "OR cantidadHabitacion LIKE"=>"'%$q%'",
                "OR cantidadPersona LIKE"=>"'%$q%'",
                "OR precio LIKE"=>"'%$q%'",
                "OR oferta LIKE"=>"'%$q%'",
            ));
		}
        return $this->hostales;
    }

    /**
     * @return HostalModel
     */
    function getHostal() {
        if(!$this->hostal){
            if($this->in('id'))
                $this->hostal = HostalRepo::create()->oneBy($this->in_num('id'));
            else $this->hostal = new HostalModel();
        }
        return $this->hostal;

    }
	
	function getDestinoTuristicos() {
        return DestinoTuristicoRepo::create()->all();
    }


}  
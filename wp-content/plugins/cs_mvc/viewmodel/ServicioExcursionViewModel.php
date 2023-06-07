<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioExcursionModel.php';
require_once CS_MVC_PATH_MODEL . '/ServicioModel.php';
require_once CS_MVC_PATH_MODEL . '/ExcursionModel.php';
class ServicioExcursionViewModel extends ViewModel {
    private $servicioExcursiones;
    private $servicioExcursion;

    /**
     * @return array ServicioExcursionModel
     */
    function getServicioExcursiones() {
		$q = $this->in('q');
        if(!$q && !$this->servicioExcursiones) $this->servicioExcursiones = ServicioExcursionRepo::create()->all();
		elseif($q) {
			$this->servicioExcursiones = ServicioExcursionRepo::create()->allBy(array(
                "id LIKE"=>"'%$q%'",
                "OR cantidad LIKE"=>"'%$q%'",
                "OR precio LIKE"=>"'%$q%'",
            ));
		}
        return $this->servicioExcursiones;
    }

    /**
     * @return ServicioExcursionModel
     */
    function getServicioExcursion() {
        if(!$this->servicioExcursion){
            if($this->in('id'))
                $this->servicioExcursion = ServicioExcursionRepo::create()->oneBy($this->in_num('id'));
            else $this->servicioExcursion = new ServicioExcursionModel();
        }
        return $this->servicioExcursion;

    }
	
	function getServicios() {
        return ServicioRepo::create()->all();
    }
	function getExcursiones() {
        return ExcursionRepo::create()->all();
    }


}  
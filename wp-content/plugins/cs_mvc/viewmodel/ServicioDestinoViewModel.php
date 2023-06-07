<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioDestinoModel.php';
require_once CS_MVC_PATH_MODEL . '/ServicioModel.php';
require_once CS_MVC_PATH_MODEL . '/DestinoTuristicoModel.php';
class ServicioDestinoViewModel extends ViewModel {
    private $servicioDestinos;
    private $servicioDestino;

    /**
     * @return array ServicioDestinoModel
     */
    function getServicioDestinos() {
		$q = $this->in('q');
        if(!$q && !$this->servicioDestinos) $this->servicioDestinos = ServicioDestinoRepo::create()->all();
		elseif($q) {
			$this->servicioDestinos = ServicioDestinoRepo::create()->allBy(array(
                "id LIKE"=>"'%$q%'",
                "OR precio LIKE"=>"'%$q%'",
                "OR cantidad LIKE"=>"'%$q%'",
            ));
		}
        return $this->servicioDestinos;
    }

    /**
     * @return ServicioDestinoModel
     */
    function getServicioDestino() {
        if(!$this->servicioDestino){
            if($this->in('id'))
                $this->servicioDestino = ServicioDestinoRepo::create()->oneBy($this->in_num('id'));
            else $this->servicioDestino = new ServicioDestinoModel();
        }
        return $this->servicioDestino;

    }
	
	function getServicios() {
        return ServicioRepo::create()->all();
    }
	function getDestinoTuristicos() {
        return DestinoTuristicoRepo::create()->all();
    }


}  